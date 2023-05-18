<ul class="navbar-nav  sidebar bg-indigo-900 accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center">
                <div class="sidebar-brand-text mx-3 text-white">{{ __('Book Me') }}</div>
                <img src="{{ asset('/logo_infor.png') }}" alt="Nama Gambar" class="w-1/2">
            </a>

            

            <li class="nav-item {{ request()->is('admin/dashboard') || request()->is('admin/dashboard') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin.dashboard.index') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span class="text-white">{{ __('Dashboard') }}</span></a>
            </li>

            
            
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.bookings.index') }}">
                    <i class="fas fa-fw fa-calendar"></i>
                    <span class="text-white">{{ __('Booking') }}</span></a>
            </li>

                     <!-- Nav Item  -->
             <li class="nav-item {{ request()->is('admin/system_calendars') || request()->is('admin/system_calendars') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin.system_calendars.index') }}">
                    <i class="fas fa-fw fa-calendar"></i>
                    <span class="text-white">{{ __('Calendar') }}</span></a>
            </li>


        </ul>