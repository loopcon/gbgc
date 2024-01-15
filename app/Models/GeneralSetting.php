<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GeneralSetting extends Model
{
    use HasFactory;
    protected $table ='general_settings';    
    protected $fillable = ['id','site_name','phone','address','aboutus','contact_email','linkedin','copyrignt_year','admin_email','admin_password','logo','fevicon','seo_title','meta_keyword','meta_description','canonical_tag','google_tag_manager'];
}
