<!-- Menu -->
<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="{{route('dashboard')}}" class="app-brand-link">
            <span class="app-brand-logo demo">
                <img src="{{url('admin/assets/img/logo/icvt.png')}}" width="70px" height="70px">
            </span>
            <span class="app-brand-text demo menu-text fw-bolder ms-2">icvtind</span>
        </a>

        <a href="javascript:void(0);"
            class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <!-- Dashboard -->
        <li class="menu-item active">
            <a href="{{route('dashboard')}}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
            </a>
        </li>
        @hasrole('SuperAdmin')
        <!-- Role / Permission -->
        <li class="menu-item">
           <a href="javascript:void(0);" class="menu-link menu-toggle">
               <i class="menu-icon tf-icons bx bx-layout"></i>
               <div data-i18n="Layouts">Role / Permission</div>
           </a>

           <ul class="menu-sub">
               <li class="menu-item">
                   <a href="{{route('rolepermission.index')}}" class="menu-link">
                       <div data-i18n="Without menu">Role</div>
                   </a>
               </li>
               <li class="menu-item">
                   <a href="{{route('permission.index')}}" class="menu-link">
                       <div data-i18n="Without navbar">Permission</div>
                   </a>
               </li>
               <li class="menu-item">
                   <a href="{{route('assignpermission.index')}}" class="menu-link">
                       <div data-i18n="Container">Role Hash Permission</div>
                   </a>
               </li>
           </ul>
        </li>
        @endhasrole
        @hasrole('SuperAdmin|Admin')
        <!-- Clients Managements -->
        <li class="menu-item {{ request()->is('clienturl') ? 'active' : '' }}">
           <a href="javascript:void(0);" class="menu-link menu-toggle">
               <i class="menu-icon tf-icons bx bx-user"></i>
               <div data-i18n="Layouts">Client Management</div>
           </a>

           <ul class="menu-sub {{ request()->is('clienturl') ? 'active' : '' }}">
               <li class="menu-item">
                   <a href="{{route('clienturl.index')}}" class="menu-link">
                       <div data-i18n="Without menu">Create Client</div>
                   </a>
               </li>
               <li class="menu-item">
                   <a href="{{route('clienturl.create')}}" class="menu-link">
                       <div data-i18n="Without navbar">Manage Client</div>
                   </a>
               </li>
           </ul>
        </li>
        <li class="menu-item {{ request()->is('certificate') ? 'active' : '' }}">
           <a href="{{route('certificate')}}" class="menu-link">
               <i class="menu-icon tf-icons bx bx-book-open"></i>
               <div data-i18n="Analytics">Client Certificate</div>
           </a>
        </li>
        @endhasrole
        <li class="menu-item {{ request()->is('my_certificate') ? 'active' : '' }}">
            <a href="{{route('my_certificate')}}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-book-open"></i>
                <div data-i18n="Analytics">My Certificate</div>
            </a>
        </li>
    </ul>
</aside>
<!-- / Menu -->