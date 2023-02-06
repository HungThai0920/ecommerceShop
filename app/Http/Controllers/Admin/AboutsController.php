<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Abouts;

class AboutsController extends Controller
{
    //
    public function index() {

        $dataAbouts = Abouts::select()->get();
        $tabAbouts = 'active';
        return view('admin.abouts.index', compact('dataAbouts', 'tabAbouts'));
    }

    public function getAdd() {
        $tabAbouts = 'active';
        return view('admin.abouts.add', compact('tabAbouts'));
    }

    public function postAdd(Request $request) {

        try {
            $abouts = new Abouts;
            $abouts ->title       = $request->title;
            $abouts ->content     = $request->content;
            $abouts ->status      = $request->status;
            $abouts ->save();
            $abouts ->save();

            return redirect('admin/abouts/list')->with('success', 'Thêm thành công bài viết');
        } catch(Exception $e) {

            return redirect('admin/abouts/add')->with('error', 'Lỗi không thể thêm bài viết');
        }
    }

    public function getEdit($id) {

        $dataAbouts = Abouts::find($id);
        $tabAbouts = 'active';

        if($dataAbouts) {
            return view('admin.abouts.edit', compact('dataAbouts', 'tabAbouts'));
        } else {

            return redirect('admin/abouts/list')->with('error','Bài viết không tồn tại');
        }
    }

    public function postEdit(Request $request, $id)  {

        try {
            $abouts = Abouts::find($id);

            $abouts ->title       = $request->title;
            $abouts ->content     = $request->content;
            $abouts ->status      = $request->status;
            $abouts ->save();

            return redirect('admin/abouts/list')->with('success', 'Chỉnh sửa thành công bài viết');

        } catch(Exception $e) {

            return redirect('admin/abouts/list')->with('error', 'Lỗi không thể chỉnh sửa  bài viết');
        }
    }

    public function getDelete($id) {

        $abouts = Abouts::find($id);

        if(!$abouts) {
            return redirect('admin/abouts/list')->with('error','Bài viết không tồn tại');
        }

        try {
            $abouts ->delete();
            return redirect('admin/abouts/list')->with('success','Xóa thành công bài viết.');
        } catch (Exception $e) {

            return redirect('admin/abouts/list')->with('error','Lỗi không thể xóa bài viết.');
        }
    }
}
