<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class photho extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['path'];
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'photho';
}
