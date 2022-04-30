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
    <input type="hidden" name="type" value="card">
    <label for="expire_at">Expiration Date</label>
    <input type="date" id="expire_at" name="expire_at">
    @error('expire_at')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <br>

    <label for="card_number">Card Number</label>
    <input type="text" name="card_number" id="card_number">
    @error('card_number')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <br>
    <label for="card_holder">Card holder</label>
    <input type="text" name="card_holder" id="card_holder">
    @error('card_holder')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <br>
    <label for="cvv">CVV</label>
    <input type="number" name="cvv" id="cvv">
    @error('cvv')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <br>
    <label for="amount">CVV</label>
    <input type="number" name="amount" id="amount">
    @error('amount')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <button type="submit"> Submit!</button>
</form>
</body>
</html>