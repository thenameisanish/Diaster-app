<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Organization;

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
}