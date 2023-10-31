<?php

namespace App\Http\Controllers;

use App\Enums\Patient\GenderEnum;
use App\Http\Requests\StorePatientRequest;
use App\Http\Requests\UpdatePatientRequest;
use App\Models\Patient;
use Illuminate\Http\JsonResponse;

class PatientController extends Controller
{
    /**
     * Display a listing of the Patients.
     */
    public function index(): JsonResponse
    {
        return new JsonResponse(
            Patient::paginate(request('per_page', 10))
                ->appends([
                    'per_page' => request('per_page', 10),
                ])
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return new JsonResponse([
            'genders' => GenderEnum::labels(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePatientRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Patient $patient)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Patient $patient)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePatientRequest $request, Patient $patient)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Patient $patient)
    {
        //
    }
}
