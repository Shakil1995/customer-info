<?php

namespace Database\Seeders;

use App\Models\Area;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AreaSeeder extends Seeder
{
   
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        Area::truncate();
            $areas =  [ 

                ['name' => 'Banani', 'code' => '10'],
                ['name' => 'Mirpur', 'code' => '20'],
                ['name' => 'Baridhara', 'code' => '30'],
                ['name' => 'Vatara', 'code' => '40'],
                ['name' => 'Uttara', 'code' => '50',],
                ['name' => 'Badda', 'code' => '60'],
                ['name' => 'Dhaka Cantonment', 'code' => '70'],
                ['name' => 'Motijheel', 'code' => '80'],
                ['name' => 'Rampura', 'code' => '90'],
                ['name' => 'Tejgaon', 'code' => '11'],
              
            ];
        Area::insert($areas);
    }
}
