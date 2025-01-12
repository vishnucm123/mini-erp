<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class CustomerController extends Controller
{
    public function index(Request $request)
    {

        $customers = Customer::all();

        return view('customers.index',compact('customers'));
    }

    public function getData(Request $request)
    {
        $query = Customer::query(); // Use a query builder for server-side processing

        return DataTables::of($query)
            ->addIndexColumn() // Automatically add row index
            ->addColumn('profile_picture', function ($row) {
                return $row->profile_picture
                    ? '<img src="' . asset('storage/' . $row->profile_picture) . '" alt="Profile Picture" class="img-fluid rounded-circle" style="width: 50px; height: 50px;">'
                    : '<span>No Image</span>';
            })
            ->addColumn('is_active', function ($row) {
                return $row->is_active
                    ? '<span class="badge badge-success">Active</span>'
                    : '<span class="badge badge-danger">Inactive</span>';
            })
            ->addColumn('actions', function ($row) {
                return view('customers.actions', ['customer' => $row])->render();
            })
            ->rawColumns(['profile_picture', 'is_active', 'actions']) // Allow HTML rendering
            ->make(true);
    }

    public function create()
    {

        return view('customers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:customers,email',
            'phone' => 'required|string|max:15',
            'is_active' => 'required|boolean',
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'address' =>'required|string',

        ]);

        $profilePicturePath = null;
        if ($request->hasFile('profile_picture')) {
            $profilePicturePath = $request->file('profile_picture')->store('profile_pictures', 'public');
        }

        Customer::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'is_active' => $request->is_active,
            'profile_picture' => $profilePicturePath,
            'address' => $request->address,
        ]);

        return redirect()->route('customers.index')->with('success', 'Customer added successfully.');
    }

    public function edit(Customer $customer)
    {
        return view('customers.edit', compact('customer'));
    }

    public function update(Request $request, Customer $customer)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:customers,email,' . $customer->id,
            'phone' => 'required|string|max:15',
            'is_active' => 'required|boolean',
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'address' =>'required|string',
        ]);

        $profilePicturePath = $customer->profile_picture;
        if ($request->hasFile('profile_picture')) {
            $profilePicturePath = $request->file('profile_picture')->store('profile_pictures', 'public');
        }

        $customer->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'is_active' => $request->is_active,
            'profile_picture' => $profilePicturePath,
          'address' => $request->address,
        ]);

        return redirect()->route('customers.index')->with('success', 'Customer updated successfully.');
    }

    public function destroy(Customer $customer)
    {
        $customer->delete();

        return redirect()->route('customers.index')->with('success', 'Customer deleted successfully.');
    }
}
