<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    public $timestamps= false;
    protected $fillable=[
        'namecate','des','action','slug'
    ];

    protected $primaryKey='id';
    protected $table='category';

    public function comic(){
        return $this->hasMany('App\Models\Comic','category_id','id'); //1 danh mục có nhiều truyện
    }
}
