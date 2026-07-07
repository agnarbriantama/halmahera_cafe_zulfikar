<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Print Nota</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding: 0;
            font-family: Arial, Helvetica, sans-serif;
            font-size: 13px;
            color: #000;
            background: #fff;
        }

        #print-area {
            width: 80mm;
            margin: auto;
            padding: 5px;
        }

        .copy {
            margin-bottom: 30px;
        }

        .logo {
            width: 70px;
            height: 70px;
            object-fit: cover;
            border-radius: 50%;
            margin-bottom: 5px;
        }

        .center {
            text-align: center;
        }

        .copy-title {
            text-align: center;
            font-size: 16px;
            font-weight: bold;
            margin-bottom: 10px;
            letter-spacing: 1px;
        }

        .divider {
            border-top: 2px dashed #000;
            border-bottom: 2px dashed #000;
            text-align: center;
            padding: 6px;
            margin: 20px 0;
            font-size: 12px;
            font-weight: bold;
        }

        hr {
            border: none;
            border-top: 1px dashed #000;
            margin: 8px 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        td {
            padding: 3px 0;
            vertical-align: top;
        }

        .text-right {
            text-align: right;
        }

        .text-center {
            text-align: center;
        }

        .bold {
            font-weight: bold;
        }

        .total {
            font-size: 15px;
            font-weight: bold;
        }

        .footer {
            margin-top: 12px;
            text-align: center;
            font-size: 12px;
        }

        @media print {

            @page {
                margin: 0;
                size: 80mm auto;
            }

            body {
                margin: 0;
            }

            #print-area {
                width: 80mm;
                padding: 5px;
            }
        }
    </style>

</head>

<body onload="window.print();window.onafterprint=function(){window.close();}">

<div id="print-area">

{{-- ================= COPY KASIR ================= --}}

<div class="copy">

    <div class="copy-title">
        ARSIP KASIR
    </div>

    <div class="center">
        <img src="{{ asset('electro/img/neo-haru.jpeg') }}" class="logo">

        <h3 style="margin:5px 0;">
            HALMAHERA CAFE
        </h3>

        <small>
            Terima kasih telah berkunjung
        </small>

        <br>

        <small>
            {{ $transaksi->created_at->format('d-m-Y H:i:s') }}
        </small>

    </div>

    <hr>

    <table>

        <tr>
            <td width="35%">Kode</td>
            <td>: {{ $transaksi->kode_transaksi }}</td>
        </tr>

        <tr>
            <td>Kasir</td>
            <td>: {{ $transaksi->user->name }}</td>
        </tr>

        <tr>
            <td>Customer</td>
            <td>: {{ $transaksi->nama_customer ?: '-' }}</td>
        </tr>

        <tr>
            <td>Pembayaran</td>
            <td>: {{ $transaksi->metode_pembayaran }}</td>
        </tr>

    </table>

    <hr>

    <table>

        @foreach($transaksi->details as $item)

        <tr>

            <td colspan="2" class="bold">

                {{ $item->menu->nama_menu }}

            </td>

        </tr>

        <tr>

            <td>

                {{ $item->qty }}
                x
                Rp {{ number_format($item->harga,0,',','.') }}

            </td>

            <td class="text-right">

                Rp {{ number_format($item->subtotal,0,',','.') }}

            </td>

        </tr>

        @endforeach

    </table>

    <hr>

    <table>

        <tr>

            <td>Subtotal</td>

            <td class="text-right">

                Rp {{ number_format($transaksi->subtotal,0,',','.') }}

            </td>

        </tr>

        <!-- <tr>

            <td>Pajak</td>

            <td class="text-right">

                Rp {{ number_format($transaksi->pajak,0,',','.') }}

            </td>

        </tr>

        <tr>

            <td>Service</td>

            <td class="text-right">

                Rp {{ number_format($transaksi->service,0,',','.') }}

            </td>

        </tr> -->

    </table>

    <hr>

    <table>

        <tr class="total">

            <td>TOTAL</td>

            <td class="text-right">

                Rp {{ number_format($transaksi->grand_total,0,',','.') }}

            </td>

        </tr>

    </table>

    <hr>

    <div class="footer">

        <b>Terima Kasih</b>

        <br>

        Selamat Menikmati

    </div>

