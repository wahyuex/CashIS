<table>
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
                <td>{{ $index + 1 }}</td>
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
