<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <style>
        body{
            font-family: Georgia, 'Times New Roman', Times, serif;
        }
        table{
            border-collapse: collapse;
            border: 1px solid black;
            text-align: center;
            vertical-align: middle;
            line-height: 1.4;
        }
        th, td{
            padding: 10px;
        }

        table thead{
            background-color: #E9DAC1;
            border: 1px solid;
        }
        caption{
            font-weight: bold;
            font-size: 24px;
            text-align: center;
            color: #333;
            margin-bottom: 10px;
        }
        .petugas{
            margin-top: 50px;
            float: right;
        }
        .nama-user b{
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <table>
        <caption>Report Maintenance Asset</caption>
        <thead>
            <tr>
                <th>#</th>
                <th>Nama Asset</th>
                <th>Nama Tindakan</th>
                <th>Tgl. Tindakan</th>
                <th>Tgl. Pembelian</th>
                <th>Ket.</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
                <tr>
                    <td>{{ $item->id_tindakan }}</td>
                    <td>{{ $item->nama_aset }}</td>
                    <td>{{ $item->nama_tindakan }}</td>
                    <td>{{ $item->tanggal_tindakan }}</td>
                    <td>{{ $item->tanggal_pembelian }}</td>
                    <td>{{ $item->keterangan }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="petugas">
        <span>Petugas</span>
        <br>
        <br>
        <br>
        <br>
        <br>
        <span><b>{{ $user }}</b></span>
    </div>
</body>
</html>