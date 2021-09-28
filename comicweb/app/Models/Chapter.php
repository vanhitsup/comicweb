<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{
    use HasFactory;
    public $timestamps=false;
    protected $fillable=[
        'comic_id','content','summary','title','action','slug_chapter'
    ];
    protected $table='chapter';
    protected $primaryKey='id';

    public function comic(){
        return $this->belongsTo('App\Models\Comic'); // 1 truyện có nhiều chapter
    }
}
