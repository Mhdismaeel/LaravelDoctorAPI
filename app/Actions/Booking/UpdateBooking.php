<?php

namespace App\Actions\Booking;

use App\Models\doctor_user;
use Illuminate\Support\Facades\Auth;

class UpdateBooking
{
    public static function execute($inputs,$id)
    {
        $userid=Auth::id();
        $book=doctor_user::Find($id);

        if($book->status_id==1)
        {
            $book->update([
                'doctor_id'=>$inputs->doctor_id,
                'user_id'=>$userid,
                'bookingdate'=>$inputs->bookingdate,
                'status_id'=>'1'
            ]);

            return $book;
        }

        return false;

    }
}
