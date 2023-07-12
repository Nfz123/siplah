
@extends('layouts.mainmenu')
@section('content')
<div class="card">
  <div class="card-body">
    <h5 class="card-title">Default Tabs</h5>

    <!-- Default Tabs -->
    <ul class="nav nav-tabs" id="myTab" role="tablist">
      <li class="nav-item" role="presentation">
        <button class="nav-link" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="false" tabindex="-1">Home</button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link active" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="true">Profile</button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false" tabindex="-1">Contact</button>
      </li>
    </ul>
    <div class="tab-content pt-2" id="myTabContent">
      <div class="tab-pane fade" id="home" role="tabpanel" aria-labelledby="home-tab">
        <div class="col-lg-12 mb-3">
          <div class="card">
              <div class="card-body">
                  <div id="outer-kwitansi">
                      <div id="doc-target-kwitansi">
                          <table width="100%" class="table table-borderless kwitansi">
                              <tbody><tr>
                                  <td colspan="2" rowspan="2">
                                      <img src="{{ URL::asset($transaksi->perusahaan->slash)}}" width="160">
                                  </td>
                                  <td style="font-size:14px;" colspan="3">
                                      <div style="font-size: 16px; color: #000;"><b>
                                             {{$transaksi->perusahaan->namaperusahaan}}                       </b>
                                      </div>
                                      Kampung Solong RT 01 RW 01 Desa Tipar Kec. Jambe Kab. Tangerang <br> Telepon : 08777 16 99 0 66 Email : siplahnet@gmail.com
                                  </td>
      
                              </tr>
                              <tr>
                                  <td align="center">
                                      <p class="p-0 m-0" style="color: #000; font-size: 20px;"><b>K W I T A N S I</b></p>
                                      <p class="p-0 m-0" style="color: #000; font-size: 12px;"><b>No : {{$transaksi->autonumber}}</b></p>
                                  </td>
                                  <td></td>
                                  <td></td>
      
                              </tr>
                              <tr style="border: 1px solid #000;">
                                  <td width="28%"><i>Telah terima dari</i></td>
                                  <td width="1%">:</td>
                                  <td width="67%" colspan="3"><i>SD N JEUNGJING I</i></td>
                              </tr>
                              <tr style="border: 1px solid #000;">
                                  
                                  <td><i>Uang sejumlah</i></td>
                                  <td>:</td>
                                  @php
                                      function terbilang($number) {
                                          $terbilang = [
                                              'rupiah', 'satu', 'dua', 'tiga', 'empat', 'lima', 'enam', 'tujuh', 'delapan', 'sembilan', 'sepuluh', 'sebelas',
                                              'dua belas', 'tiga belas', 'empat belas', 'lima belas', 'enam belas', 'tujuh belas', 'delapan belas', 'sembilan belas'
                                          ];
                                        
                                          if ($number < 20) {
                                              return $terbilang[$number];
                                          } elseif ($number < 100) {
                                              return $terbilang[floor($number / 10)] . ' puluh ' . $terbilang[$number % 10];
                                          } elseif ($number < 200) {
                                              return 'seratus ' . terbilang($number - 100);
                                          } elseif ($number < 1000) {
                                              return $terbilang[floor($number / 100)] . ' ratus ' . terbilang($number % 100);
                                          } elseif ($number < 2000) {
                                              return 'seribu ' . terbilang($number - 1000);
                                          } elseif ($number < 1000000) {
                                              return terbilang(floor($number / 1000)) . ' ribu ' . terbilang($number % 1000);
                                          } elseif ($number < 1000000000) {
                                              return terbilang(floor($number / 1000000)) . ' juta ' . terbilang($number % 1000000);
                                          } elseif ($number < 1000000000000) {
                                              return terbilang(floor($number / 1000000000)) . ' miliar ' . terbilang($number % 1000000000);
                                          } else {
                                              return 'Angka terlalu besar';
                                          }
                                      }
      
                                      $totalInvoice = $transaksi->totalinvoice;
                                      $terbilang = terbilang($totalInvoice);
                                  @endphp
      
                                  {{-- <p>Total Invoice: {{ $transaksi->totalinvoice }}</p>
                                  <p>Terbilang: {{ $terbilang }}</p> --}}
      
                                  <td colspan="3"><i>{{ $terbilang}}</i></td>
                              </tr>
                              <tr style="border: 1px solid #000;">
                                  <td><i>Pembayaran untuk</i></td>
                                  <td>:</td>
                                  <td colspan="3"><i>ATK</i></td>
                              </tr>
                              <tr>
                                  <td colspan="5">
                                      <div class="parallelogram">
                               {{$formattedAmount = number_format(($transaksi->totalinvoice), 0, ',', '.')}}               </div>
                                  </td>
                              </tr>
      
                          </tbody></table>
                          <table width="100%" class="table table-borderless" style="font-size:12px; color: #000; font-weight:bold;">
                              <tbody><tr>
                                  <td class="p-2" colspan="6"></td>
                              </tr>
                              <tr>
                                  <td style="text-align: center;" colspan="4">Mengetahui</td>
                                  <td style="text-align: center;" colspan="2">Tangerang,..........................</td>
                              </tr>
                              <tr>
                                  <td style="text-align: center;" colspan="2" class="p-0">Kepala Sekolah <br> SD N JEUNGJING I</td>
                                  <td style="text-align: center;" colspan="2" class="p-0">Bendahara</td>
                                  <td style="text-align: center;" colspan="2" class="p-0">PT. SIPLAH NET INDONESIA</td>
                              </tr>
                              <tr>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                              </tr>
                              <tr>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                              </tr>
                            
                              <tr>
                                  <td style="text-align: center;" colspan="2">_________________</td>
                                  <td style="text-align: center;" colspan="2">_________________</td>
                                  <td style="text-align: center;" colspan="2"><u>{{$transaksi->perusahaan->penanggungjawab}}</u></td>
                              </tr>
                          </tbody></table>
      
                      </div>
                  </div>
              </div>
          </div>
          {{-- <button class="btn btn-primary" id="btnCetak" data-id="{{$transaksi->id}}">Cetak Kwitansi</button> --}}
      </div>
      <a class="btn btn-xs rounded-0" id="printpagebutton"
                                                  onclick="printpage()">
                                                  <i class="fas fa-print">
                                                  </i> Print</a>
      
                                                  <script>
                                                      function printpage() {
                                                          //Get the print button and put it into a variable
                                                          var printButton = document.getElementById("printpagebutton");
                                                          // var excelButton = document.getElementById("excelbutton");
                                                          //Set the print button visibility to 'hidden' 
                                                          printButton.style.visibility = 'hidden';
                                                          // excelButton.style.visibility = 'hidden';
                                                          //Print the page content
                                                          window.print()
                                                          printButton.style.visibility = 'visible';
                                                          // excelButton.style.visibility = 'visible';
                                                      }
                                                  </script>
      </body>
      </html>
      </div>
      <div class="tab-pane fade active show" id="profile" role="tabpanel" aria-labelledby="profile-tab">
        Nesciunt totam et. Consequuntur magnam aliquid eos nulla dolor iure eos quia. Accusantium distinctio omnis et atque fugiat. Itaque doloremque aliquid sint quasi quia distinctio similique. Voluptate nihil recusandae mollitia dolores. Ut laboriosam voluptatum dicta.
      </div>
      <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
        Saepe animi et soluta ad odit soluta sunt. Nihil quos omnis animi debitis cumque. Accusantium quibusdam perspiciatis qui qui omnis magnam. Officiis accusamus impedit molestias nostrum veniam. Qui amet ipsum iure. Dignissimos fuga tempore dolor.
      </div>
    </div><!-- End Default Tabs -->

  </div>
</div>
@endsection