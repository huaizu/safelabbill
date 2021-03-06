<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="ch">
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <meta charset="utf-8" />
        <title>管理員登陸</title>

        <meta name="description" content="User login page" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

        <!--设置不缓存页面-->
        <!--自定义的css文件-->
        <!--<load href="/safelabbill/Public/css/base.css">-->

        <!-- bootstrap & fontawesome -->
        <link rel="stylesheet" href="/safelabbill/Public/css/bootstrap.css" />
        <link rel="stylesheet" href="/safelabbill/Public/css/font-awesome.css" />

        <!-- text fonts -->
        <link rel="stylesheet" href="/safelabbill/Public/css/ace-fonts.css" />

        <!-- ace styles -->
        <link rel="stylesheet" href="/safelabbill/Public/css/ace.css" />

        <!--[if lte IE 9]>
                <link rel="stylesheet" href="/safelabbill/Public/css/ace-part2.css" />
        <![endif]-->
        <link rel="stylesheet" href="/safelabbill/Public/css/ace-rtl.css" />

        <!--[if lte IE 9]>
          <link rel="stylesheet" href="/safelabbill/Public/css/ace-ie.css" />
        <![endif]-->

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->

        <!--[if lt IE 9]>
        <script src="/safelabbill/Public/js/html5shiv.js"></script>
        <script src="/safelabbill/Public/js/respond.js"></script>
        <![endif]-->
        <style>
            .vcodeimg{display: inline-block;width:50px;height:35px; vertical-align: middle;margin: 0px 0px 0px 30px;*display:inline;*zoom:1;}
        </style>
    </head>

    <body class="login-layout light-login" style="margin-top: 80px;">
        <div class="main-container">
            <div class="main-content">
                <div class="row">
                    <div class="col-sm-10 col-sm-offset-1">
                        <div class="login-container">
                            <div class="center">
                                <h1>
                                    <i class="ace-icon fa fa-leaf green"></i>
                                    <span class="red">实验室</span>
                                    <span class="gray" id="id-text2">账单管理</span>
                                </h1>
                                <h4 class="blue" id="id-company-text">&copy; Safe Lab</h4>
                            </div>

                            <div class="space-6"></div>

                            <div class="position-relative">
                                <div id="login-box" class="login-box visible widget-box no-border">
                                    <div class="widget-body">
                                        <div class="widget-main">
                                            <h4 class="header blue lighter bigger">
                                                <i class="ace-icon fa fa-coffee green"></i>
                                                管理员登陆
                                            </h4>

                                            <div class="space-6"></div>

                                            <!--用于显示错误信息-->
                                            <?php if($errorInfo != ''): ?><label class="block clearfix">
                                                    <span class="block input-icon input-icon-right" style="color:red;font-weight: bold">
                                                        <?php echo ($errorInfo); ?>
                                                    </span>
                                                </label><?php endif; ?>
                                            <form method="post" action="/safelabbill/index.php/Admin/Index/login">
                                                <fieldset>
                                                    <label class="block clearfix">
                                                        <span class="block input-icon input-icon-right">
                                                            <input type="text" id="username" name="username" class="form-control" placeholder="用户名" />
                                                            <i class="ace-icon fa fa-user"></i>
                                                        </span>
                                                    </label>

                                                    <label class="block clearfix">
                                                        <span class="block input-icon input-icon-right">
                                                            <input type="password" id="password" name="password" class="form-control" placeholder="密码" />
                                                            <i class="ace-icon fa fa-lock"></i>
                                                        </span>
                                                    </label>


                                                    <label class="block clearfix">
                                                        <!--注意看下面的布局结构，bootstrap 最常用的就是它的自适应布局框架，我们可以很方便的将其转化成左右结构-->
                                                        <div class="row">
                                                            <div class="col-md-5">
                                                                <input type="text" id="verify_ma" name="verify_ma"  class="form-control" placeholder="验证码" />

                                                            </div>
                                                            <div class="col-md-6">
                                                                <img src="/safelabbill/index.php/Admin/Public/index" onclick="this.src = this.src + '?' + Math.random()"/>
                                                            </div>

                                                        </div>

                                                    </label>


                                                    <div class="space"></div>

                                                    <div class="clearfix">
                                                        <!--这里我们要提交表单，当然要使用 type = submit 不然怎么提交-->
                                                        <button type="submit" class="width-35 pull-right btn btn-sm btn-primary">
                                                            <i class="ace-icon fa fa-key"></i>
                                                            <span class="bigger-110">登陆</span>
                                                        </button>
                                                    </div>

                                                    <div class="space-4"></div>
                                                </fieldset>
                                            </form>


                                            <div class="space-6"></div>

                                        </div><!-- /.widget-main -->

                                    </div><!-- /.widget-body -->
                                </div><!-- /.login-box -->


                            </div><!-- /.position-relative -->
                        </div>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.main-content -->
        </div><!-- /.main-container -->


    </body>
</html>