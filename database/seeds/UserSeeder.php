<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
            'name' => 'Muhammad',
            'last_name' => 'Firriezky',
            'email' => 'firriezky@badanmentoring.org',
            'password' => bcrypt('razkyyy123'),
            'created_at' => Carbon::now()->timezone('Asia/Bangkok')->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->timezone('Asia/Bangkok')->format('Y-m-d H:i:s')
        ]);

        DB::table('users')->insert([
            'name' => 'BM FIK',
            'last_name' => '',
            'email' => 'fik@badanmentoring.org',
            'password' => bcrypt('hamasah_BMFIK'),
            'created_at' => Carbon::now()->timezone('Asia/Bangkok')->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->timezone('Asia/Bangkok')->format('Y-m-d H:i:s')
        ]);

        DB::table('users')->insert([
            'name' => 'BMFT',
            'last_name' => 'Firriezky',
            'email' => 'ft@badanmentoring.org',
            'password' => bcrypt('hamasah_BMFT'),
            'created_at' => Carbon::now()->timezone('Asia/Bangkok')->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->timezone('Asia/Bangkok')->format('Y-m-d H:i:s')
        ]);

        DB::table('users')->insert([
            'name' => 'BM FIT',
            'last_name' => '',
            'email' => 'fit@badanmentoring.org',
            'password' => bcrypt('hamasah_BMFIT'),
            'created_at' => Carbon::now()->timezone('Asia/Bangkok')->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->timezone('Asia/Bangkok')->format('Y-m-d H:i:s')
        ]);

        DB::table('users')->insert([
            'name' => 'BM FKEB',
            'last_name' => '',
            'email' => 'fkeb@badanmentoring.org',
            'password' => bcrypt('hamasah_BMFKEB'),
            'created_at' => Carbon::now()->timezone('Asia/Bangkok')->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->timezone('Asia/Bangkok')->format('Y-m-d H:i:s')
        ]);
    }
}
