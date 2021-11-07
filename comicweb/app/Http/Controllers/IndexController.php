<?php

namespace App\Http\Controllers;

use App\Models\Chapter;
use Illuminate\Http\Request;
use App\Models\Comic;
use App\Models\Category;
class IndexController extends Controller
{
    //
    public function home(){
        $category=Category::orderBy('id','DESC')->get();
        $comic=Comic::orderBy('id','DESC')->where('action',0)->get();
        return view('pages.home',compact('category','comic'));
    }
    public function  view_category($slug){
        $category=Category::orderBy('id','DESC')->get();
        $category_id=Category::where('slug',$slug)->first();
        $comic=Comic::orderBy('id','DESC')->where('action',0)->where('category_id',$category_id->id)->get();

        return view('pages.category',compact('category','comic'));
    }

    public function view_comic($slug){
        $category=Category::orderBy('id','DESC')->get();
        $comic=Comic::with('catecomic')->where('slug',$slug)->where('action',0)->first();
        $chapter=Chapter::with('comic')->orderBy('id','ASC')->where('comic_id',$comic->id)->get();
        $chapter1=Chapter::with('comic')->orderBy('id','ASC')->where('comic_id',$comic->id)->first();

        $same_cate=Comic::with('catecomic')->where('category_id',$comic->catecomic->id)->whereNotIn('id',[$comic->id])->get();

        return view('pages.comic',compact('category','comic','chapter','same_cate','chapter1'));
    }


    public function view_chapter($slug){
        $category=Category::orderBy('id','DESC')->get();
        $comic=Chapter::where('slug_chapter',$slug)->first();
        $chapter=Chapter::with('comic')->where('slug_chapter',$slug)->where('comic_id',$comic->comic_id)->first();
        $all_chapter=Chapter::with('comic')->orderBy('id','ASC')->where('comic_id',$comic->comic_id)->get();
        $next_chapter=Chapter::where('comic_id',$comic->comic_id)->where('id','>',$chapter->id)->min('slug_chapter');
        $previous_chapter=Chapter::where('comic_id',$comic->comic_id)->where('id','<',$chapter->id)->max('slug_chapter');
        $max_id=Chapter::where('comic_id',$comic->comic_id)->orderBy('id','DESC')->first();
        $min_id=Chapter::where('comic_id',$comic->comic_id)->orderBy('id','ASC')->first();
        return view('pages.chapter',compact('category','chapter','all_chapter','next_chapter','previous_chapter','max_id','min_id'));
    }
}
