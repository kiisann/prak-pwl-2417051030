@extends('layout.app')
@section('content')

<style>
    @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap");

    body, * {
        font-family: 'Poppins', 'Nunito', 'Segoe UI', sans-serif !important;
    }

    .edit-hero {
        background: linear-gradient(135deg, #5b21b6, #7c3aed);
        border-radius: 1.25rem;
        padding: 1.75rem 2.25rem;
        margin-bottom: 2rem;
        position: relative;
        overflow: hidden;
        box-shadow: 0 12px 35px rgba(91, 33, 182, 0.3);
    }
    .edit-hero::before {
        content: '';
        position: absolute;
        width: 200px;
        height: 200px;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.07);
        top: -60px;
        right: -40px;
    }
    .edit-hero h1 {
        font-size: 2rem;
        font-weight: 800;
        color: #fff;
        margin: 0 0 0.25rem;
        position: relative;
        z-index: 2;
    }
    .edit-hero p {
        font-size: 0.9rem;
        color: rgba(255,255,255,0.8);
        margin: 0;
        position: relative;
        z-index: 2;
    }

    .form-card {
        background: #fff;
        border-radius: 1.25rem;
        box-shadow: 0 2px 20px rgba(91,33,182,0.08);
        padding: 2rem 2.5rem;
        max-width: 600px;
        margin: 0 auto;
    }
    .form-card .form-label {
        font-weight: 700;
        font-size: 0.82rem;
        text-transform: uppercase;
        letter-spacing: 0.8px;
        color: #4c1d95;
        margin-bottom: 0.4rem;
    }
    .form-card .form-control,
    .form-card .form-select {
        border: 2px solid #e9d5ff;
        border-radius: 12px;
        padding: 0.65rem 1rem;
        font-size: 0.88rem;
        color: #374151;
        transition: border-color 0.2s, box-shadow 0.2s;
    }
    .form-card .form-control:focus,
    .form-card .form-select:focus {
        border-color: #7c3aed;
        box-shadow: 0 0 0 3px rgba(124,58,237,0.12);
        outline: none;
    }

    .uuid-display {
        background: #faf5ff;
        border: 1.5px dashed #ddd6fe;
        border-radius: 10px;
        padding: 0.55rem 1rem;
        font-family: ui-monospace, monospace;
        font-size: 0.75rem;
        color: #7c3aed;
        word-break: break-all;
        letter-spacing: 0.3px;
    }

    .btn-group-actions {
        display: flex;
        gap: 0.75rem;
        margin-top: 1.75rem;
    }
    .btn-save {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        background: linear-gradient(135deg, #5b21b6, #7c3aed);
        color: #fff;
        border: none;
        border-radius: 12px;
        padding: 0.65rem 1.75rem;
        font-size: 0.85rem;
        font-weight: 700;
        cursor: pointer;
        transition: all 0.25s;
        box-shadow: 0 4px 15px rgba(91,33,182,0.3);
    }
    .btn-save:hover {
        background: linear-gradient(135deg, #6d28d9, #8b5cf6);
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(91,33,182,0.4);
    }
    .btn-back {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        background: #f3f4f6;
        color: #374151;
        border: 2px solid #e5e7eb;
        border-radius: 12px;
        padding: 0.65rem 1.5rem;
        font-size: 0.85rem;
        font-weight: 700;
        cursor: pointer;
        text-decoration: none;
        transition: all 0.25s;
    }
    .btn-back:hover {
        background: #e5e7eb;
        transform: translateY(-2px);
        color: #374151;
    }

    .validation-error {
        color: #dc2626;
        font-size: 0.78rem;
        font-weight: 600;
        margin-top: 0.3rem;
    }
</style>

<div class="edit-hero">
    <h1><i class="bi bi-pencil-square"></i> Edit Pengguna</h1>
    <p>Perbarui informasi data mahasiswa</p>
</div>

<div class="form-card">
    <form action="{{ route('user.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control @error('nama') is-invalid @enderror"
                   id="nama" name="nama" value="{{ old('nama', $user->nama) }}" required>
            @error('nama')
                <div class="validation-error"><i class="bi bi-exclamation-circle"></i> {{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="npm" class="form-label">NPM</label>
            <input type="text" class="form-control @error('npm') is-invalid @enderror"
                   id="npm" name="npm" value="{{ old('npm', $user->npm) }}" required>
            @error('npm')
                <div class="validation-error"><i class="bi bi-exclamation-circle"></i> {{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="kelas_id" class="form-label">Kelas</label>
            <select class="form-select @error('kelas_id') is-invalid @enderror" id="kelas_id" name="kelas_id" required>
                <option value="" disabled>-- Pilih Kelas --</option>
                @foreach ($kelas as $kelasItem)
                    <option value="{{ $kelasItem->id }}"
                        {{ (old('kelas_id', $user->kelas_id) == $kelasItem->id) ? 'selected' : '' }}>
                        {{ $kelasItem->nama_kelas }}
                    </option>
                @endforeach
            </select>
            @error('kelas_id')
                <div class="validation-error"><i class="bi bi-exclamation-circle"></i> {{ $message }}</div>
            @enderror
        </div>

        <div class="btn-group-actions">
            <button type="submit" class="btn-save">
                <i class="bi bi-check2-circle"></i> Simpan Perubahan
            </button>
            <a href="{{ route('user.index') }}" class="btn-back">
                <i class="bi bi-arrow-left"></i> Kembali
            </a>
        </div>
    </form>
</div>

@endsection
