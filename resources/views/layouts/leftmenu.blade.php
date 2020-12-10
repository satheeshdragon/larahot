<ul id="main-menu" class="main-menu">
    <li>
        <a href="{{ route('employee') }}">
            <i class="entypo-layout"></i>
            <span class="title">Employee</span>
        </a>
    </li>
    <li>
        <a href="#">
            <i class="entypo-plus-squared"></i>
            <span class="title">Bulk Order</span>
        </a>
    </li>
    <li>
        <a href="#">
            <i class="entypo-newspaper"></i>
            <span class="title">Result</span>
        </a>
    </li>
    <li>
        <a href="#">
            <i class="entypo-heart"></i>
            <span class="title">Patient</span>
        </a>
    </li>
    <li>
        <a href="#">
            <i class="entypo-user"></i>
            <span class="title">Admin</span>
        </a>
    </li>
    <li>
        <a href="#">
            <i class="entypo-heart-empty"></i>
            <span class="title">Client</span>
        </a>
    </li>

    <li>
        <a href="#">
            <i class="entypo-database"></i>
            <span class="title">Result Upload</span>
        </a>
    </li>
    <li>
        <a href="#">
            <i class="entypo-flow-tree"></i>
            <span class="title">Accession</span>
        </a>
    </li>
    <li class="{{ request()->is('usermanage/*') ? 'opened active has-sub root-level' : 'has-sub' }}">
        <a href="#">
            <i class="entypo-window"></i>
            <span class="title">User Management</span>
        </a>
        <ul>
            <li class="{{ request()->is('usermanage/userpermission') ? 'active' : '' }}">
                <a href="{{ route('userpermission') }}">
                    <i class="entypo-users"></i>
                    <span class="title">Permission</span>
                </a>
            </li>
            <li class="{{ request()->is('usermanage/userrole') ? 'active' : '' }}">
                <a href="{{ route('userrole') }}">
                    <i class="entypo-users"></i>
                    <span class="title">Role</span>
                </a>
            </li>
            <li class="{{ request()->is('usermanage/user') ? 'active' : '' }}">
                <a href="{{ route('user') }}">
                    <i class="entypo-users"></i>
                    <span class="title">User</span>
                </a>
            </li>
        </ul>
    </li>


</ul>
