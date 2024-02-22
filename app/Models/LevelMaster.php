<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LevelMaster extends Model
{
    use HasFactory;
    protected $table ='level_masters'; 
    protected $fields = ['id','parent_id', 'title', 'level_number','information'];
    public function masterDetail()
    {
        return $this->hasOne(LevelMaster::class,'id','parent_id')->with('masterDetail');
    }   

}
