<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use OpenApi\Annotations as OA;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        return response()->json(Company::paginate(15));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): JsonResponse
    {
        $request->validate([
            'parent_company_id' => ['nullable', 'integer', 'exists:App\Models\Company,id'],
            'name' => ['required', 'max:200'],
        ]);

        $createdCompany = Company::create([
            'parent_company_id' => $request->input('parent_company_id', 0),
            'name' => $request->input('name')
        ]);

        return response()->json($createdCompany);
    }

    /**
     * Display the specified resource.
     */
    public function show(Company $company): JsonResponse
    {
        return response()->json($company);
    }

    /**
     * Update the whole specified resource in storage.
     */
    public function put(Request $request, Company $company): JsonResponse
    {
        if (!$company->id) {
            response()->abort(404);
        }

        $request->validate([
            'parent_company_id' => ['required', 'integer', 'exists:App\Models\Company,id'],
            'name' => ['required', 'max:200'],
        ]);

        $updatedCompany = $company->update([
            'parent_company_id' => $request->input('parent_company_id', 0),
            'name' => $request->input('name')
        ]);

        return response()->json($updatedCompany);
    }

    /**
     * Update the only specified resource's data in storage.
     */
    public function patch(Request $request, Company $company): JsonResponse
    {
        if (!$company->id) {
            response()->abort(404);
        }

        $validated = $request->validate([
            'parent_company_id' => ['nullable', 'integer', 'exists:App\Models\Company,id'],
            'name' => ['nullable', 'max:200'],
        ]);

        $updatedCompany = $company->update($validated);

        return response()->json($updatedCompany);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(Company $company): JsonResponse
    {
        try {
            $company->delete();
            return response()->json(true);
        } catch (\Throwable $e) {
            return response()->json(false);
        }
    }
}
