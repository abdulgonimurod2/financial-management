<nav class="navbar navbar-dark bg-dark px-3">
    <div class="d-flex align-items-center gap-2">

        <!-- Button Mobile -->
        <button class="btn btn-outline-light d-md-none"
                data-bs-toggle="offcanvas"
                data-bs-target="#mobileSidebar">
            ☰
        </button>

        <span class="navbar-brand mb-0 h1">Finance App</span>
    </div>

    <div class="text-white">
        {{ auth()->user()->name ?? 'Guest' }}
    </div>
</nav>
