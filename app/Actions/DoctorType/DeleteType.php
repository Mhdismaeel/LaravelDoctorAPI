<?php

namespace app\Actions\DoctorType;
use App\Models\Type;

class DeleteType
{
    public static function execute($id)
    {
        $types=Type::FindOrFail($id);

        $types->delete();

        return true;

    }
}
