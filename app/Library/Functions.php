<?php
    function getlistShiper () {

       return $listShiper = [
            1 => 'Đặng Văn Hậu',
            2 => 'Nguyễn Quang Hải',
            3 => 'Phan Văn Đức',
            4 => 'Lương Xuân Trường',
            5 => 'Trần Đình Trọng',
        ];
    }

    function getListStatus() {
        return $listStatus = [
            1 => 'Đang xử lý',
            2 => 'Đang giao hàng',
            3 => 'Hoàn thành',
            4 => 'Chờ xác nhận',
            5 => 'Đã hủy'
        ];
    }

    /**
     * Convert text format 
     *
     * @param      string  $str    The string
     * string nguyễn văn dược
     * @return     string nguyen-van-duoc
     */
    
    function safe_title($str = ''){

        $str = html_entity_decode($str, ENT_QUOTES, "UTF-8");
        $filter_in = array('#(a|à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)#', '#(A|À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)#', '#(e|è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)#', '#(E|È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)#', '#(i|ì|í|ị|ỉ)#', '#(I|ĩ|Ì|Í|Ị|Ỉ|Ĩ)#', '#(o|ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)#', '#(O|Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)#', '#(u|ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)#', '#(U|Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)#', '#(y|ỳ|ý|ỵ|ỷ|ỹ)#', '#(Y|Ỳ|Ý|Ỵ|Ỷ|Ỹ)#', '#(d|đ)#', '#(D|Đ)#');
        $filter_out = array('a', 'A', 'e', 'E', 'i', 'I', 'o', 'O', 'u', 'U', 'y', 'Y', 'd', 'D');
        $text = preg_replace($filter_in, $filter_out, $str);
        $text = preg_replace('/[^a-zA-Z0-9]/', ' ', $text);
        $text = trim(preg_replace('/ /', '-', trim(strtolower($text))));
        $text = preg_replace('/--/', '-', $text);
        $text = preg_replace('/--/', '-', $text);
        return preg_replace('/--/', '-', $text);
    }


    /**
     * function Cut string 
     *
     * @param    string $text 
     * @return     string lenght $num
     */
    function the_excerpt($text ,$num){
       
        if(strlen($text)> $num){

            $cutstring = substr($text,0,$num);
            $word = substr($text,0,strrpos($cutstring,' '));
            return $word ;

        }
        else{
            return $text;
        }

    }

    /**
     * random string
     *
     * @param      integer  $length  The length
     *
     * @return     string random
     */

    function rand_string($length){
        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        $size = strlen($chars);
        $str = '';
        for( $i = 0; $i < $length; $i++ ) {

            $str .= $chars[rand(0,$size - 1)];

         }
        return $str;
    }
    /**
     * Sends a mail.
     *
     * @param      <type>  $link   The link 
     * @param      <type>  $data   The data
     */
    function sendMail($link, $data){

        Mail::send($link, $data, function($message) use($data) {
            
            $message->from('phuc.10b5.2015@gmail.com', 'Administrator');
            $message->to( Session::get('email'), Session::get('name'))->subject('Confirmation Email');
        });
       
    }

    /**
     * Check if the user has successfully logged in
     *
     * @return     <type>  ( description_of_the_return_value )
     */

    function checkLoginSuccess(){

        if(!Auth::check()){

            return redirect('users/getLogin')->with(['flash_level'=>'danger','flash_message'=>'You need to sign in to use']);

        }
    }

    /**
     * { function_description }
     *
     * @param      <type>   $data    The data
     * @param      integer  $parent  The parent
     * @param      string   $str     The string
     * @param      integer  $select  The select
     */
    function cateParent($data,$select_name="",$parent = 0, $str ='--',$select=0){
       foreach ($data as $key => $value)
       {
           $id = $value['id'];
           $name = $value['name'];

            if($value['parent_id'] == $parent )
            {
               if($select!=1 && $id == $select)
               {


                    echo "<option";
                    if(old($select_name) == $value['id'] ){

                        echo 'selected ="selected"';

                    }

                    if ($select_name == $value['id']) {
                        echo 'selected ="selected"';
                    }
                    echo" value='".$value['id']."' selected='selected'> $str $name</option>";


                } else {
                  echo "<option ";
                  if(old($select_name) == $value['id'] ){

                    echo 'selected ="selected"';

                  }
                    if ($select_name == $value['id']) {
                        echo 'selected ="selected"';
                    }
                  echo"value='".$value['id']."'> $str $name</option>";
                }
                cateParent($data, $select_name, $id, $str.'--', $select);
            }

       }

    }



?>
