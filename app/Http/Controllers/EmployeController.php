<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use App\Http\Requests\UpdateStoreRequest;
use App\Models\Employe;
use App\Models\Store;
use Illuminate\Http\Request;

class EmployeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employe::orderBy('created_at')->paginate(5);

        return view('employee.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        $stores = Store::orderBy('created_at')->get();
        return view('employee.create', compact('stores'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function store(StoreEmployeeRequest $request)
    {

        $employee = new Employe();

        $employee->first_name = $request->input('first_name');
        $employee->last_name = $request->input('last_name');
        $employee->store_id = $request->input('store_id');
        $employee->email = $request->input('email');
        $employee->phone_number = $request->input('phone_number');

        if ($employee->save()) {
            return redirect(route('employee.create'))->with('status', "Employee saved with success");
        } else {
            return redirect(route('employee.create'))->with('nostatus', "Employee is not saved");
        }

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employee = Employe::find($id)->first();
        $stores = Store::orderBy('created_at')->get();


        return view('employee.edit', compact('employee', 'stores'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function update(UpdateEmployeeRequest $request, $id)
    {
        $employee = Employe::find($id);

        $employee->first_name = $request->input('first_name');
        $employee->last_name = $request->input('last_name');
        $employee->store_id = $request->input('store_id');
        $employee->email = $request->input('email');
        $employee->phone_number = $request->input('phone_number');


        if ($employee->save()) {
            return redirect(route('employee.create'))->with('status', "Employee is updated successfully");
        } else {
            return redirect(route('employee.create'))->with('nostatus', "Employee is not updated successfully");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        $employee = Employe::find($id)->delete();

        if ($employee) {
            return redirect(route('employee.index'))->with('status', "Employee is deleted successfully");
        } else {
            return redirect(route('employee.create'))->with('nostatus', "Employee is not deleted successfully");
        }
    }
}
