<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['employees']=Employee::paginate(5);
        
        return view('employee.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('employee.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $employeeData = request()->except('_token');

        if($request->hasFile('photo')){
            $employeeData['photo']=$request->file('photo')->store('uploads', 'public');
        }

        $request->merge([
            'phoneNumber' => intval($request->input('phoneNumber')),
        ]);
        $request->validate([
            'firstname' => 'required|string',
            'surname' => 'required|string',
            'email' => 'required|email|unique:employees',
            'phoneNumber' => 'required|numeric',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        Employee::insert($employeeData);
        return response()->json($employeeData);
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Employee $employee)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
        //
    }
}
