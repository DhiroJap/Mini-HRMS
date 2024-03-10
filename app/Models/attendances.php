<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class attendances extends Model
{
    protected $table = 'attendances';

    protected $fillable = [
        'user_id','check_in', 'check_out', 'date','created_at', 'updated_at'
    ];

    protected $primaryKey = 'attendance_id';

    public $timestamps = false;
    
    public function user() {
        return $this->belongsTo(User::class);
    }

    
}
