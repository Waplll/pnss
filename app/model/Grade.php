<?php
namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    public $timestamps = false;
    protected $table = 'grades';
    protected $fillable = [
        'student_id', 'discipline_id', 'grade', 'hours', 'control_type', 'date'
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function discipline()
    {
        return $this->belongsTo(Discipline::class);
    }
}