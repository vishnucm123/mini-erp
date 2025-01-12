<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Invoice;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;

class ManageController extends Controller
{
    public function handleRequest($model, Request $request)
    {

        $modelClass = $this->resolveModel($model);

        if (!$modelClass) {
            return response()->json(['error' => 'Invalid model'], 400);
        }

        if ($request->isMethod('get')) {
            return $this->handleList($modelClass);
        }

        if ($request->isMethod('post')) {
            return $this->handleCreate($modelClass, $request);
        }

        return response()->json(['error' => 'Invalid request method'], 405);
    }

    // api/manage/customer
    // /api/manage/invoice

    /**
     * Resolve the model name to its corresponding class.
     *
     * @param  string  $model
     * @return string|null
     */
    protected function resolveModel($model)
    {
        $models = [
            'customer' => Customer::class,
            'invoice' => Invoice::class,
        ];

        return $models[$model] ?? null;
    }

    /**
     * Handle the listing of records for a model.
     *
     * @param  string  $modelClass
     * @return \Illuminate\Http\JsonResponse
     */
    protected function handleList($modelClass)
    {
        return response()->json($modelClass::all(), 200);
    }

    /**
     * Handle the creation of a record for a model.
     *
     * @param  string  $modelClass
     * @param  Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    protected function handleCreate($modelClass, Request $request)
    {
        // Simplified validation for Customer and Invoice
        $validationRules = $this->getValidationRules($modelClass);

        $validator = Validator::make($request->all(), $validationRules);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $record = $modelClass::create($request->all());
        return response()->json(['success' => true, 'data' => $record], 201);
    }

    /**
     * Get simplified validation rules for each model.
     *
     * @param  string  $modelClass
     * @return array
     */
    protected function getValidationRules($modelClass)
    {
        $rules = [
            Customer::class => [
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:customers,email',
                'phone' => 'required|string',
            ],
            Invoice::class => [
                'customer_id' => 'required|exists:customers,id',
                'date' => 'required|date',
                'amount' => 'required|numeric|min:0',
                'status' => 'required|in:unpaid,paid,cancelled',
            ],
        ];

        return $rules[$modelClass] ?? [];
    }
}
