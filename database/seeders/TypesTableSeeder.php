<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class TypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = [
            ['breakfast'],
            ['lunch'],
            ['dinner'],
        ];

        foreach ($types as $type)
        {
            DB::table('types')->insert([
                'type' => $type[0],
                'created_at' => Carbon::now(),
            ]);
        }
    }
}
