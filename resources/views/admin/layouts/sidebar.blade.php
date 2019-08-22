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
                <p>{{ auth()->user()->name }}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- search form -->

        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header"></li>
            <li class="active treeview">
                <a href="{{route('dashboard')}}">
                    <i class="fas fa-tachometer-alt"></i> <span>Dashboard</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
            </li>
            @article
            <li class="active treeview">
                <a href="#">
                    <i class="fas fa-newspaper"></i>
                    <span>Article Management</span>
                    <span class="pull-right-container">
{{--              <span class="label label-primary pull-right">4</span>--}}
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('article.index')}}"><i class="fas fa-file-alt"></i> Article Management</a></li>
                    @admin
                    <li><a href="{{route('articletag.index')}}"><i class="fas fa-tag"></i> Article Tag</a></li>
                    <li><a href="{{route('articlecategory.index')}}"><i class="fas fa-clone"></i> Article Category </a></li>
                    @endadmin
                </ul>
            </li>
            @endarticle
            @advert
            <li class="active treeview">
                <a href="#">
                    <i class="fas fa-ad"></i>
                    <span>Advertisement Management</span>
                    <span class="pull-right-container">
{{--              <span class="label label-primary pull-right">4</span>--}}
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('advert.index')}}"><i class="fab fa-adversal"></i> Advertisement Management</a></li>
{{--                    <li><a href="advert"><i class="fa fa-circle-o"></i> Advertisement Management</a></li>--}}
                    <li><a href="{{route('advertcategory.index')}}"><i class="fas fa-copy"></i> Advertisement Category </a></li>
                </ul>
            </li>
            @endadvert
            @admin
            <li class="active treeview">
                <a href="#">
                    <i class="fas fa-podcast"></i> <span>Podcast Management</span>
                    <span class="pull-right-container"></span>
                </a>
                <ul class="treeview-menu">
                        <li><a href="{{route('podcasts.index')}}"><i class="fas fa-microphone-alt"></i> Podcast Management</a></li>
                </ul>
                <ul class="treeview-menu">
                    <li><a href="{{route('podcastepisodes.index')}}"><i class="fas fa-microphone"></i> Podcast Episode</a></li>
                </ul>
            </li>
            @endadmin
            @admin
            <li class="active treeview">
                <a href="#">
                    <i class="fas fa-users"></i> <span>Page Static Management</span>
                    <span class="pull-right-container"></span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('pagestatic.index')}}"><i class="fas fa-file-alt"></i> Page Static </a></li>
                </ul>
            </li>
            @endadmin
            @admin
            <li class="active treeview">
                <a href="#">
                    <i class="fas fa-users"></i> <span>User Management</span>
                    <span class="pull-right-container"></span>
                </a>
                <ul class="treeview-menu">
                    <li class="active"><a href="{{route('user.index')}}"><i class="fas fa-user-circle"></i> User </a></li>
                    <li><a href="{{route('role.index')}}"><i class="fas fa-user-tag"></i> Role </a></li>
                    <li><a href="{{route('menu.index')}}"><i class="fas fa-link"></i> Menu </a></li>
                </ul>
            </li>
            @endadmin
        </ul>
{{--@endif--}}
    </section>
    <!-- /.sidebar -->
</aside>
