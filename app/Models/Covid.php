<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Covid extends Model
{
    protected $guarded = [];

    protected $fillable = [
        'location',
        'recovered',
        'quarantined',
        'active',
    ];
    use HasFactory;
    
    public $timestamps = false;
}
