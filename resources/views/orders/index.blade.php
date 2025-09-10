<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>order details</h1>
    <a href="{{ route('orders.create') }}">Add New Order</a>
    
    <div>
        <table>
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th>Supplier Name</th>
                    <th>Order Date</th>
                    <th>Status</th>
                    <th>Total Amount</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                <tr>
                    <td>{{ $order->order_id }}</td>
                    <td>{{ $order->company_name }}</td>
                    <td>{{ $order->order_date }}</td>
                    <td>{{ $order->status }}</td>
                    <td>${{ number_format($order->total_amount, 2) }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>