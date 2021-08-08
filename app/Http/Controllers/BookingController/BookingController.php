<?php

namespace App\Http\Controllers\BookingController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Actions\Booking\ChangeToDone;
use App\Actions\Booking\ChangeToRejected;
use App\Actions\Booking\ChangToAccesept;
use App\Actions\Booking\DeleteBooking;
use App\Actions\Booking\GetAllBooking;
use App\Actions\Booking\GetBookById;
use App\Actions\Booking\StoreNewBooking;
use App\Actions\Booking\UpdateBooking;
use App\Actions\Helper\Fail;
use App\Actions\Helper\Success;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $response=GetAllBooking::execute();
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
        $response=StoreNewBooking::execute($request);
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
        $response=UpdateBooking::execute($request,$id);
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
        $response=DeleteBooking::execute($id);
        if($response)
        {
            return Success::execute('Deleted successfully',$response,2000);

        }
        else
        {
            return Fail::execute('Deleted Problem',$response,3000);


        }
    }

    //****************** */

    public function ChangeToDone($id)
    {
        $response=ChangeToDone::execute($id);
        if($response)
        {
            return Success::execute('ChangeToDone successfully',$response,2000);

        }
        else
        {
            return Fail::execute('ChangeToDone Problem',$response,3000);


        }

    }

    public function ChangeToReject($id)
    {
        $response=ChangeToRejected::execute($id);
        if($response)
        {
            return Success::execute('ChangeToReject successfully',$response,2000);

        }
        else
        {
            return Fail::execute('Can not rejected this ticket',$response,3000);


        }

    }

    public function ChangeToAccespt($id)
    {
        $response=ChangToAccesept::execute($id);
        if($response)
        {
            return Success::execute('ChangToAccesept successfully',$response,2000);

        }
        else
        {
            return Fail::execute('ChangToAccesept Problem',$response,3000);


        }

    }
}
