<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('admins')->insert([
            'user_name'      => 'admin',
            'email'          => 'admin@gmail.com',
            'password'       => Hash::make('12345678'),
            'roles'          => 1,
            'status'         => 1,
            'remember_token' =>'V6qQ3O8yJrAacRy3jBkuR6NAHXd0jAvC9euMzBrQx6R7tA2v68sNplz35vaa',
            'created_at'     => Carbon::now(),
            'updated_at'     => Carbon::now(),
        ]);
    }
}
