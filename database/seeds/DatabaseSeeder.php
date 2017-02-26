<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(InstitutionsTableSeeder::class);
        $this->call(AddJobTypes::class);
        $this->call(AddUKCourses::class);
        $this->call(AddSkills::class);
  		$this->call(AddAdmins::class);
    }
}
