
		<div class="container">
			<!-- row -->
			<div class="row">
				<!-- footer widget -->
				<div class="col-md-3 col-sm-6 col-xs-6">
					<div class="footer">
						<!-- footer logo -->
						<div class="footer-logo">
							<a class="logo" href="#">
		            <img src="./img/logo.png" alt="">
		          </a>
						</div>
						<!-- /footer logo -->

						<p>Cung cấp cây cảnh online</p>

						<!-- footer social -->
						<ul class="footer-social">
							<li><a href="#"><i class="fa fa-facebook"></i></a></li>
							<li><a href="#"><i class="fa fa-twitter"></i></a></li>
							<li><a href="#"><i class="fa fa-instagram"></i></a></li>
							<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
							<li><a href="#"><i class="fa fa-pinterest"></i></a></li>
						</ul>
						<!-- /footer social -->
					</div>
				</div>
				<!-- /footer widget -->

				<!-- footer widget -->
				<div class="col-md-3 col-sm-6 col-xs-6">
					<div class="footer">
						<h3 class="footer-header">Tài Khoản Của Tôi</h3>
						<ul class="list-links">
							@if(Session::has('users'))
								<?php $user = Session::get('users'); ?>
								<li><a href="{{url('gio-hang.html')}}" >Giỏ hàng</a></li>
								<li><a href="#" data-toggle="modal" data-target="#update-user" class="text-uppercase" >Cập nhật thông tin</a></li>
								<li><a href="{{url('don-hang-cua-toi', $user['id'])}}" >Đơn hàng của tôi</a></li>
								<li><a href="#" data-toggle="modal" data-target="#change-pass" class="text-uppercase" >Thay đổi mật khẩu</a></li>
								<li><a href="{{ url('logout')}}" class="text-uppercase">Đăng xuất</a></li>
							@else
								<li data-toggle="modal" data-target="#login" ><a>Đăng nhập</a></li>
								<li data-toggle="modal" data-target="#register" ><a href="#">Đăng ký</a></li>
							@endif
						</ul>
					</div>
				</div>
				<!-- /footer widget -->

				<div class="clearfix visible-sm visible-xs"></div>

				<!-- footer widget -->
				<div class="col-md-3 col-sm-6 col-xs-6">
					<div class="footer">
						<h3 class="footer-header">LIÊN HỆ</h3>
						<ul>
							<li>Địa chỉ: Quận 12, thành phố Hồ Chí Minh</li>
							<li>Email: caycanhphucthai@gmail.com</li>
							<li>SĐT: 0838293181</li>
						</ul>
						<div id="fb-root"></div>
						<div class="fb-page" data-href="" data-tabs="timeline" data-width="300" data-height="300" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/Ola-h%E1%BA%A3i-s%E1%BA%A3n-319312278726337/?modal=admin_todo_tour" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/Ola-h%E1%BA%A3i-s%E1%BA%A3n-319312278726337/?modal=admin_todo_tour">Ola hải sản</a></blockquote></div>
					</div>
				</div>
				<!-- /footer widget -->

				<!-- footer subscribe -->
				<div class="col-md-3 col-sm-6 col-xs-6">
					<div class="footer">
						<h3 class="footer-header">WEBSITE</h3>
						<div>
							<a href= "https://www.facebook.com/TruongDHGiaothongvantaiTPHCM" > Đơn vị tài trợ </a>
							<img src="./img/donvitaitro.png" alt="">
						</div>
					</div>
				</div>
				<!-- /footer subscribe -->
			</div>
			<!-- /row -->
			<hr>
			<!-- row -->
			<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center">
					<!-- footer copyright -->
					<div class="footer-copyright">
						<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
						Web cây cảnh | Nơi cung cấp cây cảnh uy tín TPHCM
						<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
					</div>
					<!-- /footer copyright -->
				</div>
			</div>
			<!-- /row -->
		</div>
		<!-- /container