<!-- resources/views/print.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Transaksi - Cetak</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            padding: 20px;
            background-color: #f4f4f4;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            max-width: 800px;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            transition: transform 0.3s ease-in-out;
        }

        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .footer {
            margin-top: 30px;
            text-align: center;
            font-size: 14px;
            color: #666;
        }

        /* Style tambahan untuk animasi */
        .container.print {
            transform: scale(0.8);
        }
    </style>
</head>
<body>

    <div class="container" id="printContainer">

        <h1>Slip Gaji</h1>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Gaji Untuk bulan : </th>
                    <th>Total Gaji</th>
                </tr>
            </thead>
            <tbody>
                @foreach($gaji as $tampil)
                    <tr>
                        <td>{{ $tampil->id_gaji }}</td>
                        <td>{{ $tampil->bulan }}</td>
                        <td><strong>Rp{{ number_format($tampil->gaji_total, 0, ',', '.') }}</strong></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        <div class="footer">
            <p>Good Job, God Bless U!</p>
        </div>

    </div>

    <script>
        window.onload = function() {
            document.getElementById('printContainer').classList.add('print');
            window.print();
            window.onafterprint = function () {
                window.close();
            }
        }
    </script>

</body>
</html>
