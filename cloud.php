<?php
require 'require.php';
$data = JsonHelper::read('Cloud');
$status = isset($_GET['status']) ? $_GET['status'] : '';
$filter = [5, 10, 20, 30];
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="Honvid">
        <link rel="shortcut icon" href="assets/images/favicon_1.ico">
        <title>活动管理</title>
        <link href="assets/plugins/bootstrap-table/css/bootstrap-table.min.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="assets/plugins/jquery-datatables-editable/datatables.css" />
        <link href="assets/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
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
                                    <li class="active">Cloud</li>
                                </ol>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="panel">
                                    <div class="panel-body">
                                        <table data-toggle="table"
                                               data-show-columns="false"
                                               data-page-list="[20, 50, 100]"
                                               data-page-size="20"
                                               data-pagination="true" class="table-bordered ">
                                            <thead>
                                                <tr>
                                                    <th data-field="id">编号</th>
                                                    <th data-field="name">词组</th>
                                                    <th data-field="actions">操作</th>
                                                </tr>
                                            </thead>

                                            <div class="form-inline m-b-20">
                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <label class="col-sm-2 control-label" style="line-height: 2.5em;">筛选</label>
                                                        <div class="col-sm-10">
                                                            <select id="filter" class="select2">
                                                                <option value="">全部</option>
                                                                <option value="1" <?php echo $status == 1 ? 'selected' : '' ?>>可编辑</option>
                                                                <option value="0" <?php echo $status === '0' ? 'selected' : '' ?>>不可编辑</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <tbody>
                                            <?php foreach ($data as $key => $value): ?>
                                                <?php if ($status == 1 && in_array($key, $filter)) { ?>
                                                    <tr>
                                                        <td><?php echo $key+1; ?></td>
                                                        <td>
                                                            <input type="text" class="form-control" id="value-<?php echo $key; ?>" value="<?php echo $value; ?>">
                                                        </td>
                                                        <td class="actions">
                                                            <a href="javascript:;" data-key="<?php echo $key; ?>" class="edit">保存</a>
                                                        </td>
                                                    </tr>
                                                <?php } elseif ($status === '0' && !in_array($key, $filter)) { ?>
                                                    <tr>
                                                        <td><?php echo $key+1; ?></td>
                                                        <td><?php echo $value; ?></td>
                                                        <td class="actions"></td>
                                                    </tr>
                                                <?php } elseif ($status === '') {?>
                                                    <tr>
                                                        <td><?php echo $key+1; ?></td>
                                                        <td>
                                                            <?php if (in_array($key, $filter)): ?>
                                                                <input type="text" class="form-control" id="value-<?php echo $key; ?>" value="<?php echo $value; ?>">
                                                            <?php else: ?>
                                                                <?php echo $value; ?>
                                                            <?php endif; ?>
                                                        </td>
                                                        <td class="actions">
                                                            <?php if (in_array($key, $filter)): ?>
                                                                <a href="javascript:;" data-key="<?php echo $key; ?>" class="edit">保存</a>
                                                            <?php endif ?>
                                                        </td>
                                                    </tr>
                                                <?php } ?>
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
        </div>
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
        
        <script src="assets/plugins/bootstrap-table/js/bootstrap-table.min.js"></script>
        <script src="assets/plugins/select2/js/select2.min.js" type="text/javascript"></script>

        <script src="assets/pages/jquery.bs-table.js"></script>

        <script src="assets/js/jquery.core.js"></script>
        <script src="assets/js/jquery.app.js"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                $('#filter').on('change', function () {
                    if($('#filter').val() == 1) {
                        window.location.href = '/cloud.php?status=1';
                    }else if($('#filter').val() === '0') {
                        window.location.href = '/cloud.php?status=0';
                    }else{
                        window.location.href = '/cloud.php';
                    }
                });
                $('.edit').on('click', function() {
                    var key = $(this).data('key');
                    var data = $('#value-' + key).val();
                    if(data == '') {
                        alert('不能为空！');
                        return false;
                    }
                    $.ajax({
                        url:'/save.php',
                        data:{'type':'Cloud','key':parseInt(key), 'name':data},
                        type:'POST',
                        success:function (response) {
                            console.log(response);
                            alert('修改成功！');
                            location.reload();
                        },
                        error:function(message) {
                            console.log(message)
                        }
                    })
                })
            });
        </script>
    </body>
</html>