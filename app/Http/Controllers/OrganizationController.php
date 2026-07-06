<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrganizationRegisterRequest;
use App\Models\Organization;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class OrganizationController extends Controller
{
    public function create()
    {
        return view('organization.register');
    }

    public function store(OrganizationRegisterRequest $request)
    {
        DB::beginTransaction();

        try {

            $user = User::create([
                'name' => $request->organization_name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => 'organization',
            ]);

            $logo = null;

            if ($request->hasFile('logo')) {
                $logo = $request->file('logo')->store('logos', 'public');
            }

            $registrationCertificate =
                $request->file('registration_certificate')
                ->store('documents', 'public');

            $panCertificate = null;

            if ($request->hasFile('pan_certificate')) {
                $panCertificate =
                    $request->file('pan_certificate')
                    ->store('documents', 'public');
            }

            $representativeId =
                $request->file('representative_id')
                ->store('documents', 'public');

            Organization::create([

                'user_id' => $user->id,

                'organization_name' => $request->organization_name,
                'registration_number' => $request->registration_number,
                'organization_type' => $request->organization_type,

                'years_of_operation' => $request->years_of_operation,
                'description' => $request->description,
                'logo' => $logo,

                'email' => $request->email,
                'phone' => $request->phone,
                'website' => $request->website,

                'address' => $request->address,
                'province' => $request->province,
                'district' => $request->district,

                'representative_name' => $request->representative_name,
                'representative_position' => $request->representative_position,
                'representative_phone' => $request->representative_phone,
                'representative_email' => $request->representative_email,

                'registration_certificate' => $registrationCertificate,
                'pan_certificate' => $panCertificate,
                'representative_id' => $representativeId,

                'food' => $request->has('food'),
                'water' => $request->has('water'),
                'medicine' => $request->has('medicine'),
                'shelter' => $request->has('shelter'),
                'clothes' => $request->has('clothes'),
                'rescue_equipment' => $request->has('rescue_equipment'),
                'transportation' => $request->has('transportation'),

                'capacity' => $request->capacity,

                'status' => 'Pending'
            ]);

            DB::commit();

            return redirect('/')
                ->with('success',
                    'Organization registered successfully. Waiting for admin approval.');

        } catch (\Exception $e) {

            DB::rollBack();

            return back()
                ->withInput()
                ->with('error', $e->getMessage());
        }
    }
}