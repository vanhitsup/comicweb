<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comic extends Model
{
    use HasFactory;
    public $timestamps=false;
    protected $fillable=[
        'namecomic','img_comic','slug','category_id','action','summary','author'
    ];

    protected $primaryKey='id';
    protected $table='stories';

    public function catecomic()
    {
        return $this->belongsTo('App\Models\Category','category_id','id'); //1 truyện thuộc 1 danh mục
    }

    public function chapter(){
        return $this->hasMany('App\Models\Chapter','comic_id','id'); // 1 truyện có nhiều chapter
    }
}
