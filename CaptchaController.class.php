<?php
1去111111111111
/**
 * Created by PhpStorm.
 * User: asus
 * Date: 2017/6/21
 * Time: 11:52
 */
//验证码的生成
class CaptchaController extends Controller
{
// 生成随机思维字符串的方法
    public function captcha()
    {
//1生成多个字符
        $str1 ="gfjigdhsjfFEG43289545689565abpdf6EGFEG31323";
//2.将字符打乱
        $str2 = str_shuffle($str1);
//3截取四位字符
        $str3 = substr($str2,0,4);
//4将四位数放在session中
        session_start();
        $_SESSION['str3'] = $str3;
//====================生成图片=======================
$width = 145;
$height = 20;
$img = imagecreatefromjpeg(PUBLIC_PATH."/captcha/captcha_bg".mt_rand(1,5).".jpg");
//为字体添加颜色
        $black = imagecolorallocate($img,19, 6, 25);
        $red = imagecolorallocate($img,246, 66, 16);
//        在已经存在的画布上写字
        imagestring($img,5,$width/3,$height/6,$str3,mt_rand(0,1) ? $black:$red);
//        设置边框
        imagerectangle($img,0,0,$width-1,$height-1,$black);
//输出图片
header("Content-type:image/jpeg");
imagejpeg($img);
//销毁图片
imagedestroy($img);



    }

}
