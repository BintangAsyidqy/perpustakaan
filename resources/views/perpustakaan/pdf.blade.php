<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bukti Peminjaman Buku</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
        }
        .receipt {
            background-color: #ffffff;
            border-radius: 12px;
            box-shadow: 0 4px 40px rgba(0, 0, 0, 0.1);
            padding: 50px;
            max-width: 800px;
            margin: 50px auto;
            border-top: 6px solid #4CAF50;
        }
        h1 {
            text-align: center;
            color: #4CAF50;
            font-size: 36px;
            margin-bottom: 25px;
            font-weight: 700;
            text-transform: uppercase;
        }
        .details {
            margin-bottom: 40px;
            line-height: 1.8;
        }
        .details p {
            font-size: 18px;
            margin: 16px 0;
            color: #555;
        }
        .details p strong {
            color: #4CAF50;
        }
        .details p span {
            color: #4CAF50;
            font-weight: 600;
        }
        .footer {
            text-align: center;
            font-size: 14px;
            color: #777;
            margin-top: 35px;
            border-top: 2px solid #ddd;
            padding-top: 15px;
        }
        .footer a {
            color: #4CAF50;
            text-decoration: none;
            font-weight: bold;
        }
        .footer a:hover {
            text-decoration: underline;
        }
        .separator {
            border-top: 2px dashed #4CAF50;
            margin: 25px 0;
        }
    </style>
</head>
<body>
    <div class="receipt">
        <h1>Bukti Peminjaman Buku</h1>
        <div class="details">
            <p><strong>Nama Peminjam:</strong> {{ $perpustakaan->nama }}</p>
            <p><strong>Judul Buku:</strong> {{ $perpustakaan->type }}</p>
            <p><strong>Tanggal Peminjaman:</strong> <span>{{ $perpustakaan->created_at->format('d-m-Y') }}</span></p>
            <p><strong>Tanggal Pengembalian:</strong> <span>{{ $perpustakaan->lama }} Hari</span></p>
        </div>
        <div class="separator"></div>
        <div class="footer">
            Harap menjaga buku tetap dalam kondisi baik. <br>
            &copy; Perpustakaan Modern 2024 | <a href="#">Kunjungi Kami</a>
        </div>
    </div>
</body>
</html>
