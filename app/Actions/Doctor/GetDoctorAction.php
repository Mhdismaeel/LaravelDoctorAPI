<?php
namespace App\Actions\Doctor;
use App\Models\Doctor;
class GetDoctorAction
{

    public static function execute()
    {
        $doctors=Doctor::where('id','!=','0')->with('types')->with('users');

        return $doctors->get();
    }

}
