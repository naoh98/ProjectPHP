<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\NewModel;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class NewController extends Controller
{

    public function index() {

        $news = NewModel::paginate(5);

        return view('backend.contents.news.index', ['news' => $news]);
    }

    public function create() {
        return view('backend.contents.news.create');
    }

    public function edit($new_id) {
        $post = NewModel::find($new_id);

        return view('backend.contents.news.edit', ['post' => $post]);
    }

    public function store(Request $request) {
        $post = new NewModel();


        $validate_pro =[
            'title' => 'required|unique:news,title',
            'image' => 'required',
            'excerpt' => 'required',
            'content_post' => 'required'

        ];
        $error_messages = [
            'required' => ':attribute không được để trống',
            'unique' => ':attribute đã tồn tại'
        ];
        try {
            $this->validate($request, $validate_pro, $error_messages);
        } catch (ValidationException $e) {
            echo "Something went wrong !";
            die();
        }


        $post->title = $request->title;
        $post->excerpt = $request->excerpt;
        if ($request->hasFile('image')) {
            $file_name = $request->image->getClientOriginalName();
            $path_image = $request->image->storeAs('public/files', $file_name);
            $post->image = $path_image;
        }
        $post->content_post = $request->content_post;
        $post->save();

        return redirect('/admin/news')->with('success', 'Thêm bài viết thành công');
    }

    public function update(Request $request, $new_id) {

        $post = NewModel::find($new_id);

        $validate_pro =[
            'title' => 'required|unique:news,title',
            'image' => 'required',
            'excerpt' => 'required',
            'content_post' => 'required',

        ];
        $error_messages = [
            'required' => ':attribute không được để trống',
            'unique' => ':attribute đã tồn tại'
        ];
        $this->validate($request,$validate_pro,$error_messages);

        $post->title = $request->title;
        $post->excerpt = $request->excerpt;
        if ($request->hasFile('image')) {
            $file_name = $request->image->getClientOriginalName();
            $path_image = $request->image->storeAs('public/files', $file_name);
            $post->image = $path_image;
        }
        $post->content_post = $request->content_post;
        $post->save();

        return redirect('/admin/news')->with('success', 'Sửa bài viết thành công');
    }

    public function delete($new_id) {
        NewModel::find($new_id)->delete();
        return redirect('/admin/news')->with('success', 'Xóa bài viết thành công');
    }
}
