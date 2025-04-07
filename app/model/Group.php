<?php
namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    public $timestamps = false;
    protected $table = 'groups';
    protected $fillable = ['name'];

    public function disciplines()
    {
        return $this->belongsToMany(Discipline::class, 'group_discipline');
    }
}