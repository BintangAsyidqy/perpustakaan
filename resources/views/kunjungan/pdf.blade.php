<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kunjungan Perpustakaan</title>
    <style>
        body {
            font-family: "Arial", sans-serif;
            margin: 40px;
            background-color: #f4f4f9;
            color: #333;
        }
        h2 {
            text-align: center;
            color: #00376b;
            font-size: 24px;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            background-color: #fff;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th {
            background-color: #0056b3;
            color: #fff;
            padding: 15px;
            text-align: left;
            font-size: 16px;
        }
        td {
            padding: 15px;
            text-align: left;
            font-size: 14px;
        }
        tr:nth-child(even) td {
            background-color: #f9f9f9;
        }
        tr:hover td {
            background-color: #eef2f7;
        }
        .footer {
            text-align: center;
            margin-top: 20px;
            font-size: 12px;
            color: #666;
        }
    </style>
</head>
<body>
    <h2>Detail Kunjungan Perpustakaan</h2>
    <table>
        <tr>
            <th>Nama Pengunjung</th>
            <td>{{ $kunjungan->nama_pengunjung }}</td>
        </tr>
        <tr>
            <th>Tanggal Kunjungan</th>
            <td>{{ $kunjungan->tanggal_kunjungan }}</td>
        </tr>
        <tr>
            <th>Keperluan</th>
            <td>{{ $kunjungan->keperluan }}</td>
        </tr>
    </table>
    <div class="footer">
        <p>&copy; {{ date('Y') }} Perpustakaan Kita - Semua Hak Dilindungi.</p>
    </div>
</body>
</html>
