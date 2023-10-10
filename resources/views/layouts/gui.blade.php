<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Inventory system</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/gui.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body style="background-image:url({{ asset('images/back.png') }});">

    <header  class="container-fluid p-4 bg-info text-white mr-5">
        <nav class="navbar row navbar-expand-lg navbar-dark  d-flex justify-content-between">

            <ul style="list-style: none;">
                <li><a class="navbar-brand" href="books">
                        <h1>Book Inventory system</h1>
                    </a></li>
            </ul>
            <div style="list-style: none;" class="d-flex p-3 justify-content-evenly">
                <li class="mr-3 text-white bold">
                    <h4>niyinnocent2027@gmail.com |</h4>
                </li>
                <li> <button class="btn b text-danger">
                        <h5>Logout</h5>
                    </button></li>
            </div>
        </nav>
    </header>

    <main class="container p-4 ">
        <button class="float-right rounded btn btn-success p-2 "> <a class=" text-white text-bold " href="create">Add Book</a></button>
        @yield('content')

    </main>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>