<?php

use Illuminate\Database\Seeder;
use App\Admin;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = array(
        	array(
        		"name" => "Shakil Hossain",
        		"email" => "mdshakilhossain091@gmail.com",
        		"mobile" => "01738620241",
        		"password" => Hash::make("123456789")
        	)
        );

        Admin::insert($data);
    }
}
