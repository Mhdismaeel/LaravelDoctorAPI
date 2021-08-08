<?php
namespace App\Actions\Doctor;

use App\Models\Doctor;

class StoreNewDoctorAction
{

    public static function execute($input)
    {
        $doctor=Doctor::create([
            'name'=>$input->name,
            'address'=>$input->address,
            'mobile'=>$input->mobile,
            'location'=>$input->location,
            'lon'=>$input->lon,
            'lat'=>$input->lat,
            'note'=>$input->note,
            'typeid'=>$input->typeid,
            'email'=>$input->email

        ]);

        return $doctor;

    }

}
