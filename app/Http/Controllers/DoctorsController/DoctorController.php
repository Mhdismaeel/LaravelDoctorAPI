<?php

namespace App\Http\Controllers\DoctorsController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Actions\Helper\Fail;
use App\Actions\Helper\Success;
use App\Actions\Doctor\DeleteDoctorAction;
use App\Actions\Doctor\GetDoctorByIdAction;
use App\Actions\Doctor\StoreNewDoctorAction;
use App\Actions\Doctor\UpdateDoctorAction;
use App\Actions\Doctor\GetDoctorAction;
use App\Http\Requests\DoctorRequests\StoreRequest;
use App\Http\Requests\DoctorRequests\UpdateeRequest;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class DoctorController extends Controller
{
    use AuthorizesRequests;

    public function __construct()
    {
        //$this->middleware('auth:api');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $response=GetDoctorAction::execute();
        if($response)
        {
            return Success::execute('Record(s) fetched successfully',$response,2000);

        }
        else
        {
            return Fail::execute('Record(s) can not be fetched',$response,3000);


        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        if($response)
        {
            return Success::execute('Stored successfully',$response,2000);

        }
        else
        {
            return Fail::execute('Stored Problem',$response,3000);


        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $response=GetDoctorByIdAction::execute($id);
        if($response)
        {
            return Success::execute('Record(s) fetched successfully',$response,2000);

        }
        else
        {
            return Fail::execute('Record(s) can not be fetched',$response,3000);


        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        if($response)
        {
            return Success::execute('Updated successfully',$response,2000);

        }
        else
        {
            return Fail::execute('Updated Problem',$response,3000);


        }

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
        if($response)
        {
            return Success::execute('Deleted successfully',$response,2000);

        }
        else
        {
            return Fail::execute('Deleted Problem',$response,3000);


        }

    }
}
