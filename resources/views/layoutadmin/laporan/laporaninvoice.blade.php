
@extends('layouts.mainmenu')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
<div class="col-lg-12 mb-4">
<h4 class="fw-bold "><a href="?"><span class="text-muted fw-light">Dashboard /</span></a>
</div>
{{-- <p>Cari Data Wilayah :</p>
	<form action="/pegawai/cari" method="GET">
		<input type="text" name="cari" placeholder="Cari Pegawai .." value="{{ old('cari') }}">
		<input type="submit" value="CARI">
	</form> --}}
		
	<br/>
<div class="col-lg-12 mb-3">
<div class="card">
    <div class="card-body">
        <div class="table-responsive text-nowrap">
            <table class="table text-nowrap">
                <thead>
                    <tr>
                        <th>Nomor Invoice</th>
                        <th>Nama Sekolah</th>
                        <th>Nominal</th>
                        <th>PPN</th>
                        <th>Cashback</th>
                        <th>biaya Admin</th>
                        <th>Potongan</th>
                        <th>Total titipan</th>
                        <th>Harga Dasar</th>
                        <th>Margin</th>
                        <th>Status</th>
                        <th>Pembayaran</th>
                        <th>Perusahaan</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0" style="font-size: 16px;">
                  @php
                       $totalMargin = 0; // variabel untuk menyimpan total margin
                  @endphp
                    @foreach ($transaksi as $trans)
                    <tr>

                     <td>
                      
                      <div class="btn-group-vertical" role="group" aria-label="Vertical button group">
                        <div class="btn-group" role="group">
                          <button type="button" class="btn btn-info dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                            Cetak
                          </button>
                          <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="laporanspk/{{$trans->id}}">SPK</a></li>
                            <li><a class="dropdown-item" href="laporanspo/{{$trans->id}}">SPO</a></li>
                            <li><a class="dropdown-item" href="laporanbast/{{$trans->id}}">BAST</a></li>
                            <li><a class="dropdown-item" href="editinvoice/{{$trans->id}}">KWITANSI</a></li>
                            <li><a class="dropdown-item" href="laporaninv/{{$trans->id}}">INVOICE</a></li>
                          </ul>
                        </div>
                      </div>
                      
                      {{-- <a href="editinvoice/{{$trans->id}}" class="col-sm-2 col-form-label">SPK</a>
                      <a href="laporanspo/{{$trans->id}}" class="btn btn-warning btn-sm">SPO</i></a>
                      <a href="editinvoice/{{$trans->id}}" class="btn btn-warning btn-sm"></i>KWITANSI</a> --}}
                      {{$trans->autonumber}}
                      </td>
                      <td>{{$trans->Sekolah->namasekolah}}</td>
                      <td>
                        {{$formattedAmount = number_format(($trans->totalinvoice), 0, ',', '.')}}
                      </td>
                      <td>{{$formattedAmount = number_format(($trans->ppn), 0, ',', '.')}}</td>
                      <td>{{$formattedAmount = number_format(($trans->cashback), 0, ',', '.')}}</td>
                      <td>{{$formattedAmount = number_format(($trans->biayaadmin), 0, ',', '.')}}</td>
                      <td>{{$formattedAmount = number_format(($trans->potongan), 0, ',', '.')}}</td>
                      <td>{{$formattedAmount = number_format(($trans->ttitipan), 0, ',', '.')}}</td>
                      <td>{{$formattedAmount = number_format(($trans->hargadasar), 0, ',', '.')}} 
                        <button type="button" class="btn btn-warning btn-sm"  onclick="editData({{ $trans->id }})"><i class="bi bi-pencil-square"></i></button>
            
                      <td>
                       @php
                        $totalharga = ($trans->totalinvoice - $trans->ppn - $trans->cashback - $trans->biayaadmin - $trans->potongan - $trans->ttitipan - $trans->hargadasar);
                        // $hargadasar = (int) $trans->hargadasar; // konversi ke tipe data integer
                        $margin = ($totalharga - $trans->hargadasar);
                        $formattedMargin = number_format($margin, 0, ',', '.');
                        $totalMargin += $margin; // tambahkan margin pada totalMargin
                        @endphp
                        {{$formattedMargin}}
                      </td>
                      <td>{{$trans->status}}</td>
                      <td>{{$trans->pembayaran}}</td>
                      <td>{{$trans->Perusahaan->namaperusahaan}}</td>
                    </tr>
                    @endforeach
                    <tr>
                      <td colspan="9" align="right"><b>TOTAL</b></td>
                      <td><b>{{  $formattedAmount = number_format($totalMargin, 0, ',', '.') }}</b></td>
                    </tr>
                </tbody>
              </table>
                <!-- Add this modal structure after the table -->
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
                                    <label for="hargadasarInput">Hargadasar</label>
                                    <input type="text" class="form-control" id="hargadasarInput" name="hargadasar" required>
                                </div>
                                <div class="form-group">
                                  <button type="submit" class="btn btn-primary">Simpan</button>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
              </div>


      {{-- <p>Total Harga: {{ $totalHarga - $totalModal }}</p> // Display the updated totalHarga outside the loop --}}
        </div>
    </div>
</div>
<!--/ Bordered Table -->
</div>
</div>
{{-- <button id="printButton" class="btn btn-sm btn-danger mb-3">Print</button> --}}

@endsection
@push('script')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
{{-- <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script> --}}  
<!-- Update the existing script tag with this code -->
<script>
  function editData(id) {
      $.ajax({
          url: '/invoice/edit/' + id,
          type: 'GET',
          success: function (response) {
              // Tindakan yang dilakukan setelah data diterima
              $('#editModal').modal('show');
              $('#editForm').attr('action', '/invoice/update/' + id);
              $('#hargadasarInput').val(response.hargadasar);
          },
          error: function (xhr) {
              // Tindakan yang dilakukan jika terjadi kesalahan
              alert('Terjadi kesalahan. Data tidak dapat diedit.');
          }
      });
  }
</script>

@endpush
  
  
  
  
