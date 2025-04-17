<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Sales Detail</title>
<!-- Custom fonts for this template-->
<link href="/styledashboard/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
<!-- Custom styles for this template-->
<link href="/styledashboard/css/sb-admin-2.min.css" rel="stylesheet">
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 0;
    }

    .container {
        max-width: 800px;
        margin: 20px auto;
        background-color: #fff;
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
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

    .left-align-btn {
        display: flex;
        justify-content: flex-end;
        margin-bottom: 10px;
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
