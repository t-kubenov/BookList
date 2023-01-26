<!DOCTYPE html>
<html>

<head>
    <title>BookList App</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-4">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        <div class="card">
            <div class="card-header text-center font-weight-bold">
                Add a Book
            </div>
            <div class="card-body">
                <form name="add" id="add" method="post" action="{{ url('store') }}">
                    @csrf
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" id="name" name="name" class="form-control" required="">
                    </div>
                    <div class="form-group">
                        <label>Author</label>
                        <input type="text" id="author" name="author" class="form-control" required="">
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea name="description" class="form-control" required=""></textarea>
                    </div>
                    <div class="form-group">
                        <label>Page Count</label>
                        <input type="number" id="page_count" name="page_count" class="form-control" required="">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>

        <div>
            <a href="/">List of books</a>
        </div>
    </div>
</body>

</html>
