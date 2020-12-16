<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todos</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Style CSS -->
    <!-- <link rel="stylesheet" href="public/css/style.css"> -->
    <title>Todos</title>
</head>
<body>
    <style>
        :root {
            --margin: 0.5rem;
        }

        .container {
            padding: 2rem;
            width: 100%;
            margin: 0; /*Left*/
        }

        .hr-1 {
            margin-top: 1rem;
            margin-bottom: 1rem;
            border: 0;
            border-top: 2px solid rgba(0, 0, 0, 0.1);
        }

        #item-title {
            vertical-align: middle;
            margin: 0.5rem;
            padding: 0.5rem;
        }

        #addTitle-btn {
            vertical-align: middle;
            margin: 0.5rem;
            /* padding: 0.5rem 2rem 0.5rem 2rem; */
            font-size: 1.2rem;
        }

    </style>

    <div class="container">
        <h1 class="page-title">What do you need to do next?</h1>
        <hr class="hr-1">
        <x-alert />
        @if ($errors->any())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    {{ $error }}
                @endforeach
            </div>
        @endif


        <form method="post" action="/todos/create">
            @csrf
            <input type="text" name="title" id="item-title">
            <button type="submit" value="Create" class="btn btn-primary" id="addTitle-btn">Create</button>
            <!-- <input type="submit" value="Create" class="btn btn-primary" id="add-btn"> -->
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>