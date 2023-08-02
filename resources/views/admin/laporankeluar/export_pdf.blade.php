<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Stok Obat</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            padding: 20px;
        }

        h1 {
            text-align: center;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            padding: 8px;
            border: 1px solid #ddd;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .text-center {
            text-align: center;
        }

        .total-row {
            font-weight: bold;
        }
    </style>
</head>

<body>
    <h1>Laporan Stok Obat Keluar</h1>
    <table>
        <thead>
            <tr>
                <th>No.</th>
                <th>Tanggal</th>
                <th>Kode Produk</th>
                <th>Nama Produk</th>
                <th>Jumlah Keluar</th>
                <th>Total Harga</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($reportouts as $index => $listobat)
                <tr>
                    <td class="text-center">{{ $index + 1 }}</td>
                    <td>{{ $listobat->tanggal }}</td>
                    <td>{{ $listobat->kode_produk }}</td>
                    <td>{{ $listobat->nama_produk }}</td>
                    <td class="text-center">-{{ $listobat->jumlah_keluar }}</td>
                    <td class="text-center">{{ $listobat->total_harga }}</td>
                </tr>
            @endforeach
            <tr class="total-row">
                <td colspan="6" class="text-center">Seluruh Dana Yang dikeluarkan :</td>
                <td class="text-center">{{ $totalHargaSum }}</td>
            </tr>
        </tbody>
    </table>
</body>

</html>
