<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Employee;

class EmployeeController extends Controller
{
    public function employees()
    {
        $employees = Employee::paginate(4);
        return view('employee.employee', ['employees' => $employees,]);
    }
    public function createEmployees()
    {
        return view('employee.createEmployee');
    }

    public function editEmployees($id)
    {
        //return view('employee.editEmployee');
        $employee = Employee::find($id);
        return view('employee.editemployee', compact('employee'));
    }
    public function updateEmployees(Request $request, $id)
    {
        $employees = Employee::find($id);

        if ($request->hasFile('images')) {
            $image = $request->file('images');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/images', $imageName);
        }
        $employees->first_name        =    $request->first_name;
        $employees->middle_name       =    $request->middle_name;
        $employees->last_name         =    $request->last_name;
        $employees->status            =    $request->status;
        $employees->images            =    $imageName;
        $employees->position          =    $request->position;
        $employees->cv                =    $request->cv;
        $employees->application       =    $request->application;
        $employees->offer_letter      =    $request->offer_letter;
        $employees->nssf              =    $request->nssf;
        $employees->termination       =    $request->termination;
        $employees->phone             =    $request->phone;
        $employees->email             =    $request->email;
        $employees->joining_date      =    $request->joining_date;
        $employees->contract_period   =    $request->contract_period;
        $employees->tin               =    $request->tin;
        $employees->nida              =    $request->nida;
        $employees->username          =    $request->username;
        $employees->password          =    $request->password;

        $employees->update();
        return redirect()->route('employee.employee');
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'first_name'       => 'required',
            'middle_name'      => 'required',
            'last_name'        => 'required',
            'joining_date'     => 'required',
            'termination'      => 'required',
            'phone'            => 'required',
            'email'            => 'required',
        ]);
        if ($request->hasFile('images')) {
            $image = $request->file('images');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/images', $imageName);
        }

        if ($request->hasFile('cv')) {
            $cv = $request->file('cv');
            $cvDoc = uniqid() . '.' . $cv->getClientOriginalExtension();
            $cv->storeAs('public/uploads', $cvDoc);
        }
        if ($request->hasFile('contract')) {
            $contract = $request->file('contract');
            $contractDoc = uniqid() . '.' . $contract->getClientOriginalExtension();
            $contract->storeAs('public/uploads', $contractDoc);
        }
        if ($request->hasFile('application')) {
            $application = $request->file('application');
            $applicationDoc = uniqid() . '.' . $application->getClientOriginalExtension();
            $application->storeAs('public/uploads', $applicationDoc);
        }
        if ($request->hasFile('offerletter')) {
            $offer_letter = $request->file('offerletter');
            $offer_letterDoc = uniqid() . '.' . $offer_letter->getClientOriginalExtension();
            $offer_letter->storeAs('public/uploads', $offer_letterDoc);
        }

        $employees  = new Employee();

        $employees->first_name        =    $request->first_name;
        $employees->middle_name       =    $request->middle_name;
        $employees->last_name         =    $request->last_name;
        $employees->status            =    $request->status;
        $employees->images            =    $imageName;
        $employees->position          =    $request->position;
        $employees->cv                =    $cvDoc;
        $employees->contract         =    $contractDoc;
        $employees->application       =    $applicationDoc;
        $employees->offer_letter      =    $offer_letterDoc;
        $employees->nssf              =    $request->nssf;
        $employees->termination       =    $request->termination;
        $employees->phone             =    $request->phone;
        $employees->email             =    $request->email;
        $employees->joining_date      =    $request->joining_date;
        $employees->contract_period   =    $request->contract_period;
        $employees->tin               =    $request->tin;
        $employees->nida              =    $request->nida;
        $employees->username          =    $request->username;
        $employees->password          =    $request->password;

        $employees->save();
        return redirect()->route('employee.employee')->with('message', 'New employee added successfully.');
    }

    public function profile()
    {
        return view('employee.profile');
    }
}
