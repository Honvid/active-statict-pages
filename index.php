<?php
require 'require.php';
$data = JsonHelper::read('Base');
$persons = JsonHelper::read('Persons');
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
    <meta name="author" content="Coderthemes">

    <link rel="shortcut icon" href="assets/images/favicon_1.ico">

    <title>活动管理</title>
    <link href="assets/plugins/bootstrap-table/css/bootstrap-table.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/switchery/css/switchery.min.css" rel="stylesheet" />
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/core.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/components.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/pages.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/responsive.css" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

    <script src="assets/js/modernizr.min.js"></script>

</head>

<body class="fixed-left">

<!-- Begin page -->
<div id="wrapper">

    <!-- Top Bar Start -->
    <div class="topbar">

        <!-- LOGO -->
        <div class="topbar-left">
            <div class="text-center">
                <a href="index.html" class="logo">活动管理</a>
            </div>
        </div>

        <!-- Button mobile view to collapse sidebar menu -->
        <div class="navbar navbar-default" role="navigation">
            <div class="container">
                <div class="">
                    <div class="pull-left">
                        <button class="button-menu-mobile open-left waves-effect waves-light">
                            <i class="md md-menu"></i>
                        </button>
                        <span class="clearfix"></span>
                    </div>
                    <ul class="nav navbar-nav navbar-right pull-right">
                        <li class="hidden-xs">
                            <a href="#" id="btn-fullscreen" class="waves-effect waves-light"><i class="icon-size-fullscreen"></i></a>
                        </li>
                    </ul>
                </div>
                <!--/.nav-collapse -->
            </div>
        </div>
    </div>
    <div class="left side-menu">
        <div class="sidebar-inner slimscrollleft">
            <!--- Divider -->
            <div id="sidebar-menu">
                <ul>
                    <li class="text-muted menu-title">控制台</li>
                    <li>
                        <a href="/" class="waves-effect"><span> 二十词组 </span></a>
                    </li>
                    <li>
                        <a href="/big.php" class="waves-effect"><span> BigData </span></a>
                    </li>
                    <li>
                        <a href="/brain.php" class="waves-effect"><span> Brain </span></a>
                    </li>
                    <li>
                        <a href="/cloud.php" class="waves-effect"><span> Cloud </span></a>
                    </li>
                    <li>
                        <a href="/hat.php" class="waves-effect"><span> Hat </span></a>
                    </li>
                    <li>
                        <a href="/human.php" class="waves-effect"><span> Human </span></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <div class="content-page">
        <!-- Start content -->
        <div class="content">
            <div class="container">

                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <ol class="breadcrumb">
                            <li>
                                <a href="/">首页</a>
                            </li>
                            <li class="active">二十词组</li>
                        </ol>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="panel">
                            <div class="panel-body">

                                <table class="table table-striped table-bordered">
                                    <thead>
                                    <tr>
                                        <th><input type="checkbox" class="check-all"></th>
                                        <th>编号</th>
                                        <th>词组</th>
                                        <th>数量</th>
                                        <th>是否启用</th>
                                        <th>操作</th>
                                    </tr>
                                    </thead>
                                    <div class="form-inline m-b-20">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="input-group m-b-10">
                                                    <span class="input-group-addon"><i class="fa fa-user"></i> 参与人数</span>
                                                    <input
                                                            type="number"
                                                            id="persons"
                                                            name="persons"
                                                            class="form-control" placeholder="参与人数" value="<?php echo $persons[0]; ?>">
                                                    <span class="input-group-btn">
                                                        <button type="button" id="person-submit" class="btn waves-effect waves-light btn-primary">提交</button>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 text-xs-center">
                                                <div class="pull-right">
                                                    <div class="form-group">
                                                        <a class="btn btn-success form-control">批量启用</a>
                                                    </div>
                                                    <div class="form-group">
                                                        <a class="btn btn-warning form-control">批量禁用</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <tbody>
                                    <?php foreach ($data as $key => $value): ?>
                                        <tr>
                                            <td><input type="checkbox" class="check-child" value="<?php echo $key; ?>"></td>
                                            <td><?php echo $key+1; ?></td>
                                            <td>
                                                <input type="text" id="title-<?php echo $key; ?>"  value="<?php echo $value['title']; ?>">
                                            </td>
                                            <td>
                                                <input type="number" id="num-<?php echo $key; ?>"  value="<?php echo $value['num']; ?>">
                                            </td>
                                            <td>
                                                <input type="checkbox"
                                                       class="switch-box"
                                                       data-key="<?php echo $key; ?>"
                                                    <?php if (!empty($value['status'])): ?>
                                                        checked
                                                    <?php endif ?> id="status-<?php echo $key; ?>" data-plugin="switchery" data-color="#34d3eb" data-size="small" />
                                            </td>
                                            <td class="actions">
                                                <a href="javascript:;" data-key="<?php echo $key; ?>" class="edit">保存</a>
                                            </td>
                                        </tr>
                                    <?php endforeach ?>
                                    </tbody>
                                </table>
                            </div>
                        </div> <!-- end Panel -->
                    </div>
                </div>
            </div> <!-- container -->
        </div> <!-- content -->

        <footer class="footer">
            © 2016. All rights reserved.
        </footer>

    </div>
    <!-- ============================================================== -->
    <!-- End Right content here -->
    <!-- ============================================================== -->
