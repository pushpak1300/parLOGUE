<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class photho extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['path','creadted_at'];
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'photho';
    use SoftDeletes;
}
