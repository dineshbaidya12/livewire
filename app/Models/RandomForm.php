<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RandomForm extends Model
{
    use HasFactory;
    protected $fillable = [
        'text',
        'email',
        'url',
        'numberInput',
        'select',
        'checkbox1',
        'checkbox2',
        'file',
        'password'
    ];
}
