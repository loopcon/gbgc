<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StaticPage extends Model
{
    use HasFactory;
    protected $table ='static_pages';
    protected $fillable = ['id','title','slug','description','image'];
}
