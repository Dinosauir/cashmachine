<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form action="{{route('transaction.store')}}" method="POST">
    @csrf
    <input type="hidden" name="type" value="cash">
    <input type="number" placeholder="1's banknotes" name="banknote[1]" step="1" min="0"><br>
    <input type="number" placeholder="5's banknotes" name="banknote[5]" step="1" min="0"><br>
    <input type="number" placeholder="10's banknotes" name="banknote[10]" step="1" min="0"><br>
    <input type="number" placeholder="50's banknotes" name="banknote[50]" step="1" min="0"><br>
    <input type="number" placeholder="100's banknotes" name="banknote[100]" step="1" min="0"><br>
    <button type="submit">Submit!</button>
</form>
</body>
</html>