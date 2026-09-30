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
</style>

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

@endsection