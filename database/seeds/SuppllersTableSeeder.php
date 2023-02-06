<?php

use App\Seeder\BaseSeeder;
use Carbon\Carbon;
use App\Models\Suppliers;

class SuppllersTableSeeder extends BaseSeeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        	$suppllers = [
				        	[
								'id'         => 1,
								'name'       => 'Apple',
								'address'    => 'Americas',
								'phone'      => '1-800-MY-APPLE',
								'email'      => 'apple@gmail.com',
								'created_at' => Carbon::now(),
								'updated_at' => Carbon::now(),
				        	],
				        	[
								'id'         => 2,
								'name'       => 'SamSung',
								'address'    => 'Hàn Quốc',
								'phone'      => '180012054',
								'email'      => 'samsung@gmail.com',
								'created_at' => Carbon::now(),
								'updated_at' => Carbon::now(),
				        	],
				        	[
								'id'         => 3,
								'name'       => 'ASUS',
								'address'    => 'Hàn Quốc',
								'phone'      => '180012454',
								'email'      => 'asus@gmail.com',
								'created_at' => Carbon::now(),
								'updated_at' => Carbon::now(),
				        	],
				        	[
								'id'         => 4,
								'name'       => 'OOP',
								'address'    => 'Trung Quốc',
								'phone'      => '68759231547',
								'email'      => 'oop@gmail.com',
								'created_at' => Carbon::now(),
								'updated_at' => Carbon::now(),
				        	],
				        	[
								'id'         => 5,
								'name'       => 'Sony',
								'address'    => 'Trung Quốc',
								'phone'      => '4852164',
								'email'      => 'sony@gmail.com',
								'created_at' => Carbon::now(),
								'updated_at' => Carbon::now(),
				        	]
    					];
			        DB::beginTransaction();
			        try {

			            foreach($suppllers as $key => $suppller) {

			                $suppller = Suppliers::create($suppller);
			            }
			                
			            $this->insertSeeder();
			            DB::commit();

			        } catch (\Exception $ex) {
			            DB::rollback();
			            throw $ex;
			        }
    }
}
