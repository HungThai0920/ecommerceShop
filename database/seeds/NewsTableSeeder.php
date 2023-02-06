<?php

use App\Seeder\BaseSeeder;
use App\Models\News;
use Carbon\Carbon;

class NewsTableSeeder extends BaseSeeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $news = [
        	[
        		'title' => 'ĐÁNH GIÁ   MẸO HAY   THỊ TRƯỜNG   CUỘC SỐNG SỐ   GAME - APP   SỰ KIỆN Đăng nhập CỘNG ĐỒNGBETA Nokia 7 plus và 7 điểm nhấn thu hút người dùng chọn mua',
		    	'cate_new_id' => 4,
		    	'info' => 'Năm 2018 năm đánh dấu những bước đi mạnh mẽ của Nokia với các “chiến binh” mới nhất. Và Nokia 7 plus sẽ là sản phẩm góp phần giúp hãng trở lại phong độ như ngày nào, mình sẽ điểm qua 7 điểm nhấn trên Nokia 7 plus có thể chinh phục người dùng và thị trường',
		    	'image' => 'new1.jpg',
		    	'content' => '<h3><strong>1. Thiết kế vừa quen thuộc vừa mới lạ</strong></h3>

<p>Cảm gi&aacute;c khi lần đầu ti&ecirc;n bạn cầm chiếc Nokia 7 Plus tr&ecirc;n tay l&agrave; rất &ecirc;m, bởi v&igrave; chất liệu cấu tạo n&ecirc;n mặt lưng kh&aacute; tốt, l&agrave;m cảm gi&aacute;c khi sờ v&agrave;o rất mịn. Cả th&acirc;n m&aacute;y đều được l&agrave;m bằng khung nh&ocirc;m nguy&ecirc;n khối v&agrave; mặt sau của m&aacute;y được phủ đến 6 lớp ceramic để tăng độ cứng c&aacute;p cho sản phẩm.</p>

<p><img alt="Nokia 7 plus" src="https://cdn.tgdd.vn/Files/2018/04/17/1082664/4_800x449.jpg" title="Nokia 7plus" /></p>

<p>Ngo&agrave;i ra, ở Nokia 7 Plus sẽ c&oacute; viền khung m&aacute;y m&agrave;u đồng, khi nh&igrave;n nghi&ecirc;ng gi&uacute;p chiếc smartphone n&agrave;y trong độc đ&aacute;o v&agrave; ph&aacute; c&aacute;ch so với c&aacute;c đối thủ của n&oacute;. Mặt lưng của sản phẩm c&ograve;n được trang bị cảm biến v&acirc;n tay 1 lần chạm đặt dưới camera n&ecirc;n rất dễ vuốt.</p>

<h3><strong>2. M&agrave;n h&igrave;nh tỉ lệ 18:9</strong></h3>

<p>Nokia 7 Plus l&agrave; chiếc m&aacute;y đầu ti&ecirc;n của h&atilde;ng đi theo xu hướng m&agrave;n h&igrave;nh 18:9 v&agrave; c&oacute; thể sẽ l&agrave; sản phẩm mở đầu cho to&agrave;n bộ m&aacute;y ra mắt sau n&agrave;y. K&iacute;ch thước m&agrave;n h&igrave;nh của m&aacute;y l&ecirc;n tới 6 inch, độ ph&acirc;n giải đạt mức Full HD cho ch&uacute;ng ta một kh&ocirc;ng gian nội dung rộng, cũng như chất lượng m&agrave;u sắc h&igrave;nh ảnh rực rỡ.</p>

<h3><strong>3. 2 camera ch&iacute;nh v&agrave; 1 camera selfie</strong></h3>

<p><img alt="Nokia 7 plus" src="https://cdn.tgdd.vn/Files/2018/04/17/1082664/6_800x450.png" title="Nokia 7 plus" /></p>

<p>N&oacute;i về th&ocirc;ng số của camera ch&iacute;nh th&igrave; camera k&eacute;p của m&aacute;y sử dụng ống k&iacute;nh Zeiss gồm 2 ống k&iacute;nh 12 v&agrave; 13 MP cho khả năng zoom quang học 2x v&agrave; chụp x&oacute;a ph&ocirc;ng chủ động. Camera selfie của m&aacute;y sở hữu độ ph&acirc;n giải 16 MP.</p>

<p>Cụ thể, Nokia 7 Plus c&oacute; t&iacute;nh năng đặc biệt bởi v&igrave; camera bothie c&oacute; thể gi&uacute;p người d&ugrave;ng chụp đồng thời cả hai camera trước v&agrave; sau. Hơn nữa, OZO Audio để thu &acirc;m chất lượng cao 360 độ. Đ&acirc;y vốn l&agrave; hai t&iacute;nh năng chỉ c&oacute; tr&ecirc;n Nokia 8 cao cấp trước đ&oacute;. Camera của m&aacute;y cũng c&oacute; chế độ Pro Mode để bạn chỉnh tay gần như mọi yếu tố trong l&uacute;c chụp ảnh.</p>',
				'status'     => 1,
		    	'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
        	],
        	[
        		'title' => 'Galaxy S7 và S7 Edge sắp được cập nhật Android Oreo?',
		    	'cate_new_id' => 4,
		    	'info' => 'Có vẻ như Samsung đang chuẩn bị tung bản cập nhật Android Oreo cho 2 mẫu smartphone cao cấp ra mắt từ 2016 - Galaxy S7 và S7 Edge.',
		    	'image' => 'fa_800x450.jpg',
		    	'content' => '<p>Theo đ&oacute;, c&aacute;c phi&ecirc;n bản Galaxy S7 v&agrave; S7 Edge tại c&aacute;c nh&agrave; mạng Mỹ đ&atilde; được mở kh&oacute;a. Ngo&agrave;i ra, Galaxy S7 v&agrave; S7 Edge chạy Android Oreo cũng bị ph&aacute;t hiện c&oacute; mặt tr&ecirc;n trang web của tổ chức chứng nhận WiFi Alliance.</p>',
		    	'status'     => 1,
		    	'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
        	]

        ];

        DB::beginTransaction();
        try {
        	
            foreach($news as $key => $value) {

                $news = News::create($value);
            }
                
            $this->insertSeeder();
            DB::commit();

        } catch (\Exception $ex) {
            DB::rollback();
            throw $ex;
        }
    }
}
