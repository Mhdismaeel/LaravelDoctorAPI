<?php

namespace App\Actions\Booking;

use App\Models\doctor_user;
use Illuminate\Support\Facades\Auth;
class GetAllBooking
{
    public static function execute()
    {
        $userid=Auth::id();
        $user=Auth::user();
        if($user->hasRole('Client'))
        {
            $books=doctor_user::join('users','users.id','=','doctor_user.user_id')
        ->join('doctors','doctors.id','=','doctor_user.doctor_id')
        ->join('status','status.id','=','doctor_user.status_id')
        ->select('doctor_user.*','users.name as userName','doctors.name as doctorName','status.name as statusName')->
        where('doctor_user.user_id','=',$userid)->get();
        }
        else
        {
            $books=doctor_user::join('users','users.id','=','doctor_user.user_id')
        ->join('doctors','doctors.id','=','doctor_user.doctor_id')
        ->join('status','status.id','=','doctor_user.status_id')
        ->select('doctor_user.*','users.name as userName','doctors.name as doctorName','status.name as statusName')->get();

        }

        return $books;

    }
}
