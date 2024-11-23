<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;

    protected $fillable = [
        'participant_id',
        'id_scan',
        'scan_at',
        'scan_by',
    ];

    public function participant()
    {
        return $this->belongsTo(Participant::class, "participant_id", "id");
    }

    public function scan()
    {
        return $this->belongsTo(Scan::class, "id_scan", "id");
    }
}
