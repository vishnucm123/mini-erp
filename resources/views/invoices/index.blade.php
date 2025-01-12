@extends('layout.master')

@section('content')
<div class="container-fluid mt--6">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">

                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">{{ __('Invoice List') }}</h3>
                        </div>
                        <div class="col-4 text-right">
                            <a href="{{ route('invoices.create') }}" class="btn btn-sm btn-secondary" id="add-button">{{ __('Add Invoice') }}</a>
                        </div>
                    </div>

                </div>
                <div class="card-body">
                    <table class="table table-bordered table-hover" id="invoices-table">
                        <thead class="thead-light">
                            <tr>
                                <th>#</th>
                                <th>Invoice ID</th>
                                <th>Customer</th>
                                <th>Date</th>
                                <th>Amount</th>
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
    $('#invoices-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{{ route('invoices.data') }}',
        columns: [
            { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
            { data: 'invoice_id', name: 'invoice_id' },
            { data: 'customer', name: 'customer.name' },
            { data: 'date', name: 'date' },
            { data: 'amount', name: 'amount' },
            { data: 'status', name: 'status', orderable: false, searchable: false },
            { data: 'actions', name: 'actions', orderable: false, searchable: false }
        ]
    });
});
</script>
@endpush
