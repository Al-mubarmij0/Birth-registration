<div class="sidebar">
    <ul class="list-group">
        <li class="list-group-item">
            <a href="{{ route('admin.dashboard') }}" class="nav-link">
                <i class="fa fa-tachometer-alt"></i> Dashboard
            </a>
        </li>
        <li class="list-group-item">
            <a href="{{ route('admin.pending-registrations') }}" class="nav-link">
                <i class="fa fa-clock"></i> Pending Registrations
            </a>
        </li>
        <li class="list-group-item">
            <a href="{{ route('admin.approved-registrations') }}" class="nav-link">
                <i class="fa fa-check"></i> Approved Registrations
            </a>
        </li>
        <li class="list-group-item">
            <a href="{{ route('admin.rejected-registrations') }}" class="nav-link">
                <i class="fa fa-times"></i> Rejected Registrations
            </a>
        </li>
        <li class="list-group-item">
            <a href="{{ route('admin.messages') }}" class="nav-link">
                <i class="fa fa-envelope"></i> Contact Messages
            </a>
        </li>
        <li class="list-group-item">
            <a href="{{ route('admin.reports') }}" class="nav-link">
                <i class="fa fa-chart-line"></i> Reports
            </a>
        </li>
        <li class="list-group-item">
            <a href="{{ route('admin.settings') }}" class="nav-link">
                <i class="fa fa-cogs"></i> Settings
            </a>
        </li>

        @can('manage-users')
        <li class="list-group-item">
            <a href="{{ route('admin.users') }}" class="nav-link">
                <i class="fa fa-users"></i> Users
            </a>
        </li>
        @endcan
    </ul>
</div>
