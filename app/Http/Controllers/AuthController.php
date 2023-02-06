<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Users;
use Validator;
use Session;

class AuthController extends Controller
{
    // hiển thị thông tin đăng nhập
    public function login(Request $request) {
		$validate = Validator::make($request->only('email', 'password'), [
			'email'    => 'required|email',
			'password' => 'required'
        ], [
            'email.required' => 'Bạn cần nhập vào email đăng nhập',
            'email.email' => 'Không đúng định dạng email',
            'password.required' => 'Nhập vào mật khẩu '
        ]);

        if ($validate->fails()) {
            return redirect()
                    ->back()
                    ->withInput()
                    ->withErrors($validate->errors());
        }
        // kiểm tra email có tòn tại
        $dataUser = Users::where('email', $request->email)->get()->toArray();
        if(empty($dataUser)) {
        	return redirect('/')->with('error', 'Email hoặc password không đúng');
        }
        // kiểm tra password
        $checkPass = Hash::check($request->password, $dataUser[0]['password']);

        if($checkPass) {
        	Session::put('users',$dataUser[0]);
        	return redirect('/')->with('success', 'Chúc mừng bạn đã đăng nhập thành công');
        } else {
        	return redirect('/')->with('error', 'Đăng nhập thất bại! Vui lòng kiểm tra lại email và password!');
        }
    }

    // đăng ký thành viên
    public function register(Request $request) {

    	$validator  = Validator::make($request->only('name', 'email', 'password', 'rpassword', 'address', 'phone', 'birthday', 'sex'), [
			'name'      => ['required', 'max:191'],
			'email'     => ['required', 'email', 'unique:users,email'],
			'password'  => ['required', 'min:8'],
			'rpassword' => ['required', 'same:password'],
			'address'   => ['required', 'max:191'],
			'phone'     => ['required', 'numeric', 'digits_between:10,10'],
			'birthday'  => ['required'],
			'sex'       => ['required']
    	],
        [
			'name.required'      => 'Nhập vào họ và tên',
			'name.max'           => 'Tên không được quá dài',
			'email.required'     => 'Email đăng nhập không được để trống',
			'email.email'        => 'Không đúng định dạng email',
			'email.unique'       => 'Địa chỉ email không được trùng',
			'password.required'  => 'Bạn cần nhập vào mật khẩu',
			'password.min'       => 'Mật khẩu phải dài hơn 8 ký tự',
			'rpassword.required' => 'Nhập lại mật khẩu không thể để trống',
			'rpassword.same'     => 'Mật khẩu không trùng khớp',
			'address.required'   => 'Địa chỉ không được để trống',
			'address.max'        => 'Địa chỉ không được quá dài',
			'phone.required'     => 'Số điện thoại không được để trống',
			'phone.numeric'      => 'Số điện thoại phải ở định dạng số',
			'phone.digits_between' => 'Số điện thoại phải đủ 10 ký tự',
			'birthday.required'  => 'Ngày tháng năm sinh không được để trống',
			'sex.required'       => 'Ngày tháng năm sinh không được để trống',
            
    	]);

    	if ($validator->fails()) {
            return redirect()
                    ->back()
                    ->withInput()
                    ->withErrors($validator->errors());
        }

       	try {

            $users = new Users;
			$users->name           = $request->name;
			$users->email          = $request->email;
            $users->password       = Hash::make($request->rpassword);
			$users->address        = $request->address;
			$users->phone          = $request->phone;
			$users->birthday       = $request->birthday;
            $users->sex            = $request->sex;
			$users->status         = $request->status;
			$users->remember_token = $request->_token;
			$users->save();

            return redirect('/')->with('success', 'Chúc mừng bạn đã đăng ký thành công. Vui lòng đăng nhập để sử dụng dịch vụ');

        } catch (Exception $e) {

            return redirect('/')->with('error', 'Lỗi Không thể đăng ký tài khoản');
        }
    }
    // cập nhật thông tin người dùng
    public function  updateInfoUser(Request $request, $id) {
        $validator  = Validator::make($request->only('name','address', 'phone', 'birthday', 'sex'), [
            'name'      => ['required', 'max:191'],
            'address'   => ['required', 'max:191'],
            'phone'     => ['required', 'numeric'],
            'birthday'  => ['required'],
            'sex'       => ['required']
        ],
        [
            'name.required'      => 'Nhập vào họ và tên',
            'name.max'           => 'Tên không được quá dài',
            'email.required'     => 'Email đăng nhập không được để trống',
            'email.email'        => 'Không đúng định dạng email',
            'address.required'   => 'Địa chỉ không được để trống',
            'address.max'        => 'Địa chỉ không được quá dài',
            'phone.required'     => 'Số điện thoại không được để trống',
            'phone.numeric'      => 'Số điện thoại phải ở định dạng số',
            'birthday.required'  => 'Ngày tháng năm sinh không được để trống',
            'sex.required'       => 'Ngày tháng năm sinh không được để trống',

        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withInput()
                ->withErrors($validator->errors());
        }

        try {

            $users =  Users::find($id);
            $users->name           = $request->name;
            $users->email          = $request->email;
            $users->phone          = $request->phone;
            $users->address        = $request->address;
            $users->birthday       = $request->birthday;
            $users->sex            = $request->sex;
            $user = Session::get('users');
            $user['name'] = $request->name;
            $user['phone'] = $request->phone;
            $user['address'] = $request->address;
            $user['birthday'] = $request->birthday;
            $user['sex'] = $request->sex;
            Session::put('users', $user);
            $users->save();

            return redirect('/')->with('success', 'Thay đổi thông tin thành công');

        } catch (Exception $e) {

            return redirect('/')->with('error', 'Lỗi Không thể chỉnh sửa thông tin');
        }

    }
    // chỉnh sửa mật khẩu
    public function  changePassword(Request $request, $id) {
        $validator  = Validator::make($request->only( 'password', 'rpassword', 'old_password'), [
            'old_password'  => ['required'],
            'password'  => ['required', 'min:8'],
            'rpassword' => ['required', 'same:password'],
        ],
        [
            'old_password.required'  => 'Bạn cần nhập vào mật khẩu cũ',
            'password.required'  => 'Bạn cần nhập vào mật khẩu',
            'password.min'       => 'Mật khẩu phải dài hơn 8 ký tự',
            'rpassword.required' => 'Nhập lại mật khẩu không thể để trống',
            'rpassword.same'     => 'Mật khẩu không trùng khớp',

        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withInput()
                ->withErrors($validator->errors());
        }

        $dataUser = Users::where('id', $id)->get()->toArray();

        $checkPass = Hash::check($request->old_password, $dataUser[0]['password']);

        if($checkPass) {

            try {

                $users =  Users::find($id);
                $users->password       = Hash::make($request->rpassword);
                $users->save();

                return redirect('/')->with('success', 'Thay đổi mật khẩu thành công');

            } catch (Exception $e) {

                return redirect('/')->with('error', 'Lỗi Không thể đổi mật khẩu');
            }
        } else {
            return redirect('/')->with('error', 'Mật khẩu cũ không đúng');
        }

    }

    // đăng xuất
    public function logout() {

    	if(Session::has('users')) {

    		Session::forget('users');

    		return redirect('/');
    	}
    }
}
