<?php
namespace App\Http\Controllers;
use App\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blog = Blog::all();
        return view('blog.list', compact('blog'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('blog.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $blog = new Blog();
        $blog->name = $request->input('name');
        $blog->title = $request->input('title');
        $blog->content = $request->input('content');
        dd($request->file('image'));
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $path = $image->store('images', 'public');
            $blog->image = $path;
        }
        $blog->save();
        Session::flash('success', 'Tạo mới blog thành công');
        //tao moi xong quay ve trang danh sach khach hang
        return redirect()->route('blog.index');
    }
    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $blog = Blog::findOrFail($id);
        return view('blog.edit', compact('blog'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $blog = Blog::findOrFail($id);
        $blog->name = $request->input('name');
        $blog->title = $request->input('title');
        $blog->content = $request->input('content');
        $blog->save();
        Session::flash('success', 'Cập nhật blog thành công');
        //cap nhat xong quay ve trang danh sach khach hang
        return redirect()->route('blog.index');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);
        $blog->delete();
        Session::flash('success', 'Xóa blog thành công');
        //xoa xong quay ve trang danh sach khach hang
        return redirect()->route('blog.index');
    }
    public function detail($id)
    {
        $blog = Blog::findOrFail($id);
        return view('blog.detail',compact('blog'));
    }
}