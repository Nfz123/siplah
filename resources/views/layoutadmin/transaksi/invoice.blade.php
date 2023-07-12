@extends('layouts.mainmenu')
@section('content')

<section class="section dashboard">
<div class="row">

  <!-- Left side columns -->
<div class="col-lg-12">
<div class="row">
<section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Create Pesanan</h5>
              <form action="{{ route('transaksi.store') }}" method="POST" id="transaksiForm">
              @csrf
                @csrf
              <div class="row mb-3">
                <label for="inputText"   class="col-sm-2 col-form-label" >Nomor Transaksi</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control"name="autonumber" value="{{ $doku }}" readonly>
                </div>
              </div>
              <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label">Sekolah</label>
                <div class="col-sm-10">
                <select id="inputState" class="form-select" name="kodesekolah">
                  <option selected>Choose...</option>
                  @foreach($sekolah as $item)
                  <option value="{{ $item->number }}">{{ $item->namasekolah }}</option>
                  @endforeach
                </select>
                </div>
              </div>
              <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label">Kategori</label>
                <div class="col-sm-10">
                <select id="inputState" class="form-select" name="kodekategori">
                  <option selected>Choose...</option>
                  @foreach($kategori as $item)
                  <option value="{{ $item->number }}">{{ $item->kategori }}</option>
                  @endforeach
                </select>
                </div>
              </div>

              <div class="row mb-3">
                <label for="inputText"   class="col-sm-2 col-form-label" >Nominal</label>
                <div class="col-sm-10">
                  <input type="text"   name="totalinvoice" class="form-control text-danger" name="invoice">
                </div>
              </div>
              <div class="row mb-3">
                <label for="inputText"   class="col-sm-2 col-form-label" >PPN</label>
                <div class="col-sm-10">
                  <input type="text"   name="ppn" class="form-control text-danger" name="invoice">
                </div>
              </div>
              <div class="row mb-3">
                <label for="inputText"   class="col-sm-2 col-form-label" >Cashback</label>
                <div class="col-sm-10">
                  <input type="text"   name="cashback" class="form-control text-danger" name="invoice">
                </div>
              </div>
              <div class="row mb-3">
                <label for="inputText"   class="col-sm-2 col-form-label" >Biaya admin</label>
                <div class="col-sm-10">
                  <input type="text"   name="biayaadmin" class="form-control text-danger" name="invoice">
                </div>
              </div>
              <div class="row mb-3">
                <label for="inputText"   class="col-sm-2 col-form-label" >Potongan</label>
                <div class="col-sm-10">
                  <input type="text"   name="potongan" class="form-control text-danger" name="invoice">
                </div>
              </div>
              <div class="row mb-3">
                <label for="inputText"   class="col-sm-2 col-form-label" >Total titipan</label>
                <div class="col-sm-10">
                  <input type="text"   name="ttitipan" class="form-control text-danger">
                  <input type="hidden"   name="hargadasar" value="0" class="form-control text-danger">
                </div>
              </div>
              <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label">Status</label>
                <div class="col-sm-10">
                <select id="input" class="form-select" name="status" >
                  <option selected>Choose...</option>
                  {{-- @foreach($perusahaan as $perus) --}}
                  <option value="TUNAI">Sudah Bayar</option>
                  <option value="TRANSFER">Belum Bayar</option>
                  {{-- @endforeach --}}
                </select>
                </div>
              </div>
              <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label">Pembayaran</label>
                <div class="col-sm-10">
                <select id="inputState" class="form-select" name="pembayaran">
                  <option selected>Choose...</option>
                  {{-- @foreach($perusahaan as $perus) --}}
                  <option value="TUNAI">TUNAI</option>
                  <option value="TRANSFER">TRANSFER</option>
                  <option value="SIPLAH BLIBLI">SIPLAH BLIBLI</option>
                  <option value="SIPLAH TELKOM">SIPLAH TELKOM</option>
                  <option value="SIPLAH GRAMEDIA">SIPLAH GRAMEDIA</option>
                  {{-- @endforeach --}}
                </select>
                </div>
              </div>
             
              <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label">Perusahaan</label>
                <div class="col-sm-10">
                <select id="inputState" class="form-select" name="kodeperusahaan">
                  <option selected>Choose...</option>
                  @foreach($perusahaan as $kat)
                  <option value="{{ $kat->number }}">{{ $kat->namaperusahaan }}</option>
                  @endforeach
                </select>
                </div>
              </div>
              <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label">Wilayah</label>
                <div class="col-sm-10">
                <select id="inputState" class="form-select" name="kodewilayah">
                  <option selected>Choose...</option>
                  @foreach($wilayah as $wl)
                  <option value="{{ $wl->number }}">{{ $wl->namawilayah }}</option>
                  @endforeach
                </select>
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                    <button type="button" class="btn btn-secondary btn-sm">Batal</button>
                </div>
              </div>
              {{-- <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label">Perusahaan</label>
                <div class="col-sm-10">
                <select id="inputState" class="form-select">
                  <option selected>Choose...</option>
                  @foreach($perusahaan as $perus)
                  <option value="{{ $perus->number }}">{{ $perus->namaperusahaan }}</option>
                  @endforeach
                </select>
                </div>
              </div> --}}

            </form>
            </div>

            
          </div>
          
        </div>
        
      </div>
      
    </section>
    @endsection
    @push('script')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  // Validate form fields before submission
  $(document).ready(function() {
    $('#transaksiForm').submit(function(event) {
      event.preventDefault();

      // Get the form data
      var formData = $(this).serializeArray();
      var isValid = true;

      // Iterate over the form fields
      $.each(formData, function(index, field) {
        var value = field.value;
        var fieldName = field.name;

        // Perform validation for specific fields
        if (fieldName === 'totalinvoice' || fieldName === 'ppn' || fieldName === 'cashback' || fieldName === 'biayaadmin' || fieldName === 'potongan' || fieldName === 'ttitipan') {
          if (!isNumeric(value)) {
            isValid = false;
            showAlert(fieldName);
          }
        }
      });

      // If all fields are valid, submit the form
      if (isValid) {
        this.submit();
      }
    });

    // Function to check if a value is numeric
    function isNumeric(value) {
      return /^\d+$/.test(value);
    }

    // Function to show alert for a field with invalid input
    function showAlert(fieldName) {
      var fieldNameFormatted = fieldName.charAt(0).toUpperCase() + fieldName.slice(1);
      alert(fieldNameFormatted + " mohon maaf data harus di isi numeric.");
    }
  });
