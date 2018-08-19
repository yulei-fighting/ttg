<!--_meta 作为公共模版分离出去-->
<!DOCTYPE HTML>
<html>

<head>
    <meta charset="utf-8">
    <meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <link rel="Bookmark" href="/favicon.ico">
    <link rel="Shortcut Icon" href="/favicon.ico" />
    <!--[if lt IE 9]>
<script type="text/javascript" src="/admin/lib/html5shiv.js"></script>
<script type="text/javascript" src="/admin/lib/respond.min.js"></script>
<![endif]-->
    <link rel="stylesheet" type="text/css" href="/admin/static/h-ui/css/H-ui.min.css" />
    <link rel="stylesheet" type="text/css" href="/admin/static/h-ui.admin/css/H-ui.admin.css" />
    <link rel="stylesheet" type="text/css" href="/admin/lib/Hui-iconfont/1.0.8/iconfont.css" />
    <link rel="stylesheet" type="text/css" href="/admin/static/h-ui.admin/skin/default/skin.css" id="skin" />
    <link rel="stylesheet" type="text/css" href="/admin/static/h-ui.admin/css/style.css" />
    <!-- 
    载入webupload.css文件 
    <link rel="stylesheet" type="text/css" href="/admin/webuploader-0.1.5/webuploader.css">
    -->
    <!--[if IE 6]>
<script type="text/javascript" src="/admin/lib/DD_belatedPNG_0.0.8a-min.js" ></script>
<script>DD_belatedPNG.fix('*');</script>
<![endif]-->
    <!--/meta 作为公共模版分离出去-->
    <title>添加用户</title>
    <meta name="keywords" content="H-ui.admin v3.1,H-ui网站后台模版,后台模版下载,后台管理系统模版,HTML后台模版下载">
    <meta name="description" content="H-ui.admin v3.1，是一款由国人开发的轻量级扁平化网站后台模板，完全免费开源的网站后台管理系统模版，适合中小型CMS后台系统。">
</head>

<body>
    <article class="page-container">
        <form action="" method="post" class="form form-horizontal" id="form-member-add" enctype="multipart/form-data">
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-3"><span class="c-red"></span>ID：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    <input type="text" class="input-text" value="{{$data->id}}" placeholder="" id="name" name="name" disabled>
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>姓名：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    <input type="text" class="input-text" value="{{$data->name}}" placeholder="" id="name" name="name">
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>性别：</label>
                <div class="formControls col-xs-8 col-sm-9 skin-minimal">
                    <div class="radio-box">
                        <input name="sex" type="radio" value="1" id="gender-1" @if($data->sex=='男')checked @endif>
                        <label for="gender-1">男</label>
                    </div>
                    <div class="radio-box">
                        <input type="radio" id="gender-2" value="2" name="sex" @if($data->sex=='女')checked @endif>
                        <label for="gender-2">女</label>
                    </div>
                    <div class="radio-box">
                        <input type="radio" id="gender-3" value="3" name="sex" @if($data->sex=='保密')checked @endif>
                        <label for="gender-3">保密</label>
                    </div>
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>年龄：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    <input type="text" class="input-text" value="{{$data->age}}" placeholder="" id="age" name="age">
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>国籍：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    <input type="text" class="input-text" value="{{$data->nation}}" placeholder="" id="nation" name="nation">
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>执拍手：</label>
                <div class="formControls col-xs-8 col-sm-9 skin-minimal">
                    <div class="radio-box">
                        <input name="hand" type="radio" value="1" id="gender-1" @if($data->hand=='左手')checked @endif>
                        <label for="gender-1">左手</label>
                    </div>
                    <div class="radio-box">
                        <input type="radio" id="gender-2" value="2" name="hand" @if($data->hand=='右手')checked @endif>
                        <label for="gender-2">右手</label>
                    </div>
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>直横拍：</label>
                <div class="formControls col-xs-8 col-sm-9 skin-minimal">
                    <div class="radio-box">
                        <input name="ver_hor" type="radio" value="1" id="gender-1" @if($data->ver_hor=='横拍')checked @endif>
                        <label for="gender-1">横拍</label>
                    </div>
                    <div class="radio-box">
                        <input type="radio" id="gender-2" value="2" name="ver_hor" @if($data->ver_hor=='直拍')checked @endif>
                        <label for="gender-2">直拍</label>
                    </div>
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>打法：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    <input type="text" class="input-text" placeholder="" name="skill" id="skill"
                    value="{{$data->skill}}">
                </div>
            </div>

            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-3">照片：</label>
                <div class="formControls col-xs-8 col-sm-9">
                 <!--   <div id="uploader-demo">
                        用来存放item
                        <div id="fileList" class="uploader-list"></div>
                        <div id="filePicker">选择图片</div>
                         隐藏域用于存放图像地址
                        <input type="hidden" name="avatar" id="avatar" value="">
                    </div>
                -->
                <!-- <input type="file" id="photo" name="photo"> -->
                    <img src="{{$data->photo}}" width="50" alt="">
                    <input class="upload_img" type="file" id="photo" name="photo">
                </div>
            </div>
            <!-- csrf验证 -->
            {{csrf_field()}}
            <div class="row cl">
                <div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
                    <input class="btn btn-primary radius" type="submit" value="&nbsp;&nbsp;提交&nbsp;&nbsp;">
                    <input class="btn btn-danger radius" type="reset" value="&nbsp;&nbsp;重置&nbsp;&nbsp;">
                </div>
            </div>
        </form>
    </article>
    <!--_footer 作为公共模版分离出去-->
    <script type="text/javascript" src="/admin/lib/jquery/1.9.1/jquery.min.js"></script>
    <script type="text/javascript" src="/admin/lib/layer/2.4/layer.js"></script>
    <script type="text/javascript" src="/admin/static/h-ui/js/H-ui.min.js"></script>
    <script type="text/javascript" src="/admin/static/h-ui.admin/js/H-ui.admin.js"></script>
    <!--/_footer 作为公共模版分离出去-->
    <!--请在下方写此页面业务相关的脚本-->
    <script type="text/javascript" src="/admin/lib/My97DatePicker/4.8/WdatePicker.js"></script>
    <script type="text/javascript" src="/admin/lib/jquery.validation/1.14.0/jquery.validate.js"></script>
    <script type="text/javascript" src="/admin/lib/jquery.validation/1.14.0/validate-methods.js"></script>
    <script type="text/javascript" src="/admin/lib/jquery.validation/1.14.0/messages_zh.js"></script>
    <!--
        载入webuploader的js文件
    <script type="text/javascript" src="/admin/webuploader-0.1.5/webuploader.js"></script>
    -->
    <script type="text/javascript">
    $(function() {
        $('.skin-minimal input').iCheck({
            checkboxClass: 'icheckbox-blue',
            radioClass: 'iradio-blue',
            increaseArea: '20%'
        });
    });

    /*运动员-修改*/
    // $(function(){
    //     console.log($('.upload_img').value());
    // });
    // function member_del(obj,id){
    //         $.ajax({
    //         //     headers: {
    //         //   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //         // },
    //             type: 'POST',
    //             url: "{{route('player_del')}}"+"?id="+id,
    //             dataType: 'json',
    //             success: function(data){
    //                 $(obj).parents("tr").remove();
    //                 layer.msg('已删除!',{icon:1,time:1000});
    //             },
    //             error:function(data) {
    //                 console.log(data.msg);
    //             },
    // });
    </script>
    <!--/请在上方写此页面业务相关的脚本-->
</body>

</html>