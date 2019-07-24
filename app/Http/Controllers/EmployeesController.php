<?php

namespace App\Http\Controllers;

use App\Company;
use App\Employee;
use Illuminate\Database\QueryException;
use App\Http\Requests\EmployeeCreateRequest;
use App\Http\Requests\EmployeeUpdateRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Session;

class EmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        $employees = Employee::orderBy('id')->get();
//        return view('employees.index', ['employees' => $employees]);
        $editableEmployee = null;
        $compName = Company::all();
        $empName = Employee::all();

        $companyList = Company::pluck('name', 'id');

        $employeeQuery = Employee::where(function ($query) {
            $searchQuery = request('q');
            $query->where('first_name', 'like', '%'.$searchQuery.'%');
            $query->orWhere('last_name', 'like', '%'.$searchQuery.'%');
        });
        if ($companyId = request('company_id')) {
            $employeeQuery->where('company_id', $companyId);
        }
        $employees = $employeeQuery->with('company')->paginate();
        if (in_array(request('action'), ['edit', 'delete']) && request('id') != null) {
            $editableEmployee = Employee::find(request('id'));
        }
        return view('employees.index', compact('employees', 'editableEmployee', 'companyList'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $comp = Company::all();
        $companyList = $comp->pluck('name', 'id')->toArray();
        return view('employees.create', ['companyList' => $companyList]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $newEmployee = $request->all();
        $newEmployee['admin_id'] = auth()->id();
        $employee = Employee::create($newEmployee);
        return redirect()->route('employees.show', $employee);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {

        return view('employees.show', compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        $comp = Company::all();
        $companyList = $comp->pluck('name', 'id')->toArray();
        return view('employees.edit', compact('employee', 'companyList'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        $this->validate($request,[
            'first_name' => 'required',
            'last_name' => 'required',
        ]);
        $employee->update($request->all());
        return redirect()->route('employees.index')
            ->with('success','Employee updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        $employee->delete();

        return redirect()->route('employees.index')
            ->with('success','Employee deleted successfully');
    }
}
