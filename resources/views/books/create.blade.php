<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add a Book | Little Library</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
<div class="page">
    <nav class="navbar">
        <a class="brand" href="{{ route('books.index') }}">♡ little <span>library</span></a>
        <a class="nav-link" href="{{ route('books.index') }}">My Collection</a>
    </nav>

    <div class="form-card">
        <div class="eyebrow">A new chapter begins</div>
        <h1>Add a book 📖</h1>
        <p class="subtitle">Add another story to your little collection.</p>

        <br>

        <form action="{{ route('books.store') }}" method="POST">
            @csrf

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
                       value="{{ old('title') }}" maxlength="255" required>
                @error('title')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label for="author">Author</label>
                <input type="text" id="author" name="author"
                       value="{{ old('author') }}" maxlength="255" required>
                @error('author')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label for="status">Reading status</label>
                <select class="form-select" id="status" name="status" required>
                    <option value="to-read" @selected(old('status', 'to-read') === 'to-read')>To read</option>
                    <option value="reading" @selected(old('status') === 'reading')>Currently reading</option>
                    <option value="finished" @selected(old('status') === 'finished')>Finished</option>
                </select>
                @error('status')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>

            <button class="button" type="submit">Save to my library ♡</button>
        </form>

        <a class="back-link" href="{{ route('books.index') }}">← Back to my collection</a>
    </div>

    <footer class="footer">Every book holds a little magic.</footer>
</div>
</body>
</html>
