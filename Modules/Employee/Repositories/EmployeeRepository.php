<?php

namespace Modules\Employee\Repositories;

use Modules\Employee\Entities\Employee;
use Modules\Employee\Interfaces\EmployeeRepositoryInterface;

class EmployeeRepository implements EmployeeRepositoryInterface
{
    public function getAllEmployees()
    {
        return Employee::all();
    }

    public function getEmployeeById($employeeId)
    {
        return Employee::findOrFail($employeeId);
    }

    public function deleteEmployee($employeeId)
    {
        Employee::destroy($employeeId);
    }

    public function createEmployee(array $employeeDetails)
    {
        $employeeDetails += [
            'ar' => [
                'first_name' => $employeeDetails['ar_first_name'],
                'last_name' => $employeeDetails['ar_last_name']
            ],
            'en' => [
                'first_name' => $employeeDetails['en_first_name'],
                'last_name' => $employeeDetails['en_last_name']
            ],
        ];
        $employee = Employee::create($employeeDetails);
        $employee->companies()->attach($employeeDetails['companies']);
        $employee->addMediaFromUrl($employeeDetails['image_url'])->usingName($employeeDetails['en_first_name'])->toMediaCollection('employee');
        return $employee;
    }

    public function updateEmployee($employeeId, array $employeeDetails)
    {
        // $employeeDetails += [
        //     'ar' => [
        //         'first_name' => $employeeDetails['ar_first_name'],
        //         'last_name' => $employeeDetails['ar_last_name']
        //     ],
        //     'en' => [
        //         'first_name' => $employeeDetails['en_first_name'],
        //         'last_name' => $employeeDetails['en_last_name']
        //     ],
        // ];
        $employee = Employee::whereId($employeeId)->update($employeeDetails);
        // $employee->companies()->detach();
        // $employee->companies()->attach($employeeDetails['companies']);
        // $employee->clearMediaCollection('employee');
        // $employee->addMediaFromUrl($employeeDetails['image_url'])->usingName($employeeDetails['en_first_name'])->toMediaCollection('employee');
        return $employee;
    }
}