</div>

<div class="divider">

    ✂&nbsp;&nbsp; SOBEK DI SINI &nbsp;&nbsp;✂

</div>

{{-- ================= COPY CUSTOMER ================= --}}

<div class="copy">

    <div class="copy-title">
         STRUK CUSTOMER
    </div>

    <div class="center">

        <img src="{{ asset('electro/img/neo-haru.jpeg') }}" class="logo">

        <h3 style="margin:5px 0;">
            HALMAHERA CAFE
        </h3>

        <small>
            Terima kasih telah berkunjung
        </small>

        <br>

        <small>
            {{ $transaksi->created_at->format('d-m-Y H:i:s') }}
        </small>

    </div>

    <hr>

    <table>

        <tr>
            <td width="35%">Kode</td>
            <td>: {{ $transaksi->kode_transaksi }}</td>
        </tr>

        <tr>
            <td>Customer</td>
            <td>: {{ $transaksi->nama_customer ?: '-' }}</td>
        </tr>

        <tr>
            <td>Pembayaran</td>
            <td>: {{ $transaksi->metode_pembayaran }}</td>
        </tr>

    </table>

    <hr>

    <table>

        @foreach($transaksi->details as $item)

        <tr>

            <td colspan="2" class="bold">

                {{ $item->menu->nama_menu }}

            </td>

        </tr>

        <tr>

            <td>

                {{ $item->qty }}
                x
                Rp {{ number_format($item->harga,0,',','.') }}

            </td>

            <td class="text-right">

                Rp {{ number_format($item->subtotal,0,',','.') }}

            </td>

        </tr>

        @endforeach

    </table>

    <hr>

    <table>

        <tr>

            <td>Subtotal</td>

            <td class="text-right">

                Rp {{ number_format($transaksi->subtotal,0,',','.') }}

            </td>

        </tr>

        <!-- <tr>

            <td>Pajak</td>

            <td class="text-right">

                Rp {{ number_format($transaksi->pajak,0,',','.') }}

            </td>

        </tr>

        <tr>

            <td>Service</td>

            <td class="text-right">

                Rp {{ number_format($transaksi->service,0,',','.') }}

            </td>

        </tr> -->

    </table>

    <hr>

    <table>

        <tr class="total">

            <td>TOTAL</td>

            <td class="text-right">

                Rp {{ number_format($transaksi->grand_total,0,',','.') }}

            </td>

        </tr>

    </table>

    <hr>

    <div class="footer">
        Harga diatas sudah termasuk PPN

        <br>

        Terima kasih atas kunjungan Anda

        <br>

        Semoga harimu menyenangkan

    </div>

</div>

<div class="divider">

    ✂&nbsp;&nbsp; SOBEK DI SINI &nbsp;&nbsp;✂

</div>

{{-- ================= COPY DAPUR ================= --}}

<div class="copy">

    <div class="copy-title">
        TIKET DAPUR
    </div>

    <div class="center">

        <img src="{{ asset('electro/img/neo-haru.jpeg') }}" class="logo">

        <h3 style="margin:5px 0;">
            HALMAHERA CAFE
        </h3>

        <small>
            ORDER DAPUR
        </small>

        <br>

        <small>
            {{ $transaksi->created_at->format('d-m-Y H:i:s') }}
        </small>

    </div>

    <hr>

    <table>

        <tr>
            <td width="35%">Kode</td>
            <td>: {{ $transaksi->kode_transaksi }}</td>
        </tr>

        <tr>
            <td>Customer</td>
            <td>: {{ $transaksi->nama_customer ?: '-' }}</td>
        </tr>

    </table>

    <hr>

    <table>

        @foreach($transaksi->details as $item)

        <tr>

            <td class="bold">

                {{ $item->menu->nama_menu }}

            </td>

            <td class="text-right bold">

                x{{ $item->qty }}

            </td>

        </tr>

        @endforeach

    </table>

    <hr>

    <div class="center">

        <h3 style="margin:8px 0;">
            SEGERA DIPROSES
        </h3>

        <small>
            Selamat Bekerja 👨‍🍳
        </small>

    </div>

</div>