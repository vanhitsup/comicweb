<?php

namespace App\Http\Controllers;

use App\Models\Chapter;
use App\Models\StoryType;
use Illuminate\Http\Request;
use App\Models\Comic;
use App\Models\Category;
class IndexController extends Controller
{
    //
    public function home(){
        $category=Category::orderBy('id','DESC')->get();
        $comic=Comic::orderBy('id','DESC')->where('action',0)->get();
        $story_type=StoryType::orderBy('id','DESC')->where('action',0)->get();
        return view('pages.home',compact('category','comic','story_type'));
    }
    public function  view_category($slug){
        $category=Category::orderBy('id','DESC')->get();
        $category_id=Category::where('slug',$slug)->first();
        $name_cate=$category_id->namecate;
        $comic=Comic::orderBy('id','DESC')->where('action',0)->where('category_id',$category_id->id)->get();
        $story_type=StoryType::orderBy('id','DESC')->where('action',0)->get();

        return view('pages.category',compact('category','comic','story_type','name_cate'));
    }

    public function view_comic($slug){
        $category=Category::orderBy('id','DESC')->get();
        $story_type=StoryType::orderBy('id','DESC')->where('action',0)->get();

        $comic=Comic::with('catecomic','storytype')->where('slug',$slug)->where('action',0)->first();
        $chapter=Chapter::with('comic')->orderBy('id','ASC')->where('comic_id',$comic->id)->get();
        $chapter1=Chapter::with('comic')->orderBy('id','ASC')->where('comic_id',$comic->id)->first();
        $chapter_final=Chapter::with('comic')->orderBy('id','DESC')->where('comic_id',$comic->id)->first();

        $same_cate=Comic::with('catecomic','storytype')->where('category_id',$comic->catecomic->id)->whereNotIn('id',[$comic->id])->get();

        return view('pages.comic',compact('category','comic','story_type','chapter','chapter_final','same_cate','chapter1'));
    }


    public function view_chapter($slug){
        $category=Category::orderBy('id','DESC')->get();
        $story_type=StoryType::orderBy('id','DESC')->where('action',0)->get();
        $comic=Chapter::where('slug_chapter',$slug)->first();
        $comic_br=Comic::with('catecomic','storytype')->where('id',$comic->comic_id)->first();
        $chapter=Chapter::with('comic')->where('slug_chapter',$slug)->where('comic_id',$comic->comic_id)->first();
        $all_chapter=Chapter::with('comic')->orderBy('id','ASC')->where('comic_id',$comic->comic_id)->get();
        $next_chapter=Chapter::where('comic_id',$comic->comic_id)->where('id','>',$chapter->id)->min('slug_chapter');
        $previous_chapter=Chapter::where('comic_id',$comic->comic_id)->where('id','<',$chapter->id)->max('slug_chapter');
        $max_id=Chapter::where('comic_id',$comic->comic_id)->orderBy('id','DESC')->first();
        $min_id=Chapter::where('comic_id',$comic->comic_id)->orderBy('id','ASC')->first();
        return view('pages.chapter',compact('category','chapter','comic','comic_br','all_chapter','story_type','next_chapter','previous_chapter','max_id','min_id'));
    }

    public function story_type($slug){
        $type=StoryType::orderBy('id','DESC')->get();
        $category=Category::orderBy('id','DESC')->get();
        $type_id=StoryType::where('slug',$slug)->first();
        $name_type=$type_id->name;
        $comic=Comic::orderBy('id','DESC')->where('action',0)->where('storytype_id',$type_id->id)->get();
        $story_type=StoryType::orderBy('id','DESC')->where('action',0)->get();

        return view('pages.storytype',compact('type','comic','story_type','name_type','category'));
    }

    public function search(){
        $key=$_GET['keyword'];
        $category=Category::orderBy('id','DESC')->get();
        $story_type=StoryType::orderBy('id','DESC')->where('action',0)->get();
        $comic=Comic::with('catecomic','storytype')->where('namecomic','LIKE','%'.$key.'%')->Orwhere('author','LIKE','%'.$key.'%')->get();

        return view('pages.search',compact('category','story_type','comic','key'));
    }
}
