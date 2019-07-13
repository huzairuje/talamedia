<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{asset('themes/image/user2-160x160.jpg')}}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>Alexander Pierce</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
            <li class="active treeview">
                <a href="/home">
                    <i class="fas fa-tachometer-alt"></i> <span>Dashboard</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
            </li>
            <li class="active treeview">
                <a href="#">
                    <i class="fas fa-users"></i> <span>User Management</span>
                    <span class="pull-right-container">
              <i class="fa fa-user-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li class="active"><a href="{{route('user.index')}}"><i class="fa fa-circle-o"></i> User </a></li>
                    <li><a href="{{route('role.index')}}"><i class="fa fa-circle-o"></i> Role </a></li>
                </ul>
            </li>

            <li class="active treeview">
                <a href="#">
                    <i class="fas fa-newspaper"></i>
                    <span>Article</span>
                    <span class="pull-right-container">
{{--              <span class="label label-primary pull-right">4</span>--}}
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('article.index')}}"><i class="fa fa-circle-o"></i> Article Management</a></li>
                    <li><a href="{{route('articletag.index')}}"><i class="fa fa-circle-o"></i> Article Tag</a></li>
                    <li><a href="{{route('articlecategory.index')}}"><i class="fa fa-circle-o"></i> Article Category </a></li>
                </ul>
            </li>

            <li class="active treeview">
                <a href="#">
                    <i class="fas fa-ad"></i>
                    <span>Advertisement</span>
                    <span class="pull-right-container">
{{--              <span class="label label-primary pull-right">4</span>--}}
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('advert.index')}}"><i class="fa fa-circle-o"></i> Advertisement Management</a></li>
{{--                    <li><a href="advert"><i class="fa fa-circle-o"></i> Advertisement Management</a></li>--}}
                    <li><a href="{{route('advertcategory.index')}}"><i class="fa fa-circle-o"></i> Advertisement Category </a></li>
                </ul>
            </li>
        </ul>

    </section>
    <!-- /.sidebar -->
</aside>