

@extends('layout.master')

@section('content')
<div class="container-fluid mt--6">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h3 class="mb-0">{{ __('Create User') }}</h3>
                </div>
                <div class="card-body">

                        <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name"  value="{{ old('name') }}">
                            @error('name')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
                            @error('email')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="phone">Phone</label>
                            {{-- <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone') }}"> --}}
                            <input type="text" class="form-control" id="phone" name="phone" value="{{ $errors->any() ? old('phone') : '' }}">
                            @error('phone')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>


                        <div class="form-group">
                            <label for="is_active">Is Active</label>
                            <select class="form-control" id="is_active" name="is_active">
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>

                            @error('is_active')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="profile_picture">Profile Picture</label>
                            <input type="file" class="form-control-file" id="profile_picture" name="profile_picture">
                            @error('profile_picture')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror

                        </div>

                        <!-- Image Preview -->
                        <div class="form-group">
                            <label for="preview">Image Preview</label>
                            <img id="image_preview" src="#" alt="Profile Picture Preview" style="display: none; width: 150px; height: 150px; object-fit: cover; border-radius: 8px;">
                        </div>

                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password" >
                            @error('password')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Add User</button>
                        <a href="{{ route('users.index') }}" class="btn btn-secondary">Back</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



<script>
    // Image preview functionality
    document.getElementById('profile_picture').addEventListener('change', function(event) {
        var reader = new FileReader();
        reader.onload = function(e) {
            var preview = document.getElementById('image_preview');
            preview.src = e.target.result;
            preview.style.display = 'block'; // Show the image preview
        };
        reader.readAsDataURL(event.target.files[0]);
    });
</script>
@endsection


