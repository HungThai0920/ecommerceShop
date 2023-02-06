<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Mail\Mailer;
use Illuminate\Mail\Message;
use Illuminate\Http\Response;
use App\Models\Admins;
use App\Http\Requests\LoginRequest;
use Hash;
use Validator;
use Session;
use Cookie;
use Mail;

class AuthController extends Controller
{

    // show ra giao diện login
    public function getLogin(){

        // If the user is logged in redirect page  home
        if(Auth::check()){

            return redirect('admin/home');

        }
        return view('admin.login');
    }

    /**
     * Posts a login.
     *
     * @param  request
     *
     * @return
     */
    // check dữ liệu login người dùng truyền lên. cho đăng nhập
    public function postLogin(LoginRequest $request){

        // Luu thong tin user vao mang 
        $remember = $request->remember;
        
        $login = array(
						'user_name' => $request->user_name,
						'password'  => $request->password
                      );
        // kiem tra nguoi dung da xac nhan email
        $admin = Admins::where('user_name', $request->user_name)->get()->toArray();
        
        // Check that the user exists
        if(empty($admin)){

            return redirect('admin/login')->with('error', 'Thông tin đăng nhập không đúng');
        }
        //  VERIFY_EMAIL_SUCCESS = 1 User status confirmed  edit bootstrap constant.php
        if( $admin[0]['status'] != Admins::STATUS){

           return redirect('admin/login')->with('error', 'Tài khoản của bạn đã bị khóa .');
        }

        // check isset cookie
        if(Cookie::get('status-login'))
        {
           return redirect('admin/login')->with('error', 'Tài khoản đăng nhập đã bị khóa. Đăng nhập sau 15 phút.');

        }
        // create session login
        if(Session::has('number')){

            $number = Session::get('number');

            Session::put('number', $number);
        }else{

            Session::put('number', '0');

        }

        // number of logins NUMBER_LOGIN_ERORR = 5  edit bootstrap constant.php 
        if(Session::has('number') && Session::get('number') > 3){
            $response = new Response();

            // create cookie
            // minutes of logins NUMBER_MINUTES_LOCK = 15 edit bootstrap constant.php 
            $response ->withCookie('status-login','status-login',1);

            return redirect('admin/login')->with('error', 'Tài khoản đăng nhập đã bị khóa. Đăng nhập sau 15 phút.');
        }
        // check  Information login
        if(Auth::attempt($login,$remember)){

            // remove session
            Session::forget('number');

            // move page
            return redirect('admin/home');
        }else{

            // add session number
            $number = Session::get('number') +1 ;

            Session::put('number', $number);

            return redirect('admin/login')->with('error', 'Thông tin tài khoản không chính xác.');
        }

    }

      /**
     *  function forgot Password
     */
    // show giao diện quên mật khẩu
    public function getForgotPassword(){

        return view("admin.forgotpass");
    }

    /**
     * I forgot my password
     *
     * @param      \App\Http\Requests\ForgotPasswordRequest  $request  The request email
     */
    // kiểm tra dữ liệu người dùng gửi mail cho người dùng để thay mật khẩu
    public function postForgotPassword(Request $request){

    	$validator  = Validator::make($request->only('email'), [
            'email'     => ['required', 'email'],
    	],
        [
            'email.required'     => 'Email không thể để trống',
            'email.email'        => 'Không đúng định dạng email',
    	]);

    	if ($validator->fails()) {
            return redirect()
                    ->back()
                    ->withInput()
                    ->withErrors($validator->errors());
        }

        // select information user
        $user = Admins::where('email', $request->email)->get()->toArray();

        //If user information does not exist
        if(empty($user)){

            return redirect('admin/getForgotPassword')->with('error', 'Email không trùng khớp với bất kỳ tài khoản nào.');
        }
        // Send mail
        // create session
        Session::put('email', $user[0]['email']);
        Session::put('name',  $user[0]['user_name']);
        $token  = $user[0]['remember_token'];
        // Send mail
        $data = ['token' => $token ];
        $link = 'emails.confirmpass';
        
        // function send mail
        sendMail($link, $data);

        return redirect('admin/getForgotPassword')->with('success', 'Kiểm tra email để thay đổi password.');
    }


    /**
     * comfirm validate reset password
     *
     * @param      $token
     *
     * @return     <type>  The token reset password.
     */
    public function getTokenResetPassword($token){

       // select information user
        $user = Admins::where('remember_token', $token)->get()->toArray();

         //If user information does not exist
        if(empty($user)){

            return redirect('admin/getForgotPassword')->with('error', 'Tài khoản không tồn tại ');

        }

        Session::put('id', $user[0]['id']);

        return redirect('admin/getResetPassword')->with('sucess', 'Thay đổi password của bạn');


    }
    // show giao diện  reset password
    public function getResetPassword(){

        return view('admin.resetPassword');
    }


    /**
     * Posts a reset password.
     *
     * @param      \App\Http\Requests\ResetPasswordRequest  $request  The request
     *
     * @return     <type>                                   ( description_of_the_return_value )
     */
    public function postResetPassword(Request $request){

        $validator  = Validator::make($request->only('password', 'rpassword'), [
            'password'  => ['required', 'min:8'],
            'rpassword' => ['required', 'same:password'],
        ],
        [
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

        if(Session::has('id')){

            $id = Session::get('id');

            $user = Admins::find($id);

            $user->password = Hash::make($request->rpassword);

            $user->save();

            Session::forget('id');
            return redirect('admin/login')->with('success', 'Thay đổi mật khẩu thành công.');

        }else{

            return redirect('admin/getForgotPassword')->with('error', 'Tài khoản không tồn tại');

        }
    }



    /**
     * logout
     */
    public function getLogout(){

        Auth::logout();

        return redirect('admin/login');
    }
}
