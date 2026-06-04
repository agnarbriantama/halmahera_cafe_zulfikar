<h3>Detail Transaksi</h3>

<p>Kode: {{ $transaksi->kode_transaksi }}</p>
<p>Customer: {{ $transaksi->nama_customer }}</p>
<p>Kasir: {{ $transaksi->user->name ?? '-' }}</p>
<p>Tanggal: {{ $transaksi->created_at->format('d-m-Y H:i') }}</p>

<hr>

<table class="table">
    <thead>
        <tr>
            <th>Menu</th>
            <th>Kategori</th>
            <th>Harga</th>
            <th>Qty</th>
            <th>Subtotal</th>
        </tr>
    </thead>

    <tbody>
        @foreach($transaksi->details as $item)
            <tr>
                <td>{{ $item->menu->nama_menu }}</td>
                <td>{{ $item->menu->kategori->nama_kategori }}</td>
                <td>Rp {{ number_format($item->harga, 0, ',', '.') }}</td>
                <td>{{ $item->qty }}</td>
                <td>Rp {{ number_format($item->subtotal, 0, ',', '.') }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

<hr>

<p>Subtotal: Rp {{ number_format($transaksi->subtotal, 0, ',', '.') }}</p>
<p>Pajak: Rp {{ number_format($transaksi->pajak, 0, ',', '.') }}</p>
<p>Service: Rp {{ number_format($transaksi->service, 0, ',', '.') }}</p>

<h4>Total: Rp {{ number_format($transaksi->grand_total, 0, ',', '.') }}</h4>