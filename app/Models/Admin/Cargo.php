<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Cargo extends Model
{
	use SoftDeletes;
    protected $table = 'cargo';
    protected $primaryKey = 'id';
    protected $fillable = ['descripcion'];
    protected $dates = ['deleted_at'];


    public function personal()
    {
        return $this->hasMany(Personal::class, 'cargo_id');
    }
}
