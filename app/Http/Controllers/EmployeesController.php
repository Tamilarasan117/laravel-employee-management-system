<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeesController extends Controller {
    // Display a listing of the resource.
    public function index() {
        $employees = Employee::orderBy('name', 'asc') -> paginate(3);
        return view('index', compact('employees'));
    }

    // Show the form for creating a new resource.
    public function create() {
        return view('create');
    }

    // Store a newly created resource in storage.
    public function store(Request $request) {
        // Checking Validate input fields
        $request -> validate([
            'name' => 'required',
            'email' => 'required|unique:employees,email|email',
            'phone' => 'required|numeric|unique:employees,phone',
            'joining_date' => 'required',
            'salary' => 'required',
        ],[
            'phone.unique' => 'Phone number already exist!' // user error message
        ]);
        $data = $request -> except('_token'); // it will get except _token all input and files
        // Mass assignment insert row
        Employee::create($data); // assigning all values at once and supports multiple row inserts
        return redirect() -> route('employee.index') -> withSuccess('Employee has been created successfully!');
    }

    // Display the specified resource.
    public function show(Employee $employee/*string $id*/) {
        return view('show', compact('employee'));
    }

    // Show the form for editing the specified resource.
    public function edit(Employee $employee/*string $id*/) { // Employee $employee it's route model binding
        //$employee = Employee::find($id); // finding the particular employee details
        return view('edit', compact('employee')); // sending particular employee details to access
    }

    // Update the specified resource in storage.
    public function update(Request $request, Employee $employee) {
        // Checking Validate input fields
        $request -> validate([
            'name' => 'required',
            'email' => 'required|unique:employees,email,'.$employee -> id.'|email',
            'phone' => 'required|numeric|unique:employees,phone,'.$employee -> id,
            'joining_date' => 'required',
            'salary' => 'required',
        ],[
            'phone.unique' => 'Phone number already exist!' // user error message
        ]);

        $data = $request -> all();
        $employee->update($data);
        return redirect() -> route('employee.edit', $employee -> id) -> withSuccess('Employee Details has been updated successfully!');
    }

    // Remove the specified resource from storage.
    public function destroy(Employee $employee) {
        $employee -> delete(); // delete employee details from database
        return redirect() -> route('employee.index', $employee -> id) -> withSuccess('Employee has been deleted successfully!');
    }
}
