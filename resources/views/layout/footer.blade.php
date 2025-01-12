<footer class="sticky-footer">
    <div class="container">
        <div class="text-center">
            <small>Copyright © Your Website 2024</small>
        </div>
    </div>
</footer>

<!-- jQuery (required for Bootstrap and DataTables) -->
<script src="{{ asset('admin/vendor/jquery/jquery.min.js') }}"></script>

<!-- Bootstrap core JavaScript (local asset) -->
<script src="{{ asset('admin/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<!-- Core plugin JavaScript -->
<script src="{{ asset('admin/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

<!-- Custom scripts for all layout -->
<script src="{{ asset('admin/js/sb-admin.min.js') }}"></script>

<!-- DataTables JS from CDN -->
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>

<!-- CKEditor JS from CDN -->
<script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>

<!-- Custom scripts for specific pages -->
@stack('js')
