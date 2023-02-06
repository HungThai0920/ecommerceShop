<?php

use App\Seeder\BaseSeeder;
use App\Models\Products;
use Carbon\Carbon;

class ProductsTableSeeder extends BaseSeeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         
    	$products = [
    		[
				'name'           => 'Samsung Galaxy S7 edge 32GB',
				'category_id'    => 3,
				'supplier_id'    => 2,
				'price'          => 10000000,
				'sale'           => 10,
				'total'          => 150,
				'show_home'      => 1,
				'hot'            => 1,
				'view'           => 0,
				'buyed'          => 0,
				'warranty'       => ' Bảo hành 12 tháng',
				'image'          => 'galaxy-s7-edge-1-1.jpg',
				'thunbar'        => '',
				'description'    => 'Được tung ra cùng lúc với chiếc S7, Samsung Galaxy S7 edge 32GB vẫn thể hiện được nét riêng, mang phong cách thiết kế sang trọng và thời thượng. Hơn nữa, với những tính năng vượt trội, siêu phẩm S7 edge hiện đang làm dậy sóng giới công nghệ và hứa hẹn thống lĩnh thị trường smartphone cao cấp nửa đầu năm nay.',
				'specifications' => 'thông số kỹ thuật',
				'content'        => 'Được tung ra cùng lúc với chiếc S7, Samsung Galaxy S7 edge 32GB vẫn thể hiện được nét riêng, mang phong cách thiết kế sang trọng và thời thượng. Hơn nữa, với những tính năng vượt trội, siêu phẩm S7 edge hiện đang làm dậy sóng giới công nghệ và hứa hẹn thống lĩnh thị trường smartphone cao cấp nửa đầu năm nay.',
				'status'         => 1,
				'created_at'     => Carbon::now(),
				'updated_at'     => Carbon::now(),
	        ],
	        [
				'name'           => 'Samsung Galaxy S6 edge 32GB',
				'category_id'    => 3,
				'supplier_id'    => 2,
				'price'          => 10000000,
				'sale'           => 10,
				'total'          => 150,
				'show_home'      => 1,
				'hot'            => 1,
				'view'           => 0,
				'buyed'          => 0,
				'warranty'       => ' Bảo hành 12 tháng',
				'image'          => 'galaxy-s7-edge-1-1.jpg',
				'thunbar'        => '',
				'description'    => 'Được tung ra cùng lúc với chiếc S7, Samsung Galaxy S7 edge 32GB vẫn thể hiện được nét riêng, mang phong cách thiết kế sang trọng và thời thượng. Hơn nữa, với những tính năng vượt trội, siêu phẩm S7 edge hiện đang làm dậy sóng giới công nghệ và hứa hẹn thống lĩnh thị trường smartphone cao cấp nửa đầu năm nay.',
				'specifications' => 'thông số kỹ thuật',
				'content'        => 'Được tung ra cùng lúc với chiếc S7, Samsung Galaxy S7 edge 32GB vẫn thể hiện được nét riêng, mang phong cách thiết kế sang trọng và thời thượng. Hơn nữa, với những tính năng vượt trội, siêu phẩm S7 edge hiện đang làm dậy sóng giới công nghệ và hứa hẹn thống lĩnh thị trường smartphone cao cấp nửa đầu năm nay.',
				'status'         => 1,
				'created_at'     => Carbon::now(),
				'updated_at'     => Carbon::now(),
	        ],
	        [
				'name'           => 'Samsung Galaxy S5 edge 32GB',
				'category_id'    => 3,
				'supplier_id'    => 2,
				'price'          => 8000000,
				'sale'           => 10,
				'total'          => 150,
				'show_home'      => 1,
				'hot'            => 0,
				'view'           => 0,
				'buyed'          => 0,
				'warranty'       => ' Bảo hành 12 tháng',
				'image'          => 'galaxy-s7-edge-1-1.jpg',
				'thunbar'        => '',
				'description'    => 'Được tung ra cùng lúc với chiếc S7, Samsung Galaxy S7 edge 32GB vẫn thể hiện được nét riêng, mang phong cách thiết kế sang trọng và thời thượng. Hơn nữa, với những tính năng vượt trội, siêu phẩm S7 edge hiện đang làm dậy sóng giới công nghệ và hứa hẹn thống lĩnh thị trường smartphone cao cấp nửa đầu năm nay.',
				'specifications' => 'thông số kỹ thuật',
				'content'        => 'Được tung ra cùng lúc với chiếc S7, Samsung Galaxy S7 edge 32GB vẫn thể hiện được nét riêng, mang phong cách thiết kế sang trọng và thời thượng. Hơn nữa, với những tính năng vượt trội, siêu phẩm S7 edge hiện đang làm dậy sóng giới công nghệ và hứa hẹn thống lĩnh thị trường smartphone cao cấp nửa đầu năm nay.',
				'status'         => 1,
				'created_at'     => Carbon::now(),
				'updated_at'     => Carbon::now(),
	        ],

	        [
				'name'           => 'Samsung Galaxy S5 edge 32GB',
				'category_id'    => 3,
				'supplier_id'    => 2,
				'price'          => 9000000,
				'sale'           => 10,
				'total'          => 50,
				'show_home'      => 1,
				'hot'            => 1,
				'view'           => 0,
				'buyed'          => 0,
				'warranty'       => ' Bảo hành 12 tháng',
				'image'          => 'galaxy-s7-edge-1-1.jpg',
				'thunbar'        => '',
				'description'    => 'Được tung ra cùng lúc với chiếc S7, Samsung Galaxy S7 edge 32GB vẫn thể hiện được nét riêng, mang phong cách thiết kế sang trọng và thời thượng. Hơn nữa, với những tính năng vượt trội, siêu phẩm S7 edge hiện đang làm dậy sóng giới công nghệ và hứa hẹn thống lĩnh thị trường smartphone cao cấp nửa đầu năm nay.',
				'specifications' => 'thông số kỹ thuật',
				'content'        => 'Được tung ra cùng lúc với chiếc S7, Samsung Galaxy S7 edge 32GB vẫn thể hiện được nét riêng, mang phong cách thiết kế sang trọng và thời thượng. Hơn nữa, với những tính năng vượt trội, siêu phẩm S7 edge hiện đang làm dậy sóng giới công nghệ và hứa hẹn thống lĩnh thị trường smartphone cao cấp nửa đầu năm nay.',
				'status'         => 1,
				'created_at'     => Carbon::now(),
				'updated_at'     => Carbon::now(),
	        ],
	        [
				'name'           => 'iPhone 6s Plus 16GB Cũ 99%',
				'category_id'    => 2,
				'supplier_id'    => 1,
				'price'          => 7000000,
				'sale'           => 10,
				'total'          => 50,
				'show_home'      => 1,
				'hot'            => 1,
				'view'           => 0,
				'buyed'          => 0,
				'warranty'       => ' Bảo hành 12 tháng',
				'image'          => 'iphone-6s-xam.png',
				'thunbar'        => '',
				'description'    => 'Được tung ra cùng lúc với chiếc S7, Samsung Galaxy S7 edge 32GB vẫn thể hiện được nét riêng, mang phong cách thiết kế sang trọng và thời thượng. Hơn nữa, với những tính năng vượt trội, siêu phẩm S7 edge hiện đang làm dậy sóng giới công nghệ và hứa hẹn thống lĩnh thị trường smartphone cao cấp nửa đầu năm nay.',
				'specifications' => 'thông số kỹ thuật',
				'content'        => 'Được tung ra cùng lúc với chiếc S7, Samsung Galaxy S7 edge 32GB vẫn thể hiện được nét riêng, mang phong cách thiết kế sang trọng và thời thượng. Hơn nữa, với những tính năng vượt trội, siêu phẩm S7 edge hiện đang làm dậy sóng giới công nghệ và hứa hẹn thống lĩnh thị trường smartphone cao cấp nửa đầu năm nay.',
				'status'         => 1,
				'created_at'     => Carbon::now(),
				'updated_at'     => Carbon::now(),
	        ],

	        [
				'name'           => 'iPhone 8 Plus 128GB ',
				'category_id'    => 2,
				'supplier_id'    => 1,
				'price'          => 7000000,
				'sale'           => 10,
				'total'          => 50,
				'show_home'      => 1,
				'hot'            => 1,
				'view'           => 0,
				'buyed'          => 0,
				'warranty'       => ' Bảo hành 12 tháng',
				'image'          => 'iphone-8-64gb-hh-600x600.jpg',
				'thunbar'        => '',
				'description'    => 'Được tung ra cùng lúc với chiếc S7, Samsung Galaxy S7 edge 32GB vẫn thể hiện được nét riêng, mang phong cách thiết kế sang trọng và thời thượng. Hơn nữa, với những tính năng vượt trội, siêu phẩm S7 edge hiện đang làm dậy sóng giới công nghệ và hứa hẹn thống lĩnh thị trường smartphone cao cấp nửa đầu năm nay.',
				'specifications' => 'thông số kỹ thuật',
				'content'        => 'Được tung ra cùng lúc với chiếc S7, Samsung Galaxy S7 edge 32GB vẫn thể hiện được nét riêng, mang phong cách thiết kế sang trọng và thời thượng. Hơn nữa, với những tính năng vượt trội, siêu phẩm S7 edge hiện đang làm dậy sóng giới công nghệ và hứa hẹn thống lĩnh thị trường smartphone cao cấp nửa đầu năm nay.',
				'status'         => 1,
				'created_at'     => Carbon::now(),
				'updated_at'     => Carbon::now(),
	        ],

	        [
				'name'           => 'iPhone x  128GB ',
				'category_id'    => 2,
				'supplier_id'    => 1,
				'price'          => 24000000,
				'sale'           => 10,
				'total'          => 50,
				'show_home'      => 1,
				'hot'            => 1,
				'view'           => 0,
				'buyed'          => 0,
				'warranty'       => ' Bảo hành 12 tháng',
				'image'          => 'iphone-x-64gb-hh-600x600-600x600.jpg',
				'thunbar'        => '',
				'description'    => 'Được tung ra cùng lúc với chiếc S7, Samsung Galaxy S7 edge 32GB vẫn thể hiện được nét riêng, mang phong cách thiết kế sang trọng và thời thượng. Hơn nữa, với những tính năng vượt trội, siêu phẩm S7 edge hiện đang làm dậy sóng giới công nghệ và hứa hẹn thống lĩnh thị trường smartphone cao cấp nửa đầu năm nay.',
				'specifications' => 'thông số kỹ thuật',
				'content'        => 'Được tung ra cùng lúc với chiếc S7, Samsung Galaxy S7 edge 32GB vẫn thể hiện được nét riêng, mang phong cách thiết kế sang trọng và thời thượng. Hơn nữa, với những tính năng vượt trội, siêu phẩm S7 edge hiện đang làm dậy sóng giới công nghệ và hứa hẹn thống lĩnh thị trường smartphone cao cấp nửa đầu năm nay.',
				'status'         => 1,
				'created_at'     => Carbon::now(),
				'updated_at'     => Carbon::now(),
	        ],

	        [
				'name'           => 'iPhone x  256GB ',
				'category_id'    => 2,
				'supplier_id'    => 1,
				'price'          => 34000000,
				'sale'           => 10,
				'total'          => 50,
				'show_home'      => 1,
				'hot'            => 1,
				'view'           => 0,
				'buyed'          => 0,
				'warranty'       => ' Bảo hành 12 tháng',
				'image'          => '636483223586180190_1.jpg',
				'thunbar'        => '',
				'description'    => 'Được tung ra cùng lúc với chiếc S7, Samsung Galaxy S7 edge 32GB vẫn thể hiện được nét riêng, mang phong cách thiết kế sang trọng và thời thượng. Hơn nữa, với những tính năng vượt trội, siêu phẩm S7 edge hiện đang làm dậy sóng giới công nghệ và hứa hẹn thống lĩnh thị trường smartphone cao cấp nửa đầu năm nay.',
				'specifications' => 'thông số kỹ thuật',
				'content'        => 'Được tung ra cùng lúc với chiếc S7, Samsung Galaxy S7 edge 32GB vẫn thể hiện được nét riêng, mang phong cách thiết kế sang trọng và thời thượng. Hơn nữa, với những tính năng vượt trội, siêu phẩm S7 edge hiện đang làm dậy sóng giới công nghệ và hứa hẹn thống lĩnh thị trường smartphone cao cấp nửa đầu năm nay.',
				'status'         => 1,
				'created_at'     => Carbon::now(),
				'updated_at'     => Carbon::now(),
	        ],

    	];

    	DB::beginTransaction();
        try {
        	
            foreach($products as $key => $value) {

                $products = Products::create($value);
            }
                
            $this->insertSeeder();
            DB::commit();

        } catch (\Exception $ex) {
            DB::rollback();
            throw $ex;
        }
    }
}
