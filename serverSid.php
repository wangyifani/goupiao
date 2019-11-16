<?php
//载入ucpass类
require_once('lib/Ucpaas.class.php');

//初始化必填
//填写在开发者控制台首页上的Account Sid
$options['accountsid']='8b9f0977eb204e0eab1bd865dc959c5a';
//填写在开发者控制台首页上的Auth Token
$options['token']='6c7da969ca96984243b76937b47a8ed9';

//初始化 $options必填
$ucpass = new Ucpaas($options);
