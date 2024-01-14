<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title" data-key="t-menu">Menu</li>
                <x-menu.item text="Dashboard" link="{{ route('dashboard') }}" icon="home" class="{{ (request()->is('dashboard*')) ? 'active' : '' }} "/>
                <x-menu.list text="User Management" icon="users" class="{{ (request()->is('user*')) ? 'mm-active' : '' }}">
                    <x-menu.item text="Users" link="{{ route('manage.users') }}" class="{{ (request()->is('users')) ? 'active' : '' }}"/>
                </x-menu.list>
            </ul>
        </div>
    </div>
</div>
