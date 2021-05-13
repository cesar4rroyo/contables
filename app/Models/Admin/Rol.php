<?php

namespace App\Models\Admin;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $table = 'rol';
    protected $primaryKey = 'id';
    protected $fillable = ['descripcion'];

    public function personal()
    {
        return $this->belongsToMany(Personal::class, 'rolpersonal');
    }
}
