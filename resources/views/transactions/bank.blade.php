<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bank transaction</title>
</head>
<body>
@if(session('success'))
    <h1>{{ session('success') }}</h1>
@endif

<form action="{{ route('transaction.store') }}" method="POST">
    @csrf
    <input type="hidden" name="type" value="bank">
    <label for="transferred_at">Transfer Date</label>
    <input type="date" id="transferred_at" name="transferred_at">
    @error('transferred_at')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <br>

    <label for="customer_name">Customer name</label>
    <input type="text" name="customer_name" id="customer_name">
    @error('customer_name')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <br>
    <label for="account_number">Account number</label>
    <input type="text" name="account_number" id="account_number">
    @error('account_number')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <br>
    <label for="amount">Amount</label>
    <input type="number" name="amount" id="amount">
    @error('amount')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <button type="submit"> Submit!</button>
</form>
</body>
</html>