</div>
<!-- END wrapper -->

<script>
    var resizefunc = [];
</script>

<!-- jQuery  -->
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/detect.js"></script>
<script src="assets/js/fastclick.js"></script>
<script src="assets/js/jquery.slimscroll.js"></script>
<script src="assets/js/jquery.blockUI.js"></script>
<script src="assets/js/waves.js"></script>
<script src="assets/js/wow.min.js"></script>
<script src="assets/js/jquery.nicescroll.js"></script>
<script src="assets/js/jquery.scrollTo.min.js"></script>

<script src="assets/plugins/switchery/js/switchery.min.js"></script>
<script src="assets/plugins/bootstrap-table/js/bootstrap-table.min.js"></script>

<script src="assets/pages/jquery.bs-table.js"></script>

<script src="assets/js/jquery.core.js"></script>
<script src="assets/js/jquery.app.js"></script>

<script type="text/javascript">
    $(document).ready(function () {
        $('.check-all').bind('change', function () {
            var that = $(this);
            if(that.is(':checked')) {
                $('.check-child').each(function () {
                    $(this).attr('checked', true);
                })
            }else{
                $('.check-child').each(function () {
                    $(this).attr('checked', false);
                })
            }

        });
        $('#person-submit').click(function () {
            var number = $('#persons').val();
            if(!number) {
                alert('不能为空！');
                return false;
            }
            $.ajax({
                url: '/save.php',
                data: {'type': 'Persons', 'num': number},
                type: 'POST',
                success: function (response) {
                    console.log(response);
                    location.reload();
                },
                error: function (message) {
                    console.log(message)
                }
            })
        });
        $('.switch-box').on('change', function () {
            var key = $(this).data('key');
            var title = $('#title-' + key).val();
            var num = $('#num-' + key).val();
            var status = $('#status-' + key);
            if (title == '' || !num) {
                alert('不能为空！');
                return false;
            }
            var check = 0;
            if (status.is(':checked')) {
                check = 1;
            }
            $.ajax({
                url: '/save.php',
                data: {'type': 'Base', 'key': parseInt(key), 'title': title, 'num': num, 'status': check},
                type: 'POST',
                success: function (response) {
                    console.log(response);
                    location.reload();
                },
                error: function (message) {
                    console.log(message)
                }
            })
        });
        $('.edit').on('click', function () {
            var key = $(this).data('key');
            var title = $('#title-' + key).val();
            var num = $('#num-' + key).val();
            var status = $('#status-' + key);
            if (title == '' || !num) {
                alert('不能为空！');
                return false;
            }
            var check = 0;
            if (status.is(':checked')) {
                check = 1;
            }
            $.ajax({
                url: '/save.php',
                data: {'type': 'Base', 'key': parseInt(key), 'title': title, 'num': num, 'status': check},
                type: 'POST',
                success: function (response) {
                    console.log(response);
                    alert('修改成功！');
                    location.reload();
                },
                error: function (message) {
                    console.log(message)
                }
            })
        });
    });
</script>
</body>
</html>