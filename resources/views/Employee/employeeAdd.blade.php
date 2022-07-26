@extends('dashboard')
@section('content')
    <div class="formData">

        <h3>Create Employee</h3>

        <form action="{{ url('employee') }}" method="POST" enctype="multipart/form-data">
            @csrf


            <div class="form-group">
                <label for="exampleFormControlInput1" class="form-label">First Name</label>
                <input type="text" class="form-control" name="firstName" placeholder="Enter Name" value="{{ old('firstName') }}">
                <span class="text-danger">
                    @error('firstName')
                        {{ $message }}
                    @enderror
                </span>
            </div>

            <div class="form-group">
                <label for="exampleFormControlInput1" class="form-label">Last Name</label>
                <input type="text" class="form-control" name="lastName" placeholder="Enter Email" value="{{ old('lastName') }}">
                <span class="text-danger">
                    @error('lastName')
                        {{ $message }}
                    @enderror
                </span>
            </div>




            <div class="form-group">
                <label for="exampleFormControlTextarea1" class="form-label">Company</label>
                <select class="form-select" name="company_id" aria-label="Default select example" value="{{ old('company_id') }}">
                    <option value="" disabled selected>Please Select</option>
                    @foreach ($company as $row)
                        <option value="{{ $row->id }}">{{ $row->Name }}</option>
                    @endforeach
                </select>
                <span class="text-danger">
                    @error('company_id')
                        {{ $message }}
                    @enderror
                </span>
            </div>

            <div class="form-group">
                <label for="exampleFormControlTextarea1" class="form-label">Email</label>
                <input type="text" class="form-control" name="email" placeholder="Enter Password" value="{{ old('email') }}">
                <span class="text-danger">
                    @error('email')
                        {{ $message }}
                    @enderror
                </span>
            </div>


            <div class="form-group">
                <label for="exampleFormControlTextarea1" class="form-label">Phone</label>
                <input type="number" name="phone" class="form-control" value="{{ old('phone') }}">
                <span class="text-danger">
                    @error('phone')
                        {{ $message }}
                    @enderror
                </span>
            </div>

            <div class="form-group">
                <label for="exampleFormControlTextarea1" class="form-label">Profile picture</label>
                <input type="file" id="myfile" name="profilePicture" class="form-control">
                <span class="text-danger">
                    @error('profilePicture')
                        {{ $message }}
                    @enderror
                </span>
            </div>


            <button class="btn btn-success submit">Save</button>
        </form>


    </div>
@endsection
