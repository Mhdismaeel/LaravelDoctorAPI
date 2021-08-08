<?php
namespace App\Actions\Doctor;
use App\Models\Doctor;

class UpdateDoctorAction
{

    public static function execute($input,$id)
    {
        $doctor=Doctor::Find($id);

       $doctor->update([
        'name'=>$input->name,
        'address'=>$input->address,
        'email'=>$input->email,
        'mobile'=>$input->mobile,
        'location'=>$input->location,
        'lon'=>$input->lon,
        'lat'=>$input->lat,
        'note'=>$input->note,
        'typeid'=>$input->typeid,
       ]);

       return $doctor;

    }

}
