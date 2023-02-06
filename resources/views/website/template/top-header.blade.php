<div class="container">
	<div class="pull-left">
		<span>Chào mừng bạn đến thế giới shop Cây Cảnh Phúc Thái!</span>
	</div>
	<div class="pull-right">
		<ul class="header-top-links">
			@if(Session::has('users'))
				<?php $users = Session::get('users'); ?>
				<li><a href="#">Xin chào: {{ $users['name'] }}</a></li>
			@endif

		</ul>
	</div>
</div>