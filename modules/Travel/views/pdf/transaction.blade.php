<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Transaction History</title>
    <style>
    body {
        font-family: 'DejaVu Sans', Roboto, Lato, sans-serif;
        font-size: 12px;
    }
    .page-break {
        page-break-after: always;
    }
    .small--text {
        font-size: 10px;
    }
    .table-header {
        background: rgba(0,0,0,0.09);
    }
    .table-header th {
        padding: 5px;
    }
    .table-body td {
        padding: 5px;
    }
    </style>
</head>
<body>
    <center>
        <img src="{{ $application->site->logo }}" width="100">
        <br>
        <div><strong>{{ $application->site->title }}</strong></div>
        <div class="small--text">{{ settings('business_address', 'ExPH') }}</div>
    </center>

    <br>

    <h3>Transaction History</h3>
    <div>{{ $data->fullname }}</div>
    <div class="small--text">{{ date('F d, Y') }}</div>

    <br><br>

    <table width="100%">
        <thead class="table-header">
            <tr>
                <th>Experience</th>
                <th>Date Booked</th>
                <th>Payment ID</th>
                <th>PayPal Payer ID</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody class="table-body">
            @foreach ($data->orders as $order)
                <tr>
                    <td>{{ $order->experience->name }}</td>
                    <td>{{ date('F d, Y', strtotime($order->purchased_at)) }}</td>
                    <td>{{ $order->payment_id }}</td>
                    <td>{{ $order->payer_id }}</td>
                    <td>{{ $order->quantity }}</td>
                    <td>{{ $order->price }}</td>
                    <td><strong>{{ $order->total }}</strong></td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>
