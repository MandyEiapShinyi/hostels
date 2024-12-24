<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Reminder</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
            color: #333;
            margin: 0;
            padding: 20px;
        }
        .container {
            background-color: #ffffff;
            padding: 20px;
            max-width: 600px;
            margin: 0 auto;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .header {
            text-align: center;
            background-color: #007bff;
            color: white;
            padding: 20px;
            border-radius: 8px 8px 0 0;
        }
        .header h1 {
            margin: 0;
        }
        .content {
            padding: 20px;
        }
        .footer {
            text-align: center;
            padding: 20px;
            color: #777;
        }
        .btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border-radius: 5px;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Payment Reminder</h1>
        </div>
        <div class="content">
            <p>Dear {{ $details['name'] }},</p>
            <p>This is a reminder that your payment for room fee is due.</p>
            <p><strong>Amount Due:</strong> ${{ $details['amount'] }}</p>
            <p><strong>Due Date:</strong> {{ $details['due_date']->format('F d, Y') }}</p>

            <p>Please ensure that the payment is made as soon as possible.</p>

            

            <p>If you have any questions, feel free to contact us.</p>

            <p>Thank you,<br>Synergy College Hostel Team</p>
        </div>
        <div class="footer">
            <p>&copy; {{ date('Y') }} Synergy College Hostel. All rights reserved.</p>
        </div>
    </div>
</body>
</html>
