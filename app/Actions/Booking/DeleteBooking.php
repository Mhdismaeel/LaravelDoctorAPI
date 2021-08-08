<?php

namespace App\Actions\Booking;

use App\Models\doctor_user;

class DeleteBooking
{
    public static function execute($id)
    {
        $books=doctor_user::FindOrFail($id);

        $books->delete();

        return true;

    }
}
