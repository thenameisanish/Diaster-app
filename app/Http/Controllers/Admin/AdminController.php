<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Organization;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function dashboard()
    {
        $pendingOrganizations = Organization::where('status', 'Pending')->count();
        $approvedOrganizations = Organization::where('status', 'Approved')->count();
        $rejectedOrganizations = Organization::where('status', 'Rejected')->count();

        return view('admin.dashboard', compact(
            'pendingOrganizations',
            'approvedOrganizations',
            'rejectedOrganizations'
        ));
    }

    public function organizations()
    {
        $organizations = Organization::latest()->paginate(10);

        return view('admin.organizations.index', compact('organizations'));
    }

    public function showOrganization(Organization $organization)
    {
        return view('admin.organizations.show', compact('organization'));
    }

    public function approve(Organization $organization)
    {
        $organization->update([
            'status' => 'Approved',
            'approved_at' => now(),
            'approved_by' => Auth::id(),
            'rejection_reason' => null,
        ]);

        return redirect()->back()->with('success', 'Organization approved successfully.');
    }

    public function reject(Request $request, Organization $organization)
    {
        $request->validate([
            'reason' => 'required|string|max:500',
        ]);

        $organization->update([
            'status' => 'Rejected',
            'approved_by' => Auth::id(),
            'rejection_reason' => $request->reason,
        ]);

        return redirect()->back()->with('success', 'Organization rejected successfully.');
    }
}