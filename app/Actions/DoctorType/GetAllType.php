<?php

namespace app\Actions\DoctorType;
use App\Models\Type;

  class GetAllType
{
    public static function execute()
    {
        $types=Type::all();

        return $types;

    }
}
