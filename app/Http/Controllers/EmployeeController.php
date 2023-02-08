<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeeEditRequest;
use App\Http\Requests\EmployeeStoreRequest;
use App\Models\Company;
use App\Models\Employee;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $employees = Employee::with('company')->paginate(10);
        return view('employees', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        $companies = Company::all('id','name');
        return view('Employees.employeesStore',compact('companies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(EmployeeStoreRequest $request): RedirectResponse
    {
        $validated = $request->validated();
        $employee = Employee::create(
           $request->except('_token')
);
        return redirect()->back()->with([
            'message' => 'success']);
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param Employee $employee
     * @return Application|Factory|View
     */
    public function edit(Employee $employee)
    {
        $companies = Company::all('id','name');
        return view('Employees.employeesEdit',compact('employee','companies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Employee $employee
     * @return RedirectResponse
     */
    public function update(EmployeeEditRequest $request, Employee $employee)
    {
        $validated = $request->validated();
        $employee->update($request->except(['_token','_method']));
        return redirect()->back()->with('message','success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Employee $employee
     * @return RedirectResponse
     */
    public function destroy(Employee $employee)
    {
        $employee->delete();
        return redirect()->back();
    }
}
