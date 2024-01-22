<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataText extends Model
{
    use HasFactory;
    protected $table ='datatexts'; 
    protected $fields = ['region_id', 'title', 'type','category','sub_category','description'];
    public function regionDetail()
    {
        return $this->belongsTo(Region::class,'region_id');
    }

}
