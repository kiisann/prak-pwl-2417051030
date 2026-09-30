<style>
    .custom-navbar {
        background: rgba(255, 255, 255, 0.9);
        backdrop-filter: blur(12px);
        -webkit-backdrop-filter: blur(12px);
        border-bottom: 1px solid #ede9fe;
        box-shadow: 0 4px 20px rgba(91, 33, 182, 0.05);
    }
    .navbar-brand {
        font-weight: 800;
        font-size: 1.25rem;
        color: #5b21b6 !important;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }
    .navbar-brand i {
        font-size: 1.4rem;
        color: #9333ea;
    }
    .nav-link {
        font-weight: 600;
        font-size: 0.88rem;
        color: #4b5563 !important;
        padding: 0.5rem 1rem !important;
        border-radius: 8px;
        transition: all 0.2s ease;
    }
    .nav-link:hover {
        color: #7c3aed !important;
        background: #f5f3ff;
    }
    .nav-link.active {
        color: #6d28d9 !important;
        background: #ede9fe;
    }
    .btn-create-nav {
        background: linear-gradient(135deg, #7c3aed, #9333ea);
        color: #ffffff !important;
        border-radius: 50px;
        padding: 0.45rem 1.25rem !important;
        font-weight: 700;
        font-size: 0.84rem;
        box-shadow: 0 4px 14px rgba(124, 58, 237, 0.3);
        transition: transform 0.2s, box-shadow 0.2s;
    }
    .btn-create-nav:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 18px rgba(124, 58, 237, 0.4);
        color: #ffffff !important;
    }
</style>

<nav class="navbar navbar-expand-lg sticky-top custom-navbar py-3">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            <i class="bi bi-grid-1x2-fill"></i>
            <span>PWL</span>
        </a>
        
        <button class="navbar-toggler border-0 shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0 gap-1">
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" href="{{ url('/') }}">
                        <i class="bi bi-house-door me-1"></i> Beranda
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('user*') && !Request::is('user/create') ? 'active' : '' }}" href="{{ url('/user') }}">
                        <i class="bi bi-people me-1"></i> Data Pengguna
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('user/create') ? 'active' : '' }}" href="{{ route('user.create') }}">
                        <i class="bi bi-person-plus me-1"></i> Tambah Pengguna
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
