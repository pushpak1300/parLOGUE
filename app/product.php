<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['design_no','photho_id','category','company','sub_category','price'];
    /**
     * The size belong to product.
     */
    public function size()
    {
        return $this->hasMany('App\size');
    }
    /**
     * The photho belong to product.
     */
    public function photho()
    {
        return $this->belongsTo('App\photho');
    }

    public function subcategory()
    {
        return $this->hasOne('App\sub_category','id','sub_categories_id');
    }
    /**
     * Scope a query to only include category products.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeCategoryof($query,$type)
    {
        return $query->where('category', '=', $type);
    }
    /**
     * Scope a query to only include category products.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeSubCategoryof($query,$type)
    {
        return $query->where('sub_category', '=', $type);
    }
   
}
