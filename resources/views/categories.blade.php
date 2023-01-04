<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title><!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css"
        integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="{{ asset('js/app.js') }}"></script>
</head>

<body>
    <h1>Category Blade</h1>
    @php
        $categories = \App\Category::all();
    @endphp
    @if (@isset($categories))
        <table class="table table-bordered" style="width: 50%;">
            <thead>
                <tr>
                    <th>ID#</th>
                    <th>Name</th>
                    <th>Actions</th>
                </tr>

            </thead>
            <tbody>
                @foreach ($categories as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->name }}</td>
                        <td>
                            <button class="btn btn-primary">Edit</button>
                            <button class="btn btn-danger">Delete</button>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    @endif

    <form id="submitCategory">
        <div class="col-12">
            <div class="">
                <label for="name">Name</label>
                <span id="error" class="text-danger"></span>
                <input id="name" type="text" placeholder="Enter Category Name" class="form-control">
                <button type="submit">Submit</button>
            </div>
        </div>

    </form>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script>
        console.log('hello');
        $('body').on('submit', '#submitCategory', function(e) {
            e.preventDefault();
            console.log('okk');
            axios.post('{{ url('/api/post_category') }}', {
                name: $('#name').val(),
            }).then((response) => {
                    console.log(response);
                }
                Swal.fire({
                    icon:'success',
                    title:'Success',
                    text:'Category Successfully Created',
                    footer:'<a href="">this is just a link</a>',
                });

            ).catch((error) => {
                console.log(error.response.data.errors.name[0]);
                if(error.response.data.errors.name[0]){
                    $('#error').text(error.response.data.errors.name[0]);
                }
            });
        });
    </script>

    {{-- sweet alert --}}
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    
</body>

</html>
