<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employee = Employee::all();
        return view('employee.index', compact('employee'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('employee.formcreate');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = new Employee();
        $data->username = $request->get('username');
        $data->email = $request->get('email');
        $data->name = $request->get('name');
        $data->save();

        return redirect()->route('employee.index')->with('status', 'Data karyawan berhasil ditambahkan !');
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
        return view('employee.edit', compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Employee $employee)
    {
        $employee->email = $request->email;      
        $employee->name = $request->name;  
        $employee->save();
        return redirect()->route('employee.index')->with('status', 'Data employee berhasil diubah !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
        try {
            $employee->delete();
            return redirect()->route('employee.index')->with('status', 'Data employee sukses dihapus !');
        } catch (\PDOException $e) {
            return redirect()->route('employee.index')->with('status', 'Data employee gagal dihapus !');
        }
    }

    public function getEditForm(Request $request)
    {
        Log::info('Request username received:', ['username' => $request->username]);
        $username = $request->username;
        $employee = Employee::where('username', $username)->first();
        if (!$employee) {
            Log::warning('Employee not found:', ['username' => $username]);
            return response()->json([
                'status' => 'error',
                'msg' => 'Employee not found'
            ], 404);
        }
        return response()->json(array(
            'status' => 'oke',
            'msg' => view('employee.getEditForm', compact('employee'))->render()
        ), 200);
    }

    public function deleteData(Request $request)
    {
        $username = $request->username;
        $employee = Employee::find($username);
        $employee->delete();
        return response()->json(array(
            'status' => 'oke',
            'msg' => 'type data is removed !'
        ), 200);
    }
}
