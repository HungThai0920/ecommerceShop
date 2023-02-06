<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\News;
use App\Http\Requests\NewsRequest ;
use App\Models\CategoryNew;
use File;

class NewsController extends Controller
{
    // show danh sách giao diện tin tức
    public function index() {

    	$dataNews = News::select()->orderBy('id','DESC')->paginate(15);
    	$tabNews = 'active';
    	$categoryNews = CategoryNew::select()->get();

    	return view('admin.news.index', compact('dataNews','categoryNews', 'tabNews'));
    }

    // hiển thị danh sách thêm
    public function getAdd() {

    	$dataCategoryNew = CategoryNew::select()->get();
        $tabNews = 'active';
    	return view('admin.news.add', compact('dataCategoryNew', 'tabNews'));
    }

    // thêm vào database
    public function postAdd(NewsRequest $request) {

        try {
            $news = new News;

            $image = $request->file('imgs');

            if(!empty($image)){
                $nameimg     = $image->getClientOriginalName();
                // Directory path upload photos  FOLDER_PHOTOS edit model/Slides
                $news->image = $nameimg;
                $des         = News::FOLDER_UPLOAD;
                $image->move($des,$nameimg);
            } else {
                $news->image = '';
            }

            $news ->title       = $request->title;
            $news ->cate_new_id = $request->cate_new_id;
            $news ->info        = $request->info;
            $news ->content     = $request->content;
            $news ->status      = $request->status;
            $news ->save();

            return redirect('admin/news/list')->with('success', 'Thêm thành công bài viết');
        } catch(Exception $e) {

            return redirect('admin/news/add')->with('error', 'Lỗi không thể thêm bài viết');
        }
    }

    // hiển thị giao diện chỉnh sửa
    public function getEdit($id) {

        $dataNews = News::find($id);
        $tabNews = 'active';
        if($dataNews) {

            $dataCategoryNew = CategoryNew::select()->get();
            return view('admin.news.edit', compact('dataCategoryNew', 'dataNews', 'tabNews'));

        } else {

            return redirect('admin/news/list')->with('error','Bài viết không tồn tại');
        }
    }

    // lưu dữ liệu chỉnh sửa
    public function postEdit(NewsRequest $request, $id)  {

        try {
            $news = News::find($id);

            $image = $request->file('imgs');

            if(!empty($image)){
                $nameimg     = $image->getClientOriginalName();
                // Directory path upload photos  FOLDER_PHOTOS edit model/Slides
                $news->image = $nameimg;
                $des         = News::FOLDER_UPLOAD;
                $image->move($des,$nameimg);
            }

            $news ->title       = $request->title;
            $news ->cate_new_id = $request->cate_new_id;
            $news ->info        = $request->info;
            $news ->content     = $request->content;
            $news ->status      = $request->status;
            $news ->save();

            return redirect('admin/news/list')->with('success', 'Chỉnh sửa thành công bài viết');

        } catch(Exception $e) {

            return redirect('admin/news/list')->with('error', 'Lỗi không thể chỉnh sửa  bài viết');
        }
    }

    // xóa 
    public function getDelete($id) {

        $news = News::find($id);

        if(!$news) {

            return redirect('admin/news/list')->with('error','Bài viết không tồn tại');
        }

        try {
            $news ->delete();

            File::delete(News::FOLDER_UPLOAD.'/'.$news->image);

            return redirect('admin/news/list')->with('success','Xóa thành công bài viết.');
        } catch (Exception $e) {

            return redirect('admin/news/list')->with('error','Lỗi không thể xóa bài viết.');
        }
    }
    // xóa nhiều
    public function deleteMultipleNews(Request $request) {
        foreach($request->ids as $id) {
            News::find($id)->delete();
        }
        return response()->json([
            'ids' => $request->ids
        ]);
    }
}
