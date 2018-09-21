@if(session()->has('success'))

    <div class="notification is-primary has-text-centered is-small">
        {{ session('success') }}
    </div>

@endif

@if(session()->has('error'))

    <div class="notification is-danger has-text-centered is-small">
        {{ session('error') }}
    </div>

@endif