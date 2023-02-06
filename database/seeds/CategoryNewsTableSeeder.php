<?php

use App\Seeder\BaseSeeder;
use App\Models\CategoryNew;
use Carbon\Carbon;


class CategoryNewsTableSeeder extends BaseSeeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $catenews = [
        	[
				'name'       => 'Tin Nóng',
				'sort'       => 1,
				'status'     => 1,
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
        	],
        	[
				'name'       => 'Tin thị trường',
				'sort'       => 2,
				'status'     => 1,
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
        	],
        	[
				'name'       => 'Tin khuyến mại',
				'sort'       => 3,
				'status'     => 1,
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
        	],
        	[
				'name'       => 'Bài viết công nghệ mới',
				'sort'       => 4,
				'status'     => 1,
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
        	]
        ];

        DB::beginTransaction();
        try {
        	
            foreach($catenews as $key => $value) {

                $catenews = CategoryNew::create($value);
            }
                
            $this->insertSeeder();
            DB::commit();

        } catch (\Exception $ex) {
            DB::rollback();
            throw $ex;
        }
    }
}
