@extends('dashboard')
@section('content')
    <div class="formData">

        <h3>Update Company Details</h3>

        <form action="{{ url('company/' . $company->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')


            <div class="form-group">
                <label for="exampleFormControlInput1" class="form-label">Name</label>
                <input type="text" class="form-control" name="name" value="{{ $company->Name }}"
                    placeholder="Enter Name">
                <span class="text-danger">
                    @error('name')
                        {{ $message }}
                    @enderror
                </span>
            </div>

            <div class="form-group">
                <label for="exampleFormControlInput1" class="form-label">Email</label>
                <input type="email" class="form-control" id="editEmail" name="email" value="{{ $company->email }}"
                    placeholder="Enter Email">
                <span class="text-danger">
                    @error('email')
                        {{ $message }}
                    @enderror
                </span>
            </div>




            <div class="form-group">
            <label for="exampleFormControlTextarea1" class="form-label">Telephone</label>
            <input type="number" class="form-control" id="editTelephone" name="telephone" value="{{ $company->telephone }}"
                placeholder="Enter Password">
            <span class="text-danger">
                @error('telephone')
                    {{ $message }}
                @enderror
            </span>
        </div>

        <div class="form-group">
            <label for="exampleFormControlTextarea1" class="form-label">Web Site</label>
            <input type="text" class="form-control" id="editWebsite" name="website" value="{{ $company->website }}"
                placeholder="Enter Password">
            <span class="text-danger">
                @error('website')
                    {{ $message }}
                @enderror
            </span>
        </div>



        <div class="form-group">
            <label for="exampleFormControlTextarea1" class="form-label">Company Logo</label>
            <input type="file" id="editlogo" name="logo" class="form-control" value="{{ $company->logo }}">
            <span class="text-danger">
                @error('logo')
                    {{ $message }}
                @enderror
            </span>
        </div>

        <div class="form-group">
            <label for="exampleFormControlTextarea1" class="form-label">Cover Image</label>
            <input type="file" id="editCoverImage" class="form-control" name="cover_image" value="{{ $company->cover_images }}">
            <span class="text-danger">
                @error('cover_image')
                    {{ $message }}
                @enderror
            </span>
        </div>




        <div class="form-group">
            <label for="exampleFormControlTextarea1" class="form-label">Details</label>
            <textarea class="form-control" name="details" id="editDetails" placeholder="Enter Details">{{ $company->details }}</textarea>
            <span class="text-danger">
                @error('details')
                    {{ $message }}
                @enderror
            </span>
        </div>



    <button class="btn btn-success submit" type="submit">Update</button>

    </form>



    </div>
@endsection
