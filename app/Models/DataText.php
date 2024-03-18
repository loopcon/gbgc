<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataText extends Model
{
    use HasFactory;
    protected $table ='datatexts'; 
    protected $fillable  = ['view','region_id', 'main_category', 'sub_category_1','sub_category_2','level_4','description'];
    
    public function regionDetail()
    {
        return $this->belongsTo(Region::class,'region_id');
    }
    public function maincategoryDetail()
    {
        return $this->hasOne(LevelMaster::class,'id','main_category');
    }
    public function subcategory1Detail()
    {
        return $this->hasOne(LevelMaster::class,'id','sub_category_1');
    }
    public function subcategory2Detail()
    {
        return $this->hasOne(LevelMaster::class,'id','sub_category_2');
    }
    public function level4Detail()
    {
        return $this->hasOne(LevelMaster::class,'id','level_4');
    }

}
