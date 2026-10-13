@extends('layout.app')
@section('content')

<style>
    @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap");
    @import url("https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css");

    body, * {
        font-family: 'Poppins', 'Nunito', 'Segoe UI', sans-serif !important;
    }
    body {
        background-color: #f5f3ff;
    }

    /* NOTIFIKASI */

    .alert-floating {
        position: fixed;
        top: 24px;
        right: 24px;
        z-index: 9999;
        min-width: 340px;
        max-width: 480px;
        border: none;
        border-radius: 16px;
        padding: 1rem 1.5rem;
        display: flex;
        align-items: center;
        gap: 0.75rem;
        font-size: 0.88rem;
        font-weight: 600;
        box-shadow: 0 20px 60px rgba(0,0,0,0.15);
        animation: slideInRight 0.5s cubic-bezier(0.22, 1, 0.36, 1) forwards,
                   fadeOutUp 0.5s cubic-bezier(0.22, 1, 0.36, 1) 4s forwards;
    }
    .alert-success-custom {
        background: linear-gradient(135deg, #10b981, #059669);
        color: #fff;
    }
    .alert-error-custom {
        background: linear-gradient(135deg, #ef4444, #dc2626);
        color: #fff;
    }
    .alert-floating .alert-icon {
        width: 42px;
        height: 42px;
        border-radius: 12px;
        background: rgba(255,255,255,0.2);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.25rem;
        flex-shrink: 0;
    }
    .alert-floating .alert-content {
        flex: 1;
    }
    .alert-floating .alert-title {
        font-size: 0.75rem;
        font-weight: 800;
        text-transform: uppercase;
        letter-spacing: 1px;
        opacity: 0.85;
        margin-bottom: 2px;
    }
    .alert-floating .btn-close-alert {
        background: rgba(255,255,255,0.2);
        border: none;
        color: #fff;
        width: 30px;
        height: 30px;
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: background 0.2s;
        flex-shrink: 0;
    }
    .alert-floating .btn-close-alert:hover {
        background: rgba(255,255,255,0.35);
    }
    .alert-floating .progress-bar-anim {
        position: absolute;
        bottom: 0;
        left: 0;
        height: 4px;
        border-radius: 0 0 16px 16px;
        background: rgba(255,255,255,0.4);
        animation: shrinkWidth 4.5s linear forwards;
    }

    @keyframes slideInRight {
        from { transform: translateX(120%); opacity: 0; }
        to   { transform: translateX(0);    opacity: 1; }
    }
    @keyframes fadeOutUp {
        from { transform: translateY(0);    opacity: 1; }
        to   { transform: translateY(-30px); opacity: 0; pointer-events: none; }
    }
    @keyframes shrinkWidth {
        from { width: 100%; }
        to   { width: 0%; }
    }

    /* ═══════════════════════════════════════════════
       HERO BANNER
    ═══════════════════════════════════════════════ */
    .hero-banner {
        background: linear-gradient(135deg, #5b21b6, #9333ea);
        border-radius: 1.25rem;
        padding: 1.75rem 2.25rem;
        margin-bottom: 1.75rem;
        position: relative;
        overflow: hidden;
        box-shadow: 0 12px 35px rgba(91, 33, 182, 0.3);
    }
    .hero-banner::before {
        content: '';
        position: absolute;
        width: 260px;
        height: 260px;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.07);
        top: -80px;
        right: -60px;
    }
    .hero-banner::after {
        content: '';
        position: absolute;
        width: 160px;
        height: 160px;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.05);
        bottom: -60px;
        right: 100px;
    }
    .hero-title {
        font-size: 2.35rem;
        font-weight: 800;
        color: #fff;
        margin: 0 0 0.25rem;
        letter-spacing: -0.5px;
    }
    .hero-sub {
        font-size: 0.95rem;
        color: rgba(255,255,255,0.85);
        margin: 0;
    }
    .btn-glass {
        display: inline-flex;
        align-items: center;
        gap: 0.45rem;
        background: rgba(255, 255, 255, 0.18);
        border: 1.5px solid rgba(255, 255, 255, 0.45);
        backdrop-filter: blur(8px);
        color: #fff !important;
        border-radius: 12px;
        padding: 0.5rem 1.2rem;
        font-size: 0.85rem;
        font-weight: 700;
        text-decoration: none;
        transition: background 0.2s, transform 0.2s, box-shadow 0.2s;
        white-space: nowrap;
        position: relative;
        z-index: 2;
    }
    .btn-glass:hover {
        background: rgba(255, 255, 255, 0.28);
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(0,0,0,0.15);
    }

    /* TABLE CARD */
    .card-table {
        background: #fff;
        border-radius: 1.25rem;
        box-shadow: 0 2px 16px rgba(91,33,182,0.08);
        border: none;
        overflow: hidden;
    }
    .card-toolbar {
        display: flex;
        align-items: center;
        justify-content: space-between;
        flex-wrap: wrap;
        gap: 0.75rem;
        padding: 1.1rem 1.5rem;
        border-bottom: 1px solid #f3f0ff;
    }
    .toolbar-title {
        font-size: 1rem;
        font-weight: 800;
        text-transform: uppercase;
        letter-spacing: 1px;
        color: #7c3aed;
        display: flex;
        align-items: center;
        gap: 0.4rem;
    }
    .search-pill {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        background: #faf5ff;
        border: 1.5px solid #e9d5ff;
        border-radius: 50px;
        padding: 0.4rem 1rem;
        max-width: 230px;
        width: 100%;
        transition: border-color 0.2s, box-shadow 0.2s;
    }
    .search-pill:focus-within {
        border-color: #9333ea;
        box-shadow: 0 0 0 3px rgba(147,51,234,0.12);
        background: #fff;
    }
    .search-pill i { color: #c4b5fd; font-size: 0.875rem; }
    .search-pill input {
        border: none;
        background: transparent;
        font-size: 0.82rem;
        color: #374151;
        outline: none;
        width: 100%;
    }
    .search-pill input::placeholder { color: #c4b5fd; }
    .users-table thead tr th {
        background: #ede9fe;
        color: #4c1d95;
        font-size: 0.78rem;
        font-weight: 800;
        text-transform: uppercase;
        letter-spacing: 0.8px;
        padding: 0.85rem 1.25rem;
        border-bottom: 2px solid #ddd6fe;
        border-top: none;
        white-space: nowrap;
    }
    .users-table tbody tr {
        transition: background 0.15s;
    }
    .users-table tbody tr:hover {
        background: #faf5ff;
    }
    .users-table tbody td {
        padding: 0.95rem 1.25rem;
        vertical-align: middle;
        border-bottom: 1px solid #f9f5ff;
        font-size: 0.875rem;
        color: #374151;
    }
    .users-table tbody tr:last-child td { border-bottom: none; }
    .no-badge {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 32px;
        height: 32px;
        border-radius: 8px;
        background: #ede9fe;
        color: #6d28d9;
        font-size: 0.78rem;
        font-weight: 800;
    }
    .col-id {
        text-align: center !important;
        width: 70px;
    }
    .user-name { font-weight: 700; font-size: 0.9rem; color: #111827; line-height: 1.3; }
    .uuid-text {
        font-size: 0.65rem;
        color: #a78bfa;
        font-family: ui-monospace, monospace;
        letter-spacing: 0.3px;
        margin-top: 2px;
    }
    .npm-badge {
        display: inline-block;
        background: #ede9fe;
        color: #4c1d95;
        border-radius: 50px;
        padding: 0.28rem 0.85rem;
        font-size: 0.79rem;
        font-weight: 700;
        font-family: ui-monospace, monospace;
        letter-spacing: 0.4px;
    }
    .kelas-badge {
        display: inline-flex;
        align-items: center;
        gap: 0.35rem;
        background: #e0f2fe;
        color: #0369a1;
        border-radius: 50px;
        padding: 0.3rem 0.85rem;
        font-size: 0.79rem;
        font-weight: 700;
    }
    .empty-state {
        text-align: center;
        padding: 3.5rem 1rem;
    }
    .empty-state .empty-icon {
        font-size: 3rem;
        color: #c4b5fd;
        display: block;
        margin-bottom: 0.75rem;
    }
    .empty-state p {
        color: #9ca3af;
        font-size: 0.875rem;
        margin: 0;
    }

    /* ACTION BUTTONS  */
    .action-buttons {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
    }
    .btn-action {
        display: inline-flex;
        align-items: center;
        gap: 0;
        border: none;
        border-radius: 12px;
        padding: 0;
        font-size: 0.78rem;
        font-weight: 700;
        cursor: pointer;
        text-decoration: none;
        overflow: hidden;
        transition: all 0.35s cubic-bezier(0.22, 1, 0.36, 1);
        position: relative;
        height: 38px;
    }
    .btn-action-icon {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 38px;
        height: 38px;
        font-size: 0.95rem;
        transition: all 0.35s cubic-bezier(0.22, 1, 0.36, 1);
        flex-shrink: 0;
    }
    .btn-action-text {
        max-width: 0;
        overflow: hidden;
        white-space: nowrap;
        opacity: 0;
        padding-right: 0;
        transition: all 0.35s cubic-bezier(0.22, 1, 0.36, 1);
        font-size: 0.75rem;
        letter-spacing: 0.5px;
        text-transform: uppercase;
    }
    .btn-action:hover .btn-action-text {
        max-width: 80px;
        opacity: 1;
        padding-right: 14px;
    }

    /* Edit Button */
    .btn-edit {
        background: linear-gradient(135deg, #f59e0b, #d97706);
        color: #fff !important;
        box-shadow: 0 4px 15px rgba(245, 158, 11, 0.3);
    }
    .btn-edit:hover {
        background: linear-gradient(135deg, #fbbf24, #f59e0b);
        transform: translateY(-3px) scale(1.05);
        box-shadow: 0 8px 25px rgba(245, 158, 11, 0.45);
        color: #fff !important;
    }
    .btn-edit:active {
        transform: translateY(-1px) scale(0.98);
    }
    .btn-edit .btn-action-icon {
        animation: none;
    }
    .btn-edit:hover .btn-action-icon {
        animation: wiggle 0.5s ease-in-out;
    }

    /* Delete Button */
    .btn-delete {
        background: linear-gradient(135deg, #ef4444, #dc2626);
        color: #fff;
        box-shadow: 0 4px 15px rgba(239, 68, 68, 0.3);
    }
    .btn-delete:hover {
        background: linear-gradient(135deg, #f87171, #ef4444);
        transform: translateY(-3px) scale(1.05);
        box-shadow: 0 8px 25px rgba(239, 68, 68, 0.45);
    }
    .btn-delete:active {
        transform: translateY(-1px) scale(0.98);
    }
    .btn-delete:hover .btn-action-icon {
        animation: shake 0.5s ease-in-out;
    }

    @keyframes wiggle {
        0%, 100% { transform: rotate(0deg); }
        25% { transform: rotate(-12deg); }
        75% { transform: rotate(12deg); }
    }
    @keyframes shake {
        0%, 100% { transform: translateX(0); }
        20% { transform: translateX(-3px); }
        40% { transform: translateX(3px); }
        60% { transform: translateX(-3px); }
        80% { transform: translateX(3px); }
    }

    /* DELETE MODAL */
    .delete-modal-content {
        border: none;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 25px 80px rgba(0,0,0,0.2);
    }
    .delete-modal-icon {
        width: 72px;
        height: 72px;
        border-radius: 50%;
        background: linear-gradient(135deg, #fee2e2, #fecaca);
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 1rem;
        font-size: 2rem;
        color: #dc2626;
        animation: pulseIcon 2s ease-in-out infinite;
    }
    @keyframes pulseIcon {
        0%, 100% { transform: scale(1); }
        50% { transform: scale(1.08); }
    }
    .delete-modal-title {
        font-weight: 800;
        color: #1f2937;
        margin-bottom: 0.5rem;
        font-size: 1.2rem;
    }
    .delete-modal-text {
        color: #6b7280;
        font-size: 0.88rem;
        margin-bottom: 0.25rem;
    }
    .delete-modal-sub {
        color: #9ca3af;
        font-size: 0.75rem;
        font-style: italic;
    }
    .btn-modal {
        display: inline-flex;
        align-items: center;
        gap: 0.4rem;
        border: none;
        border-radius: 12px;
        padding: 0.6rem 1.5rem;
        font-size: 0.82rem;
        font-weight: 700;
        cursor: pointer;
        transition: all 0.2s;
    }
    .btn-modal-cancel {
        background: #f3f4f6;
        color: #374151;
    }
    .btn-modal-cancel:hover {
        background: #e5e7eb;
        transform: translateY(-1px);
    }
    .btn-modal-delete {
        background: linear-gradient(135deg, #ef4444, #dc2626);
        color: #fff;
        box-shadow: 0 4px 15px rgba(239, 68, 68, 0.3);
    }
    .btn-modal-delete:hover {
        background: linear-gradient(135deg, #f87171, #ef4444);
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(239, 68, 68, 0.45);
    }
</style>

<!-- FLASH NOTIFICATION -->
@if (session('success'))
<div class="alert-floating alert-success-custom" id="flashAlert">
    <div class="alert-icon">
        <i class="bi bi-check-circle-fill"></i>
    </div>
    <div class="alert-content">
        <div class="alert-title">Berhasil</div>
        {{ session('success') }}
    </div>
    <button class="btn-close-alert" onclick="this.closest('.alert-floating').remove()">
        <i class="bi bi-x-lg"></i>
    </button>
    <div class="progress-bar-anim"></div>
</div>
@endif

@if (session('error'))
<div class="alert-floating alert-error-custom" id="flashAlert">
    <div class="alert-icon">
        <i class="bi bi-x-circle-fill"></i>
    </div>
    <div class="alert-content">
        <div class="alert-title">Gagal</div>
        {{ session('error') }}
    </div>
    <button class="btn-close-alert" onclick="this.closest('.alert-floating').remove()">
        <i class="bi bi-x-lg"></i>
    </button>
    <div class="progress-bar-anim"></div>
</div>
@endif

@if ($errors->any())
<div class="alert-floating alert-error-custom" id="flashAlert">
    <div class="alert-icon">
        <i class="bi bi-x-circle-fill"></i>
    </div>
    <div class="alert-content">
        <div class="alert-title">Validasi Error</div>
        {{ $errors->first() }}
    </div>
    <button class="btn-close-alert" onclick="this.closest('.alert-floating').remove()">
        <i class="bi bi-x-lg"></i>
    </button>
    <div class="progress-bar-anim"></div>
</div>
@endif

<div class="hero-banner">
    <div style="position:relative;z-index:2;">
        <h1 class="hero-title">Daftar Pengguna</h1>
        <p class="hero-sub">Manajemen data pengguna sistem akademik</p>
        <a href="{{ route('user.create') }}" class="btn-glass" style="margin-top:1.25rem;display:inline-flex;">
            <i class="bi bi-person-plus-fill"></i>
            Tambah Pengguna
        </a>
    </div>
</div>

<x-table :users="$users" />

<script>
    // Auto-remove flash notification
    setTimeout(function() {
        var alert = document.getElementById('flashAlert');
        if (alert) alert.remove();
    }, 5000);
</script>

@endsection