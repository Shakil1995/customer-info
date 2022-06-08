<?php

namespace Database\Seeders;

use App\Models\Area;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AreaSeeder extends Seeder
{
   
    public function run()
    {
        Area::truncate();
            $areas =  [ 

                ['name' => 'Banani', 'code' => '10001'],
                ['name' => 'Mirpur', 'code' => '10002'],
                ['name' => 'Baridhara', 'code' => '10003'],
                ['name' => 'Vatara', 'code' => '10004'],
                ['name' => 'Uttara', 'code' => '10005',],
                ['name' => 'Badda', 'code' => '10006'],
                ['name' => 'Dhaka Cantonment', 'code' => '10007'],
                ['name' => 'Motijheel', 'code' => '10008'],
                ['name' => 'Rampura', 'code' => '10009'],
                ['name' => 'Tejgaon', 'code' => '10010'],
              
            ];
        Area::insert($areas);
    }
}
