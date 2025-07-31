<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Timetable extends Model
{
    use HasFactory;

    protected $fillable = ['major'];

    public function entries()
    {
        return $this->hasMany(TimetableEntry::class);
    }
}
