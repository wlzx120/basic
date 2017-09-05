<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
//图片验证码
use Gregwar\Captcha\CaptchaBuilder;
use Session;

class IndexController extends Controller
{
    public function __construct()
    {
        $this->middleware('adminAuth')->except('captcha');
    }

    public function index()
    {
        return view('admin.index.index');
    }



    //图片验证码
    public function captcha()
    {
        //生成验证码图片的Builder对象，配置相应属性
        $builder = new CaptchaBuilder;
        //可以设置图片宽高及字体
        $builder->build($width = 100, $height = 38, $font = null);
        //获取验证码的内容
        $phrase = $builder->getPhrase();
        //把内容存入session
        Session::flash('milkcaptcha', $phrase);
        //session()->flash('milkcaptcha',$phrase);
        //生成图片
        header("Cache-Control: no-cache, must-revalidate");
        header('Content-Type: image/jpeg');
        $builder->output();
    }







}
