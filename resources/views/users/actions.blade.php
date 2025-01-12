


<div class="dropdown">
    <a href="#" class="dropdown-toggle text-secondary" id="actionMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fa fa-ellipsis-v"></i> <!-- Three dots icon -->
    </a>
    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="actionMenu" style="background-color: #f8f9fa;"> <!-- Gray background for dropdown -->
        <!-- Edit Button -->
        {{-- @if(!empty($data['permissionRoleEdit'])) --}}

        <a href="{{ route('users.edit', $user->id) }}" class="dropdown-item text-secondary">
            <i class="fa fa-edit"></i> Edit
        </a>

        {{-- @endif --}}
        <!-- Delete Form -->

        {{-- @if(!empty($data['permissionRoleDelete'])) --}}
        <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline-block;">
            @csrf
            @method('DELETE')
            <button type="submit" class="dropdown-item text-danger" style="background-color: transparent;">
                <i class="fa fa-trash"></i> Delete
            </button>
        </form>
        {{-- @endif --}}
    </div>
</div>

