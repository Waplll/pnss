<?php
namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Discipline extends Model
{
    public $timestamps = false;
    protected $fillable = ['name'];
    public function students()
    {
        return $this->belongsToMany(Student::class, 'student_discipline');
    }

    public function grades()
    {
        return $this->hasMany(Grade::class);
    }
}