<?php

use Illuminate\Database\Seeder;
use App\JobType;
class AddJobTypes extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $names = array(
"Internship",
"Graduate Internship",
"Part Time",
"Freelance",
"Volunteering"
);

		foreach($names as $name) {
			JobType::create(['title' => $name]);
		}
    }
}
