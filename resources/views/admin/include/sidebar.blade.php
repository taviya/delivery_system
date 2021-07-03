<nav class="pcoded-navbar" pcoded-header-position="relative">
	<div class="sidebar_toggle"><a href="{{ route('admin.dashboard') }}"><i class="icon-close icons"></i></a></div>
	<div class="pcoded-inner-navbar main-menu">
		<div class="">
			<div class="main-menu-header">
				<img class="img-40" src="{{asset('assets/images/user.png')}}" alt="User-Profile-Image">
				<div class="user-details">
					<span>{{  auth()->user()->name }}</span>
					<span id="more-details">Super Admin<i class="ti-angle-down"></i></span>
				</div>
			</div>
			<div class="main-menu-content">
				<ul>
					<li class="more-details">
						<a href="{{ route('admin.adminProfile',auth()->user()->id) }}"><i class="ti-user"></i>View Profile</a>
						<a href="{{ route('admin.adminProfile',auth()->user()->id) }}"><i class="ti-settings"></i>Change Password</a>
						<a href="{{ route('logout') }}"
						onclick="event.preventDefault();
						document.getElementById('logout-form').submit();"><i class="ti-layout-sidebar-left"></i>Logout</a>
						<form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
							@csrf
						</form>
					</li>
				</ul>
			</div>
		</div>
		{{-- <div class="pcoded-navigatio-lavel" data-i18n="nav.category.navigation" menu-title-theme="theme5">Main</div> --}}
		<ul class="pcoded-item pcoded-left-item">
			<li class="pcoded-hasmenu @if (\Request::route()->getName() == 'admin.dashboard') active pcoded-trigger @endif">
				<a href="{{ route('admin.dashboard') }}">
					<span class="pcoded-micon"><i class="ti-home"></i></span>
					<span class="pcoded-mtext" data-i18n="nav.dash.main">Dashboard</span>
					<span class="pcoded-badge label label-danger">Default</span>
					<span class="pcoded-mcaret"></span>
				</a>
			</li>
		</ul>
		{{-- @if(auth()->user()->can('')) --}}
		{{-- <div class="pcoded-navigatio-lavel" data-i18n="nav.category.navigation" menu-title-theme="theme5">User Management</div> --}}
		<ul class="pcoded-item pcoded-left-item">
			<li class="pcoded-hasmenu @if (\Request::route()->getName() == 'users.index') active pcoded-trigger @endif">
				<a href="javascript:void(0)" data-i18n="nav.advance-components.main">
					<span class="pcoded-micon"><i class="ti-user"></i></span>
					<span class="pcoded-mtext" data-i18n="nav.dash.main">User Management</span>
					<span class="pcoded-mcaret"></span>
				</a>
				<ul class="pcoded-submenu">
					<li class="@if (\Request::route()->getName() == 'users.index') active @endif">
						<a href="{{ route('users.index') }}" data-i18n="nav.advance-components.draggable">
							<span class="pcoded-micon"><i class="ti-angle-right"></i></span>
							<span class="pcoded-mtext">All Users</span>
							<span class="pcoded-mcaret"></span>
						</a>
					</li>
				</ul>
			</li>
		</ul>
        @include('admin.include.kanji-menu')
        @include('admin.include.ravi-menu')
		{{-- @endif --}}
		@if(auth()->user()->can('Menu Management') || auth()->user()->can('Menu Edit') || auth()->user()->can('Delete Menu'))
		{{-- <div class="pcoded-navigatio-lavel" data-i18n="nav.category.navigation" menu-title-theme="theme5">Menu Setting</div> --}}
		<ul class="pcoded-item pcoded-left-item">
			<li class="pcoded-hasmenu @if (\Request::route()->getName() == 'admin.menuManager.index') active pcoded-trigger @endif">
				<a href="{{ route('admin.menuManager.index') }}">
					<span class="pcoded-micon"><i class="ti-layout-grid2-alt"></i></span>
					<span class="pcoded-mtext" data-i18n="nav.dash.main">Menu Management</span>
					<span class="pcoded-mcaret"></span>
				</a>
			</li>
		</ul>
		@endif
{{--		@if(auth()->user()->can('Add Role') || auth()->user()->can('Delete Role') || auth()->user()->can('Edit Role')|| auth()->user()->can('Edit Role') || auth()->user()->can('Permission List')|| auth()->user()->can('Edit Permission')|| auth()->user()->can('Delete Permission')|| auth()->user()->can('Add Admin User')|| auth()->user()->can('Edit Admin User')|| auth()->user()->can('Delete Admin User'))--}}
		{{-- <div class="pcoded-navigatio-lavel" data-i18n="nav.category.ui-element" menu-title-theme="theme5">Role Settings</div> --}}
		{{--<ul class="pcoded-item pcoded-left-item">
			<li class="pcoded-hasmenu
			@if (\Request::route()->getName() == 'role.index') active pcoded-trigger @endif
			@if (\Request::route()->getName() == 'permission.index') active pcoded-trigger @endif
			@if (\Request::route()->getName() == 'admin.users') active pcoded-trigger @endif
			@if (\Request::route()->getName() == 'add.adminuser') active pcoded-trigger @endif
			">
			<a href="javascript:void(0)" data-i18n="nav.advance-components.main">
				<span class="pcoded-micon"><i class="ti-pencil-alt"></i></span>
				<span class="pcoded-mtext">Role Management</span>
				<span class="pcoded-mcaret"></span>
			</a>
			<ul class="pcoded-submenu">
				<li class="@if (\Request::route()->getName() == 'role.index') active @endif">
					<a href="{{ route('role.index') }}" data-i18n="nav.advance-components.draggable">
						<span class="pcoded-micon"><i class="ti-angle-right"></i></span>
						<span class="pcoded-mtext">Roles</span>
						<span class="pcoded-mcaret"></span>
					</a>
				</li>
				<li class="@if (\Request::route()->getName() == 'permission.index') active @endif">
					<a href="{{route('permission.index')}}" data-i18n="nav.advance-components.draggable">
						<span class="pcoded-micon"><i class="ti-angle-right"></i></span>
						<span class="pcoded-mtext">Permission</span>
						<span class="pcoded-mcaret"></span>
					</a>
				</li>
				<li class="@if (\Request::route()->getName() == 'admin.users') active @endif
					@if (\Request::route()->getName() == 'add.adminuser') active @endif
					">
					<a href="{{route('admin.users')}}" data-i18n="nav.advance-components.draggable">
						<span class="pcoded-micon"><i class="ti-angle-right"></i></span>
						<span class="pcoded-mtext">Admin Users</span>
						<span class="pcoded-mcaret"></span>
					</a>
				</li>
			</ul>
		</li>
	</ul>--}}
{{--	@endif--}}

	@if(auth()->user()->can('Add Logo') || auth()->user()->can('Site Settings') || auth()->user()->can('Social Setting')|| auth()->user()->can('Google Analytics') || auth()->user()->can('SEO')|| auth()->user()->can('Log Viewer'))
	{{-- <div class="pcoded-navigatio-lavel" data-i18n="nav.category.ui-element" menu-title-theme="theme5">Site Settings</div> --}}
	<ul class="pcoded-item pcoded-left-item">
		@if(auth()->user()->can('Add Logo') || auth()->user()->can('Site Settings') || auth()->user()->can('Social Setting')|| auth()->user()->can('Google Analytics'))
		<li class="pcoded-hasmenu @if (\Request::route()->getName() == 'admin.logoIcon.index') active pcoded-trigger @endif
			@if (\Request::route()->getName() == 'admin.GenSetting') active pcoded-trigger @endif
			@if (\Request::route()->getName() == 'admin.social.index') active pcoded-trigger @endif
			@if (\Request::route()->getName() == 'admin.google.index') active pcoded-trigger @endif">
			<a href="javascript:void(0)">
				<span class="pcoded-micon"><i class="ti-settings"></i></span>
				<span class="pcoded-mtext">Configurations</span>
				<span class="pcoded-mcaret"></span>
			</a>
			<ul class="pcoded-submenu">
				<li class="@if (\Request::route()->getName() == 'admin.logoIcon.index') active @endif">
					<a href="{{route('admin.logoIcon.index')}}" data-i18n="nav.basic-components.alert">
						<span class="pcoded-micon"><i class="ti-angle-right"></i></span>
						<span class="pcoded-mtext">Logo Icons Settings</span>
						<span class="pcoded-mcaret"></span>
					</a>
				</li>
				<li class="@if (\Request::route()->getName() == 'admin.GenSetting') active @endif">
					<a href="{{route('admin.GenSetting')}}" data-i18n="nav.basic-components.breadcrumbs">
						<span class="pcoded-micon"><i class="ti-angle-right"></i></span>
						<span class="pcoded-mtext">Site Settings</span>
						<span class="pcoded-mcaret"></span>
					</a>
				</li>
				<li class="@if (\Request::route()->getName() == 'admin.social.index') active @endif">
					<a href="{{route('admin.social.index')}}" data-i18n="nav.basic-components.breadcrumbs">
						<span class="pcoded-micon"><i class="ti-angle-right"></i></span>
						<span class="pcoded-mtext">Social Settings</span>
						<span class="pcoded-mcaret"></span>
					</a>
				</li>
				<li class="@if (\Request::route()->getName() == 'admin.google.index') active @endif">
					<a href="{{route('admin.google.index')}}" data-i18n="nav.basic-components.breadcrumbs">
						<span class="pcoded-micon"><i class="ti-angle-right"></i></span>
						<span class="pcoded-mtext">Google Analytics</span>
						<span class="pcoded-mcaret"></span>
					</a>
				</li>
			</ul>
		</li>
		@endif

		@if(auth()->user()->can('SEO'))
		<li class="pcoded-hasmenu @if (\Request::route()->getName() == 'admin.general.edit') active pcoded-trigger @endif">
			<a href="javascript:void(0)" data-i18n="nav.advance-components.main">
				<span class="pcoded-micon"><i class="ti-crown"></i></span>
				<span class="pcoded-mtext">SEO</span>
				<span class="pcoded-mcaret"></span>
			</a>
			<ul class="pcoded-submenu">
				<li class="@if (\Request::route()->getName() == 'admin.general.edit') active @endif">
					<a href="{{ route('admin.general.edit','1') }}" data-i18n="nav.advance-components.draggable">
						<span class="pcoded-micon"><i class="ti-angle-right"></i></span>
						<span class="pcoded-mtext">General SEO</span>
						<span class="pcoded-mcaret"></span>
					</a>
				</li>
			</ul>
		</li>
		@endif
		@if(auth()->user()->can('Log Viewer'))
		<li class="pcoded-hasmenu @if (\Request::route()->getName() == ' ') active pcoded-trigger @endif">
			<a href="javascript:void(0)" data-i18n="nav.advance-components.main">
				<span class="pcoded-micon"><i class="ti-notepad"></i></span>
				<span class="pcoded-mtext">Log Viewer</span>
				<span class="pcoded-mcaret"></span>
			</a>
			<ul class="pcoded-submenu">
				<li class="@if (\Request::route()->getName() == ' ') active @endif">
					<a target="_blank" href="{{url('log-viewer')}}" data-i18n="nav.advance-components.draggable">
						<span class="pcoded-micon"><i class="ti-angle-right"></i></span>
						<span class="pcoded-mtext">Log Viewer</span>
						<span class="pcoded-mcaret"></span>
					</a>
				</li>
			</ul>
		</li>
		@endif

		{{--<li class="pcoded-hasmenu @if (\Request::route()->getName() == ' ') active pcoded-trigger @endif">
			<a href="javascript:void(0)" data-i18n="nav.advance-components.main">
				<span class="pcoded-micon"><i class="ti-star"></i></span>
				<span class="pcoded-mtext">Ajax Module</span>
				<span class="pcoded-mcaret"></span>
			</a>
			<ul class="pcoded-submenu">
				<li class="@if (\Request::route()->getName() == ' ') active @endif">
					<a href="{{ route('ajaxmodule.index') }}" data-i18n="nav.advance-components.draggable">
						<span class="pcoded-micon"><i class="ti-angle-right"></i></span>
						<span class="pcoded-mtext">Ajax Module</span>
						<span class="pcoded-mcaret"></span>
					</a>
				</li>
			</ul>
		</li>--}}

	</ul>
	@endif
</div>
</nav>
