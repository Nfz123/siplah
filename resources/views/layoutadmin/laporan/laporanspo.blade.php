<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Siplah.net</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ URL::asset('temp/assets/img/favicon.png') }}" rel="icon">
    <link href="{{ URL::asset('temp/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="temp/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ URL::asset('temp/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('temp/assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('temp/assets/vendor/quill/quill.snow.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('temp/assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('temp/assets/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('temp/assets/vendor/simple-datatables/style.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ URL::asset('temp/assets/css/style.css') }}" rel="stylesheet">

    <!-- =======================================================
  * Template Name: NiceAdmin
  * Updated: May 30 2023 with Bootstrap v5.3.0
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <style>
        .invoice {
            color: black;
        }

        table.invoice>tr>td {
            border: 1px solid black !important;
            padding: 1px;
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
    <div class="tab-pane fade active show" id="navs-justified-spo" role="tabpanel">
        <style>
            .spo {
                font-size: 12px;
                color: black;
                font-family: "Times New Roman", Times, serif;
            }


            table.spo>tr>td {
                border: 1px solid black !important;
                padding: 0px;
            }

            #doc-target-spo {
                font-family: sans-serif;
                -webkit-font-smoothing: antialiased;
                color: #000;
                line-height: 1.6em;
                margin: 0 auto;
            }

            #outer-spo {
                padding: 15pt 15pt 15pt 15pt;
                border: 1px solid #000;
                margin: 0 auto;
                width: 720px;
            }
        </style>
        <button class="btn btn-sm btn-danger mb-3" onclick="generatePdfspo()">Download PDF</button>
        <div id="outer-spo">
            <div id="doc-target-spo">
                <table width="100%" style="margin-bottom:10px;" class="text-dark spo">
                    <tbody>
                        <tr>
                            <td colspan="5" align="center" style="padding-bottom: 1px;">
                                <img src="{{ url(Storage::url($transaksi->Perusahaan->slash)) }}" width="80" style="padding-bottom: 1px;"><br>
                                <strong>
                                    <h4 class="p-0 m-0" style="color: #000;"><b>
                                            {{ $transaksi->perusahaan->namaperusahaan }}</b></h4>
                                </strong>
                                <div style="color: #000;">{{ $transaksi->perusahaan->alamat }}</div>
                                <hr class="bg-dark">
                            </td>
                        </tr>
                        <tr>
                            <td colspan="5" align="center" style="padding-bottom: 5px;" >
                                <strong>
                                    <u>
                                        <h6 class="p-0 m-0" style="font-size:14px; color:black;" style="padding-bottom: 1px;"><b>SURAT
                                                PENAWARAN</b>
                                        </h6>
                                    </u>
                                </strong>
                                {{ $transaksi->autonumber }}
                            </td>

                        </tr>
                        <tr>
                            <td style=" color:black">Tangerang, 27 May 2023</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td colspan="5" class="p-2"></td>
                        </tr>
                        <tr style=" color:black">
                            <td>Bersama ini kami SIPLAH NET INDONESIA menawarkan barang kepada : <strong> {{ $transaksi->Sekolah->namasekolah }}</strong> <br> dengan perincian sebagai berikut :</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>

                <table width="100%" style="margin-bottom:20px; " class="table table-bordered spo">
                    <tbody>
                        <tr style="background-color: #8eaadb; color:black;">
                            <td bgcolor="#8eaadb">Nama Barang</td>
                            <td bgcolor="#8eaadb">Qty</td>
                            <td bgcolor="#8eaadb">Satuan</td>
                            <td bgcolor="#8eaadb">Harga</td>
                            <td bgcolor="#8eaadb">Jumlah</td>

                        </tr>
                        <tr style="color:black;">
                            @foreach ($trans->transaksiDetil as $item)
                       
                                <td>{{$item->namakategori}}</td>
                                <td>{{$item->qty}}</td>
                                <td>{{$item->satuan}}</td>
                                <td>{{ number_format($item->harga, 0, ',', '.') }}</td>
                                <td colspan="4"> {{ number_format($item->qty * $item->harga, 0, ',', '.') }} </td>
                       
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <table width="100%" class="spo">
                    <tbody>
                        <tr style="font-size:12px; ">
                            <td>Jika Bapak/Ibu tertarik untuk mengetahui lebih jauh tentang produk yang kami
                                tawarkan,
                                dan ingin mengajukan pertanyaan, silahkan hubungi kami di nomor  {{ $transaksi->Perusahaan->notelp }} melalui
                                Whatsapp ataupun telepon. <br> Atas perhatian dan kerjasamanya, kami mengucapkan
                                terima
                                kasih. </td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
                <div class="spo "
                    style="font-weight: bold; font-size: 12px; text-align:right; margin:0px auto 0px auto;">
                    <p>Hormat Kami,</p>
                    <br>
                    <br>

                    <p>{{ $transaksi->perusahaan->penanggungjawab }}</p>
                </div>
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

            function generatePdfspo() {
                let jsPdf = new jsPDF('p', 'pt', 'A4');
                var htmlElement = document.getElementById('doc-target-spo');
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
</body>

</html>
