<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comic;
use Illuminate\Http\Request;
use App\Http\Controllers\CatecomicController;
class ComicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data= Comic::with('category_comic')->orderBy('id','DESC')->get();
        return  view('admin.comic.index',compact('data'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        //

        $data=Category::orderBy('id','DESC')->get();
        return  view('admin.comic.create',compact('data'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        //
        $data=$request->validate([
            'namecomic'=>'required|unique:stories|max:255',
            'slug'=>'required|unique:stories|max:255',
            'img_comic'=>'required|max:255',
            'summary'=>'required|max:255',
            'action'=>'required',
            'category'=>'required',
        ],
            [
                'namecomic.required' => 'Tên truyện không được để trống !',
                'img_comic.required' => 'Hình ảnh truyện không được để trống !',
                'slug.required' => 'Slug không được để trống !',
                'category.required' => 'Bạn phải chọn danh mục !',
                'summary.required' => 'Tóm tắt truyện không được để trống !',
                'namecomic.unique' => 'Tên truyện không được trùng nhau !',
                'slug.unique' => 'Tên slug không được trùng nhau !',
            ]);
        $comic= new Comic();
        $comic->namecomic=$data['namecomic'];
        $comic->slug=$data['slug'];
        $comic->summary=$data['summary'];
        $comic->action=$data['action'];
        $comic->category_id=$data['category'];

        $get_img=$request->img_comic;

        $path='public/uploads/img_comic/';
        $get_name_img=$get_img->getClientOriginalName();
        $name_image=current(explode('.',$get_name_img));
        $new_img=$name_image.rand(0,9).'.'.$get_img->getClientOriginalExtension();
        $get_img->move($path,$new_img);

        $comic->img_comic=$new_img;

        $comic->save();
        return redirect()->back()->with('success','Thêm truyện mới thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $comic=Comic::find($id);
        $category=Category::orderBy('id','DESC')->get();

        return  view('admin.comic.edit',compact('comic','category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        //
        //
        $data=$request->validate([
            'namecomic'=>'required|max:255',
            'slug'=>'required|max:255',
            'summary'=>'required|max:255',
            'action'=>'required',
            'category'=>'required',
        ],
            [
                'namecomic.required' => 'Tên truyện không được để trống !',
                'slug.required' => 'Slug không được để trống !',
                'category.required' => 'Bạn phải chọn danh mục !',
                'summary.required' => 'Tóm tắt truyện không được để trống !',
            ]);
        $comic= Comic::find($id);
        $comic->namecomic=$data['namecomic'];
        $comic->slug=$data['slug'];
        $comic->summary=$data['summary'];
        $comic->action=$data['action'];
        $comic->category_id=$data['category'];

        $get_img=$request->img_comic;
        if($get_img){
            $path='public/uploads/img_comic/'.$comic->img_comic;
            if(file_exists($path)){
                unlink($path);
            }
            $path='public/uploads/img_comic/';

            $get_name_img=$get_img->getClientOriginalName();
            $name_image=current(explode('.',$get_name_img));
            $new_img=$name_image.rand(0,9).'.'.$get_img->getClientOriginalExtension();
            $get_img->move($path,$new_img);

            $comic->img_comic=$new_img;
        }

        $comic->save();
        return redirect()->back()->with('success','Cập nhật truyện mới thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        //
        $data=Comic::find($id);
        $path='public/uploads/img_comic/'.$data->img_comic;
        if(file_exists($path)){
            unlink($path);
        }
        Comic::find($id)->delete();
        return redirect()->back()->with('success','Bạn Xóa Truyện thành công !');
    }
}
