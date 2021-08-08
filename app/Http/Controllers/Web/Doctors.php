<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Actions\Helper\Fail;
use App\Actions\Helper\Success;
use App\Actions\Doctor\DeleteDoctorAction;
use App\Actions\Doctor\GetDoctorByIdAction;
use App\Actions\Doctor\StoreNewDoctorAction;
use App\Actions\Doctor\UpdateDoctorAction;
use App\Actions\Doctor\GetDoctorAction;
use App\Http\Controllers\TypeController\TypeController;
use App\Http\Requests\DoctorRequests\StoreRequest;
use App\Http\Requests\DoctorRequests\UpdateeRequest;
use App\Models\Doctor;
use App\Models\Type;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\RedirectResponse;
class Doctors extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $response=GetDoctorAction::execute();
        return view('Dashboard.Doctors.doctors',compact('response'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types=Type::all();
        return view('Dashboard.Doctors.create',compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $response=StoreNewDoctorAction::execute($request);
        return redirect()->route('Doctors');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $doctor=Doctor::FindOrFail($id);

        $types=Type::all();

        return view('Dashboard.Doctors.update',compact('doctor','types'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateeRequest $request, $id)
    {
        $response=UpdateDoctorAction::execute($request,$id);

        return redirect()->route('Doctors');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $response=DeleteDoctorAction::execute($id);
        return redirect()->route('Doctors');


    }
}
