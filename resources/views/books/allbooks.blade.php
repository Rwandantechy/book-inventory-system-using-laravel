@extends('layouts.app')
@section('content')
<div class='dashboard'>
    <div class="dashboard-nav bg-primary">
        <header>
            <a href="books" class="menu-toggle"><i class="fas fa-bars"></i></a>
            <a href="#" class="brand-logo">
                <img src="{{ asset('images/logo.webp') }}" alt="logo" width="100px" height="100px">
                <span>BIMS</span></a>
        </header>
        <nav class="dashboard-nav-list"><a href="#" class="dashboard-nav-item"><i class="fas fa-home"></i>
                Home </a><a href="#" class="dashboard-nav-item active"><i class="fas fa-tachometer-alt"></i> dashboard
            </a><a href="#" class="dashboard-nav-item"><i class="fas fa-file-upload"></i> Books </a>
            <div class='dashboard-nav-dropdown'><a href="#!" class="dashboard-nav-item dashboard-nav-dropdown-toggle"><i class="fas fa-photo-video"></i> Reports </a>
                <div class='dashboard-nav-dropdown-menu'><a href="#" class="dashboard-nav-dropdown-item">All</a><a href="#" class="dashboard-nav-dropdown-item">Recent</a><a href="#" class="dashboard-nav-dropdown-item">Images</a><a href="#" class="dashboard-nav-dropdown-item">Video</a></div>
            </div>
            <div class='dashboard-nav-dropdown'><a href="#!" class="dashboard-nav-item dashboard-nav-dropdown-toggle"><i class="fas fa-users"></i> Users </a>
                <div class='dashboard-nav-dropdown-menu'><a href="#" class="dashboard-nav-dropdown-item">All</a><a href="#" class="dashboard-nav-dropdown-item">Isues</a><a href="#" class="dashboard-nav-dropdown-item">Non-subscribed</a><a href="#" class="dashboard-nav-dropdown-item">Banned</a><a href="#" class="dashboard-nav-dropdown-item">New</a></div>
            </div>
            <div class='dashboard-nav-dropdown'><a href="#!" class="dashboard-nav-item dashboard-nav-dropdown-toggle"><i class="fas fa-money-check-alt"></i> Penalties </a>
                <div class='dashboard-nav-dropdown-menu'><a href="#" class="dashboard-nav-dropdown-item">All</a><a href="#" class="dashboard-nav-dropdown-item">Recent Books</a><a href="#" class="dashboard-nav-dropdown-item"> Projections</a>
                </div>
            </div>
            <a href="#" class="dashboard-nav-item"><i class="fas fa-cogs"></i> Settings </a><a href="#" class="dashboard-nav-item"><i class="fas fa-user"></i> Profile </a>
            <div class="nav-item-divider"></div>
            <a href="#" class="dashboard-nav-item"><i class="fas fa-sign-out-alt"></i> Logout </a>
        </nav>

    </div>
    <div class='dashboard-app'>
        <header class="dashboard-toolbar  opacity-25   bg-primary shadow p-3 mb-5"><a href="#i" class="menu-toggle"><i class="fas fa-bars"></i></a>

            <div class=" container d-flex justify-content-between text-white">
                <div class="text-white">

                    <h1>Inventory Management System</h1>
                </div>

                <div class=" d-flex text-white mt-3">
                    <h3>Innocent|</h2>
                        <button class="btn b text-danger">
                            <h5>Logout</h5>
                        </button>
                </div>
            </div>

        </header>

        </header>
        <div class='dashboard-content'>

            <section style="background-image:url({{ asset('images/back.png') }});" class="right-section p-2 m-0 shadow-sm  rounded ">
                <div class="d-flex justify-content-between">
                    <h1 class="shadow  p-1  bg-white rounded mt-4">Manage Books</h1>
                    <h5> <a href="create" class="btn btn-lg btn-success btn-rounded mt-4">Add Book </a></h5>

                </div>
                <form action="{{ route('books.search') }}" method="GET" class="mt-3  ">
                    <div class="input-group mb-3 ">
                        <input type="text" class="form-control border border-success shadow p-3  bg-white rounded " placeholder="Search by Title or Author" name="query" value="{{ request('query') }}">
                        <div class="input-group-append">
                            <button class="btn opacity-25 bg-primary" type="submit">Search</button>
                        </div>
                    </div>
                </form>
                <div class="table-responsive">
                    <table class="table table-hover table-striped mt-3 ml-0 mb-0 shadow-sm  bg-transparent rounded">
                        <thead class="shadow-lg p-3 mb-5 bg-info rounded">
                            <tr class="border">
                                <th>#</th>
                                <th>cover</th>
                                <th>Title</th>
                                <th>ISBN</th>
                                <th>Author</th>
                                <th>Publisher</th>
                                <th>Edition</th>
                                <th>Category</th>
                                <th>Copies</th>
                                <th>Price</th>
                                <th>Pub_Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($books as $book)
                            <tr class="shadow-sm p-3 mb-5 bg-white rounded ">
                                <td class="">{{$book->BookID}}</td>
                                <td class="p-0">

                                    <img src="{{ asset('storage/uploads/' . $book->BookURL) }}" alt="Book Image" width="100">

                                </td>
                                <td class="">{{ $book->Book_title }}</td>
                                <td class="p-1 ">{{ $book->ISBN }}</td>
                                <td class="p-1">{{ $book->Author }}</td>
                                <td class="p-1">{{ $book->Publisher }}</td>
                                <td class="p-1">{{ $book->Edition }}</td>
                                <td class="p-1">{{ $book->Category }}</td>
                                <td class="p-1">{{ $book->CopiesAvailable }}</td>
                                <td class="p-1">{{ $book->Price }}</td>
                                <td class="p-1">{{ $book->PublicationDate }}</td>
                                <td class="p-1 d-flex align-items-center justify-content-center align-self-center border border-bottom-0 border-right-0 border-left-0">

                                    <form action="{{ route('books.edit', $book->BookID) }}" method="GET">
                                        @csrf
                                        <button type="submit" class="btn btn-success px-4 mr-3">Edit</button>
                                    </form>

                                    <!-- Delete Button -->
                                    <form action="{{ route('books.destroy', $book->BookID) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger mr-0" onclick="confirmDelete(  `$book->BookID `)">Delete</button>
                                    </form>
                                </td>


                            </tr>

                            @endforeach





                        </tbody>



                    </table>
                    <div class="d-flex justify-content-between bg-info p-0 mb-0 shadow-sm">
                        <div class="shadow  h2 mt-3 mb-5 bg-transparent rounded text-white  fs-1">
                            Showing {{ $books->firstItem() }} to {{ $books->lastItem() }} of {{ $books->total() }} books
                        </div>
                        <div><button class="btn h2 h-50 px-2 py-2 m-3 bg-white " id="prevBtn">Previous</button>
                            <button class="btn h-50 h1 px-2 py-2 m-3 bg-primary" id="currentPageBtn">{page}</button>
                            <button class="btn h2 h-50 px-4 py-2 m-3 bg-white" id="nextBtn">Next</button>
                        </div>


                    </div>
                </div>


        </div>


        </section>

    </div>
</div>
</div>

@endsection