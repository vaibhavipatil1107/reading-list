<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add a Book</title>
</head>
<body>
    <h1>Add a Book</h1>

    <form action="{{ route('books.store') }}" method="POST">
        @csrf
        @include('books._form')
    </form>

    <a href="{{ route('books.index') }}">Back to Reading List</a>
</body>
</html>
