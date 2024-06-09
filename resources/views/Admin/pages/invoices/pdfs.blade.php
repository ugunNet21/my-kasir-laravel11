<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice Service Laptop</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            position: relative;
        }

        .invoice-box {
            width: 100%;
            padding: 20px;
        }

        .invoice-box h1, .invoice-box h2, .invoice-box h3 {
            margin: 0;
            padding: 0;
        }

        .header, .customer-details, .total, .footer {
            margin-bottom: 20px;
        }

        .company-details, .invoice-details {
            display: inline-block;
            vertical-align: top;
        }

        .company-details {
            width: 60%;
        }

        .invoice-details {
            width: 35%;
            text-align: right;
        }

        .paid {
            color: green;
            font-weight: bold;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table th, table td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: left;
        }

        .total h3 {
            text-align: right;
        }

        .footer {
            position: fixed;
            bottom: 20px;
            width: 100%;
            text-align: center;
            font-size: 12px;
        }

        @page {
            size: A4;
            margin: 0;
        }

        @media print {
            .footer {
                position: fixed;
                bottom: 20px;
                width: 100%;
                text-align: center;
                font-size: 12px;
            }
        }

        table th:nth-child(4),
        table td:nth-child(4) {
            padding: 8px 20px;
            margin-right: 3px;
        }
    </style>
</head>
<body>
    <div class="invoice-box">
        <h1>Invoice</h1>
        <div class="header">
            <div class="company-details">
                <h2>NET IT Comp</h2>
                <p>Jl. Pasar Sindanglaya No. 154</p>
                <p>Telepon: 082320163626</p>
                <p>Email: infonetkomputerbdg@gmail.com</p>
            </div>
            <div class="invoice-details">
                <h2>Invoice #{{ $invoice->id }}</h2>
                <p>Tanggal: {{ \Carbon\Carbon::parse($invoice->date)->format('d F Y') }}</p>
                <p>Status: <span class="paid">{{ $invoice->status }}</span></p>
            </div>
        </div>
        <div class="customer-details">
            <h3>Kepada:</h3>
            <p>SMA Al-Ihsan Cimencrang</p>
            <p>Jl. Cimincrang Jl. Cilameta No.13 Cimencrang - Kota. Bandung</p>
            <p>Telepon: 098-765-4321</p>
            <p>Email: gurusma.ibslabkom@gmail.com</p>
        </div>
        <table>
            <thead>
                <tr>
                    <th>Deskripsi</th>
                    <th>Kuantitas</th>
                    <th>Harga Satuan</th>
                    <th style="padding: 8px 20px;">Jumlah</th>
                </tr>
            </thead>
            <tbody>
                @foreach($invoice->items as $item)
                <tr>
                    <td>{{ $item->description }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>{{ $item->unit_price }}</td>
                    <td>{{ $item->total }}</td>
                </tr>
                @endforeach
                <!-- Tambahkan item lain di sini -->
            </tbody>
        </table>
        <div class="total">
            <h2>Total: Rp {{ number_format($invoice->grand_total, 0, ',', '.') }}</h2>
        </div>
    </div>
    <div class="footer">
        <p>Terima kasih telah menggunakan layanan kami.</p>
    </div>
</body>
</html>
