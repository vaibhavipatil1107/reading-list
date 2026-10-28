<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Book</title>
</head>
<body>
    <h1>Edit Book</h1>

    <form action="{{ route('books.update', $book) }}" method="POST">
        @csrf
        @method('PUT')
        @include('books._form')
    </form>

    <a href="{{ route('books.index') }}">Back to Reading List</a>
</body>
</html>
