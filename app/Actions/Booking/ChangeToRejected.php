<?php

namespace App\Actions\Booking;

use App\Models\doctor_user;

class ChangeToRejected
{
    public static function execute($id)
    {
        $books=doctor_user::FindOrFail($id);
        if($books->status_id!=3)
        {
            $books->update(['status_id'=>'4']);

            return true;
        }

        else
        {
            return false;
        }

    }
}
