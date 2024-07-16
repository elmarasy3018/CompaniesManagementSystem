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

    // public function store(Request $request): JsonResponse
    // {
    //     $EmployeeDetails = $request->only([
    //         'client',
    //         'details'
    //     ]);

    //     return response()->json(
    //         [
    //             'data' => $this->EmployeeRepository->createEmployee($EmployeeDetails)
    //         ],
    //         Response::HTTP_CREATED
    //     );
    // }

    public function show(Request $request): JsonResponse
    {
        $EmployeeId = $request->route('id');

        return response()->json([
            'data' => $this->EmployeeRepository->getEmployeeById($EmployeeId)
        ]);
    }

    // public function update(Request $request): JsonResponse
    // {
    //     $EmployeeId = $request->route('id');
    //     $EmployeeDetails = $request->only([
    //         'client',
    //         'details'
    //     ]);

    //     return response()->json([
    //         'data' => $this->EmployeeRepository->updateEmployee($EmployeeId, $EmployeeDetails)
    //     ]);
    // }

    public function destroy(Request $request): JsonResponse
    {
        $EmployeeId = $request->route('id');
        $this->EmployeeRepository->deleteEmployee($EmployeeId);

        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
