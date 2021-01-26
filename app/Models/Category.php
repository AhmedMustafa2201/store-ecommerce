<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    use Translatable;

    protected $with = ['translations'];
    protected $translatedAttributes = ['name'];
    protected $fillable = ['parent_id','slug','is_active'];
    protected $hidden = ['translations','created_at','updated_at'];

    protected $casts = [
        'is_active'=>'boolean'
    ];

    public function ScopeParent($q){
        return $q->whereNull('parent_id');
    }
    public function ScopeChild($q){
        return $q->whereNotNull('parent_id');
    }

    public function getActive(){
        return $this->is_active == 1 ? 'مفعل ': 'غير مفعل';
    }

    public function _parent(){
        return $this->belongsTo(self::class , 'parent_id');
    }

    public function children(){
        return $this->hasMany(self::class,'parent_id');
    }
    public function products()
    {
        return $this->belongsToMany('App\Models\Product','product_categories');
    }

}
