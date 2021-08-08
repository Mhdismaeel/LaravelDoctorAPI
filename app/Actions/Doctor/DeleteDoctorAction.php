<?php
namespace App\Actions\Doctor;
use App\Models\Doctor;

class DeleteDoctorAction
{

    public static function execute($id)
    {
        $doctor=Doctor::FindOrFail($id);

        if($doctor)
        {
            $doctor->delete();
            return true;

        }

    }

}
