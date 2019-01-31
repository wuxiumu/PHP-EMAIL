<?php
header("content-type:text/html;charset=utf-8");  //设置编码

// 引入PHPMailer的核心文件
require_once('D:\WWW\dedecms01.com\jobs\PHPMailer\src/PHPMailer.php');
require_once('D:\WWW\dedecms01.com\jobs\PHPMailer\src/SMTP.php');
require_once('D:\WWW\dedecms01.com\jobs\PHPMailer\src/Exception.php');

$mail =  new \PHPMailer\PHPMailer\PHPMailer();

//设置SMTP发邮件
$mail->IsSMTP();
//发信的SMTP服务器地址
$mail->Host = 'smtp.163.com';
//调试时显示发信信息
$mail->SMTPDebug = 2;
//需要认证的服务器一定要开启,163,gmail都需要
$mail->SMTPAuth = true;
//163可以不用ssl连接,下面两个不用填
//gmail需要SSL连接，这个必须要并且端口号一定要填对
$mail->SMTPSecure = 'ssl';
$mail->SMTPOptions = array(
    'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
        )
    );
//hotmail使用tls,端口号587
//gmail端口号465,hotmail端口号587
$mail->Port      = 465;

//注意： gmail用户名必须带上域名,163不带域名
$mail->Username = 'wuxiumu@163.com';
$mail->Password = 'XXXXX';
//发中文这个必须设置为utf-8，不然中文会乱码
$mail->CharSet = 'utf-8';
$mail->Encoding = 'base64';

$from ='wuxiumu@163.com';
$to   ='824543976@qq.com';
$body = '正文';
//设置收信人地址
$mail->SetFrom($from,   'hello');
//设置发信人地址
$mail->AddAddress($to, 'hello');
//邮件主题
$mail->Subject = 'helo主题abc';
//邮件正文
$mail->MsgHTML($body) ;
//发送附件
//$mail->AddAttachment('bookmark.gif') ;

//检查是否发送成功
if (!$mail->Send()){
echo $mail->ErrorInfo;
} else {
echo 'sent';
}

    


