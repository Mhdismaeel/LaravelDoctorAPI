<?php

namespace App\Actions\Booking;

use App\Models\doctor_user;

class ChangeToDone
{
    public static function execute($id)
    {
        $books=doctor_user::FindOrFail($id);

        $books->update(['status_id'=>'3']);

        return true;

    }
}
