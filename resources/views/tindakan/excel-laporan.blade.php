<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
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
            @foreach ($tindakan as $item)
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
    
</body>
</html>