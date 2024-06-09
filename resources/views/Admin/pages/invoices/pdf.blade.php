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
            position: relative; /* Menjadikan posisi elemen absolute terhadap body */
        }
        .invoice-box {
            max-width: 800px;
            margin: auto;
            padding: 30px;
            border: 1px solid #ccc;
            box-shadow: 0 0 10px rgba(0, 0, 0, .15);
            font-size: 16px;
            line-height: 24px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            position: relative; /* Menjadikan posisi elemen absolute terhadap invoice-box */
        }
        .invoice-box h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        .details {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
        }
        .company-details,
        .customer-details {
            flex: 1;
        }
        .invoice-details {
            text-align: right;
        }
        .invoice-details p .paid {
            color: green;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        .total {
            margin-top: 20px;
            text-align: right;
        }
        .footer {
            margin-top: 50px;
            text-align: center;
            color: #777;
        }
        /* Stil untuk watermark */
        .watermark {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 48px;
            color: rgba(0, 128, 0, 0.3); /* Warna hijau dengan opacity */
            z-index: -1; /* Menempatkan watermark di bawah konten lain */
        }
    </style>
</head>
<body>
    <div class="invoice-box">
        <div class="watermark">LUNAS</div> <!-- Watermark -->
        <h1>Invoice</h1>
        <div class="details">
            <div class="company-details">
                <h2>NET IT Comp</h2>
                <p>Jl. Pasar Sindanglaya No. 154</p>
                <p>Telepon: 082320163626</p>
                <p>Email: infonetkomputerbdg@gmail.com</p>
            </div>
            <div class="customer-details">
                <h3>Kepada:</h3>
                <p>{{ $invoice->customer->name }}</p>
                <p>{{ $invoice->customer->address }}</p>
                <p>{{ $invoice->customer->phone }}</p>
                <p>{{ $invoice->customer->email }}</p>
            </div>
            <div class="invoice-details">
                {{-- <h2>Invoice #{{ $invoice->id }}</h2> --}}
                <h2>Invoice #{{ $invoice->id }}{{ \Illuminate\Support\Str::random(5) }}</h2>
                <p>Tanggal: {{ \Carbon\Carbon::parse($invoice->date)->format('d F Y') }}</p>
                <p>Status: <span class="paid">{{ $invoice->status }}</span></p>
            </div>
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
                    <td>Rp {{ number_format($item->unit_price, 0, ',', '.') }}</td>
                    <td>Rp {{ number_format($item->total, 0, ',', '.') }}</td>
                </tr>
                @endforeach
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
