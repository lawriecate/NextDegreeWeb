<?php

use Illuminate\Database\Seeder;
use App\Skill;
class AddSkills extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $skills = json_decode('[
 {
   "name": "Tutoring",
   "icon": "graduation-cap"
 },
 {
   "name": "Events",
   "icon": "calendar"
 },
 {
   "name": "Social Media",
   "icon": "twitter"
 },
 {
   "name": "Video Production",
   "icon": "video-camera"
 },
 {
   "name": "Brand Design",
   "icon": "pencil"
 },
 {
   "name": "Photoshop",
   "icon": "camera"
 },
 {
   "name": "Data Entry",
   "icon": "table"
 },
 {
   "name": "Logo Design",
   "icon": "pencil"
 },
 {
   "name": "Photography",
   "icon": "camera"
 },
 {
   "name": "Chinese",
   "icon": "language"
 },
 {
   "name": "Spanish",
   "icon": "language"
 },
 {
   "name": "French",
   "icon": "language"
 },
 {
   "name": "German",
   "icon": "language"
 },
 {
   "name": "Translation",
   "icon": "language"
 },
 {
   "name": "Web Design",
   "icon": "code"
 },
 {
   "name": "App Design",
   "icon": "code"
 },
 {
   "name": "Programming",
   "icon": "code"
 },
 {
   "name": "IT Support",
   "icon": "laptop"
 }
]');

		foreach($skills as $skill) {
			Skill::create(['name' => $skill->name, 'icon'=>$skill->icon]);
		}
    }
}
