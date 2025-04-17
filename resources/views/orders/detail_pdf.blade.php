<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sales Report</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #fff;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
        }

        h1 {
            margin-top: 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            border: 1px solid #ddd;
        }

        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>{{ $salesData['period'] }}'s Sales Detail</h1>
    <table>
        <thead>
            <tr>
                <th>Order Time</th>
                <th>Total Amount</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($salesData['details'] as $order)
            <tr>
                <td>{{ $order->order_date }}</td>
                <td>Rp. {{ $order->total_amount }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

</body>
</html>
