<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Admin</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="index.html">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Masters
    </div>

    <!-- Room Type-->
    <li class="nav-item">
        <a class="nav-link @if(!request()->is('admin/roomtype*')) collapsed @endif " href="#" data-toggle="collapse" data-target="#collapseTwo"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-table"></i>
            <span>Room Types</span>
        </a>
        <div id="collapseTwo" class="collapse @if(request()->is('admin/roomtype*')) show @endif" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{url('admin/roomtype/create')}}">Add New</a>
                <a class="collapse-item" href="{{url('admin/roomtype')}}">View All</a>
            </div>
        </div>
    </li>
    <!--Room-->
    <li class="nav-item">
        <a class="nav-link  @if(!request()->is('admin/rooms*')) collapsed @endif " href="#" data-toggle="collapse" data-target="#room-master"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-box"></i>
            <span>Room</span>
        </a>
        <div id="room-master" class="collapse @if(request()->is('admin/rooms*')) show @endif" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{url('admin/rooms/create')}}">Add New</a>
                <a class="collapse-item" href="{{url('admin/rooms')}}">View All</a>
            </div>
        </div>
    </li>

    <!--Customer-->
    
    <li class="nav-item">
        <a class="nav-link  @if(!request()->is('admin/customer*')) collapsed @endif " href="#" data-toggle="collapse" data-target="#customer-master"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-users"></i>
            <span>Customer</span>
        </a>
        <div id="customer-master" class="collapse @if(request()->is('admin/rooms*')) show @endif" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{url('admin/customer/create')}}">Add New</a>
                <a class="collapse-item" href="{{url('admin/customer')}}">View All</a>
            </div>
        </div>
    </li>
    <!--Department-->
    
    <li class="nav-item">
        <a class="nav-link  @if(!request()->is('admin/department*')) collapsed @endif " href="#" data-toggle="collapse" data-target="#department-master"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-users"></i>
            <span>Department</span>
        </a>
        <div id="department-master" class="collapse @if(request()->is('admin/department*')) show @endif" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{url('admin/department/create')}}">Add New</a>
                <a class="collapse-item" href="{{url('admin/department')}}">View All</a>
            </div>
        </div>
    </li>
     <!--Department-->
    
    <li class="nav-item">
        <a class="nav-link  @if(!request()->is('admin/staff*')) collapsed @endif " href="#" data-toggle="collapse" data-target="#staff-master"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-users"></i>
            <span>Staff</span>
        </a>
        <div id="staff-master" class="collapse @if(request()->is('admin/staff*')) show @endif" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{url('admin/staff/create')}}">Add New</a>
                <a class="collapse-item" href="{{url('admin/staff')}}">View All</a>
            </div>
        </div>
    </li>
    <!---- --->
    <li class="nav-item">
        <a class="nav-link  collapsed " href="{{url('admin/logout')}}">
            <i class="fas fa-fw fa-sign-out-alt"></i>
            <span>Logout</span>
        </a>
       
    </li>

</ul> 