</script>
        <script>
          // Validate form fields before submission
          document.getElementById('transaksiForm').addEventListener('submit', function(event) {
            var form = this;
            var inputs = form.querySelectorAll('input, select');
            var isValid = true;

            for (var i = 0; i < inputs.length; i++) {
              var input = inputs[i];

              if (!input.value) {
                isValid = false;
                input.classList.add('is-invalid');
              } else {
                input.classList.remove('is-invalid');
              }
            }

            if (!isValid) {
              event.preventDefault();
            }
          });
        </script>
    @endpush
    {{-- @push('script')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
      <script>
          $(document).ready(function(){
              // Add new row
              $("#add-row").click(function(){
                  var firstname = $("#firstname").val();
                  var lastname = $("#lastname").val();
                  var email = $("#email").val();
                  $(".table tbody tr").last().after(
                      '<tr class="fadetext">'+
                          '<td><input type="checkbox" id="select-row"></td>'+
                          '<td>'+firstname+'</td>'+
                          '<td>'+lastname+'</td>'+
                          '<td>'+email+'</td>'+
                      '</tr>'
                  );
              })
  
              // Select all checkbox
              $("#select-all").click(function(){
                  var isSelected = $(this).is(":checked");
                  if(isSelected){
                      $(".table tbody tr").each(function(){
                          $(this).find('input[type="checkbox"]').prop('checked', true);
                      })
                  }else{
                      $(".table tbody tr").each(function(){
                          $(this).find('input[type="checkbox"]').prop('checked', false);
                      })
                  }
              });
              
              // Remove selected rows
              $("#remove-row").click(function(){
                  $(".table tbody tr").each(function(){
                      var isChecked = $(this).find('input[type="checkbox"]').is(":checked");
                      var tableSize = $(".table tbody tr").length;
                      if(tableSize == 1){
                          alert('All rows cannot be deleted.');
                      }else if(isChecked){
                          $(this).remove();
                      }
                  });
              });
  
          })
      </script>
    @endpush --}}


    {{-- @push('style')
    <script>
      // Ambil elemen combobox
      var combobox = document.getElementById('myComboBox');
  
      // Buat AJAX request ke endpoint yang mengembalikan data
      var xhr = new XMLHttpRequest();
      xhr.open('GET', '/data-endpoint', true);
      xhr.onload = function() {
          if (xhr.status === 200) {
              // Parsing data JSON yang diterima dari server
              var data = JSON.parse(xhr.responseText);
  
              // Tambahkan opsi ke dalam combobox
              data.forEach(function(sekolah) {
                  var option = document.createElement('option');
                  option.value = sekolah.number;
                  option.textContent = sekolah.namasekolah;
                  combobox.appendChild(option);
              });
          }
      };
      xhr.send();
  </script>
    @endpush --}}
   