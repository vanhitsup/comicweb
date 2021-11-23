<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StoryType extends Model
{
    use HasFactory;
    protected $primaryKey='id';
    protected $fillable=[
        'name','description','action','slug'
    ];
    public function comic(){
        return $this->hasMany('App\Models\Comic'); // 1 truyện có nhiều thể loại
    }
}
