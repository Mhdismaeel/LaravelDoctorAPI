<?php

namespace App\Http\Controllers\TypeController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Actions\DoctorType\GetAllType;
use App\Actions\DoctorType\DeleteType;
use App\Actions\DoctorType\GetTypeById;
use App\Actions\DoctorType\StoreType;
use App\Actions\DoctorType\UpdateType;
use App\Actions\Helper\Fail;
use App\Actions\Helper\Success;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $response=GetAllType::execute();
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
    public function store(Request $request)
    {
        $response=StoreType::execute($request);
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
        $response=GetTypeById::execute($id);
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
    public function update(Request $request, $id)
    {
        $response=UpdateType::execute($request,$id);
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
        $response=DeleteType::execute($id);
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
