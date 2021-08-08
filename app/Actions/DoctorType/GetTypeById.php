<?php

namespace app\Actions\DoctorType;
use App\Models\Type;

class GetTypeById
{
    public static function execute($id)
    {
        $types=Type::FindOrFail($id);

        return $types;

    }
}
