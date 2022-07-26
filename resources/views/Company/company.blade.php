@extends('dashboard')
@section('content')

    @if (\Session::has('success'))
        <div class="alert alert-success fade-message">
            <p>{{ \Session::get('success') }}</p>
        </div><br />
    @endif

    @if (\Session::has('fail'))
        <div class="alert alert-danger fade-message">
            <p>{{ \Session::get('fail') }}</p>
        </div><br />
    @endif

    <a type="button" class="btn btn-success add" href="/AddCompany">
        Add Company
    </a>

    <div class="container">

        <table class="table" id="myTable">
            <thead class="thead-dark">
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Telephone</th>
                    <th>Logo</th>
                    <th>Cover Image</th>
                    <th>Details</th>
                    <th>Action</th>

                </tr>
            </thead>

            <tbody>
                @foreach ($company as $row)
                    <tr>
                        <td>{{ $row->Name }}</td>
                        <td>{{ $row->email }}</td>
                        <td>{{ $row->telephone }}</td>
                        <td><img src="{{ asset('photos/1c85DFidifL3RrXgl7KdoSe7iStq9spL29g1ViT9.png') }}"></td>
                        <td><img src="{{ URL::asset($row->cover_images) }}"></td>
                        <td>{{ $row->details }}</td>
                        <td class="action">
                            <a class="btn btn-primary" href="{{ url('company/' . $row->id . '/edit') }}">Edit</a>&nbsp;

                            <form action="{{ url('company/' . $row->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger"
                                    onclick="return confirm('Are you sure you want to delete this item?');">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>

        </table>

    </div>
    
    <script>


        $(function() {
            setTimeout(function() {
                $('.fade-message').slideUp();
            }, 1000);
        });


    </script>
@endsection
