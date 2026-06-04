<!DOCTYPE html>
<html>
<head>
    <title>Print Nota</title>

    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial;
            font-size: 14px;
        }

        /* container utama */
        #print-area {
            width: 100%;
            max-width: 600px;   /* aman untuk A4 preview */
            margin: 0 auto;
            padding: 20px;
        }

        /* heading */
        .center {
            text-align: center;
        }

        /* garis */
        hr {
            border: none;
            border-top: 1px dashed #000;
            margin: 10px 0;
        }

        /* table */
        table {
            width: 100%;
            border-collapse: collapse;
        }

        td, th {
            padding: 4px 0;
        }

        /* total */
        .total {
            font-weight: bold;
            font-size: 16px;
        }

        /* PRINT SETTING */
        @media print {
            @page {
                size: auto;
                margin: 10mm;
            }

            body {
                margin: 0;
            }

            #print-area {
                max-width: 100%;
                padding: 0;
            }
        }
    </style>
</head>

<body onload="window.print(); window.onafterprint = function(){ window.close(); }">

<div class="center">
    <h4>HALMAHERA CAFE</h4>
    <small>{{ $transaksi->created_at }}</small>
</div>

<hr>

<p>Kode: {{ $transaksi->kode_transaksi }}</p>
<p>Customer: {{ $transaksi->nama_customer }}</p>

<hr>

<table>
@foreach($transaksi->details as $item)
<tr>
    <td>{{ $item->menu->nama_menu }}</td>
    <td>{{ $item->qty }}</td>
    <td align="right">Rp. {{ number_format($item->subtotal, 0, ',', '.') }}</td>
</tr>
@endforeach
</table>

<hr>

<b>Total: Rp. {{ number_format($transaksi->grand_total, 0, ',', '.') }}</b>

</body>
</html>