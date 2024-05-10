<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendence extends Model
{
    use HasFactory;
    protected $fillable = [
        'event_id', 'event_date_id', 'user_id', 'attended', 'group_id', 'remark', 'coming_from','updated_at'
    ];
}
