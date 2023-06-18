<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/employees",
     *     tags={"Employees"},
     *     summary="Get list of employees",
     *     description="Returns list of employees",
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(ref="#/components/schemas/Employee")
     *         )
     *     ),
     * )
     */
    public function index()
    {
        return Employee::all();
    }

    /**
     * @OA\Post(
     *     path="/api/employees",
     *     tags={"Employees"},
     *     summary="Store new employee",
     *     description="Store new employee and return employee data",
     *     @OA\RequestBody(
     *         required=true,
     *          @OA\JsonContent(
     *             type="array",
     *             @OA\Items(ref="#/components/schemas/EmployeeRequest")
     *          )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Employee created successfully",
     *          @OA\JsonContent(
     *             type="array",
     *             @OA\Items(ref="#/components/schemas/Employee")
     *         )
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Bad request",
     *     ),
     * )
     */
    public function store(Request $request)
    {
        $employee = Employee::create($request->all());
        return response()->json($employee, 201);
    }

    /**
     * @OA\Get(
     *     path="/api/employees/{employee}",
     *     tags={"Employees"},
     *     summary="Get employee by ID",
     *     description="Returns employee data",
     *     @OA\Parameter(
     *         name="employee",
     *         in="path",
     *         description="ID of the employee",
     *         required=true,
     *         @OA\Schema(
     *             type="integer"
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *          @OA\JsonContent(
     *             type="array",
     *             @OA\Items(ref="#/components/schemas/Employee")
     *         )
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Employee not found",
     *     ),
     * )
     */
    public function show(Employee $employee)
    {
        return $employee;
    }

    /**
     * @OA\Put(
     *     path="/api/employees/{employee}",
     *     tags={"Employees"},
     *     summary="Update employee by ID",
     *     description="Updates the employee data",
     *     @OA\Parameter(
     *         name="employee",
     *         in="path",
     *         description="ID of the employee",
     *         required=true,
     *         @OA\Schema(
     *             type="integer"
     *         )
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *          @OA\JsonContent(
     *             type="array",
     *             @OA\Items(ref="#/components/schemas/EmployeeRequest")
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Employee updated successfully",
     *          @OA\JsonContent(
     *             type="array",
     *             @OA\Items(ref="#/components/schemas/Employee")
     *         )
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Employee not found",
     *     ),
     * )
     */
    public function update(Request $request, Employee $employee)
    {
        $employee->update($request->all());
        return response()->json($employee, 200);
    }

    /**
     * @OA\Delete(
     *     path="/api/employees/{employee}",
     *     tags={"Employees"},
     *     summary="Delete employee by ID",
     *     description="Deletes the employee",
     *     @OA\Parameter(
     *         name="employee",
     *         in="path",
     *         description="ID of the employee",
     *         required=true,
     *         @OA\Schema(
     *             type="integer"
     *         )
     *     ),
     *     @OA\Response(
     *         response=204,
     *         description="Employee deleted successfully",
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Employee not found",
     *     ),
     * )
     */
    public function destroy(Employee $employee)
    {
        $employee->delete();
        return response()->json(null, 204);
    }
}
