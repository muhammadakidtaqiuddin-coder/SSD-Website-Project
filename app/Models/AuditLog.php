<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AuditLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'action',
        'description',
        'ip_address',
        'user_agent',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Helper to create a log entry easily
    public static function log(string $action, string $description, string $status = 'success'): void
    {
        self::create([
            'user_id'    => auth()->id(),
            'action'     => $action,
            'description'=> $description,
            'ip_address' => request()->ip(),
            'user_agent' => request()->userAgent(),
            'status'     => $status,
        ]);
    }
}
