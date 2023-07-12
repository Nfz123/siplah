<div class="tab-content">
    <div class="tab-pane fade" id="navs-justified-invoice" role="tabpanel">
        <style>
            .invoice {
                color: black;
            }

            table.invoice>tr>td {
                border: 1px solid black !important;
                padding: 2px;
            }

            #doc-target {
                font-family: sans-serif;
                -webkit-font-smoothing: antialiased;
                color: #000;
                line-height: 1.6em;
                margin: 0 auto;
                font-family: "Times New Roman", Times, serif;

            }

            #outer {
                padding: 15pt 15pt 15pt 15pt;
                border: 1px solid #000;
                margin: 0 auto;
                width: 720px;
            }
        </style>
        <button class="btn btn-sm btn-danger mb-3" onclick="generatePdfinvoice()">Download PDF</button>
        <div id="outer">
            <div id="doc-target">
                <table width="100%" class="table table-borderless invoice">
                    <tbody>
                        <tr>
                            <td colspan="3" rowspan="4"><br>
                                <img src="{{ URL::asset($transaksi->perusahaan->slash) }}" width="80"><br>
                            </td>
                            <td></td>
                            <td colspan="5" rowspan="4" align="right">
                                <div style="position:relative;" align="right">
                                    <img src="assets/img/logo/Picture2.jpg">
                                </div>
                                <strong
                                    style="font-size: 14px;">{{ $transaksi->perusahaan->namaperusahaan }}</strong><br>
                                {{ $transaksi->perusahaan->alamat }}<br>
                                Telp : {{ $transaksi->perusahaan->notelp }} <br>
                                NPWP : 53.450.985.6-451
                            </td>
                        </tr>
                        <tr>
                            <td colspan="6"></td>
                        </tr>
                        <tr>
                            <td colspan="6"></td>
                        </tr>
                        <tr>
                            <td colspan="6"></td>
                        </tr>

                        <tr style="background-color: #8eaadb; color:black;">
                            <td colspan="3" bgcolor="#8eaadb"> INVOICE</td>
                            <td bgcolor="#8eaadb"></td>
                            <td bgcolor="#8eaadb"></td>
                            <td colspan="4" bgcolor="#8eaadb">Invoice No : {{ $transaksi->autonumber }}</td>
                        </tr>
                        <tr>
                            <td colspan="4" class="p-1"></td>
                        </tr>
                        <tr>
                            <td colspan="3" class="p-0 ">Invoiced To :</td>
                            <td></td>
                            <td colspan="4"></td>
                            <td class="p-0">Tanggal</td>
                        </tr>
                        <tr>
                            <td colspan="3" class="p-0">{{ $transaksi->Sekolah->namasekolah }}</td>
                            <td></td>
                            <td colspan="4"></td>
                            <td class="p-0">11 Jun 2023</td>
                        </tr>
                        <tr>
                            <td colspan="3" class="p-0">Kab. Tangerang - Banten</td>
                            <td></td>
                            <td></td>
                            <td colspan="4"></td>
                        </tr>


                    </tbody>
                </table>

                <table width="100%" style="margin-top:20px;" class="table table-bordered invoice">
                    <tbody>
                        <tr style="background-color: #8eaadb; color:black;">
                            <td bgcolor="#8eaadb">NO</td>
                            <td bgcolor="#8eaadb">Nama Barang / Jasa</td>
                            <td bgcolor="#8eaadb">Qty</td>
                            <td bgcolor="#8eaadb"> Satuan</td>
                            <td bgcolor="#8eaadb">Harga</td>
                            <td colspan="4" bgcolor="#8eaadb">Jumlah</td>
                        </tr>
                        @php
                            $total = 0; // Inisialisasi total menjadi 0
                        @endphp
                        @foreach ($trans->transaksiDetil as $item)
                            <tr>
                                <td>1</td>
                                <td>{{ $item->namakategori }}</td>
                                <td>{{ $item->qty }}</td>
                                <td>{{ $item->satuan }}</td>
                                <td>{{ number_format($item->harga, 0, ',', '.') }}</td>
                                <td colspan="4">{{ number_format($item->qty * $item->harga, 0, ',', '.')  }}</td>
                            </tr>
                            @php
                                $total += $item->qty * $item->harga; // Menambahkan nilai qty * harga ke total
                            @endphp
                        @endforeach
                        <tr>

                            <td colspan="5" align="right">TOTAL</td>
                            <td colspan="4">Rp. {{ number_format($total, 0, ',', '.') }}</td>

                        </tr>
                    </tbody>
                </table>
                <br>
                <b>Transactions</b>
                <table width="70%" style="border: solid 1px #000; font-size:13px;" class="invoice">
                    <tbody>
                        <tr style="background-color: #8eaadb; color:black; " class="text-center">
                            <td>Atas Nama Rekening</td>
                            <td>Nama Bank</td>
                            <td>No Rek</td>
                        </tr>
                        <tr class="text-center" style=" font-size:12px;">
                            <td>Siplah Net Indonesia</td>
                            <td>Bank Mandiri</td>
                            <td>176-00-0242541-9</td>
                        </tr>
                    </tbody>
                </table>
                <br>
                <p class="text-danger p-0 m-0" style="font-size:12px; line-height: 5px;">* Transaksi antar bank
                    dikenakan biaya transfer</p>
                <p class="text-danger p-0 m-0" style="font-size:12px;">* Harga sudah termasuk PPN 11%</p>
                <div class="invoice "
                    style="font-weight: bold; font-size: 12px; text-align:right; margin:0px auto 0px auto;">
                    <p>Hormat Kami,</p>
                    <br>
                    <br>

                    <p>{{ $transaksi->perusahaan->penanggungjawab }}</p>
                </div>
            </div>
        </div>
        <script src=" https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"
            integrity="sha512-BNaRQnYJYiPSqHHDb58B0yaPfCu+Wgds8Gp/gU33kqBtgNS4tSPHuGibyoeqMV/TJlSKda6FXzoEyYGjTe+vXA=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script>
            // https://html2canvas.hertzen.com/configuration
            // https://rawgit.com/MrRio/jsPDF/master/docs/module-html.html#~html
            // https://artskydj.github.io/jsPDF/docs/jsPDF.html
            window.jsPDF = window.jspdf.jsPDF;

            function generatePdfinvoice() {
                let jsPdf = new jsPDF('p', 'pt', 'A4');
                var htmlElement = document.getElementById('doc-target');
                // you need to load html2canvas (and dompurify if you pass a string to html)
                const opt = {
                    callback: function(jsPdf) {
                        jsPdf.save('1686468212277SNI_INVOICE_SDN JAMBE I.pdf');
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
