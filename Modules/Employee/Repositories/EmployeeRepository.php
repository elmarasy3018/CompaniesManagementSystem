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
        return Employee::create($employeeDetails);
    }

    public function updateEmployee($employeeId, array $newDetails)
    {
        return Employee::whereId($employeeId)->update($newDetails);
    }
}
