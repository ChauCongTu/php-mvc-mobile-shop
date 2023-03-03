<?php
class Home extends Controller{
    public $data = [];
    public $model_home;
    public function __construct()
    {
        $this->model_home = $this->model('HomeModel');
    }
    public function index(){
        $check = Session::data('user', [
            'name' => 'Châu Quế Nhơn',
            'email' => 'admin@chaucongtu.site',
            'username' => 'admin',
            'password' => '123456'
        ]);
        $user = Session::data('user');

        foreach($user as $key => $values){
            echo $key .': '. $values.'</br>';
        }

        // $this->data['page_title'] = 'Shopping Online | Trang mua bán online';
        // $this->data['content'] = 'home/index';
        // $arr = $this->db->table('product_type')->get();
        // $this->data['sub_content']['arr'] = $arr;
        // $this->render('layouts/client-layout', $this->data);
    }
    public function logout(){
        var_dump(Session::delete('user'));
    }
    public function createUser(){
        $request = new Request();
        if($request->isPost()){
            $request->rules([
                'username' => 'required|min:5|max:10|unique:users:username',
                'email' => 'required|email|min:6',
                'password' => 'required|min:6',
                'phone' => 'required|number|callback_check_value'
            ]);
            $request->message([
                'username.required'=> '*Không được để trống tên đăng nhập!',
                'username.min' => '*Tên đăng nhập phải ít nhất 5 kí tự!',
                'username.max' => '*Tên đăng nhập chỉ được tối đa 10 kí tự!',
                'username.unique' => '*Tên đăng nhập đã tồn tại!',
                'email.required'=> '*Không được để trống địa chỉ Email!',
                'email.email' => '*Định dạng email không hợp lệ!',
                'email.min' => '*Email phải ít nhất 6 kí tự',
                'password.required'=> '*Không được để trống mật khẩu!',
                'password.min' => '*Mật khẩu phải ít nhất 6 kí tự',
                'phone.required' => 'Số điện thoại không được để trống!',
                'phone.number' => 'Số điện thoại không được chữ kí tự không phải số!',
                'phone.callback_check_value' => 'Số điện thoại phải có 10 chữ số'
            ]);
            $validate = $request->validate();
            if(!$validate){
                $this->data['errors'] = $request->errors();
                $this->data['msg'] = 'Đã xảy ra lỗi, vui lòng kiểm tra lại!';
            }else{
                $this->data['msg'] = 'Tạo người dùng thành công';
            }
            $this->data['fields'] = $request->getFields();
            $this->render('products/add', $this->data);
        }
        else{
            $this->render('products/add');
        }
    }
    public function check_value($phone){
        if(strlen($phone) == 10){
            return true;
        }
        return false;
    }
    public function postProductType(){
        $request = new Request();
        $arr = $request->getFields();
        echo '<pre>';
        print_r($arr);
        echo '</pre>';
        $this->render('products/add');
    }
}
?>
