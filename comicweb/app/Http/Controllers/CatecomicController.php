<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Comic;

class CatecomicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data=Category::orderBy('id','DESC')->get();
        return  view('admin.category.index',compact('data'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        //
        return  view('admin.category.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {

        $data=$request->validate([
            'namecate'=>'required|unique:category|max:255',
            'des'=>'required|max:255',
            'action'=>'required',
            ],
        [
        'namecate.required' => 'Tên danh mục không được để trống !',
        'namecate.unique' => 'Tên danh mục không được trùng nhau !',
            'des.required' => 'Mô tả không được để trống !',
        ]);
        $category= new Category();
        $category->namecate=$data['namecate'];
        $category->des=$data['des'];
        $category->action=$data['action'];

        $category->save();
        return redirect()->back()->with('success','Thêm danh mục thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return string[]
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
        $data=Category::find($id);

        return  view('admin.category.edit',compact('data'));

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
        $data=$request->validate([
            'namecate'=>'required|max:255',
            'des'=>'required|max:255',
            'action'=>'required',
        ],
            [
                'namecate.required' => 'Tên danh mục không được để trống !',
                'des.required' => 'Mô tả không được để trống !',
            ]);
        $category= Category::find($id);
        $category->namecate=$data['namecate'];
        $category->des=$data['des'];
        $category->action=$data['action'];

        $category->save();
        return redirect()->back()->with('success','Cập nhật danh mục thành công');

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
        Category::find($id)->delete();
         return  redirect()->back()->with('success','Xóa danh mục thành công !');

    }
}
