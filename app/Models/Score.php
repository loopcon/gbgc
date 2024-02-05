<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    use HasFactory;
    protected $table ='scores';
    protected $fillable  = ['view','region_id', 'level_1', 'level_2','level_3','level_4','year','score'];
    
    public function regionDetail()
    {
        return $this->belongsTo(Region::class,'region_id');
    }
    public function maincategoryDetail()
    {
        return $this->hasOne(LevelMaster::class,'id','level_1');
    }
    public function subcategory1Detail()
    {
        return $this->hasOne(LevelMaster::class,'id','level_2');
    }
    public function subcategory2Detail()
    {
        return $this->hasOne(LevelMaster::class,'id','level_3');
    }
    public function level4Detail()
    {
        return $this->hasOne(LevelMaster::class,'id','level_4');
    }

}
