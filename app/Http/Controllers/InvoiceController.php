<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Invoice;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class InvoiceController extends Controller
{

    public function index()
    {
        $invoices = Invoice::with('customer')->get();
        return view('invoices.index', compact('invoices'));
    }

    public function getData(Request $request)
    {
        $query = Invoice::with('customer');

        return DataTables::of($query)
            ->addIndexColumn()
            ->addColumn('customer', function ($row) {
                return $row->customer ? $row->customer->name : 'N/A';
            })
            ->addColumn('status', function ($row) {
                return '<span class="badge badge-' . ($row->status === 'paid' ? 'success' : ($row->status === 'unpaid' ? 'warning' : 'danger')) . '">' . ucfirst($row->status) . '</span>';
            })
            ->addColumn('actions', function ($row) {
                return view('invoices.actions', ['invoice' => $row])->render();
            })
            ->rawColumns(['status', 'actions'])
            ->make(true);
    }

    public function create()
        {
            $customers = Customer::all();
            return view('invoices.create', compact('customers'));
        }

    public function store(Request $request)
        {
            $request->validate([
                'customer_id' => 'required|exists:customers,id',
                'date' => 'required|date',
                'amount' => 'required|numeric',
                'status' => 'required|in:unpaid,paid,cancelled',
            ]);

            Invoice::create([
                'customer_id' => $request->customer_id,
                'date' => $request->date,
                'amount' => $request->amount,
                'status' => $request->status,
            ]);

            return redirect()->route('invoices.index')->with('success', 'Invoice created successfully.');
        }

        public function edit($id)
        {
            $invoice = Invoice::findOrFail($id);
            $customers = Customer::all();
            return view('invoices.edit', compact('invoice', 'customers'));
        }

            public function update(Request $request, $id)
        {
            $request->validate([
                'customer_id' => 'required|exists:customers,id',
                'date' => 'required|date',
                'amount' => 'required|numeric',
                'status' => 'required|in:unpaid,paid,cancelled',
            ]);

            $invoice = Invoice::findOrFail($id);
            $invoice->update([
                'customer_id' => $request->customer_id,
                'date' => $request->date,
                'amount' => $request->amount,
                'status' => $request->status,
            ]);

            return redirect()->route('invoices.index')->with('success', 'Invoice updated successfully.');
        }

        public function destroy($id)
        {
            $invoice = Invoice::findOrFail($id);
            $invoice->delete();

            return redirect()->route('invoices.index')->with('success', 'Invoice deleted successfully.');
        }

}
