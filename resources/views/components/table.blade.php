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
                    <th class="col-id">No</th>
                    <th>Nama Pengguna</th>
                    <th class="text-center">NPM</th>
                    <th>Kelas</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($users as $index => $user)
                <tr class="user-row">
                    <td class="col-id">
                        <span class="no-badge">{{ $index + 1 }}</span>
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
                    <td class="text-center">
                        <div class="action-buttons">
                            
                            <a href="{{ route('user.edit', $user->id) }}" class="btn-action btn-edit" title="Edit Data">
                                <span class="btn-action-icon">
                                    <i class="bi bi-pencil-square"></i>
                                </span>
                                <span class="btn-action-text">Edit</span>
                            </a>

                            <button type="button" class="btn-action btn-delete" title="Hapus Data"
                                onclick="confirmDelete('{{ $user->id }}', '{{ $user->nama }}')">
                                <span class="btn-action-icon">
                                    <i class="bi bi-trash3-fill"></i>
                                </span>
                                <span class="btn-action-text">Hapus</span>
                            </button>

                            <form id="delete-form-{{ $user->id }}" action="{{ route('user.destroy', $user->id) }}" method="POST" style="display:none;">
                                @csrf
                                @method('DELETE')
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center py-5">
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

<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content delete-modal-content">
            <div class="modal-body text-center p-4">
                <div class="delete-modal-icon">
                    <i class="bi bi-exclamation-triangle-fill"></i>
                </div>
                <h5 class="delete-modal-title">Konfirmasi Hapus</h5>
                <p class="delete-modal-text">
                    Apakah kamu yakin ingin menghapus data<br>
                    <strong id="deleteUserName" class="text-danger"></strong>?
                </p>
                <p class="delete-modal-sub">Data yang dihapus tidak dapat dikembalikan.</p>
                <div class="d-flex justify-content-center gap-3 mt-4">
                    <button type="button" class="btn-modal btn-modal-cancel" data-bs-dismiss="modal">
                        <i class="bi bi-x-lg"></i> Batal
                    </button>
                    <button type="button" class="btn-modal btn-modal-delete" id="confirmDeleteBtn">
                        <i class="bi bi-trash3-fill"></i> Ya, Hapus!
                    </button>
                </div>
            </div>
        </div>
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

    var deleteFormId = null;

    function confirmDelete(id, nama) {
        deleteFormId = id;
        document.getElementById('deleteUserName').textContent = nama;
        var modal = new bootstrap.Modal(document.getElementById('deleteModal'));
        modal.show();
    }

    document.addEventListener('DOMContentLoaded', function() {
        var confirmBtn = document.getElementById('confirmDeleteBtn');
        if (confirmBtn) {
            confirmBtn.addEventListener('click', function() {
                if (deleteFormId) {
                    document.getElementById('delete-form-' + deleteFormId).submit();
                }
            });
        }
    });
</script>
