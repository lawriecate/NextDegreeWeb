<?php

use Illuminate\Database\Seeder;

class InstitutionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *	
     */
    public function run()
    {
        DB::table('institutions')->insert([
            'name' => 'NTU',
            'slug' => 'ntu',
            'enable_registration' => true,
            'domain' => 'ntu.ac.uk'
        ]);

         
    }
}
