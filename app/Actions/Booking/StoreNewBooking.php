<?php

namespace App\Actions\Booking;
use App\Models\doctor_user;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
class StoreNewBooking
{
    public static function execute($inputs)
    {
        $userid=Auth::id();
       $booking=doctor_user::create([
           'doctor_id'=>$inputs->doctor_id,
           'user_id'=>$userid,
           'bookingdate'=>Carbon::parse($inputs->bookingdate)->format('Y-m-d H:i:s'),
           'status_id'=>'1'
       ]);

       return $booking;
    }
}
