@extends('dashboard')
@section('content')

<div class="formData">

    <h3>Update Employee</h3>
    <form action="{{ url('employee/'.$employee->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')


        <div class="form-group">
                <label for="exampleFormControlInput1" class="form-label">First Name</label>
                <input type="text" class="form-control" name="firstName" placeholder="Enter Name" value="{{ $employee->first_name }}" >
                <span class="text-danger">
                    @error('name')
                        {{ $message }}
                    @enderror
                </span>
            </div>

            <div class="form-group">
                <label for="exampleFormControlInput1" class="form-label">Last Name</label>
                <input type="text" class="form-control" name="lastName" placeholder="Enter Email" value="{{ $employee->last_name }}">
                <span class="text-danger">
                    @error('email')
                        {{ $message }}
                    @enderror
                </span>
            </div>




            <div class="form-group">
                <label for="exampleFormControlTextarea1" class="form-label">Company</label>
                <select class="form-select" name="company_id" aria-label="Default select example"  value="{{ $employee->company_id  }}">
                    @foreach ($company as $row)
                    <option value="{{ $row->id  }}">{{ $row->Name }}</option>
                    @endforeach
                </select>
                <span class="text-danger">
                    @error('telephone')
                        {{ $message }}
                    @enderror
                </span>
            </div>

            <div class="form-group">
                <label for="exampleFormControlTextarea1" class="form-label" >Email</label>
                <input type="text" class="form-control" name="email" placeholder="Enter Password" value="{{ $employee->email  }}">
                <span class="text-danger">
                    @error('website')
                        {{ $message }}
                    @enderror
                </span>
            </div>


            <div class="form-group">
                <label for="exampleFormControlTextarea1" class="form-label">Phone</label>
                <input type="number" class="form-control"  name="phone" value="{{ $employee->phone }}">
                <span class="text-danger">
                    @error('logo')
                        {{ $message }}
                    @enderror
                </span>
            </div>

            <div class="form-group">
                <label for="exampleFormControlTextarea1" class="form-label">Profile picture</label>
                <input type="file" id="myfile" name="profilePicture" class="form-control">
                <span class="text-danger">
                    @error('cover_image')
                        {{ $message }}
                    @enderror
                </span>
            </div>


            <button class="btn btn-success submit">Update</button>
    </form>


</div>


@endsection
