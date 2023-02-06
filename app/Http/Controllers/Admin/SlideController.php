<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Slides;
use App\Http\Requests\SlidesRequest ;
use File;
use Validator;

class SlideController extends Controller
{
    // danh sach slide
    public function index() {
    	$dataSlide =  Slides::select()->orderBy('id','DESC')->paginate(15);
    	$tabSlide = 'active';
    	return view('admin.slide.index', compact('dataSlide', 'tabSlide'));
    }

    // show giao dien upload
    public function getAdd() {
        $tabSlide = 'active';
    	return view('admin.slide.add', compact('tabSlide'));
    }

    // upload
    public function postAdd(SlidesRequest $request) {
    	try {
            $slides = new Slides;
            $image = $request->file('imgs');

            if(!empty($image)){
                $nameimg       = $image->getClientOriginalName();
                // Directory path upload photos  FOLDER_PHOTOS edit model/Slides
                $slides->image = $nameimg;
                $des           = Slides::FOLDER_UPLOAD;
                $image->move($des,$nameimg);
            } else {
                $slides->image = '';
            }

            $slides->name   = $request->name;
            $slides->link   = $request->link;
            $slides->sort   = $request->sort;
            $slides->status = $request->status;
            $slides->save();

            return redirect('admin/slides/list')->with('success','Thêm thành công slides.');
        } catch(Exception $e) {

             return redirect('admin/slides/add')->with('error','Lỗi không thể thêm slides.');
        }
    }

    public function getEdit($id) {

    	$dataSlide = Slides::find($id);
        $tabSlide = 'active';
    	if($dataSlide) {
    		return view('admin.slide.edit', compact('dataSlide', 'tabSlide'));
    	} else {
    		return redirect('admin/slides/list')->with('error','Slides không tồn tại');
    	}
    }
    // chỉnh sửa slide
    public function postEdit(Request $request, $id) {

    	$validator  = Validator::make($request->only('name', 'sort', 'imgs'), [
            'name' => 'required|max:191',
            'imgs' => 'nullable|image|max:2048',
            'sort' => 'required',
    	],
        [
            'name.required' => 'Tên slide không được để trống',
            'name.max'       => 'Không được vượt quá 191 ký tự',
            'imgs.image'     => 'Bạn cần chọn đúng fie có định dạng ảnh',
            'imgs.max'       => 'Định dạng file quá lớn',
            'sort.required' => 'Nhập vào thứ tự hiển thị',
    	]);

    	if ($validator->fails()) {
            return redirect()
                    ->back()
                    ->withInput()
                    ->withErrors($validator->errors());
        }

    	try {
            $slides = Slides::find($id);

            $image = $request->file('Image');

            if(!empty($image)){
                $nameimg       = $image->getClientOriginalName();
                // Directory path upload photos  FOLDER_PHOTOS edit model/Slides
                $slides->image = $nameimg;
                $des           = Slides::FOLDER_UPLOAD;
                $image->move($des,$nameimg);
            }

            $slides->name   = $request->name;
            $slides->link   = $request->link;
            $slides->sort   = $request->sort;
            $slides->status = $request->status;
            $slides->save();

            return redirect('admin/slides/list')->with('success','Chỉnh sửa thành công slides.');

        } catch(Exception $e) {

            return redirect('admin/slides/list')->with('error','Lỗi không thể chỉnh sửa slides.');
        }
    }
    // xóa slide
    public function getDelete($id) {

    	$dataSlide = Slides::find($id);

    	if(!$dataSlide) {

    		return redirect('admin/slides/list')->with('error','Slides không tồn tại');
    	}

    	try {
            $dataSlide ->delete();

            File::delete(Slides::FOLDER_UPLOAD.'/'.$dataSlide->image);

            return redirect('admin/slides/list')->with('success','Xóa thành công slide.');

        } catch (Exception $e) {
            
            return redirect('admin/slides/list')->with('error','Lỗi không thể xóa slide.');
        }
    } 

}
