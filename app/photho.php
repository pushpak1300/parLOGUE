<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
// use Spatie\MediaLibrary\HasMedia\HasMedia;
class photho extends Model 
{
    use SoftDeletes;
    // use HasMediaTrait;
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['path','created_at'];
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'photho';
    
    /**
     * The photho belong to product.
     */
    public function product()
    {
        return $this->hasMany('App\product');
    }
    
}
