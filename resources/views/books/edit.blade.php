<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Book | Little Library</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
<div class="page">
    <nav class="navbar">
        <a class="brand" href="{{ route('books.index') }}">♡ little <span>library</span></a>
        <a class="nav-link" href="{{ route('books.index') }}">My Collection</a>
    </nav>

    <div class="form-card">
        <div class="eyebrow">A little update</div>
        <h1>Edit your book ✨</h1>
        <p class="subtitle">Update the details of this story.</p>

        <br>

        <form action="{{ route('books.update', $book) }}" method="POST">
            @csrf
            @method('PUT')

            @if ($errors->any())
                <div class="error-list">
                    <p>Please fix the following errors:</p>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="form-group">
                <label for="title">Book title</label>
                <input type="text" id="title" name="title"
                       value="{{ old('title', $book->title) }}" maxlength="255" required>
                @error('title')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label for="author">Author</label>
                <input type="text" id="author" name="author"
                       value="{{ old('author', $book->author) }}" maxlength="255" required>
                @error('author')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label for="status">Reading status</label>
                <select class="form-select" id="status" name="status" required>
                    <option value="to-read" @selected(old('status', $book->status) === 'to-read')>To read</option>
                    <option value="reading" @selected(old('status', $book->status) === 'reading')>Currently reading</option>
                    <option value="finished" @selected(old('status', $book->status) === 'finished')>Finished</option>
                </select>
                @error('status')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>

            <button class="button" type="submit">Save changes ♡</button>
        </form>

        <a class="back-link" href="{{ route('books.index') }}">← Back to my collection</a>
    </div>

    <footer class="footer">Your library, your way.</footer>
</div>
</body>
</html>
