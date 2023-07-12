@extends('layouts.mainmenu')

@section('content')
    <!-- Jika terdapat pesan success -->
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Jika terdapat pesan error -->
    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
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
                                        <form action="{{ route('transaksi.simpan') }}" method="POST">
                                            @csrf
                                            <div class="row mb-3">
                                                <label for="inputText" class="col-sm-2 col-form-label">Nomor
                                                    Transaksi</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control"name="autonumber"
                                                        value="{{ $doku }}" readonly>
                                                        <input type="hidden" class="form-control"name="totalinvoice"
                                                         value="0">
                                                         <input type="hidden" class="form-control"name="ppn"
                                                         value="0">
                                                         <input type="hidden" class="form-control"name="cashback"
                                                         value="0">
                                                         <input type="hidden" class="form-control"name="biayaadmin"
                                                         value="0">
                                                         <input type="hidden" class="form-control"name="potongan"
                                                         value="0">
                                                         <input type="hidden" class="form-control"name="ttitipan"
                                                         value="0">
                                                         <input type="hidden" class="form-control"name="hargadasar"
                                                         value="0">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="inputText" class="col-sm-2 col-form-label">Sekolah</label>
                                                <div class="col-sm-10">
                                                    <select id="inputState" class="form-select" name="kodesekolah">
                                                        <option selected>Choose...</option>
                                                        @foreach ($sekolah as $item)
                                                            <option value="{{ $item->number }}">{{ $item->namasekolah }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="inputText" class="col-sm-2 col-form-label">Perusahaan</label>
                                                <div class="col-sm-10">
                                                    <select id="inputState" class="form-select" name="kodeperusahaan">
                                                        <option selected>Choose...</option>
                                                        @foreach ($perusahaan as $item)
                                                            <option value="{{ $item->number }}">{{ $item->namaperusahaan }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="inputText" class="col-sm-2 col-form-label">Pembayaran</label>
                                                <div class="col-sm-10">
                                                    <select class="form-select" name="pembayaran">
                                                        <option selected>Choose...</option>
                                                        {{-- @foreach ($perusahaan as $perus) --}}
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
                                                <label for="inputText" class="col-sm-2 col-form-label">Status</label>
                                                <div class="col-sm-10">
                                                    <select class="form-select" name="status">
                                                        <option selected>Choose...</option>
                                                        {{-- @foreach ($perusahaan as $perus) --}}
                                                        <option value="Sudah Bayar">Sudah Bayar</option>
                                                        <option value="Belum Bayar">Belum Bayar</option>
                                                        
                                                        {{-- @endforeach --}}
                                                    </select>
                                                </div>
                                            </div>
                                            <h5>Transaksi Detil</h5>

                                            <table id="transaksi-detil-table">
                                                <thead>
                                                    <tr>
                                                        <th>Kode Barang</th>
                                                        <th>Nama Barang</th>
                                                        <th>Qty</th>
                                                        <th>Satuan</th>
                                                        <th>Harga</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="transaksi-detil-container">
                                                    <tr>
                                                        <td>
                                                            <input type="text" name="kodekategori[]" class="form-control"
                                                                id="number" required>
                                                        </td>
                                                        <td>
                                                            <input type="text" name="namakategori[]" class="form-control"
                                                                id="kategori" required>
                                                        </td>
                                                        <td>
                                                            <input type="number" name="qty[]" class="form-control"
                                                                required>
                                                        </td>
                                                        <td>
                                                            <input type="text" name="satuan[]" class="form-control"
                                                                id="satuan" required>
                                                        </td>
                                                        <td>
                                                            <input type="number" name="harga[]" class="form-control"
                                                                required>
                                                        </td>
                                                        <td>
                                                            <a class="btn btn-outline-secondary btn-sm"
                                                                style="text-transform:uppercase" type="button"
                                                                id="button-addon2-1" data-toggle="modal"
                                                                data-target="#modal-ketua"><i class="fas fa-search"></i></a>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>

                                            <button type="button" id="add-transaksi-detil" class="btn btn-primary">Tambah
                                                Transaksi Detil</button>

                                            <br><br>

                                            <button type="submit" class="btn btn-success">Simpan</button>
                                        </form>

                                        <script>
                                            // Tambahkan fungsi untuk menambahkan baris transaksi detil ke tabel
                                            document.getElementById('add-transaksi-detil').addEventListener('click', function() {
                                                const container = document.getElementById('transaksi-detil-container');

                                                const newIndex = container.children.length;

                                                const row = document.createElement('tr');

                                                const kodekategoriCell = document.createElement('td');
                                                const kodekategoriInput = document.createElement('input');
                                                kodekategoriInput.type = 'text';
                                                kodekategoriInput.name = 'kodekategori[]';
                                                kodekategoriInput.className = 'form-control';
                                                kodekategoriInput.required = true;
                                                kodekategoriCell.appendChild(kodekategoriInput);

                                                const namakategoriCell = document.createElement('td');
                                                const namakategoriInput = document.createElement('input');
                                                namakategoriInput.type = 'text';
                                                namakategoriInput.name = 'namakategori[]';
                                                namakategoriInput.className = 'form-control';
                                                namakategoriInput.required = true;
                                                namakategoriCell.appendChild(namakategoriInput);

                                                const qtyCell = document.createElement('td');
                                                const qtyInput = document.createElement('input');
                                                qtyInput.type = 'number';
                                                qtyInput.name = 'qty[]';
                                                qtyInput.className = 'form-control';
                                                qtyInput.required = true;
                                                qtyCell.appendChild(qtyInput);

                                                const satuanCell = document.createElement('td');
                                                const satuanInput = document.createElement('input');
                                                satuanInput.type = 'text';
                                                satuanInput.name = 'satuan[]';
                                                satuanInput.className = 'form-control';
                                                satuanInput.required = true;
                                                satuanCell.appendChild(satuanInput);

                                                const hargaCell = document.createElement('td');
                                                const hargaInput = document.createElement('input');
                                                hargaInput.type = 'number';
                                                hargaInput.name = 'harga[]';
                                                hargaInput.className = 'form-control';
                                                hargaInput.required = true;
                                                hargaCell.appendChild(hargaInput);

                                                const buttonCell = document.createElement('td');
                                                const buttonLink = document.createElement('a');
                                                buttonLink.className = 'btn btn-outline-secondary btn-sm';
                                                buttonLink.style.textTransform = 'uppercase';
                                                buttonLink.type = 'button';
                                                buttonLink.id = 'button-addon2';
                                                buttonLink.setAttribute('data-toggle', 'modal');
                                                buttonLink.setAttribute('data-target', '#modal-ketua');
                                                const searchIcon = document.createElement('i');
                                                searchIcon.className = 'fas fa-search';
                                                buttonLink.appendChild(searchIcon);
                                                buttonCell.appendChild(buttonLink);


                                                row.appendChild(kodekategoriCell);
                                                row.appendChild(namakategoriCell);
                                                row.appendChild(qtyCell);
                                                row.appendChild(satuanCell);
                                                row.appendChild(hargaCell);
                                                row.appendChild(buttonCell);

                                                container.appendChild(row);
                                            });
                                        </script>
                                        </form>




                                    </div>


                                </div>

                            </div>
                            <div class="modal fade" id="modal-ketua" tabindex="-1" role="dialog">
                                <div class="modal-dialog">
                                    <div class="modal-content rounded-0 text-sm">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Data Kategori</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="col-12 table-responsive">
                                                <table class="table-bordered user_datatable table-sm table">
                                                    <thead class="text-center">
                                                        <tr>
                                                            <th>ID</th>
                                                            <th>number</th>
                                                            <th>kategori</th>
                                                            <th>satuan</th>
                                                            <th style="width: 1%">Aksi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="text-center"></tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </section>
                @endsection
                @push('script')
                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
                    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
                    <script src="{!! URL::asset('assets/dist/plugins/jquery-validation/jquery.validate.js') !!}"></script>
                    <script src="{!! URL::asset('assets/dist/plugins/jquery/jquery.js') !!}"></script>
                    <script src="{!! URL::asset('assets/dist/plugins/datatables/jquery.dataTables.min.js') !!}"></script>
                    <script src="{!! URL::asset('assets/dist/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') !!}"></script>
                    <script src="{!! URL::asset('assets/dist/plugins/datatables-responsive/js/dataTables.responsive.min.js') !!}"></script>
                    <script src="{!! URL::asset('assets/dist/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') !!}"></script>
                    <script type="text/javascript">
                        $(function() {
                            var table = $('.user_datatable').DataTable({
                                responsive: true,
                                autoWidth: false,
                                processing: true,
                                serverSide: true,
                                ordering: true,
                                paging: true,
                                searching: true,
                                info: true,
                                ajax: "{{ route('transaksi.createSNI') }}",
                                columns: [{
                                        data: 'DT_RowIndex',
                                        name: 'DT_RowIndex'
                                    },
                                    {
                                        data: 'number',
                                        name: 'number'
                                    },
                                    {
                                        data: 'kategori',
                                        name: 'kategori'
                                    },
                                    {
                                        data: 'satuan',
                                        name: 'satuan'
                                    },
                                    {
                                        data: 'action',
                                        name: 'action',
                                    },
                                ]
                            });
                        });
                    </script>
                    <script>
                        $(document).ready(function() {
                            $(document).on('click', '#selectFamillies', function() {
                                var number = $(this).data('number');
                                var kategori = $(this).data('kategori');
                                var satuan = $(this).data('satuan');
                                $('#number').val(number);
                                $('#kategori').val(kategori);
                                $('#satuan').val(satuan);
                            })
                        })
                    </script>
                @endpush


                @push('style')
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
                @endpush
