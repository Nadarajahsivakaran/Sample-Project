@extends('dashboard')
@section('content')

<div class="formData">

    <h3>Create Company Details</h3>

    <form action="{{ url('company') }}" method="POST" enctype="multipart/form-data">
        @csrf

            <div class="form-group">
                <label for="exampleFormControlInput1" class="form-label">Name</label>
                <input type="text" class="form-control" name="name" placeholder="Enter Name..." value="{{ old('name') }}">
                <span class="text-danger">
                    @error('name')
                        {{ $message }}
                    @enderror
                </span>
            </div>

            <div class="form-group">
                <label for="exampleFormControlInput1" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" placeholder="Enter Email..." value="{{ old('email') }}">
                <span class="text-danger">
                    @error('email')
                        {{ $message }}
                    @enderror
                </span>
            </div>



            <div class="form-group">
                <label for="exampleFormControlTextarea1" class="form-label">Telephone</label>
                <input type="number" class="form-control" name="telephone" value="{{ old('telephone') }}"
                    placeholder="Enter Password...">
                <span class="text-danger">
                    @error('telephone')
                        {{ $message }}
                    @enderror
                </span>
            </div>

            <div class="form-group">
                <label for="exampleFormControlTextarea1" class="form-label">Web Site</label>
                <input type="text" class="form-control" name="website" placeholder="Enter Password..." value="{{ old('website') }}">
                <span class="text-danger">
                    @error('website')
                        {{ $message }}
                    @enderror
                </span>
            </div>


            <div class="form-group">
                <label for="exampleFormControlTextarea1" class="form-label">Company Logo</label>
                <input type="file" id="myfile" name="logo" class="form-control" value="{{ old('email') }}">
                <span class="text-danger">
                    @error('logo')
                        {{ $message }}
                    @enderror
                </span>
            </div>

            <div class="form-group">
                <label for="exampleFormControlTextarea1" class="form-label">Cover Image</label>
                <input type="file" id="myfile" name="cover_image" class="form-control">
                <span class="text-danger">
                    @error('cover_image')
                        {{ $message }}
                    @enderror
                </span>
            </div>


            <div class="form-group">
                <label for="exampleFormControlTextarea1" class="form-label">Details</label>
                <textarea class="form-control" name="details" placeholder="Enter Details..." value="{{ old('details') }}"></textarea>
                <span class="text-danger">
                    @error('details')
                        {{ $message }}
                    @enderror
                </span>
            </div>



        <button class="btn btn-success submit">Save</button>
    </form>


</div>


@endsection
