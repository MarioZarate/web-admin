<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('roles')->insert([
            ['name' => 'SUPER_ADMIN' , 'slug' => 'super_admin' ,'code' => '001'],
            ['name' => 'ADMIN' , 'slug' =>  'admin' ,'code' => '002']
        ]);
    }
}
