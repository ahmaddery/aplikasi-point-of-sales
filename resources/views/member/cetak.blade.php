<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cetak Kartu Member</title>

    <style>
    body {
        margin: 0;
        padding: 0;
        font-family: 'Arial', sans-serif;
        background-color: #f2f2f2;
    }

    section {
        margin: 20px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    td {
        border: 1px solid #fff;
        padding: 10px;
    }

    .box {
        position: relative;
    }

    .card {
        width: 100%;
    }

    .logo {
        position: absolute;
        top: 10px;
        right: 10px;
        font-size: 16pt;
        font-weight: bold;
        color: #000; /* Ganti dengan warna yang diinginkan */
    }

    .logo p {
        text-align: right;
        margin-right: 16pt;
    }

    .logo img {
        position: absolute;
        margin-top: -5pt;
        width: 40px;
        height: 40px;
        right: 16pt;
    }

    .nama {
        position: absolute;
        top: 100pt;
        right: 16pt;
        font-size: 18pt; /* Ubah sesuai keinginan */
        font-weight: bold;
        color: #000;
    }

    .telepon {
        position: absolute;
        margin-top: 120pt;
        right: 16pt;
        font-size: 14pt; /* Ubah sesuai keinginan */
        color: #000;
    }

    .barcode {
        position: absolute;
        top: 105pt;
        left: 10pt;
        border: 1px solid #000; /* Ganti dengan warna yang diinginkan */
        padding: 5px;
        background: #fff;
    }

    .barcode img {
        width: 100%;
        height: auto;
    }

    .text-left {
        text-align: left;
    }

    .text-right {
        text-align: right;
    }

    .text-center {
        text-align: center;
    }
</style>

</head>
<body>
    <section style="border: 1px solid #fff">
        <table width="100%">
            @foreach ($datamember as $key => $data)
                <tr>
                    @foreach ($data as $item)
                        <td class="text-center">
                            <div class="box">
                                <img src="{{ public_path($setting->path_kartu_member) }}" alt="card" width="50%">
                                <div class="logo">
                                    <p>{{ $setting->nama_perusahaan }}</p>
                                    <img src="{{ public_path($setting->path_logo) }}" alt="logo">
                                </div>
                                <div class="nama">{{ $item->nama }}</div>
                                <div class="telepon">{{ $item->telepon }}</div>
                                <div class="barcode text-left">
                                    <img src="data:image/png;base64, {{ DNS2D::getBarcodePNG("$item->kode_member", 'QRCODE') }}" alt="qrcode"
                                        height="45"
                                        widht="45">
                                </div>
                            </div>
                        </td>
                        
                        @if (count($datamember) == 1)
                        <td class="text-center" style="width: 50%;"></td>
                        @endif
                    @endforeach
                </tr>
            @endforeach
        </table>
    </section>
</body>
</html>