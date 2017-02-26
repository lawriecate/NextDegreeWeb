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
            'name' => 'Nottingham Trent University',
            'slug' => 'ntu',
            'enable_registration' => true,
            'domain' => 'ntu.ac.uk'
        ]);
        DB::table('institutions')->insert([
            'name' => 'The University of Nottingham',
            'slug' => 'uon',
            'enable_registration' => true,
            'domain' => 'nottingham.ac.uk'
        ]);


         
    }
}
