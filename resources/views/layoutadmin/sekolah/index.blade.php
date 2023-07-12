@extends('layouts.mainmenu')
@section('content')


<section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Daftar Sekolah</h5>
          
              <!-- Table with stripped rows -->
              <a href="/sekolahbaru" type="button" class="btn btn-primary">+Tambah Sekolah</a>
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col" width="2">AKSI</th>
                    <th scope="col" width="5%">KODE</th>
                    <th scope="col" width="10%">SEKOLAH</th>
                    <th scope="col" width="20%">WILAYAH</th>
                    {{-- <th scope="col" width="2%">Status</th> --}}
                  </tr>
                </thead>
                <tbody>
                  @foreach ($sekolah as $skl)
                  <tr>
                    <td>
                     
                      <button type="button" class="btn btn-warning btn-sm"  onclick="editData({{ $skl->id }})"><i class="bi bi-pencil-square"></i></button>
                      <button type="button" class="btn btn-danger btn-sm delete-button" onclick="hapusData({{ $skl->id }})"><i class="bi bi-trash"></i></button>
                  </td>
                    <td>{{ $skl->number }}</td>
                    <td>{{ $skl->namasekolah }}</td>
                    <td>{{ $skl->Wilayah->namawilayah }}</td>
          
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
                            <h5 class="modal-title" id="editModalLabel">Edit Sekolah</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form id="editForm" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="sekolahInput">Sekolah</label>
                                    <input type="text" class="form-control" id="sekolahInput" name="namasekolah" required>
                                </div>
                                <div class="form-group">
                                  <label for="sekolahInput">Wilayah</label>
                                  <select id="kodewilayahInput" class="form-select" name="kodewilayah">
                                    <option selected>Choose...</option>
                                    @foreach($wilayah as $kat)
                                    <option value="{{ $kat->number }}">{{ $kat->namawilayah }}</option>
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
                      url: '/sekolah/hapus/' + id,
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
            url: '/sekolah/edit/' + id,
            type: 'GET',
            success: function(response) {
              // Tindakan yang dilakukan setelah data diterima
              $('#editModal').modal('show');
              $('#editForm').attr('action', '/sekolah/update/' + id);
              $('#sekolahInput').val(response.namasekolah); // Use "response.namasekolah" instead of "response.sekolah"
              $('#kodewilayahInput').val(response.kodewilayah);
            },
            error: function(xhr) {
              // Tindakan yang dilakukan jika terjadi kesalahan
              alert('Terjadi kesalahan. Data tidak dapat diedit.');
            }
          });
        }

        </script>
        
    @endpush