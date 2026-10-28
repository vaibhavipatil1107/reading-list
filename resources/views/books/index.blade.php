<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Reading List</title>
</head>
<body>
    <h1>My Reading List</h1>
    <a href="{{ route('books.create') }}">Add a Book</a>
    @if (session('success'))
        <p>{{ session('success') }}</p>
    @endif

    @if ($books->isEmpty())
        <p>No books yet. Add your first book soon!</p>
    @else
        @foreach ($books as $book)
            <div>
                <h2>{{ $book->title }}</h2>
                <p>Author: {{ $book->author }}</p>
                <p>Status: {{ $book->status }}</p>
                
                <a href="{{ route('books.edit', $book) }}">Edit</a>
            </div>
        @endforeach
    @endif
</body>
</html>
