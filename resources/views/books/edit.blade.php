@extends('layouts.gui')

@section('content')
<h1>Edit Book</h1>
<form class=" bg-light border border-dark rounded  border-dark-4 p-4 mt-4" action="{{ route('books.update', $book->BookID) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <!-- Title -->
    <div class="form-group">
        <label for="Book Title">Book Title</label>
        <input type="text" class="form-control" name="Book_title" id="Book_Title" value="{{ $book->Book_title }}" >
    </div>
    <!-- ISBN -->
    <div class="form-group">
        <label for="ISBN">ISBN</label>
        <input type="text" class="form-control" name="ISBN" id="ISBN" value="{{ $book->ISBN }}" >
    </div>
    <!-- Author -->
    <div class="form-group">
        <label for="Author">Author</label>
        <input type="text" class="form-control" name="Author" id="Author" value="{{ $book->Author }}" >
    </div>
    <!-- Publisher -->
    <div class="form-group">
        <label for="Publisher">Publisher</label>
        <input type="text" class="form-control" name="Publisher" id="Publisher" value="{{ $book->Publisher }}" >
    </div>
    <!-- Edition -->
    <div class="form-group">
        <label for="Edition">Edition</label>
        <input type="text" class="form-control" name="Edition" id="Edition" value="{{ $book->Edition }}" >
    </div>
    <!-- Category radio option Selection -->
    <div class="form-group">
        <label for="bookCategory">Category</label><br>

        @foreach($categories as $category)
        <div class="form-check">
            <input type="radio" id="{{ $category }}" name="Category" value="{{ $category }}" class="form-check-input" {{ $book->Category === $category ? 'checked' : '' }}>
            <label for="{{ $category }}" class="form-check-label">{{ $category }}</label><br>
        </div>
        @endforeach
    </div>


    <!-- Rack selection-->
    <div class="form-group">

        <label for="Rack">Rack</label>
        <select class="form-control" name="Rack" id="bookrack">
            <option value="R1" {{ $book->Rack === 'R1' ? 'selected' : '' }}>R1</option>
            <option value="R2" {{ $book->Rack === 'R2' ? 'selected' : '' }}>R2</option>
            <option value="R3" {{ $book->Rack === 'R3' ? 'selected' : '' }}>R3</option>
            <option value="R4" {{ $book->Rack === 'R4' ? 'selected' : '' }}>R4</option>
            <option value="R5" {{ $book->Rack === 'R5' ? 'selected' : '' }}>R5</option>
            <option value="R6" {{ $book->Rack === 'R6' ? 'selected' : '' }}>R6</option>
            <option value="R7" {{ $book->Rack === 'R7' ? 'selected' : '' }}>R7</option>
            <option value="R8" {{ $book->Rack === 'R8' ? 'selected' : '' }}>R8</option>
            <option value="R9" {{ $book->Rack === 'R9' ? 'selected' : '' }}>R9</option>
            <option value="R10" {{ $book->Rack === 'R10' ? 'selected' : '' }}>R10</option>
        </select>
    </div>

    <!-- Copies Available -->
    <div class="form-group">

        <label for="CopiesAvailable">Copies Available</label>
        <input type="number" class="form-control" name="CopiesAvailable" id="CopiesAvailable" value="{{ $book->CopiesAvailable }}" >
    </div>
    <!-- Price -->
    <div class="form-group">

        <label for="Price">Price</label>
        <input type="number" class="form-control" name="Price" id="Price" value="{{ $book->Price }}" >
    </div>
    <!-- Publication Date -->
    <div class="form-group">

        <label for="PublicationDate">Publication Date</label>
        <input type="datetime-local" class="form-control" name="PublicationDate" id="PublicationDate" value="{{ $book->PublicationDate }}" >
    </div>
    <div class="form-group">

        <label for="BookURL">Book Image</label>
        <input type="file" class="form-control" name="BookURL" id="image" value="{{ $book->BookURL }}" >
    </div>
    <!-- Submit -->
    <input type="submit" value="Update Book" class="btn btn-success">
</form>

@endsection