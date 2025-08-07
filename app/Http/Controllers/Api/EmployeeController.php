<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEmployeeRequest;
use App\Models\Employee;
use Illuminate\Support\Facades\Gate;

class EmployeeController extends Controller
{
    public function __construct()
    {
        // Middleware is automatically applied via routes
    }

    public function index()
    {
        Gate::authorize('viewAny', Employee::class);
        return Employee::with('factory')->paginate(10);
    }

    public function store(StoreEmployeeRequest $request)
    {
        Gate::authorize('create', Employee::class);
        return Employee::create($request->validated());
    }

    public function show(Employee $employee)
    {
        Gate::authorize('view', $employee);
        return $employee->load('factory');
    }

    public function update(StoreEmployeeRequest $request, Employee $employee)
    {
        Gate::authorize('update', $employee);
        $employee->update($request->validated());
        return $employee;
    }

    public function destroy(Employee $employee)
    {
        Gate::authorize('delete', $employee);
        $employee->delete();
        return response()->noContent();
    }
}