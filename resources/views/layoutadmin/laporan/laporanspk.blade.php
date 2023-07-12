<div class="tab-content">
    <div class="tab-pane fade" id="navs-justified-spk" role="tabpanel">
        <style>
            .spk {
                font-size: 13px;
                color: black;
                font-family: "Times New Roman", Times, serif;
            }

            table.table-bordered {
                border: 1px solid black !important;
            }

            table.table-bordered>thead>tr>th {
                border: 1px solid black !important;

            }

            table.table-bordered>tbody>tr>td {
                border: 1px solid black !important;
                padding: 5px;
            }


            #doc-target-spk {
                font-family: sans-serif;
                -webkit-font-smoothing: antialiased;
                color: #000;
                line-height: 1.6em;
                margin: 0 auto;
            }

            #outer-spk {
                padding: 15pt 15pt 15pt 15pt;
                border: 1px solid #000;
                margin: 0 auto;
                width: 720px;
            }
        </style>
        <button class="btn btn-sm btn-danger mb-3" onclick="generatePdfspk()">Download PDF</button>
        <div id="outer-spk">
            <div id="doc-target-spk">
                <table width="100%" style="margin-bottom:20px; color:black;">
                    <tbody>
                        <tr>
                            <td colspan="4" align="center">
                                <img src="{{ URL::asset($transaksi->perusahaan->slash) }}" width="80"><br>
                                <strong>{{ $transaksi->Perusahaan->alamat }}</strong>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <table width="100%" style=" color:black;" class="table table-bordered spk">
                    <tbody>
                        <tr>
                            <td rowspan="3" align="center" style="font-size:15px;"><strong>Surat Pemesanan</strong>
                            </td>
                            <td colspan="3" align="center"><strong>Nama Sekolah</strong></td>
                        </tr>
                        <tr>
                            <td colspan="3" align="center"><strong>{{ $transaksi->Sekolah->namasekolah }}</strong></td>
                        </tr>
                        <tr>

                            <td>Nomor Pesanan : </td>
                            <td colspan="2">{{ $transaksi->autonumber }}</td>

                        </tr>
                        <tr>
                            <td>Tanggal Pesanan</td>
                            <td colspan="3">
                                01 June 2023
                            </td>

                        </tr>
                        <tr>
                            <td>Waktu Pelaksanaan Pekerjaan </td>
                            <td colspan="3">
                                02 June 2023 </td>
                        </tr>
                        <tr>
                            <td>Penyelesaian Pekerjaan</td>
                            <td colspan="3">
                                03 June 2023 </td>
                        </tr>
                        <tr>
                            <td>Nama Pekerjaan:</td>
                            <td colspan="3">: Kegiatan jual beli </td>

                        </tr>
                        <tr>
                            <td>Pelaksana Pekerjaan </td>
                            <td colspan="3">: {{ $transaksi->Perusahaan->namaperusahaan }}</td>
                        </tr>
                        <tr>
                            <td>Penyetoran Pajak </td>
                            <td colspan="3">: Disetor oleh Penjual</td>
                        </tr>
                        <tr>
                            <td>NPWP</td>
                            <td colspan="3">: 53.450.985.6-451</td>
                        </tr>
                        <tr>
                            <td colspan="4" align="center"><strong>
                                    <h5 style="color:#000;"><u>Rincian Pekerjaan</u></h5>
                                </strong></td>
                        </tr>
                    </tbody>
                </table>

                <table width="100%" style="margin-bottom:20px; " class="table table-bordered spk">
                    <tbody>
                        <tr style="background-color: #8eaadb; color:black;">
                            <td>Nama Barang</td>
                            <td>Qty</td>
                            <td>Satuan</td>
                            <td>Jumlah</td>
                        </tr>
                        @foreach ($trans->transaksiDetil as $item)
                        <tr>
                            <td>{{ $item->namakategori }}</td>
                            <td>{{ $item->qty }}</td>
                            <td>{{ $item->satuan }}</td>
                            <td>{{ number_format($item->harga, 0, ',', '.') }}</td>
                            {{-- <td colspan="4">{{ number_format($item->qty * $item->harga, 0, ',', '.')  }}</td> --}}
                        </tr>
                        @endforeach
                        <tr>
                            <td></td>
                            <td></td>
                            <td>Sub Total</td>
                            <td> Rp- </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td>Biaya Kirim</td>
                            <td> Rp- </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td>Asuransi</td>
                            <td> Rp- </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td>Total Pembayaran</td>
                            <td> Rp- </td>
                        </tr>
                    </tbody>
                </table>
                <table width="100%" class="spo">
                    <tbody>
                        <tr style="font-size:12px; ">
                            <td><b>INSTRUKSI KE PENYEDIA : </b> <br> Penagihan hanya dapat dilakukan setelah
                                penyelesaian pekerjaan yang diperintahkan dalam SPK ini dan dibuktikan dengan Berita
                                Acara Serah Terima </td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
                <table width="100%" class="spo mt-2">
                    <tbody>
                        <tr style="font-size:12px;">
                            <td class="text-center">
                                <p class="m-0">Penyedia,</p>
                                <p class="m-0">{{ $transaksi->Perusahaan->namaperusahaan }}</p>
                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
                                <p style="font-size:14px"><b><u>{{ $transaksi->Perusahaan->penanggungjawab }}</u></b></p>
                            </td>
                            <td class="text-center">
                                <p class="m-0">Pelaksana,</p>
                                <p class="m-0">{{ $transaksi->Sekolah->namasekolah }}</p>
                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
                                <p style="font-size:14px"><b>______________________</b></p>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"
            integrity="sha512-BNaRQnYJYiPSqHHDb58B0yaPfCu+Wgds8Gp/gU33kqBtgNS4tSPHuGibyoeqMV/TJlSKda6FXzoEyYGjTe+vXA=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>

        <script>
            // https://html2canvas.hertzen.com/configuration
            // https://rawgit.com/MrRio/jsPDF/master/docs/module-html.html#~html
            // https://artskydj.github.io/jsPDF/docs/jsPDF.html
            window.jsPDF = window.jspdf.jsPDF;

            function generatePdfspk() {
                let jsPdf = new jsPDF('p', 'pt', 'A4');
                var htmlElement = document.getElementById('doc-target-spk');
                // you need to load html2canvas (and dompurify if you pass a string to html)
                const opt = {
                    callback: function(jsPdf) {
                        jsPdf.save('1686468212277SNI_SPO_SDN JAMBE I.pdf');
                        // to open the generated PDF in browser window
                        // window.open(jsPdf.output('bloburl'));
                    },
                    margin: [15, 15, 15, 30],
                    autoPaging: 'text',
                    html2canvas: {
                        allowTaint: true,
                        dpi: 300,
                        letterRendering: true,
                        logging: false,
                        scale: .8
                    }
                };

                jsPdf.html(htmlElement, opt);
            }
        </script>
    </div>