<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Receipt</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .receipt {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .details {
            margin-bottom: 20px;
        }
        .footer {
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="receipt">
        <div class="header">
            <h1>Payment Receipt</h1>
            <p>Veggies Friends</p>
        </div>
        <div class="details">
            <p><strong>No (Payment Id):</strong> {{ $payment->id }}</p>
            <p><strong>Time:</strong> {{ \Carbon\Carbon::parse($payment->payment_date)->locale('id')->translatedFormat('d F Y H:i:s') }}</p>
            <p><strong>Payment Method:</strong> {{ $payment->payment_method }}</p>
            <p><strong>Total:</strong> {{ $payment->amount }}</p>
        </div>
        <div class="footer">
            <p>Thank you for your payment!</p>
        </div>
    </div>
</body>
</html>
