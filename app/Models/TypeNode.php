<?php

namespace App\Models;

use Database\Factories\TypeNodeFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeNode extends Model
{
    /** @use HasFactory<TypeNodeFactory> */
    use HasFactory;

    public $timestamps = true;
    protected $fillable = [
        'name',
        'created_at',
        'updated_at'
    ];
}
