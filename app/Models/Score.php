<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    use HasFactory;
    protected $table ='scores';

    protected $fillable  = ['view','region_id','currency_id', 'level_1', 'level_2','level_3','level_4','year','score','comment'];

    
    public function regionDetail()
    {
        return $this->belongsTo(Region::class,'region_id');
    }
    public function currencyDetail()
    {
        return $this->belongsTo(Currency::class,'currency_id');
    }
    public function level1()
    {
        return $this->hasOne(LevelMaster::class,'id','level_1');
    }
    public function level2()
    {
        return $this->hasOne(LevelMaster::class,'id','level_2');
    }
    public function level3()
    {
        return $this->hasOne(LevelMaster::class,'id','level_3');
    }
    public function level4()
    {
        return $this->hasOne(LevelMaster::class,'id','level_4');
    }

}
