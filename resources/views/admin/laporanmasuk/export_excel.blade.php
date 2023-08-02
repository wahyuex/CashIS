<table>
    <thead>
        <tr>
            <th>No.</th>
            <th>Tanggal</th>
            <th>Kode Produk</th>
            <th>Nama Produk</th>
            <th>Jumlah Masuk</th>
            <th>Nama Pemasok</th>
            <th>Total Harga</th>
            <th>Seluruh Dana Yang dikeluarkan : {{$totalHargaSum}}</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($reportins as $index => $listobat)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $listobat->tanggal }}</td>
                <td>{{ $listobat->kode_produk }}</td>
                <td>{{ $listobat->nama_produk }}</td>
                <td>+{{ $listobat->jumlah_masuk }}</td>
                <td>{{ $listobat->pemasok }}</td>
                <td>{{ $listobat->total_harga }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
