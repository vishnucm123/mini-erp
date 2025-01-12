
@extends('layout.master')

@section('content')
<div class="container-fluid mt--6">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h3 class="mb-0">{{ __('Edit User') }}</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" required>
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" required>
                        </div>

                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="text" class="form-control" id="phone" name="phone" value="{{ $user->phone }}">
                        </div>



                        <div class="form-group">
                            <label for="is_active">Is Active</label>
                            <select class="form-control" id="is_active" name="is_active">
                                <option value="1" {{ $user->is_active ? 'selected' : '' }}>Active</option>
                                <option value="0" {{ !$user->is_active ? 'selected' : '' }}>Inactive</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="profile_picture">Profile Picture (Leave empty to keep current)</label>
                            <input type="file" class="form-control-file" id="profile_picture" name="profile_picture">
                        </div>

                        <!-- Display current profile picture if exists -->
                        @if($user->profile_picture)
                            <div class="form-group">
                                <label for="current_image">Current Profile Picture</label><br>
                                <img id="current_image" src="{{ asset('storage/' . $user->profile_picture) }}"
                                    alt="Profile Picture"
                                    style="width: 150px; height: 150px; object-fit: cover; border-radius: 8px;">
                            </div>
                        @endif

                        <!-- Image preview section -->
                        <div class="form-group">
                            <label for="image_preview">Image Preview</label><br>
                            <img id="image_preview"
                                src="#"
                                alt="Image Preview"
                                style="width: 150px; height: 150px; object-fit: cover; border-radius: 8px; display: none;">
                        </div>

                        <div class="form-group">
                            <label for="password">Password (Leave blank to keep current password)</label>
                            <input type="password" class="form-control" id="password" name="password">
                        </div>

                        <button type="submit" class="btn btn-primary">Update User</button>
                        <a href="{{ route('users.index') }}" class="btn btn-secondary">Back</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



<script>
    document.getElementById('profile_picture').addEventListener('change', function(event) {
        const reader = new FileReader();

        reader.onload = function(e) {
            const preview = document.getElementById('image_preview');
            preview.src = e.target.result;
            preview.style.display = 'block'; // Show the image preview
        };

        if (event.target.files[0]) {
            reader.readAsDataURL(event.target.files[0]); // Read the selected file
        } else {
            // Hide the preview if no file is selected
            const preview = document.getElementById('image_preview');
            preview.src = '';
            preview.style.display = 'none';
        }
    });
</script>

@endsection
