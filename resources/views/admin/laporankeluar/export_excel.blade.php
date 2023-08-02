<table>
    <thead>
        <tr>
            <th>No.</th>
            <th>Tanggal</th>
            <th>Kode Produk</th>
            <th>Nama Produk</th>
            <th>Jumlah Keluar</th>
            <th>Total Harga</th>
            <th>Seluruh Dana Yang didapatkan : {{$totalHargaSum}}</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($reportouts as $index => $listobat)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $listobat->tanggal }}</td>
                <td>{{ $listobat->kode_produk }}</td>
                <td>{{ $listobat->nama_produk }}</td>
                <td>-{{ $listobat->jumlah_keluar }}</td>
                <td>{{ $listobat->total_harga }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
