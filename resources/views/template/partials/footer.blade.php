<footer id="footer" class="footer">
    <div class="copyright">
        End Of Page
    </div>
</footer><!-- End Footer -->

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- jQuery -->
<script src="/assets/plugins/jquery/jquery.min.js"></script>

<!-- Vendor JS Files -->
<script src="/assets/vendor/apexcharts/apexcharts.min.js"></script>
<script src="/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="/assets/vendor/chart.js/chart.umd.js"></script>
<script src="/assets/vendor/echarts/echarts.min.js"></script>
<script src="/assets/vendor/quill/quill.min.js"></script>
<script src="/assets/vendor/simple-datatables/simple-datatables.js"></script>
<script src="/assets/vendor/tinymce/tinymce.min.js"></script>
<script src="/assets/vendor/php-email-form/validate.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- Template Main JS File -->
<script src="/assets/js/main.js"></script>
<script>
    $(function() {
        var url = window.location;
        // for single sidebar menu
        $('ul.nav-sidebar a').filter(function() {
            return this.href == url;
        }).addClass('active');

        // for sidebar menu and treeview
        $('ul.nav-treeview a').filter(function() {
                return this.href == url;
            }).parentsUntil(".nav-sidebar > .nav-treeview")
            .css({
                'display': 'block'
            })
            .addClass('menu-open').prev('a')
            .addClass('active');
    });
</script>


<script type="text/javascript">
    $(document).on('click', '#btn-delete', function(e) {
        e.preventDefault();
        var form = $(this).closest("form");
        Swal.fire({
            title: 'Apakah Kamu Ingin Menghapus Data Tersebut ?',
            text: "Kamu Tidak Akan Bisa Mengembalikan Data nya !",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#7367f0',
            cancelButtonColor: '#82868b',
            confirmButtonText: 'Ya, Hapus !'
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
            }
        })
    });
</script>

<script>
    (function() {
        'use strict';
        window.addEventListener('load', function() {
            var forms = document.getElementsByClassName('needs-validation');
            var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();
</script>
<script>
    $(".log-out").on('click', function(e) {
        e.preventDefault();
        Swal.fire({
            title: 'Kamu Ingin Keluar ?',
            text: "Kamu Tidak Akan Bisa Mengembalikannya !",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#7367f0',
            cancelButtonColor: '#82868b',
            confirmButtonText: 'Ya, Log Out !'
        }).then((result) => {
            if (result.isConfirmed) {
                $('#logging-out').submit()
            }
        })
    });
</script>