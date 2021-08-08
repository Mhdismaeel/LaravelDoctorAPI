<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Type;
class DoctorTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types=Type::create(['name'=>'نسائية']);
        $types=Type::create(['name'=>'أطفال']);
        $types=Type::create(['name'=>'بولية']);
        $types=Type::create(['name'=>'جراحة']);
        $types=Type::create(['name'=>'عينية']);
        $types=Type::create(['name'=>'هضمية']);

    }
}
