<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Reading List</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
<div class="page">

    <nav class="navbar">
        <a class="brand" href="{{ route('books.index') }}">♡ little <span>library</span></a>
        <a class="nav-link" href="{{ route('books.index') }}">My Collection</a>
    </nav>

    <header class="hero">
        <div>
            <div class="eyebrow">Your personal reading space</div>
            <h1>Your reading corner 📚</h1>
            <p class="subtitle">A little space for the stories you love.</p>
        </div>

        <a class="button" href="{{ route('books.create') }}">＋ Add a book</a>
    </header>

    <section class="stats">
        <div class="stat-card">
            <div class="stat-label">Total books 📚</div>
            <div class="stat-number">{{ \App\Models\Book::count() }}</div>
        </div>
        <div class="stat-card">
            <div class="stat-label">Currently reading 🌷</div>
            <div class="stat-number">{{ \App\Models\Book::where('status', 'reading')->count() }}</div>
        </div>
        <div class="stat-card">
            <div class="stat-label">Finished books ✨</div>
            <div class="stat-number">{{ \App\Models\Book::where('status', 'finished')->count() }}</div>
        </div>
    </section>

    @if (session('success'))
        <div class="alert">{{ session('success') }}</div>
    @endif

    <section>
        <div class="collection-header">
            <h2>Your collection</h2>
        </div>

        <form class="filters" action="{{ route('books.index') }}" method="GET">
            <select name="status" aria-label="Filter by reading status">
                <option value="">All books</option>
                <option value="to-read" @selected(request('status') === 'to-read')>To read</option>
                <option value="reading" @selected(request('status') === 'reading')>Currently reading</option>
                <option value="finished" @selected(request('status') === 'finished')>Finished</option>
            </select>
            <button class="filter-button" type="submit">Apply filter</button>
            <a class="clear-link" href="{{ route('books.index') }}">Clear filter</a>
        </form>

        @if ($books->isEmpty())
            <div class="empty-state">
                <div class="book-icon">📖</div>
                <h2>Your shelf is waiting!</h2>
                <p class="subtitle">Add your first book and start your reading journey.</p>
                <br>
                <a class="button" href="{{ route('books.create') }}">＋ Add your first book</a>
            </div>
        @else
            <div class="book-grid">
                @foreach ($books as $book)
                    <article class="book-card">
                        <div class="book-icon">📚</div>

                        <h3 class="book-title">{{ $book->title }}</h3>
                        <p class="book-author">by {{ $book->author }}</p>

                        <span class="status {{ $book->status === 'reading' ? 'status-reading' : ($book->status === 'finished' ? 'status-finished' : '') }}">
                            @if ($book->status === 'to-read')
                                To read
                            @elseif ($book->status === 'reading')
                                Currently reading
                            @else
                                Finished
                            @endif
                        </span>

                        <div class="card-actions">
                            <a href="{{ route('books.edit', $book) }}">Edit</a>

                            <form action="{{ route('books.destroy', $book) }}"
                                  method="POST"
                                  onsubmit="return confirm('Are you sure you want to delete this book?')">
                                @csrf
                                @method('DELETE')
                                <button class="delete-button" type="submit">Delete</button>
                            </form>
                        </div>
                    </article>
                @endforeach
            </div>
        @endif
    </section>

    <footer class="footer">
        Made with ♡ and a love for books.
    </footer>
</div>
</body>
</html>
