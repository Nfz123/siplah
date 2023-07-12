@extends('layouts.mainmenu')
@section('content')


<section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Daftar Wilayah</h5>
          
              <!-- Table with stripped rows -->
              <a href="/wilayahbaru" type="button" class="btn btn-primary">+Tambah Wilayah</a>
              <table class="table datatable">
                <thead>
                    <tr>
                        <th scope="col" width="2%">AKSI</th>
                        <th scope="col" width="5%">KODE</th>
                        <th scope="col" width="10%">WILAYAH</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($wilayah as $wl)
                    <tr>
                        <td>
                            <button type="button" class="btn btn-warning btn-sm"><i class="bi bi-pencil-square"></i></button>
                            <button type="button" class="btn btn-danger btn-sm delete-button" data-id="{{$wl->id}}"><i class="bi bi-trash"></i></button>
                        </td>
                        <td>{{ $wl->number }}</td>
                        <td>{{ $wl->namawilayah }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
              <!-- End Table with stripped rows -->

            </div>
          </div>

        </div>
      </div>
    </section>
    @endsection
   @push('script')
   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
   <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
   <script>
    // Menggunakan event delegation untuk meng-handle tombol hapus
    document.addEventListener('click', function (event) {
        if (event.target.matches('.delete-button')) {
            var id = event.target.dataset.id;

            Swal.fire({
                title: 'Konfirmasi',
                text: 'Apakah Anda yakin ingin menghapus data ini?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya',
                cancelButtonText: 'Tidak',
            }).then((result) => {
                if (result.isConfirmed) {
                    // Lakukan proses penghapusan data menggunakan AJAX atau metode lainnya
                    // Contoh penggunaan AJAX dengan jQuery
                    $.ajax({
                        url: '/hapus-data',
                        type: 'POST',
                        data: {id: id},
                        success: function(response) {
                            // Data berhasil dihapus
                            Swal.fire(
                                'Berhasil',
                                'Data telah dihapus.',
                                'success'
                            );
                            // Lakukan perbarui tampilan tabel jika diperlukan
                        },
                        error: function(xhr, status, error) {
                            // Terjadi kesalahan saat menghapus data
                            Swal.fire(
                                'Error',
                                'Terjadi kesalahan saat menghapus data.',
                                'error'
                            );
                        }
                    });
                }
            });
        }
    });
</script>
   @endpush