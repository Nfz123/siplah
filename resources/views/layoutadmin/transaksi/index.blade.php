@extends('layouts.mainmenu')
@section('content')


<section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Daftar Pesanan</h5>
          
              <!-- Table with stripped rows -->
              <a href="/pilih" type="button" class="btn btn-primary">+Tambah Pesanan</a>
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col" width="5%">AKSI</th>
                    <th scope="col" width="5%">NOMOR</th>
                    <th scope="col" width="10%">SEKOLAH</th>
                    <th scope="col" width="20%">TOTAL INVOICE</th>
                    <th scope="col" width="20%">STATUS</th>
                    <th scope="col" width="20%">PERUSAHAAN</th>
                    <th scope="col" width="20%">DIBUAT PADA</th>
                    {{-- <th scope="col" width="2%">Status</th> --}}
                  </tr>
                </thead>
                <tbody>
                  @foreach ($transaksi as $kt)
                  <tr>
                    <td> <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                        <button type="button" class="btn btn-danger btn-sm">Hapus</button>
                        <button type="button" class="btn btn-warning btn-sm">Detail</button>
                        <button type="button" class="btn btn-success btn-sm">Ubah Status</button>
                      </div>
                    </td>
                    <td>{{ $kt->autonumber }}</td>
                    <td>{{ $kt->Sekolah->namasekolah }}</td>
                    <td>{{ $kt->totalinvoice }}</td>
                    <td>{{ $kt->status }}</td>
                    <td>{{ $kt->Perusahaan->namaperusahaan }}</td>
                    <td>{{ $kt->created_at }}</td>
                    
          
                    {{-- <td class="table-active">{{$usaha->status }}</td> --}}
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