<style>
    .custom-footer {
        background: #ffffff;
        border-top: 1px solid #ede9fe;
        color: #6b7280;
        font-size: 1rem;
        margin-top: auto;
    }
    .footer-link {
        color: #6b7280;
        text-decoration: none;
        transition: color 0.2s;
    }
    .footer-link:hover {
        color: #7c3aed;
    }
    .footer-brand {
        color: #5b21b6;
        font-weight: 700;
    }
</style>

<footer class="custom-footer py-4 mt-5">
    <div class="container">
        <div class="row align-items-center gy-3">
            <div class="col-md-6 text-center text-md-start">
                <span class="footer-brand"><i class="bi bi-grid-1x2-fill me-1"></i> PWL</span>
            </div>
            <div class="col-md-6 text-center text-md-end">
                &copy; {{ date('Y') }} Prak Web Lanjut - 2417051030
            </div>
        </div>
    </div>
</footer>
