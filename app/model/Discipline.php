<?php
namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Discipline extends Model
{
    public $timestamps = false;
    protected $table = 'disciplines';
    protected $fillable = ['name'];

    public function groups()
    {
        return $this->belongsToMany(Group::class, 'group_discipline');
    }
}