<aside class="menu">
    <p class="menu-label">Manage Clients</p>

    <ul class="menu-list">
        <li>
            <a href="{{ route('message.index') }}" class="{{ Route::currentRouteName() === 'message.index' || Route::currentRouteName() === 'message.create' || Route::currentRouteName() === 'message.show' ? 'is-active' : '' }}">Messages</a>
        </li>
        <li>
            <a href="{{ route('client.index') }}" class="{{ Route::currentRouteName() === 'client.index' || Route::currentRouteName() === 'client.create' || Route::currentRouteName() === 'client.edit' ? 'is-active' : '' }}">Clients</a>
        </li>
        <li>
            <a href="{{ route('station.index') }}" class="{{ Route::currentRouteName() === 'station.index' || Route::currentRouteName() === 'station.create' || Route::currentRouteName() === 'station.edit'? 'is-active' : '' }}">Station</a>
        </li>
        <li>
            <a href="{{ route('manager.index') }}" class="{{ Route::currentRouteName() === 'manager.index' || Route::currentRouteName() === 'manager.create' || Route::currentRouteName() === 'manager.edit' ? 'is-active' : '' }}">Managers</a>
        </li>
    </ul>

    <p class="menu-label">General</p>
    <ul class="menu-list">
        <li>
            <a href="{{ route('admin.show') }}" class="{{ Route::currentRouteName() === 'admin.show' }}">Account Details</a>
        </li>
        <li>
            <a href="{{ route('admin.change.password') }}" class="{{ Route::currentRouteName() === 'admin.change.password' ? 'is-active' : '' }}">Change Password</a>
        </li>
    </ul>

</aside>