@extends('layouts.mainmenu')
@section('content')


<section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Daftar Kategori</h5>
          
              <!-- Table with stripped rows -->
              <a href="/kategoricreate" type="button" class="btn btn-primary">+Tambah Kategori</a>
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col" width="5%">AKSI</th>
                    <th scope="col" width="5%">KODE</th>
                    <th scope="col" width="10%">KATEGORI</th>
                    <th scope="col" width="20%">PERUSAHAAN</th>
                    {{-- <th scope="col" width="2%">Status</th> --}}
                  </tr>
                </thead>
                <tbody>
                  @foreach ($kategori as $kt)
                  <tr>
                    <td>
                     
                        <button type="button" class="btn btn-warning btn-sm"  onclick="editData({{ $kt->id }})"><i class="bi bi-pencil-square"></i></button>
                        <button type="button" class="btn btn-danger btn-sm delete-button" onclick="hapusData({{ $kt->id }})"><i class="bi bi-trash"></i></button>
                    </td>
                    <td>{{ $kt->number }}</td>
                    <td>{{ $kt->kategori }}</td>
                    <td>{{ $kt->Perusahaan->namaperusahaan }}</td>
                   
                  
                    {{-- <td class="table-active">{{$usaha->status }}</td> --}}
                  </tr>
                  @endforeach
                </tbody>
              </table>
              <!-- End Table with stripped rows -->
              <!-- Edit Modal -->
              <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editModalLabel">Edit Data</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form id="editForm" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="kategoriInput">Kategori</label>
                                    <input type="text" class="form-control" id="kategoriInput" name="kategori" required>
                                </div>
                                <div class="form-group">
                                  <label for="kategoriInput">Perusahaan</label>
                                  <select id="inputState" class="form-select" name="kodeperusahaan">
                                    <option selected>Choose...</option>
                                    @foreach($perusahaan as $kat)
                                    <option value="{{ $kat->number }}">{{ $kat->namaperusahaan }}</option>
                                    @endforeach
                                  </select>
                                </div>
                                <div class="form-group">
                                  <button type="submit" class="btn btn-primary">Simpan</button>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
         

    </section>
    @endsection
    @push('script')
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
          function hapusData(id) {
              if (confirm("Anda yakin ingin menghapus data ini?")) {
                  $.ajax({
                      url: '/data/hapus/' + id,
                      type: 'DELETE',
                      data: {
                          _token: '{{ csrf_token() }}',
                      },
                      success: function (response) {
                          // Tindakan yang dilakukan setelah data dihapus
                          alert('Data berhasil dihapus.');
                          location.reload(); // Memuat ulang halaman
                      },
                      error: function (xhr) {
                          // Tindakan yang dilakukan jika terjadi kesalahan
                          alert('Terjadi kesalahan. Data gagal dihapus.');
                      }
                  });
              }
          }
        </script>
        <script>
          function editData(id) {
              $.ajax({
                  url: '/kategori/edit/' + id,
                  type: 'GET',
                  success: function (response) {
                      // Tindakan yang dilakukan setelah data diterima
                      $('#editModal').modal('show');
                      $('#editForm').attr('action', '/data/update/' + id);
                      $('#kategoriInput').val(response.kategori);
                      $('#kodeperusahaanInput').val(response.kodeperusahaan);
                  },
                  error: function (xhr) {
                      // Tindakan yang dilakukan jika terjadi kesalahan
                      alert('Terjadi kesalahan. Data tidak dapat diedit.');
                  }
              });
          }
      </script>
    @endpush