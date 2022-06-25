<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\File;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Category::orderBy('created_at','DESC')->paginate(10);
        return view('admin.category.index',compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category= Category::where('status',1)->get();
        return view('admin.category.create',compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->hasFile('upload_image')){
            $file = $request->upload_image;
            $ext = $request->upload_image->extension();
            $file_name = time().'_'.'category.'.$ext;
            $file->move(public_path('uploads/category'),$file_name);
            $request->merge(['image'=>$file_name]);
        }
        Category::create($request->all());
        return redirect()->route('admin.category.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.category.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $category = Category::find($id);
        if($request->hasFile('upload_image'))
        {
            $destination = public_path('uploads/category/').$category->image;
            if(File::exists($destination)){
                File::delete($destination);
            }
            $file = $request->upload_image;
            $ext = $request->upload_image->extension();
            $file_name = time().'_'.'category.'.$ext;
            $file->move(public_path('uploads/category'),$file_name);
            $request->merge(['image'=>$file_name]);
        }
        $category->update($request->all());
        return redirect()->route('admin.category.index')->with('success','Thêm danh mục thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        if($category->products->count()>0){
            return redirect()->route('admin.category.index')->with('error','Danh mục chứa sản phẩm, không thể xóa!');
        }
        else{
            $destination = public_path('uploads/category').$category->image;
            if(File::exists($destination)){
                File::delete($destination);
             }
             $category->delete();
             return redirect()->route('admin.category.index')->with('success','Xóa danh mục thành công!');
        }
    }
}
