<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    protected $fillable = [

        'user_id',

        'organization_name',
        'registration_number',
        'organization_type',

        'years_of_operation',
        'description',
        'logo',

        'email',
        'phone',
        'website',

        'address',
        'province',
        'district',

        'representative_name',
        'representative_position',
        'representative_phone',
        'representative_email',

        'registration_certificate',
        'pan_certificate',
        'representative_id',

        'food',
        'water',
        'medicine',
        'shelter',
        'clothes',
        'rescue_equipment',
        'transportation',

        'capacity',

        'status',
        'rejection_reason',

        'approved_at',
        'approved_by'

    ];

    protected $casts = [

        'food' => 'boolean',
        'water' => 'boolean',
        'medicine' => 'boolean',
        'shelter' => 'boolean',
        'clothes' => 'boolean',
        'rescue_equipment' => 'boolean',
        'transportation' => 'boolean',

        'approved_at' => 'datetime'

    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function approver()
    {
        return $this->belongsTo(User::class, 'approved_by');
    }

    public function isApproved()
    {
        return $this->status === 'Approved';
    }

    public function isPending()
    {
        return $this->status === 'Pending';
    }

    public function isRejected()
    {
        return $this->status === 'Rejected';
    }
}