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
                <td>{{ $listobat->kode }}</td>
                <td>{{ $listobat->namabarang }}</td>
                <td>{{ $listobat->barangmasuk }}</td>
                <td>{{ $listobat->barangkeluar }}</td>
                <td>{{ $listobat->sisastok }}</td>
                <td>{{ $listobat->totalstok }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
