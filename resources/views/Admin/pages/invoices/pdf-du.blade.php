<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice Service Laptop</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f8f8f8;
            position: relative;
        }

        .invoice-box {
            width: 800px;
            padding: 20px;
            border: 1px solid #ccc;
            background-color: #fff;
            position: relative;
            z-index: 1;
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
            text-align: center;
            font-size: 12px;
        }

        .watermark {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 0;
            opacity: 0.1;
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
                <h2>Invoice #14523</h2>
                <p>Tanggal: 08 Juni 2024</p>
                <p>Status: <span class="paid">PAID</span></p>
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
                    <th>Jumlah</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Service Laptop</td>
                    <td>1</td>
                    <td>Rp 500,000</td>
                    <td>Rp 500,000</td>
                </tr>
                <tr>
                    <td>Penggantian SSD</td>
                    <td>1</td>
                    <td>Rp 1,000,000</td>
                    <td>Rp 1,000,000</td>
                </tr>
                <!-- Tambahkan item lain di sini -->
            </tbody>
        </table>
        <div class="total">
            <h3>Total: Rp 1,500,000</h3>
        </div>
        <div class="footer">
            <p>Terima kasih telah menggunakan layanan kami.</p>
        </div>
    </div>
</body>
</html>
