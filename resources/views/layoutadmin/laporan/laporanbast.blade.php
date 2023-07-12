<div class="tab-pane fade" id="navs-justified-bast" role="tabpanel">
    <style>
        table {
            font-size: 13px;
            color: black;
            font-family: "Times New Roman", Times, serif;
        }

        table.table-bordered {
            border: 1px solid black !important;
            padding: 5px;
        }

        table.table-bordered>tr>th {
            border: 1px solid black !important;
            padding: 5px;

        }

        table.table-bordered>tr>td {
            border: 1px solid black !important;
            padding: 5px;
        }

        #doc-target-bast {
            font-family: sans-serif;
            -webkit-font-smoothing: antialiased;
            color: #000;
            line-height: 1.6em;
            margin: 0 auto;
        }

        #outer-bast {
            padding: 15pt 15pt 15pt 15pt;
            border: 1px solid #000;
            margin: 0 auto;
            width: 720px;
        }
    </style>
    <button class="btn btn-sm btn-danger mb-3" onclick="generatePdfbast()">Download PDF</button>
    <div id="outer-bast">
        <div id="doc-target-bast">
            <table class="">
                <tbody>
                    <tr>
                        <td colspan="6" align="center">
                            <img src="{{ url(Storage::url($transaksi->Perusahaan->slash)) }}" width="80"><br>
                            <strong>
                                <h4 class="p-0 m-0" style="color:black;"><b> {{ $transaksi->perusahaan->namaperusahaan }}</b></h4>
                            </strong>
                            <div style="color: black;">{{ $transaksi->perusahaan->alamat }}</div>
                            <hr class="bg-dark py-0 my-2">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="6" align="center">
                            <strong>
                                <h5 style="color:#000;"><b><u>BERITA ACARA SERAH TERIMA</u></b></h5>
                            </strong>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3" class="py-1">Pada hari ini</td>
                        <td>:</td>
                        <td>
                            Tuesday, 06 June 2023 </td>
                    </tr>
                    <tr>
                        <td colspan="3" class="py-1">Sesuai dengan No. Pesanan yang diterbitkan oleh sekolah
                        </td>
                        <td>:</td>
                        <td>{{ $transaksi->autonumber }}</td>
                    </tr>
                    <tr>
                        <td colspan="6">
                            Yang bertanggung jawab di bawah ini :
                        </td>
                    </tr>
                    <tr>
                        <td colspan="6" class="p-2">
                        </td>
                    </tr>
                    <tr>
                        <td width="141" class="py-1">Nama</td>
                        <td width="3">:</td>
                        <td width="929" colspan="3">{{ $transaksi->perusahaan->penanggungjawab }}</td>
                    </tr>
                    <tr>
                        <td width="141" class="py-1">Jabatan</td>
                        <td width="3">:</td>
                        <td width="929" colspan="3">Direktur Bisnis</td>
                    </tr>
                    <tr>
                        <td colspan="6" class="p-2">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="6">
                            <div style="font-size: 12px; color:#000;">Menyerahkan hasil pekerjaan jual-beli kepada
                                Sekolah dan telah menerima hasil pekerjaan dalam jumlah yang lengkap dan kondisi
                                yang baik sesuai dengan rincian berikut : </div>
                        </td>
                    </tr>
                </tbody>
            </table>

            <table class="table table-bordered">
                <tbody>
                    <tr style="background-color: #8eaadb; color:black;" class="text-dark" align="center">
                        <td scope="col">Nama Barang</td>
                        <td scope="col">Qty</td>
                        <td scope="col">Satuan</td>
                        <td scope="col">Harga</td>
                        <td scope="col">Kondisi</td>
                    </tr>
                    @foreach ($trans->transaksiDetil as $item)
                        
                 
                    <tr style="color:black;">
                        <td>{{$item->namakategori}}</td>
                        <td>{{$item->qty}}</td>
                        <td>{{$item->satuan}}</td>
                        <td> {{ number_format($item->harga, 0, ',', '.') }}</td>
                        <td>BAIK</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <table class="">
                <tbody>
                    <tr>
                        <td colspan="6">
                            <div style="font-size: 12px; color: #000;" class="my-1"><i><b>Foto Barang :
                                        Terlampir</b></i></div>
                            Berita Acara Serah Terima ini berfungsi sebagai bukti serah terima hasil pekerjaan
                            kepada Sekolah untuk selanjutnya dicatat pada buku penerimaan barang <br> <br>
                            Demikian Berita Acara Serah Terima ini dibuat dengan sebenarnya untuk dipergunakan
                            sebagaimana seharusnya
                        </td>
                    </tr>
                </tbody>
            </table>
            <table width="100%" class="spo mt-2">
                <tbody>
                    <tr style="font-size:12px;">
                        <td class="text-center">
                            <p class="m-0">Penyedia,</p>
                            <p class="m-0">{{ $transaksi->perusahaan->namaperusahaan }}</p>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <p style="font-size:14px"><b><u>{{ $transaksi->perusahaan->penanggungjawab }}</u></b></p>
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

        function generatePdfbast() {
            let jsPdf = new jsPDF('p', 'pt', 'A4');
            var htmlElement = document.getElementById('doc-target-bast');
            // you need to load html2canvas (and dompurify if you pass a string to html)
            const opt = {
                callback: function(jsPdf) {
                    jsPdf.save('1686468212277SNI_BAST_SDN JAMBE I.pdf');
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