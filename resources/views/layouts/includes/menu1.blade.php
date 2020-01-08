<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="/backend/dist/img/satish1.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>Admin</p>
{{--                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>--}}
            </div>
        </div>
        <!-- search form -->
{{--        <form action="#" method="get" class="sidebar-form">--}}
{{--            <div class="input-group">--}}
{{--                <input type="text" name="q" class="form-control" placeholder="Search...">--}}
{{--                <span class="input-group-btn">--}}
{{--                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>--}}
{{--                </button>--}}
{{--              </span>--}}
{{--            </div>--}}
{{--        </form>--}}
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
{{--            <li class="header">MAIN NAVIGATION</li>--}}
            <li><a href="{{route('home')}}"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-university"></i>
                    <span>Department</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('department.create')}}"><i class="fa fa-plus"></i> Create</a></li>
                    <li><a href="{{route('department.index')}}"><i class="fa fa-circle-o"></i> List</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-suitcase"></i>
                    <span>Position</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('position.create')}}"><i class="fa fa-plus"></i> Create</a></li>
                    <li><a href="{{route('position.index')}}"><i class="fa fa-circle-o"></i> List</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-users"></i>
                    <span>Employee</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('employee.create')}}"><i class="fa fa-plus"></i> Create</a></li>
                    <li><a href="{{route('employee.index')}}"><i class="fa fa-circle-o"></i> List</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-money"></i>
                    <span>Cash Advance</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('cashadvance.create')}}"><i class="fa fa-plus"></i> Create</a></li>
                    <li><a href="{{route('cashadvance.index')}}"><i class="fa fa-circle-o"></i> List</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-file-text"></i>
                    <span>Deduction</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('deduction.create')}}"><i class="fa fa-plus"></i> Create</a></li>
                    <li><a href="{{route('deduction.index')}}"><i class="fa fa-circle-o"></i> List</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-user"></i>
                    <span>Attendance</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('attendance.create')}}"><i class="fa fa-plus"></i> Create</a></li>
                    <li><a href="{{route('attendance.index')}}"><i class="fa fa-circle-o"></i> List</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-money"></i>
                    <span>Salary</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('salary.create')}}"><i class="fa fa-plus"></i> Create</a></li>
                    <li><a href="{{route('salary.index')}}"><i class="fa fa-circle-o"></i> List</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-user"></i>
                    <span>User</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('user.create')}}"><i class="fa fa-plus"></i> Create</a></li>
                    <li><a href="{{route('user.index')}}"><i class="fa fa-circle-o"></i> List</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a class="dropdown-item" href="{{ route('logout') }}"

                   onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                    <i class="fa fa-sign-out"></i>
                    {{ __('Logout') }}

                </a>
            </li>

        </ul>

    </section>
    <!-- /.sidebar -->
</aside>