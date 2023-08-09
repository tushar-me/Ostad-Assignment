<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @foreach ($incomes as $income)
    <p>{{ $income->description }} - {{ $income->amount }}</p>
    @endforeach
    {{ $incomes->links() }}

    <form action="{{ route('incomes.index') }}" method="GET">
        <select name="category">
            <option value="food">Food</option>
            <option value="rent">Rent</option>
        </select>
        <input type="text" name="date_range" placeholder="YYYY-MM-DD - YYYY-MM-DD">
        <button type="submit">Apply Filters</button>
    </form>
</body>
</html>