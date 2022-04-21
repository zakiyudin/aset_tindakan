<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan</title>
    <style>
        *{
            margin: 5;
            padding: 0;
            box-sizing: border-box;
        }
        body{
            font-family: sans-serif;
            font-size: 12px;
            font-weight: 400;
            line-height: 1.5;
            color: #212529;
        }

        table{
            margin-left: auto;
            margin-right: auto;
            /* border: 1px solid black; */
            text-align: center;
            vertical-align: middle;
            line-height: 1.4;
            width: 100%;
            /* border-collapse:  */
        }

        thead{
            background-color: #052530;
            display: table-header-group;
            vertical-align: middle;
            border-color: inherit;
            color: #fff;
        }

        td{
            display: table-cell;
            vertical-align: inherit;
        }

        tbody{
            display: table-row-group;
            vertical-align: middle;
            border-color: inherit;
            color: black;
        }
    </style>
</head>
<body>
    <h2>
        <center>
            <b>
                LAPORAN DATA KENDARAAN
            </b>
            <h6>
                <b>{{ $date_now }}</b>
            </h6>
        </center>
    </h2>
    <table>
        <thead>
            <tr>
                <th>No.Pol</th>
                <th>Jenis</th>
                <th>Tahun</th>
                <th>Warna</th>
                <th>No. Rangka</th>
                <th>No. Mesin</th>
                <th>Tonase</th>
                <th>Atas Nama</th>
                <th>Pemakai</th>
                <th>Polis Asuransi</th>
                <th>Tgl. Exp Asuransi</th>
                <th>Asuransi</th>
                <th>Tgl. Exp STNK</th>
                <th>Tgl. Exp Pajak STNK</th>
                <th>Tgl. Exp KIR</th>
                <th>Ket.</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
                <tr>
                    <td>{{ $item->nopol }}</td>
                    <td>{{ $item->jenis_kendaraan }}</td>
                    <td>{{ $item->tahun_kendaraan }}</td>
                    <td>{{ $item->warna_kendaraan }}</td>
                    <td>{{ $item->no_rangka }}</td>
                    <td>{{ $item->no_mesin }}</td>
                    <td>{{ $item->tonase }}</td>
                    <td>{{ $item->atas_nama }}</td>
                    <td>{{ $item->pemakai_kendaraan['nama_pemakai_kendaraan'] }}</td>
                    <td>{{ $item->polis_asuransi }}</td>
                    <td>{{ $item->tgl_ex_asuransi }}</td>
                    <td>{{ $item->asuransi['nama_asuransi'] }}</td>
                    <td>{{ $item->tgl_ex_stnk }}</td>
                    <td>{{ $item->tgl_ex_pajak_stnk }}</td>
                    <td>{{ $item->tgl_ex_kir }}</td>
                    <td>{{ $item->keterangan }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <script type="text/javascript">
        date = new Date();
        y = date.getFullYear();
        m = date.getMonth() + 1;
        d = date.getDate();
        document.getElementById("date").innerHTML = d + "-" + m + "-" + y;
    </script>
</body>

</html>