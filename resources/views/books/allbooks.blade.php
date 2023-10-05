@extends('layouts.app')
@section('content')
<div class="row">
    <section class="left-section col-2  border shadow shadow-3 shadow-light bg-light  text-primary">
        <h2 class="h2">Manage books</h2>

        <div class="gx-5 mb-5">

            <button class="btn text-primary mb-5 ml-0" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <h5>Books <span><i class="fas ml-2 fa-angle-down expand-icon text-dark"></i></span></h5>
            </button>
            <ul style="background-color:white; border:none; position: relative;" class="dropdown-menu text-primary my-auto" aria-labelledby="dropdownMenuButton">
                <li> <a class="dropdown-item text-primary" href="#">Manage Books</a></li>
                <li> <a class="dropdown-item text-primary" href="#">Category</a></li>
                <li> <a class="dropdown-item text-primary" href="#">Author</a></li>
                <li> <a class="dropdown-item text-primary" href="#">Publisher</a></li>
                <li> <a class="dropdown-item text-primary" href="#">Rack</a></li>

            </ul>
        </div>
        <div class="text-uppercase fs-1 mt-5"><a href="#">Issue Books</a></div>
        <div class=" text-uppercase fs-1"><a href="">User</a></div>
        <div class="text-uppercase fs-1"><a href="">Report</a></div>
        <div class="text-uppercase fs-1"><a href="">Settings</a></div>

    </section>

    <section class="right-section h-100 bg-transparent col-10 border  border-top-5  shadow shadow-5 pt-5 shadow-light">
        <div class=" d-flex justify-content-between">
            <h1 class="mt-4 ">Manage Books</h1>
            <h5> <a href="create" class="btn-lg btn-success mt-auto">Add Book </a></h5>
        </div>
        <form action="{{ route('books.search') }}" method="GET" class="mt-3 ml-0 col-auto">
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Search by Title or Author" name="query" value="{{ request('query') }}">
                <div class="input-group-append">
                    <button class="btn btn-primary" type="submit">Search</button>
                </div>
            </div>
        </form>
        <div class="table-responsive">
            <table class="table table-striped bg-light table-bordered mt-3 ml-0 shadow shadow-3 shadow-danger">
                <thead class="thead-dark">
                    <tr class="border">
                        <th>NO</th>
                        <th>Image</th>
                        <th>Title</th>
                        <th>ISBN</th>
                        <th>Author</th>
                        <th>Publisher</th>
                        <th>Edition</th>
                        <th>Category</th>
                        <th>Copies</th>
                        <th>Price</th>
                        <th>Pub_Date</th>
                        <th class="p-1 border border-info">Action</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($books as $book)
                    <tr class=" border border-dark border-bottom ">
                        <td class="p-1 border border-info">{{$book->BookID}}</td>
                        <td class="p-1 border border-info">

                            <img src="{{ asset('storage/uploads/' . $book->BookURL) }}" alt="Book Image" width="100">

                        </td>
                        <td class="p-1 border border-info">{{ $book->Book_title }}</td>
                        <td class="p-1 ">{{ $book->ISBN }}</td>
                        <td class="p-1 border border-info">{{ $book->Author }}</td>
                        <td class="p-1 border border-info">{{ $book->Publisher }}</td>
                        <td class="p-1 border border-info">{{ $book->Edition }}</td>
                        <td class="p-1 border border-info">{{ $book->Category }}</td>
                        <td class="p-1 border border-info">{{ $book->CopiesAvailable }}</td>
                        <td class="p-1 border border-info">{{ $book->Price }}</td>
                        <td class="p-1 border border-info">{{ $book->PublicationDate }}</td>
                        <td class="d-flex justify-content-evenly">

                            <form action="{{ route('books.edit', $book->BookID) }}" method="GET" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-primary mr-3">Edit</button>
                            </form>

                            <!-- Delete Button -->
                            <form action="{{ route('books.destroy', $book->BookID) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger mr-0" onclick="confirmDelete(  `$book->BookID `)">Delete</button>
                            </form>
                        </td>


                    </tr>

                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="d-flex justify-content-between mt-3">
            <div class="bg-secondary rounded p-3 text-primary bold text-uppercase fs-1">
                Showing {{ $books->firstItem() }} to {{ $books->lastItem() }} of {{ $books->total() }} books
            </div>
            <div>
                {{ $books->links('pagination::bootstrap-4') }}
            </div>
            <div>
                <button class="btn btn-primary" wire:click="previousPage" @if($books->onFirstPage()) @endif>Previous</button>
                @if($books->lastPage() > 1)
                <div class="btn-group" role="group">
                    @if($books->currentPage() > 2)
                    <button class="btn btn-primary" wire:click="gotoPage(1)">1</button>
                    @if($books->currentPage() > 3)
                    <span class="btn btn-primary">...</span>
                    @endif
                    @endif
                    @for ($i = max(1, $books->currentPage() - 1); $i <= min($books->lastPage(), $books->currentPage() + 1); $i++)
                        <button class="btn btn-primary {{ $i == $books->currentPage() ? 'active' : '' }}" wire:click="gotoPage({{ $i }})">{{ $i }}</button>
                        @endfor
                        @if($books->currentPage() < $books->lastPage() - 1)
                            @if($books->currentPage() < $books->lastPage() - 2)
                                <span class="btn btn-primary">...</span>
                                @endif
                                <button class="btn btn-primary" wire:click="gotoPage({{ $books->lastPage() }})">{{ $books->lastPage() }}</button>
                                @endif
                </div>
                @else
                <button class="btn btn-primary active">1</button>
                @endif
                <button class="btn btn-primary" wire:click="nextPage" @if($books->currentPage() == $books->lastPage()) @endif>Next</button>
            </div>
        </div>


    </section>
</div>


@endsection