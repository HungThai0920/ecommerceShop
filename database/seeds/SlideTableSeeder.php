<?php

use App\Seeder\BaseSeeder;
use App\Models\Slides;
use Carbon\Carbon;
class SlideTableSeeder extends BaseSeeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
    	$slides = [
    		[
				'name'       => 'slide 1',
				'image'      => 'banner01.png',
				'link'       => 'link 1',
				'sort'       => 1,
				'status'     => 1,
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
	        ],
	        [
				'name'       => 'slide 2',
				'image'      => 'banner02.jpg',
				'link'       => 'link 2',
				'sort'       => 2,
				'status'     => 1,
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
	        ],

	        [
				'name'       => 'slide 3',
				'image'      => 'banner03.jpg',
				'link'       => 'link 23',
				'sort'       => 3,
				'status'     => 1,
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
	        ]
    	];

    	DB::beginTransaction();
        try {

            foreach($slides as $key => $slide) {

                $slide = Slides::create($slide);
            }
                
            $this->insertSeeder();
            DB::commit();

        } catch (\Exception $ex) {
            DB::rollback();
            throw $ex;
        }
    }
}
