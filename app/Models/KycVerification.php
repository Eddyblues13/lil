<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KycVerification extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'document_type',
        'front_document_path',
        'back_document_path',
        'selfie_path',
        'full_name',
        'dob',
        'document_number',
        'status',
        'verified_at',
        'rejection_reason'
    ];

    protected $casts = [
        'dob' => 'date',
        'verified_at' => 'datetime'
    ];

    const STATUS_PENDING = 'pending';
    const STATUS_APPROVED = 'approved';
    const STATUS_REJECTED = 'rejected';

    public static $statuses = [
        self::STATUS_PENDING => 'Pending',
        self::STATUS_APPROVED => 'Approved',
        self::STATUS_REJECTED => 'Rejected'
    ];

    // Relationship to user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Accessor for document type
    public function getDocumentTypeNameAttribute()
    {
        return ucfirst(str_replace('_', ' ', $this->document_type));
    }

    // Accessor for status
    public function getStatusNameAttribute()
    {
        return self::$statuses[$this->status] ?? $this->status;
    }
}
