<aside class="sidebar-wrapper">
    <div class="sidebar sidebar-collapse" id="sidebar">
        <div class="sidebar__menu-group">
            <ul class="sidebar_nav">
                <li class="menu-title">
                    <span>Main menu</span>
                </li>
                <li>
                    <a href="{{ route('dashboard', ['type' => \App\Enums\AccountType::ADVERTISER]) }}" class="">
                        <span data-feather="home" class="nav-icon"></span>
                        <span class="menu-text">{{ trans('cruds.dashboard.title') }}</span>
                    </a>
                </li>
                @can('user_management_access')
                    <li class="has-child {{ request()->is('users') || request()->is('users/*') || request()->is('permissions') || request()->is('permissions/*') || request()->is('roles') || request()->is('roles/*') ? "open" : null }}">
                        <a href="#" class="{{ request()->is('users') || request()->is('users/*') || request()->is('permissions') || request()->is('permissions/*') || request()->is('roles') || request()->is('roles/*') ? "active" : null }}">
                            <span data-feather="layout" class="nav-icon"></span>
                            <span class="menu-text">{{ trans('cruds.userManagement.title') }}</span>
                            <span class="toggle-icon"></span>
                        </a>
                        <ul>
                            @can('permission_access')
                                <li class="l_sidebar">
                                    <a href="{{ route("admin.user-management.permissions.index") }}" data-layout="light" class="{{ request()->is('permissions') || request()->is('permissions/*') ? "active" : null }}">{{ trans('cruds.permission.title') }}</a>
                                </li>
                            @endcan
                            @can('role_access')
                                <li class="l_sidebar">
                                    <a href="{{ route("admin.user-management.roles.index") }}" data-layout="light" class="{{ request()->is('roles') || request()->is('roles/*') ? "active" : null }}">{{ trans('cruds.role.title') }}</a>
                                </li>
                            @endcan
                            @can('user_access')
                                <li class="l_sidebar">
                                    <a href="{{ route("admin.user-management.users.index") }}" data-layout="light" class="{{ request()->is('users') || request()->is('users/*') ? "active" : null }}">{{ trans('cruds.user.title') }}</a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
            </ul>
        </div>
    </div>
</aside>
