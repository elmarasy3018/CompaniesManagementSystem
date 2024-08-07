<?php

namespace Modules\Employee\Http\Controllers\api;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;
use Modules\Employee\Interfaces\EmployeeRepositoryInterface;

class EmployeeController extends Controller
{
    private EmployeeRepositoryInterface $EmployeeRepository;

    public function __construct(EmployeeRepositoryInterface $EmployeeRepository)
    {
        $this->EmployeeRepository = $EmployeeRepository;
    }

    public function index(): JsonResponse
    {
        return response()->json([
            'data' => $this->EmployeeRepository->getAllEmployees()
        ]);
    }

    public function store(Request $request): JsonResponse
    {
        $EmployeeDetails = $request->only([
            'ar_first_name',
            'ar_last_name',
            'en_first_name',
            'en_last_name',
            'email',
            'phone',
            'image_url',
            'companies',
        ]);

        return response()->json(
            [
                'data' => $this->EmployeeRepository->createEmployee($EmployeeDetails)
            ],
            Response::HTTP_CREATED
        );
    }

    public function show(Request $request): JsonResponse
    {
        $EmployeeId = $request->route('id');

        return response()->json(['data' => $this->EmployeeRepository->getEmployeeById($EmployeeId)]);
    }

    public function update(Request $request): JsonResponse
    {
        $EmployeeId = $request->route('id');
        $EmployeeDetails = $request->only([
            // 'ar_first_name',
            // 'ar_last_name',
            // 'en_first_name',
            // 'en_last_name',
            'email',
            'phone',
            // 'image_url',
            // 'companies',
        ]);

        $this->EmployeeRepository->updateEmployee($EmployeeId, $EmployeeDetails);
        return response()->json([['message' => 'Employee updated successfully'], 'data' => $this->EmployeeRepository->getEmployeeById($EmployeeId)]);
    }

    public function delete(Request $request): JsonResponse
    {
        $EmployeeId = $request->route('id');
        $this->EmployeeRepository->deleteEmployee($EmployeeId);

        return response()->json(['message' => 'Employee deleted successfully']);
    }
}
