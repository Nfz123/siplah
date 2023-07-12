@extends('layouts.mainmenu')
@section('content')


<section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Daftar Perusahaan</h5>
          
              <!-- Table with stripped rows -->
              {{-- <a href="/perusahaancreate" type="button" class="btn btn-primary">+Tambah Perusahaan</a> --}}
              <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#verticalycentered">
                +Tambah Perusahaan
              </button>
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col" width="5%">No</th>
                    <th scope="col" width="10%">Perusahaan</th>
                    <th scope="col" width="20%">Penanggung Jawab</th>
                    <th scope="col" width="2%">Status</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($perusahaan as $usaha)
                  <tr>
                    <td>{{ $usaha->number }}</td>
                    <td>{{ $usaha->namaperusahaan }}</td>
                    <td>{{ $usaha->penanggungjawab }}</td>
                    <td class="table-active">{{$usaha->status }}</td>
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

    <div class="col-lg-4">

      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Input Perusahaan</h5>
          {{-- <p>Add <code>.modal-dialog-centered</code> to <code>.modal-dialog</code> to vertically center the modal.</p> --}}

          <!-- Vertically centered Modal -->
        
          <div class="modal fade" id="verticalycentered" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Input Data Perusahaan</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body"> 
                  <div class="card">
                  <div class="card-body">
                    {{-- <h5 class="card-title">Input Data Perusahaan</h5> --}}

                    <!-- Floating Labels Form -->
                    <form class="row g-3" id="form-data">
                      <div class="col-md-6">
                        <div class="form-floating">
                          <input type="text" class="form-control" name="number" id="floatingName" value="{{ $newNumber }}" readonly>
                          {{-- <label for="floatingName">Kode</label> --}}
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-floating">
                          <input type="text" class="form-control" id="floatingName" name="namaperusahaan" placeholder="Nama Perusahaan">
                          <label for="floatingName">Nama Perusahaan</label>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-floating">
                          <input type="text" class="form-control" id="floatingEmail" name="penanggungjawab" placeholder="Penanggung Jawab">
                          <label for="floatingName">Penanggung Jawab</label>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-floating mb-3">
                          <select class="form-select" id="floatingSelect"  name="status" aria-label="State">
                            <option selected>...</option>
                            <option value="1">Aktif</option>
                            <option value="2">Non Aktif</option>
                          </select>
                          <label for="floatingSelect">Status</label>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                      </div>
                    </form>

                  </div>
             </div>
                </div>
             
              </div>
            </div>
          </div><!-- End Vertically centered Modal-->

        </div>
      </div>
    </div>
    @endsection

    @push('styles')
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    @endpush
    @push('scripts')
        <script>
          $(document).ready(function() {
              $('#form-data').submit(function(event) {
                  event.preventDefault();
      
                  // Ambil nilai input form
                  var formData = $(this).serialize();
      
                  // Kirim data ke server menggunakan AJAX
                  $.ajax({
                      url: '{{ route('perusahaan.simpanData') }}',
                      type: 'POST',
                      data: formData,
                      success: function(response) {
                          // Tampilkan pesan sukses
                          alert(response.message);
                          
                          // Atur tindakan lainnya setelah sukses, seperti mereset form
                          $('#form-data')[0].reset();
                      },
                      error: function(xhr) {
                          // Tampilkan pesan error jika terjadi kesalahan
                          alert('Terjadi kesalahan. Silakan coba lagi.');
                      }
                  });
              });
          });
      </script>
      <<script>
        function editData(id) {
          // Mengambil data perusahaan berdasarkan ID menggunakan Ajax
          $.ajax({
            url: '/perusahaan/' + id + '/edit', // Ganti dengan URL endpoint Anda
            type: 'GET',
            success: function(response) {
              // Menampilkan modal dengan data perusahaan yang diambil
              $('#editModal').modal('show');
              $('#editModal').find('.modal-body').html(response);
            },
            error: function(xhr) {
              // Menangani kesalahan jika terjadi
              console.log(xhr.responseText);
            }
          });
        }
      </script>
      <script>
        function hapusData(id) {
          // Menampilkan konfirmasi dialog
          if (confirm("Apakah Anda yakin ingin menghapus perusahaan ini?")) {
            // Mengirim permintaan penghapusan ke server menggunakan Ajax
            $.ajax({
              url: '/perusahaan/' + id, // Ganti dengan URL endpoint Anda
              type: 'DELETE',
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // Jika menggunakan fitur proteksi CSRF di Laravel
              },
              success: function(response) {
                // Menangani respons setelah penghapusan berhasil
                console.log(response);
                // Lakukan pembaruan tabel atau aksi lain yang diinginkan
              },
              error: function(xhr) {
                // Menangani kesalahan jika terjadi
                console.log(xhr.responseText);
              }
            });
          }
        }
      </script>
      
@endpush
