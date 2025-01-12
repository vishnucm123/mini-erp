@extends('layout.master')

@section('content')
<div class="container-fluid mt--6">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">{{ __('Customer List') }}</h3>
                        </div>
                        <div class="col-4 text-right">
                            <a href="{{ route('customers.create') }}" class="btn btn-sm btn-secondary" id="add-button">{{ __('Add Customer') }}</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-hover" id="customers-table">

                        <thead class="thead-light">
                            <tr>
                                <th>#</th>
                                <th>Profile Picture</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection






@push('js')
<script>
    $(function () {
        $('#customers-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{{ route('customers.data') }}', // Ensure this route is correct
            columns: [
                { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                { data: 'profile_picture', name: 'profile_picture', orderable: false, searchable: false },
                { data: 'name', name: 'name' },
                { data: 'email', name: 'email' },
                { data: 'phone', name: 'phone' },
                { data: 'is_active', name: 'is_active' },
                { data: 'actions', name: 'actions', orderable: false, searchable: false }
            ]
        });
    });
</script>
@endpush

