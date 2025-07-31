<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassModel extends Model
{
    use HasFactory;

    protected $table = 'classes';
    protected $primaryKey = 'idclass';

    protected $fillable = [
        'idclass',
        'major',
        'studentsNumber',
        'year',
    ];

    public function students()
    {
        return $this->hasMany(Student::class, 'idclass', 'idclass');
    }

    public function teachers()
    {
        return $this->hasMany(Teacher::class, 'idclass', 'idclass');
    }
}
