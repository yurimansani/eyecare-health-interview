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
    public function create(): JsonResponse
    {
        return new JsonResponse([
            'genders' => GenderEnum::labels(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePatientRequest $request): JsonResponse
    {
        Patient::create($request->validated());
        return new JsonResponse([
            'status' => 'success',
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Patient $patient)
    {
        return new JsonResponse($patient);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Patient $patient)
    {
        return new JsonResponse([
            'patient' => $patient,
            'genders' => GenderEnum::labels(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePatientRequest $request, Patient $patient)
    {
        Patient::update($request->validated());
        return new JsonResponse([
            'status' => 'success',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Patient $patient)
    {
        //
    }
}
