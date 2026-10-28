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

    
    <form action="{{ route('books.index') }}" method="GET">
        <label for="status">Filter by status:</label>

        <select name="status" id="status">
            <option value="">All Books</option>
            <option value="to-read" @selected(request('status') === 'to-read')>To Read</option>
            <option value="reading" @selected(request('status') === 'reading')>Currently Reading</option>
            <option value="finished" @selected(request('status') === 'finished')>Finished</option>
        </select>

        <button type="submit">Filter</button>
        <a href="{{ route('books.index') }}">Clear Filter</a>
    </form>

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

                
                <form action="{{ route('books.destroy', $book) }}" method="POST"
                    onsubmit="return confirm('Are you sure you want to delete this book?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>

            </div>
        @endforeach
    @endif
</body>
</html>
