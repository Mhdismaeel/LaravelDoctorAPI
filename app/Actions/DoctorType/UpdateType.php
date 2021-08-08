<?php

namespace app\Actions\DoctorType;
use App\Models\Type;

class UpdateType
{
    public static function execute($inputs,$id)
    {
        $type=Type::FindOrFail($id);

        $type->update([
            'name'=>$inputs->name
        ]);

        return $type;


    }
}
