 <!-- General JS Scripts -->
  <script src="{{asset('stisla/dist/assets/modules/jquery.min.js')}}"></script>
  <script src="{{asset('stisla/dist/assets/modules/popper.js')}}"></script>
  <script src="{{asset('stisla/dist/assets/modules/tooltip.js')}}"></script>
  <script src="{{asset('stisla/dist/assets/modules/bootstrap/js/bootstrap.min.js')}}"></script>
  <script src="{{asset('stisla/dist/assets/modules/nicescroll/jquery.nicescroll.min.js')}}"></script>
  <script src="{{asset('stisla/dist/assets/modules/moment.min.js')}}"></script>
  <script src="{{asset('stisla/dist/assets/js/stisla.js')}}"></script>
  
  <!-- JS Libraies -->
  <script src="{{asset('stisla/dist/assets/modules/datatables/datatables.min.js')}}"></script>
  <script src="{{asset('stisla/dist/assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js')}}"></script>
  <script src="{{asset('stisla/dist/assets/modules/datatables/Select-1.2.4/js/dataTables.select.min.js')}}"></script>
  <script src="{{asset('stisla/dist/assets/modules/jquery-ui/jquery-ui.min.js')}}"></script>
  <script src="{{asset('stisla/dist/assets/modules/select2/dist/js/select2.full.min.js')}}"></script>
  <script src="{{asset('stisla/dist/assets/modules/jquery-selectric/jquery.selectric.min.js')}}"></script>
  <script src="{{asset('stisla/dist/assets/modules/prism/prism.js')}}"></script>
  <script src="{{asset('stisla/dist/assets/modules/sweetalert/sweetalert.min.js')}}"></script>

  <!-- Page Specific JS File -->
  <script src="{{asset('stisla/dist/assets/js/page/modules-datatables.js')}}"></script>
  <script src="{{asset('stisla/dist/assets/js/page/forms-advanced-forms.js')}}"></script>
  <script src="{{asset('stisla/dist/assets/js/page/bootstrap-modal.js')}}"></script>
  
  <!-- Template JS File -->
  <script src="{{asset('stisla/dist/assets/js/scripts.js')}}"></script>
  <script src="{{asset('stisla/dist/assets/js/custom.js')}}"></script>

  <script>
    document.addEventListener("DOMContentLoaded", function () {
        var el = document.getElementById('flash-success');

        if (el) {
            var message = el.getAttribute('data-message');

            swal('Berhasil', message, 'success');
        }
    });
  </script>

  <script>
    document.addEventListener("DOMContentLoaded", function () {
        const buttons = document.querySelectorAll('.btn-edit');

        buttons.forEach(btn => {
            btn.addEventListener('click', function () {
                const id = this.dataset.id;
                const nama = this.dataset.nama;
                const satuan = this.dataset.satuan;
                const minimal = this.dataset.minimal;

                document.getElementById('edit_nama').value = nama;
                document.getElementById('edit_minimal').value = minimal;

                // set select
                document.getElementById('edit_satuan').value = satuan;

                // set action form
                document.getElementById('editForm').action = `/stok-bahan/${id}`;
            });
        });
    });
  </script>

  <script>
    document.addEventListener("DOMContentLoaded", function () {
        const buttons = document.querySelectorAll('.btn-edit-supplier');

        buttons.forEach(btn => {
            btn.addEventListener('click', function () {
                const id = this.dataset.id;
                const nama = this.dataset.nama;
                const nomor = this.dataset.nomor;

                document.getElementById('edit_nama').value = nama;
                document.getElementById('edit_nomor').value = nomor;

                // set action form
                document.getElementById('editForm').action = `/supplier/${id}`;
            });
        });
    });
  </script>

  <script>
    document.addEventListener("DOMContentLoaded", function () {
        const buttons = document.querySelectorAll('.btn-edit-gaji');

        buttons.forEach(btn => {
            btn.addEventListener('click', function () {
                const id = this.dataset.id;
                const nama = this.dataset.nama;
                const nominal = this.dataset.nominal;

                document.getElementById('edit_nama').value = nama;
                document.getElementById('edit_nominal').value = nominal;

                // set action form
                document.getElementById('editForm').action = `/pengeluaran-gaji/${id}`;
            });
        });
    });
  </script>

  <script>
    document.addEventListener("DOMContentLoaded", function () {
        const buttons = document.querySelectorAll('.btn-edit-operasional');

        buttons.forEach(btn => {
            btn.addEventListener('click', function () {
                const id = this.dataset.id;
                const nama = this.dataset.nama;
                const nominal = this.dataset.nominal;

                document.getElementById('edit_nama').value = nama;
                document.getElementById('edit_nominal').value = nominal;

                // set action form
                document.getElementById('editForm').action = `/pengeluaran-operasional/${id}`;
            });
        });
    });
  </script>

  <script>
    document.addEventListener("DOMContentLoaded", function () {
    const buttons = document.querySelectorAll('.btn-hapus');

    buttons.forEach(btn => {
            btn.addEventListener('click', function (e) {
                e.preventDefault();

                const id = this.dataset.id;

                swal({
                    title: 'Kamu yakin?',
                    text: 'Menghapus data bahan maka data tidak bisa di pulihkan kembali!',
                    icon: 'warning',
                    buttons: true,
                    dangerMode: true,
                }).then((willDelete) => {
                    if (willDelete) {

                        // set action form
                        const form = document.getElementById('form-hapus');
                        form.action = `/stok-bahan/${id}`;

                        form.submit(); // 🔥 kirim ke Laravel

                    } else {
                        swal('Data bahan tidak jadi terhapus!');
                    }
                });
            });
        });
    });

    document.addEventListener("DOMContentLoaded", function () {
    const buttons = document.querySelectorAll('.btn-hapus-supplier');

    buttons.forEach(btn => {
            btn.addEventListener('click', function (e) {
                e.preventDefault();

                const id = this.dataset.id;

                swal({
                    title: 'Kamu yakin?',
                    text: 'Menghapus data supplier maka data tidak bisa di pulihkan kembali!',
                    icon: 'warning',
                    buttons: true,
                    dangerMode: true,
                }).then((willDelete) => {
                    if (willDelete) {

                        // set action form
                        const form = document.getElementById('form-hapus');
                        form.action = `/supplier/${id}`;

                        form.submit(); // 🔥 kirim ke Laravel

                    } else {
                        swal('Data supplier tidak jadi terhapus!');
                    }
                });
            });
        });
    });

    document.addEventListener("DOMContentLoaded", function () {
    const buttons = document.querySelectorAll('.btn-hapus-gaji');

    buttons.forEach(btn => {
            btn.addEventListener('click', function (e) {
                e.preventDefault();

                const id = this.dataset.id;

                swal({
                    title: 'Kamu yakin?',
                    text: 'Menghapus data gaji maka data tidak bisa di pulihkan kembali!',
                    icon: 'warning',
                    buttons: true,
                    dangerMode: true,
                }).then((willDelete) => {
                    if (willDelete) {

                        // set action form
                        const form = document.getElementById('form-hapus');
                        form.action = `/pengeluaran-gaji/${id}`;

                        form.submit(); // 🔥 kirim ke Laravel

                    } else {
                        swal('Data gaji tidak jadi terhapus!');
                    }
                });
            });
        });
    });

    document.addEventListener("DOMContentLoaded", function () {
    const buttons = document.querySelectorAll('.btn-hapus-operasional');

    buttons.forEach(btn => {
            btn.addEventListener('click', function (e) {
                e.preventDefault();

                const id = this.dataset.id;

                swal({
                    title: 'Kamu yakin?',
                    text: 'Menghapus data operasional maka data tidak bisa di pulihkan kembali!',
                    icon: 'warning',
                    buttons: true,
                    dangerMode: true,
                }).then((willDelete) => {
                    if (willDelete) {

                        // set action form
                        const form = document.getElementById('form-hapus');
                        form.action = `/pengeluaran-operasional/${id}`;

                        form.submit(); // 🔥 kirim ke Laravel

                    } else {
                        swal('Data operasional tidak jadi terhapus!');
                    }
                });
            });
        });
    });

   

    $("#hapus-kategori").click(function() {
    swal({
        title: 'Kamu yakin?',
        text: 'Menghapus data kategori maka data tidak bisa di pulihkan kembali!',
        icon: 'warning',
        buttons: true,
        dangerMode: true,
        })
        .then((willDelete) => {
        if (willDelete) {
        swal('Data kategori berhasil terhapus', {
            icon: 'success',
        });
        } else {
        swal('Data kategori tidak jadi terhapus!');
        }
        });
    });

    $("#hapus-menu").click(function() {
    swal({
        title: 'Kamu yakin?',
        text: 'Menghapus data menu maka data tidak bisa di pulihkan kembali!',
        icon: 'warning',
        buttons: true,
        dangerMode: true,
        })
        .then((willDelete) => {
        if (willDelete) {
        swal('Data menu berhasil terhapus', {
            icon: 'success',
        });
        } else {
        swal('Data menu tidak jadi terhapus!');
        }
        });
    });
  </script>