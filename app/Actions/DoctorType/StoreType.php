<?php

namespace app\Actions\DoctorType;
use App\Models\Type;

class StoreType
{
    public static function execute($inputs)
    {
        $type=Type::create([
            'name'=>$inputs->name
        ]);

        return $type;


    }
}
