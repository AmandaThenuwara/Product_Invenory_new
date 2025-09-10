<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>order creation</h1>
    <form action="{{ route('orders.store') }}" method="POST">
        @csrf
        @method('POST')
        <label for="order_id">Order ID:</label>
        <input type="text" id="order_id" name="order_id" required>

        <label for="company_name">Supplier Name:</label>
        <select id="company_name" name="company_name">
            <option value="">Select a supplier</option>
            @foreach($suppliers as $supplier)
            <option value="{{ $supplier->company_name }}">{{ $supplier->company_name }}</option>
            @endforeach                                
        </select>

        <label for="order_date">Order Date:</label>
        <input type="date" id="order_date" name="order_date" required>

        <label for="status">Status:</label>
        <select id="status" name="status">
            <option value="pending">Pending</option>
            <option value="completed">Completed</option>
            <option value="canceled">Canceled</option>
        </select>

        <label for="total_amount">Total Amount:</label>
        <input type="number" id="total_amount" name="total_amount" step="0.01" required>

        <button type="submit">Create Order</button>
    </form>
</body>
</html>