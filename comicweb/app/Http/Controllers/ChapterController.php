<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chapter;
use App\Models\Comic;
use App\Models\Category;
class ChapterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data=Chapter::with('comic')->orderBy('id','DESC')->get();
        return view('admin.chapter.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        //
        $comic=Comic::orderBy('id','DESC')->get();
        return view('admin.chapter.create',compact('comic'));

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
            'title'=>'required|unique:chapter',
            'slug_chapter'=>'required|unique:chapter',
            'summary'=>'required',
            'content'=>'required',
            'comic_id'=>'required',
            'action'=>'required'
        ],
            [
            'title.unique'=>'Tiêu đề này đã tồn tại .',
            'slug_chapter.unique'=>'Slug chapter đã tồn tại trùng nhau.',
            'title.required'=>'Tiêu đề không được để trống.',
            'slug_chapter.required'=>'Slug chapter không được để trống.',
            'summary.required'=>'Tóm tắt không được để trống.',
            'content.required'=>'Nội dung không được để trống.'

        ]);

        $chapter= new Chapter();
        $chapter->title=$data['title'];
        $chapter->slug_chapter=$data['slug_chapter'];
        $chapter->summary=$data['summary'];
        $chapter->content=$data['content'];
        $chapter->comic_id=$data['comic_id'];
        $chapter->action=$data['action'];

        $chapter->save();

        return  redirect()->back()->with('success','Thêm Chapter truyện thành công');

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
        $chapter=Chapter::find($id);
        $comic=Comic::orderBy('id','DESC')->get();
        return view('admin.chapter.edit',compact('chapter','comic'));
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
        $data=$request->validate([
            'title'=>'required',
            'slug_chapter'=>'required',
            'summary'=>'required',
            'content'=>'required',
            'comic_id'=>'required',
            'action'=>'required'
        ],
            [
                'title.required'=>'Tiêu đề không được để trống.',
                'slug_chapter.required'=>'Slug chapter không được để trống.',
                'summary.required'=>'Tóm tắt không được để trống.',
                'content.required'=>'Nội dung không được để trống.'

            ]);

        $chapter= Chapter::find($id);
        $chapter->title=$data['title'];
        $chapter->slug_chapter=$data['slug_chapter'];
        $chapter->summary=$data['summary'];
        $chapter->content=$data['content'];
        $chapter->comic_id=$data['comic_id'];
        $chapter->action=$data['action'];

        $chapter->save();

        return  redirect()->back()->with('success','Cập nhật Chapter truyện thành công');
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
        Chapter::find($id)->delete();
        return redirect()->back()->with('success','Xóa Chapter thành công !');
    }
}
