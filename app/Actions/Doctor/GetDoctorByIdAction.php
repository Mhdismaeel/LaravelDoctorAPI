<?php
namespace App\Actions\Doctor;

use App\Models\Doctor;

class GetDoctorByIdAction
{
    public static function execute($id)
    {
        $doctor=Doctor::where('id','=',$id)->with('types');

        return $doctor->get();

    }
}
