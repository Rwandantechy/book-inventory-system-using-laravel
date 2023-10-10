@extends('layouts.gui')

@section('content')


<br><br>
<form   class="bg-light border border-dark rounded bg-primary shadow p-3 mb-5 border-dark-4 p-4" action="{{ route('store') }}" method="POST"  enctype="multipart/form-data">
    @csrf
    <!-- Validation Errors -->
    @if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <!-- Title -->
    <div class="form-group">
        <label for="BookTitle">Book Title</label>
        <input type="text" name="BookTitle" id="BookTitle" class="form-control" required>
    </div>

    <!-- ISBN -->
    <div class="form-group">
        <label for="ISBN">ISBN</label>
        <input type="text" name="ISBN" id="ISBN" class="form-control" required>
    </div>

    <!-- Author -->
    <div class="form-group">
        <label for="Author">Author</label>
        <input type="text" name="Author" id="Author" class="form-control" required>
    </div>

    <!-- Publisher -->
    <div class="form-group">
        <label for="Publisher">Publisher</label>
        <input type="text" name="Publisher" id="Publisher" class="form-control" required>
    </div>

    <!-- Edition -->
    <div class="form-group">
        <label for="Edition">Edition</label>
        <input type="text" name="Edition" id="Edition" class="form-control" required>
    </div>

    <!-- Category radio option Selection -->
    <div class="form-group">
        <label for="bookCategory">Category</label>
        <div class="form-control">
            <input type="radio" id="comic" name="category" value="comics">
            <label for="Comics">Comics</label><br>
        </div><br>
        <div class="form-control"> <input type="radio" id="fiction" name="category" value="Fiction">
            <label for="Fiction">Fiction</label>
        </div><br>
        <div class="form-control"><input type="radio" id="nonfiction" name="category" value="Non-Fiction">
            <label for="Non-Fiction">Non-Fiction</label><br>
        </div><br>
        <div class="form-control"><input type="radio" id="novel" name="category" value="Novels">
            <label for="NOVELS">Novels</label><br>
        </div><br>
        <div class="form-control"><input type="radio" id="Science" name="category" value="Science">
            <label for="Science">Science</label><br>
        </div><br>
        <div class="form-control">
            <input type="radio" id="magazine" name="category" value="Magazines">
            <label for="Magazines">Magazines</label><br>
        </div><br>
        <div class="form-control"><input type="radio" id="textbook" name="category" value="textbooks">
            <label for="TEXTBOOKS">TextBooks</label><br>
        </div><br>
        <div class="form-control"> <input type="radio" id="other" name="category" value="other">
            <label for="OTHER">Technology</label><br>
        </div>
    </div>

    <!-- Rack selection-->
    <div class="form-group">
        <label for="Rack">Rack</label>
        <select name="rackno" id="bookrack" class="form-control">
            <option value="none">...</option>
            <option value="r1">R1</option>
            <option value="r2">R2</option>
            <option value="r3">R3</option>
            <option value="r4">R4</option>
            <option value="r5">R5</option>
            <option value="r6">R6</option>
            <option value="r7">R7</option>
            <option value="r8">R8</option>
            <option value="r9">R9</option>
            <option value="r10">R10</option>
        </select>
    </div>

    <!-- Copies Available -->
    <div class="form-group">
        <label for="CopiesAvailable">Copies Available</label>
        <input type="number" name="CopiesAvailable" id="CopiesAvailable" class="form-control" required>
    </div>

    <!-- Price -->
    <div class="form-group">
        <label for="Price">Price</label>
        <input type="number" name="Price" id="Price" class="form-control" required>
    </div>

    <!-- Publication Date -->
    <div class="form-group">
        <label for="PublicationDate">Publication Date</label>
        <input type="datetime-local" name="PublicationDate" id="PublicationDate" class="form-control" required>
    </div>

    <!-- Book Image -->
    <div class="form-group">
        <label for="BookImageURL">Book Image</label>
        <input type="file" name="BookImageURL" id="image" class="form-control" accept="image/*">
    </div>


    <div class="form-group float-right mt-5">
        <button type="submit" class="btn btn-success btn-lg  mr-3"> Save</button>
        <button type="close" class="btn btn-danger btn-lg ml-3">Close</button>

    </div>
</form>

@endsection