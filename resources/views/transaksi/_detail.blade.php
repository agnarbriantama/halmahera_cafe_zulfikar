<div id="print-area">

    <div class="text-center mb-3">
        <h5 class="mb-0">HALMAHERA CAFE</h5>
        <small>{{ $transaksi->created_at->format('d-m-Y H:i') }}</small>
    </div>

    <hr>

    <div class="mb-2">
        <p class="mb-0"><b>Kode:</b> {{ $transaksi->kode_transaksi }}</p>
        <p class="mb-0"><b>Customer:</b> {{ $transaksi->nama_customer }}</p>
        <p class="mb-0"><b>Kasir:</b> {{ $transaksi->user->name ?? '-' }}</p>
        <p class="mb-0"><b>Pembayaran:</b> {{ $transaksi->metode_pembayaran }}</p>
    </div>

    <hr>

    <table class="table table-sm">
        <thead>
            <tr>
                <th>Menu</th>
                <th>Qty</th>
                <th class="text-end">Subtotal</th>
            </tr>
        </thead>

        <tbody>
            @foreach($transaksi->details as $item)
                <tr>
                    <td>{{ $item->menu->nama_menu }}</td>
                    <td>{{ $item->qty }}</td>
                    <td class="text-end">
                        Rp {{ number_format($item->subtotal, 0, ',', '.') }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <hr>

    <div class="text-end">
        <p class="mb-0">Subtotal: Rp {{ number_format($transaksi->subtotal, 0, ',', '.') }}</p>
        <p class="mb-0">Pajak: Rp {{ number_format($transaksi->pajak, 0, ',', '.') }}</p>
        <p class="mb-0">Service: Rp {{ number_format($transaksi->service, 0, ',', '.') }}</p>

        <h5 class="mt-2">
            TOTAL: Rp {{ number_format($transaksi->grand_total, 0, ',', '.') }}
        </h5>
    </div>

    <hr>

    <div class="text-center">
        <small>Terima kasih 🙏</small>
    </div>

    <div class="text-end mt-3">
        <button id="btn-print" data-id="{{ $transaksi->id }}" class="btn btn-primary">
            Print
        </button>
    </div>

</div>