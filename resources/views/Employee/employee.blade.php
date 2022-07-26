@extends('dashboard')
@section('content')
    <a type="button" class="btn btn-success add" href="/AddEmployee">
        Add Employee
    </a>

    <div class="container">

        <table class="table" id="myTable">
            <thead class="thead-dark">
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Company</th>
                    <th>Email</th>
                    <th>Telephone</th>
                    <th>Profile photo</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($employee as $row)
                    <tr>
                        <td>{{ $row->first_name }}</td>
                        <td>{{ $row->last_name }}</td>
                        <td>{{ $row->Name }}</td>
                        <td>{{ $row->email }}</td>
                        <td>{{ $row->phone }}</td>
                        <td><img src="{{ asset('photos/1c85DFidifL3RrXgl7KdoSe7iStq9spL29g1ViT9.png') }}" ></td>

                        <td class="action">
                            <a class="btn btn-primary" href="{{ url('employee/' . $row->id . '/edit') }}">Edit</a>&nbsp;

                            <form action="{{ url('employee/' . $row->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item?');">Delete</button>
                            </form>




                        </td>
                    </tr>
                @endforeach
            </tbody>

        </table>

    </div>
    <script>
         <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.12.1/datatables.min.js"></script>
    </script>
@endsection
