
@extends('layouts.mainmenu')
@section('content')
<section class="section">
    <div class="row">
      @foreach ($trans1 as $trans)
      <div class="col-lg-6">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Daftar Sekolah  {{$trans->namawilayah}}</h5>
            <div class="d-flex px-xxl-4 px-lg-2 p-4 gap-xxl-3 gap-lg-1 gap-3 justify-content-between">
                <div class="d-flex">
                    <div class="me-2">
                        <span class="badge bg-label-primary p-1"><i class="bx bx-credit-card text-primary"></i></span>
                    </div>
                    <div class="d-flex flex-column">
                        <small>Total invoice</small>
                        <h6 class="mb-0">Rp. 0</h6>
                    </div>
                </div>
                <div class="d-flex">
                    <div class="me-2">
                        <span class="badge bg-label-info p-1"><i class="bx bx-wallet text-info"></i></span>
                    </div>
                    <div class="d-flex flex-column">
                        <small>Total pinjaman tunai</small>
                        <h6 class="mb-0">Rp. 0</h6>
                    </div>
                </div>
            </div>
            <!-- Default Table -->
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">No</th>
                  <th scope="col">Nama Sekolah</th>
                  <th scope="col">Total Invoice</th>
                  <th scope="col">Pinjam Tunai</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($trans->sekolah1 as $sk)
                  <tr>
                    <td>{{ $sk->autonumber }}</td>
                    <td><a href="/laporaninvoice">
                      {{$sk->namasekolah}}</a></td>
                    <td>@if ($sk->transaksi == NULL)
                        
                    @else
                        {{$sk->transaksi->totalinvoice}}
                    @endif</td>
                    <td>{{ $sk->pembayaran }}</td>
          
                    {{-- <td class="table-active">{{$usaha->status }}</td> --}}
                  </tr>
                @endforeach
              </tbody>
            </table>
            <!-- End Default Table Example -->
          </div>
        </div>

      </div>
      @endforeach

      {{-- penjumlahan datana --}}
{{-- @foreach ($trans1 as $item)
    <p>wilayah : {{$item->namawilayah}}</p>
    <table class="table">
      @foreach ($item->Sekolah1 as $sk)
          <tr>
            <th>{{$sk->namasekolah}}</th>
            <th>{{$trans1->totalinvoice}}</th>
          </tr>
      @endforeach
    </table>
@endforeach --}}
{{-- @foreach ($transaksis as $transaksi)
    <p>wilayah : {{$transaksi->id}}/{{$transaksi->wilayah->namawilayah}}/{{$transaksi->wilayah->namawilayah}}</p>
    <table class="table">
      @foreach ($sekolahs as $sk)
          <tr>
            <th>{{$sk->namasekolah}}</th>
            <th>{{$transaksi->totalinvoice}}</th>
          </tr>
      @endforeach
    </table>
@endforeach --}}



      {{-- <div class="col-lg-6">


      </div> --}}
      
    </div>
  </section>
  @endsection