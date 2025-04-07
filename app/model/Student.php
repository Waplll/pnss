<?php
namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    public $timestamps = false;
    protected $table = 'students';
    protected $fillable = ['surname', 'name', 'patronymic', 'gender', 'birth_date', 'address', 'group_id'];

    public function group()
    {
        return $this->belongsTo(Group::class, 'group_id');
    }
}