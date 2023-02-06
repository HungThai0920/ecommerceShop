<section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
        <div class="pull-left info">
            <p class="text-center" style="text-transform:uppercase;">
                <?php 
                  
                    echo  Auth::user()->user_name ?  Auth::user()->user_name :'';
                ?>
            </p>
            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            <span>Lv : <?php echo  Auth::user()->roles ? Auth::user()->roles : ''; ?></span> <i class="fa fa-fw fa-flash"></i> <span>Id : <?php echo Auth::user()->id ? Auth::user()->id : ''; ?></span>
        </div>
    </div>
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu">
        <li class="header">DANH SÁCH MENU</li>
        <li class="{{ isset($tabCategory) ? 'active treeview menu-open' : 'treeview' }}">
            <a href="#">
                <i class="fa fa-book"></i>
                <span>Danh Mục Sản Phẩm</span>
                <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
                <li><a href="{{url('admin/category/list')}}"><i class="fa fa-circle-o"></i>Danh Sách </a></li>
                <li><a href="{{url('admin/category/getAdd')}}"><i class="fa fa-circle-o"></i>Thêm Mới</a></li>
            </ul>
        </li>

        <li class="{{ isset($tabProducts) ? 'active treeview menu-open' : 'treeview' }}">
            <a href="#">
                <i class="fa fa-laptop"></i>
                <span>Sản Phẩm</span>
                <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
                <li><a href="{{url('admin/products/list')}}"><i class="fa fa-circle-o"></i>Danh Sách </a></li>
                <li><a href="{{url('admin/products/getAdd')}}"><i class="fa fa-circle-o"></i>Thêm Mới</a></li>
            </ul>
        </li>
        <li class="{{ isset($tabSuppliers) ? 'active treeview menu-open' : 'treeview' }}">
            <a href="#">
                <i class="fa fa-th"></i>
                <span>Nhà Cung Cấp</span>
                <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
               <li><a href="{{url('admin/suppliers/list')}}"><i class="fa fa-circle-o"></i>Danh Sách </a></li>
                <li><a href="{{url('admin/suppliers/getAdd')}}"><i class="fa fa-circle-o"></i>Thêm Mới</a></li>
            </ul>
        </li>

        <li class="{{ isset($tabSlide) ? 'active treeview menu-open' : 'treeview' }}">
            <a href="#">
                <i class="fa fa-files-o"></i>
                <span>Slide</span>
                <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
                <li><a href="{{url('admin/slides/list')}}"><i class="fa fa-circle-o"></i>Danh Sách </a></li>
                <li><a href="{{url('admin/slides/getAdd')}}"><i class="fa fa-circle-o"></i>Thêm Mới</a></li>
            </ul>
        </li>

        <li class="{{ isset($tabCategoryNew) ? 'active treeview menu-open' : 'treeview' }}">
            <a href="#">
                <i class="fa fa-book"></i>
                <span>Danh Mục Tin Tức</span>
                <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
                <li><a href="{{url('admin/category-new/list')}}"><i class="fa fa-circle-o"></i>Danh Sách </a></li>
                <li><a href="{{url('admin/category-new/getAdd')}}"><i class="fa fa-circle-o"></i>Thêm Mới</a></li>
            </ul>
        </li>

        <li class="{{ isset($tabNews) ? 'active treeview menu-open' : 'treeview' }}">
            <a href="#">
                <i class="fa fa-share"></i>
                <span>Tin tức</span>
                <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
                <li><a href="{{url('admin/news/list')}}"><i class="fa fa-circle-o"></i>Danh Sách </a></li>
                <li><a href="{{url('admin/news/getAdd')}}"><i class="fa fa-circle-o"></i>Thêm Mới</a></li>
            </ul>
        </li>
        <li class="{{ isset($tabAbouts) ? 'active treeview menu-open' : 'treeview' }}">
            <a href="#">
                <i class="fa fa-share"></i>
                <span>Bài viết giới thiệu</span>
                <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
                <li><a href="{{url('admin/abouts/list')}}"><i class="fa fa-circle-o"></i>Danh Sách </a></li>
                <li><a href="{{url('admin/abouts/getAdd')}}"><i class="fa fa-circle-o"></i>Thêm Mới</a></li>
            </ul>
        </li>
        @if( Auth::user()->	roles == 1)
        <li class="{{ isset($tabAdmins) ? 'active treeview menu-open' : 'treeview' }}">
            <a href="#">
                <i class="fa fa-fw fa-user-secret"></i>
                <span>Quản Trị Viên</span>
                <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
                <li><a href="{{url('admin/admins/list')}}"><i class="fa fa-circle-o"></i>Danh Sách </a></li>
                <li><a href="{{url('admin/admins/getAdd')}}"><i class="fa fa-circle-o"></i>Thêm Mới</a></li>
                <!-- <li><a href="{{url('admin/auths/changePassword')}}"><i class="fa fa-circle-o"></i>Thay đổi mật khẩu</a></li> -->
            </ul>
        </li>
        @endif
        <li class="{{ isset($tabUsers) ? 'active treeview menu-open' : 'treeview' }}">
            <a href="{{url('admin/users/list')}}">
                <i class="fa fa-fw fa-users"></i>
                <span>Danh sách User</span>
            </a>
        </li>
        <li class="treeview">
            <a href="{{url('admin/transactions/list')}}">
                <i class="fa fa-fw fa-suitcase"></i>
                <span>Danh sách đơn hàng</span>
            </a>
        </li>
        <li class="treeview">
            <a href="{{ url('admin/logout')}}">
                <i class="fa fa-fw fa-sign-out"></i>
                <span>Đăng xuất</span>
            </a>
        </li>
    </ul>
</section>