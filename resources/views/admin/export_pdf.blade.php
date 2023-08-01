<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Bulanan</title>
    <style>
        html {
            font-size: 12px;
        }

        .table {
            border-collapse: collapse !important;
            width: 100%;
        }

        .table-bordered th,
        .table-bordered td {
            padding: 0.5rem;
            border: 1px solid black !important;
        }
    </style>
</head>

<body>
    <h1>Laporan Stok Obat</h1>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Kode</th>
                <th>Nama Barang</th>
                <th>Barang Masuk</th>
                <th>Barang Keluar</th>
                <th>Sisa Stok</th>
                <th>Total Stok</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($listobat as $index => $listobat)
                <tr>
                    <td align="center">{{ $index + 1 }}</td>
                    <td>{{ $listobat->tanggal }}</td>
                    <td>{{ $listobat->kode_produk }}</td>
                    <td>{{ $listobat->nama_produk }}</td>
                    <td>{{ $listobat->jumlah_keluar }}</td>
                    <td>{{ $listobat->harga_satuan }}</td>
                    <td>{{ $listobat->pemasok }}</td>
                    <td>{{ $listobat->total_harga }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
