<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class size extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['size','product_id','price'];
    /**
     * Get the product that owns the size.
    */
    public function product()
    {
        return $this->belongsTo('App\product','product_id');
    }
}
