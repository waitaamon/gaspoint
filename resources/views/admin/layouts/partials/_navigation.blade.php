<aside class="menu">
    <p class="menu-label">Manage Clients</p>

    <ul class="menu-list">
        <li>
            <a href="{{ route('message.index') }}">Messages</a>
        </li>
        <li>
            <a href="{{ route('client.index') }}">Clients</a>
        </li>
        <li>
            <a href="{{ route('station.index') }}">Station</a>
        </li>
        <li>
            <a href="{{ route('manager.index') }}">Managers</a>
        </li>
    </ul>

    <p class="menu-label">General</p>
    <ul class="menu-list">
        <li>
            <a href="{{ route('admin.show') }}">Account Details</a>
        </li>
        <li>
            <a href="{{ route('admin.change.password') }}">Change Password</a>
        </li>
    </ul>

</aside>