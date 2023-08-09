<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{ route('incomes.store') }}" method="POST">
        @csrf
        <input type="number" name="amount" required>
        <input type="text" name="description" required>
        <input type="date" name="date" required>
        <button type="submit">Add Income</button>
    </form>
</body>
</html>