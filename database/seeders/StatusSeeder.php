<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Status;
class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arr_status=['Pending','Accepted','Done','Rejected'];

        foreach($arr_status as $s)
        {
           Status::create(['name'=>$s]);
        }
    }
}
