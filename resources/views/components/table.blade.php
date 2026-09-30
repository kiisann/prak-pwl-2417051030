@props([
    'users' => [],
    'title' => 'Data Pengguna',
    'searchPlaceholder' => 'Cari pengguna...'
])

<div class="card-table">
    <div class="card-toolbar">
        <span class="toolbar-title">
            <i class="bi bi-table"></i> {{ $title }}
        </span>
        <div class="search-pill">
            <i class="bi bi-search"></i>
            <input type="text" id="searchInput" placeholder="{{ $searchPlaceholder }}">
        </div>
    </div>

    <div class="table-responsive">
        <table class="table users-table align-middle mb-0 w-100" id="usersTable">
            <thead>
                <tr>
                    <th class="col-id">ID</th>
                    <th>Nama Pengguna</th>
                    <th class="text-center">NPM</th>
                    <th>Kelas</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($users as $index => $user)
                <tr>
                    <td class="col-id">
                        <span class="no-badge">{{ $user->id }}</span>
                    </td>
                    <td>
                        <div class="user-name">{{ $user->nama }}</div>
                    </td>
                    <td class="text-center">
                        <span class="npm-badge">{{ $user->npm }}</span>
                    </td>
                    <td>
                        <span class="kelas-badge">{{ $user->nama_kelas }}</span>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="text-center py-5">
                        <div class="empty-state">
                            <i class="bi bi-inbox empty-icon"></i>
                            <p>Belum ada data pengguna.<br>
                               <a href="{{ route('user.create') }}" class="text-purple fw-semibold">Tambah sekarang &rarr;</a>
                            </p>
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var input = document.getElementById('searchInput');
        if (!input) return;
        input.addEventListener('input', function () {
            var q    = this.value.toLowerCase();
            var rows = document.querySelectorAll('#usersTable tbody tr');
            rows.forEach(function (r) {
                if (r.querySelector('.empty-state')) return;
                var show = r.textContent.toLowerCase().includes(q);
                r.style.display = show ? '' : 'none';
            });
        });
    });
</script>
