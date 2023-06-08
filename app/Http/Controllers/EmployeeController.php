<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Storage;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['employees'] = Employee::paginate(5);

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

        if ($request->hasFile('photo')) {
            $employeeData['photo'] = $request->file('photo')->store('uploads', 'public');
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
        return redirect('employee')->with('message', 'Created successfully');

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $employee = Employee::findOrFail($id);

        return view('employee.show', compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $employee = Employee::findOrFail($id);
        

        return view('employee.edit', compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'firstname' => 'required|string',
            'surname' => 'required|string',
            'email' => 'required|email|unique:employees,email,' . $id,
            'phoneNumber' => 'required|numeric',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $employeeData = $request->except('_token', '_method');

        if ($request->hasFile('photo')) {
            $employeeID = Employee::findOrFail($id);
            Storage::delete('public/' . $employeeID->id);
            $employeeData['photo'] = $request->file('photo')->store('uploads', 'public');
        }


        $employeeData['phoneNumber'] = intval($request->input('phoneNumber'));

        Employee::where('id', $id)->update($employeeData);


        $employeeFind = Employee::findOrFail($id);
        $data['employees'] = Employee::paginate(5);

        return redirect('employee')->with('message', 'Updated successfully');

    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $employeeID = Employee::findOrFail($id);
        if (Storage::delete('public/' . $employeeID->photo)) {
            Employee::destroy($id);
        }
        return redirect('employee')->with('message', 'Deleted successfully');
    }
}
