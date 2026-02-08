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
    $("#hapus-bahan").click(function() {
    swal({
        title: 'Kamu yakin?',
        text: 'Menghapus data bahan maka data tidak bisa di pulihkan kembali!',
        icon: 'warning',
        buttons: true,
        dangerMode: true,
        })
        .then((willDelete) => {
        if (willDelete) {
        swal('Data bahan berhasil terhapus', {
            icon: 'success',
        });
        } else {
        swal('Data bahan tidak jadi terhapus!');
        }
        });
    });

    $("#hapus-suplier").click(function() {
    swal({
        title: 'Kamu yakin?',
        text: 'Menghapus data suplier maka data tidak bisa di pulihkan kembali!',
        icon: 'warning',
        buttons: true,
        dangerMode: true,
        })
        .then((willDelete) => {
        if (willDelete) {
        swal('Data suplier berhasil terhapus', {
            icon: 'success',
        });
        } else {
        swal('Data suplier tidak jadi terhapus!');
        }
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