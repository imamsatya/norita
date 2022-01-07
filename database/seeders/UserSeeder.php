<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
use Hash;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            //Kepala BPS
            [
                'name'  => 'BPS 7200',
                'email' => 'bps7200@bps.go.id',
                'password' => Hash::make('12341234'),
                
            ],
        ]);
    }
}
