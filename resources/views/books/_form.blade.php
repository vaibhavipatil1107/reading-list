<div>
    <label for="title">Book Title</label>
    <input
        type="text"
        id="title"
        name="title"
        value="{{ old('title', $book->title ?? '') }}"
        maxlength="255"
        required
    >
    @error('title')
        <p>{{ $message }}</p>
    @enderror
</div>

<div>
    <label for="author">Author</label>
    <input
        type="text"
        id="author"
        name="author"
        value="{{ old('author', $book->author ?? '') }}"
        maxlength="255"
        required
    >
    @error('author')
        <p>{{ $message }}</p>
    @enderror
</div>

<div>
    <label for="status">Reading Status</label>
    <select id="status" name="status" required>
        <option value="to-read" @selected(old('status', $book->status ?? 'to-read') === 'to-read')>To Read</option>
        <option value="reading" @selected(old('status', $book->status ?? 'to-read') === 'reading')>Currently Reading</option>
        <option value="finished" @selected(old('status', $book->status ?? 'to-read') === 'finished')>Finished</option>
    </select>
    @error('status')
        <p>{{ $message }}</p>
    @enderror
</div>

<button type="submit">Save Book</button>
