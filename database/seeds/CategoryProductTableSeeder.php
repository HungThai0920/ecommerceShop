<?php

use App\Seeder\BaseSeeder;
use App\Models\CategoryProduct;
use Carbon\Carbon;

class CategoryProductTableSeeder extends BaseSeeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categoryProducts = [

    		[
				'id'         => 1,
				'name'       => 'Điện Thoại',
				'parent_id'  => 0,
				'orders'     => 1,
				'status'     => 1,
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
        	],
        	[
				'id'         => 2,
				'name'       => 'Iphone',
				'parent_id'  => 1,
				'orders'     => 1,
				'status'     => 1,
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
        	],
        	[
				'id'         => 3,
				'name'       => 'SamSung',
				'parent_id'  => 1,
				'orders'     => 2,
				'status'     => 1,
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
        	],
        	[
				'id'         => 4,
				'name'       => 'Sony Xperia',
				'parent_id'  => 1,
				'orders'     => 3,
				'status'     => 1,
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
        	],
        	[
				'id'         => 5,
				'name'       => 'OPP',
				'parent_id'  => 1,
				'orders'     => 4,
				'status'     => 1,
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
        	],
        	[
				'id'         => 6,
				'name'       => 'Máy Tính Bảng',
				'parent_id'  => 0,
				'orders'     => 2,
				'status'     => 1,
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
        	],
        	[
				'id'         => 7,
				'name'       => 'IPad 4',
				'parent_id'  => 6,
				'orders'     => 1,
				'status'     => 1,
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
        	],
        	[
				'id'         => 8,
				'name'       => 'IPad Mini 1',
				'parent_id'  => 6,
				'orders'     => 2,
				'status'     => 1,
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
        	],
        	[
				'id'         => 9,
				'name'       => 'IPad Mini 2',
				'parent_id'  => 6,
				'orders'     => 3,
				'status'     => 1,
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
        	],
        	[
				'id'         => 10,
				'name'       => 'IPad Mini 3',
				'parent_id'  => 6,
				'orders'     => 4,
				'status'     => 1,
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
        	],
        	[
				'id'         => 11,
				'name'       => 'IPad Mini 4',
				'parent_id'  => 6,
				'orders'     => 5,
				'status'     => 1,
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
        	],
        	[
				'id'         => 12,
				'name'       => 'MacBooks',
				'parent_id'  => 0,
				'orders'     => 4,
				'status'     => 1,
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
        	],
        	[
				'id'         => 13,
				'name'       => 'Kho Phụ Kiện',
				'parent_id'  => 6,
				'orders'     => 4,
				'status'     => 1,
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
        	],
        ];

        DB::beginTransaction();
        try {
        	
            foreach($categoryProducts as $key => $value) {

                $categoryProducts = CategoryProduct::create($value);
            }
                
            $this->insertSeeder();
            DB::commit();

        } catch (\Exception $ex) {
            DB::rollback();
            throw $ex;
        }
    }
}
