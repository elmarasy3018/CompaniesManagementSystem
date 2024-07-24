<?php

namespace Modules\Employee\Http\Controllers;

use App\Models\Company;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Modules\Employee\Entities\Employee;
use Modules\Employee\Http\Requests\StoreEmployeeRequest;
use Modules\Employee\Http\Requests\UpdateEmployeeRequest;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = Employee::with(['companies'])->paginate(10);
        return view('employee::index', ['employees' => $employees]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $companies = Company::all();
        return view('employee::create', ['companies' => $companies]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEmployeeRequest $request)
    {
        $user = Auth::user();
        if (!$user->hasPermissionTo('create_employee')) {
            abort(403, 'Unauthorized to do this action');
        }

        $validated = $request->validated();

        $translated = [
            'ar' => [
                'first_name' => $request->input('ar_first_name'),
                'last_name' => $request->input('ar_last_name')
            ],
            'en' => [
                'first_name' => $request->input('en_first_name'),
                'last_name' => $request->input('en_last_name')
            ],
        ];

        $translated += $validated;
        $employee = Employee::create($translated);
        $employee->companies()->attach($request->companies_id);
        $employee->addMediaFromRequest('image')->usingName($employee->first_name)->toMediaCollection('employee');
        return redirect('employees');
    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employee $employee)
    {
        $companies = Company::all();
        return view('employee::edit', ['employee' => $employee, 'companies' => $companies]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEmployeeRequest $request, Employee $employee)
    {
        $user = Auth::user();
        if (!$user->hasPermissionTo('edit_employee')) {
            abort(403, 'Unauthorized to do this action');
        }

        $employee->update($request->validated());
        $employee->companies()->sync($request->companies_id);
        if ($request->hasFile('image')) {
            $employee->clearMediaCollection('employee');
            $employee->addMediaFromRequest('image')->usingName($employee->first_name)->toMediaCollection('employee');
        }
        return redirect('employees');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
        $user = Auth::user();
        if (!$user->hasPermissionTo('delete_employee')) {
            abort(403, 'Unauthorized to do this action');
        }

        $employee->delete();
        $employee->clearMediaCollection('employee');
        return redirect('employees');
    }
}
