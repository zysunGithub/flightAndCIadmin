
<!DOCTYPE html>
<html>
<head>
    <title>Flight and CI</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- bootstrap -->
    <link href="/assets/css/bootstrap/bootstrap.css" rel="stylesheet" />
    <link href="/assets/css/bootstrap/bootstrap-responsive.css" rel="stylesheet" />
    <link href="/assets/css/bootstrap/bootstrap-overrides.css" type="text/css" rel="stylesheet" />

    <!-- libraries -->
    <link href="/assets/css/lib/jquery-ui-1.10.2.custom.css" rel="stylesheet" type="text/css" />
    <link href="/assets/css/lib/font-awesome.css" type="text/css" rel="stylesheet" />

    <!-- global styles -->
    <link rel="stylesheet" type="text/css" href="/assets/css/layout.css" />
    <link rel="stylesheet" type="text/css" href="/assets/css/elements.css" />
    <link rel="stylesheet" type="text/css" href="/assets/css/icons.css" />

    <!-- this page specific styles -->
    <link rel="stylesheet" href="/assets/css/compiled/index.css" type="text/css" media="screen" />
    <link href="/assets/css/lib/bootstrap-wysihtml5.css" type="text/css" rel="stylesheet" />
    <link rel="stylesheet" href="/assets/css/compiled/form-showcase.css" type="text/css" media="screen" />
    <!-- open sans font -->

    <!-- lato font -->

    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>
<body>

<!-- navbar -->
<div class="navbar navbar-inverse">
    <div class="navbar-inner">
        <a class="brand" href="../Facade" style="font-weight:700;font-family:Microsoft Yahei">Flight and CI</a>

        <ul class="nav pull-right">
            <li class="hidden-phone">
                <input class="search" type="text" />
            </li>
            <li class="notification-dropdown hidden-phone">
                <a href="#" class="trigger">
                    <i class="icon-warning-sign"></i>
                    <span class="count">6</span>
                </a>
                <div class="pop-dialog">
                    <div class="pointer right">
                        <div class="arrow"></div>
                        <div class="arrow_border"></div>
                    </div>
                    <div class="body">
                        <a href="#" class="close-icon"><i class="icon-remove-sign"></i></a>
                        <div class="notifications">
                            <a href="#" class="item">
                                <i class="icon-signin"></i> 新用户注册
                                <span class="time"><i class="icon-time"></i> 13 分钟前.</span>
                            </a>
                            <a href="#" class="item">
                                <i class="icon-signin"></i> 新用户注册
                                <span class="time"><i class="icon-time"></i> 18 分钟前.</span>
                            </a>
                            <a href="#" class="item">
                                <i class="icon-signin"></i> 新用户注册
                                <span class="time"><i class="icon-time"></i> 49 分钟前.</span>
                            </a>
                            <a href="#" class="item">
                                <i class="icon-download-alt"></i> 新订单
                                <span class="time"><i class="icon-time"></i> 1 天前.</span>
                            </a>
                            <div class="footer">
                                <a href="#" class="logout">查看所有通知</a>
                            </div>
                        </div>
                    </div>
                </div>
            </li>

            <li class="notification-dropdown hidden-phone">
                <a href="#" class="trigger">
                    <i class="icon-envelope-alt"></i>
                </a>
                <div class="pop-dialog">
                    <div class="pointer right">
                        <div class="arrow"></div>
                        <div class="arrow_border"></div>
                    </div>
                    <div class="body">
                        <a href="#" class="close-icon"><i class="icon-remove-sign"></i></a>
                        <div class="messages">
                            <a href="#" class="item">
                                <img src="/assets/img/contact-img.png" class="display" />
                                <div class="name">Alejandra Galván</div>
                                <div class="msg">
                                    There are many variations of available, but the majority have suffered alterations.
                                </div>
                                <span class="time"><i class="icon-time"></i> 13 min.</span>
                            </a>
                            <a href="#" class="item">
                                <img src="/assets/img/contact-img2.png" class="display" />
                                <div class="name">Alejandra Galván</div>
                                <div class="msg">
                                    There are many variations of available, have suffered alterations.
                                </div>
                                <span class="time"><i class="icon-time"></i> 26 min.</span>
                            </a>
                            <a href="#" class="item last">
                                <img src="/assets/img/contact-img.png" class="display" />
                                <div class="name">Alejandra Galván</div>
                                <div class="msg">
                                    There are many variations of available, but the majority have suffered alterations.
                                </div>
                                <span class="time"><i class="icon-time"></i> 48 min.</span>
                            </a>
                            <div class="footer">
                                <a href="#" class="logout">View all messages</a>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle hidden-phone" data-toggle="dropdown">
                    账户管理
                    <b class="caret"></b>
                </a>
                <ul class="dropdown-menu">
                    <li><a href="/index.php?r=admin%2Fmanage%2Fchangeemail">个人信息管理</a></li>
                    <li><?php echo anchor("../login/changePassword", '修改密码'); ?></li>
                    <li><a href="#">订单管理</a></li>
                </ul>
            </li>
            <li class="settings hidden-phone">
                <a href="personal-info.html" role="button">
                    <i class="icon-cog"></i>
                </a>
            </li>
            <li class="settings hidden-phone">
                <a href="../Login/logout" role="button">
                    <i class="icon-share-alt"></i>
                </a>
            </li>
        </ul>
    </div>
</div>
<!-- end navbar -->

<!-- sidebar -->
<div id="sidebar-nav">
    <ul id="dashboard-menu">
        <li class="active">
            <div class="pointer">
                <div class="arrow"></div>
                <div class="arrow_border"></div>
            </div>
            <a href="../Facade">
                <i class="icon-home"></i>
                <span>后台首页</span>
            </a>
        </li>
        <li>
            <a class="dropdown-toggle" href="#">
                <i class="icon-user"></i>
                <span>管理员管理</span>
                <i class="icon-chevron-down"></i>
            </a>
            <ul class="submenu">
                <li><a href="/index.php?r=admin%2Fmanage%2Fmanagers">管理员列表</a></li>
                <li><a href="/index.php?r=admin%2Fmanage%2Freg">加入新管理员</a></li>
            </ul>
        </li>

        <li>
            <a class="dropdown-toggle" href="#">
                <i class="icon-group"></i>
                <span>用户管理</span>
                <i class="icon-chevron-down"></i>
            </a>
            <ul class="submenu">
                <li><a href="/index.php?r=admin%2Fuser%2Fusers">用户列表</a></li>
                <li><a href="/index.php?r=admin%2Fuser%2Freg">加入新用户</a></li>
            </ul>
        </li>
        <li>
            <a class="dropdown-toggle" href="#">
                <i class="icon-list"></i>
                <span>分类管理</span>
                <i class="icon-chevron-down"></i>
            </a>
            <ul class="submenu">
                <li><a href="/index.php?r=admin%2Fcategory%2Flist">分类列表</a></li>
                <li><a href="/index.php?r=admin%2Fcategory%2Fadd">加入分类</a></li>
            </ul>
        </li>
        <li>
            <a class="dropdown-toggle" href="#">
                <i class="icon-glass"></i>
                <span>商品管理</span>
                <i class="icon-chevron-down"></i>
            </a>
            <ul class="submenu">
                <li><a href="/index.php?r=admin%2Fproduct%2Flist">商品列表</a></li>
                <li><a href="/index.php?r=admin%2Fproduct%2Fadd">添加商品</a></li>
            </ul>
        </li>
        <li>
            <a class="dropdown-toggle" href="#">
                <i class="icon-edit"></i>
                <span>订单管理</span>
                <i class="icon-chevron-down"></i>
            </a>
            <ul class="submenu">
                <li><a href="/index.php?r=admin%2Forder%2Flist">订单列表</a></li>
            </ul>
        </li>


    </ul>
</div>
<!-- end sidebar -->


<!-- main container -->
<div class="content">

    <div class="container-fluid">

        <!-- upper main stats -->
        <div id="main-stats">
            <div class="row-fluid stats-row">
                <div class="span3 stat">
                    <div class="data">
                        <span class="number">2457</span>
                        个访客
                    </div>
                    <span class="date">今天</span>
                </div>
                <div class="span3 stat">
                    <div class="data">
                        <span class="number">3240</span>
                        个用户
                    </div>
                    <span class="date">2016年3月</span>
                </div>
                <div class="span3 stat">
                    <div class="data">
                        <span class="number">322</span>
                        个订单
                    </div>
                    <span class="date">本周</span>
                </div>
                <div class="span3 stat last">
                    <div class="data">
                        <span class="number">$2,340</span>
                        成交金额
                    </div>
                    <span class="date">最近30天</span>
                </div>
            </div>
        </div>
        <!-- end upper main stats -->

        <div id="pad-wrapper">

            <!-- statistics chart built with jQuery Flot -->
            <div class="row-fluid chart">
                <h4>
                    统计
                    <div class="btn-group pull-right">
                        <button class="glow left">天</button>
                        <button class="glow middle active">月</button>
                        <button class="glow right">年</button>
                    </div>
                </h4>
                <div class="span12">
                    <div id="statsChart"></div>
                </div>
            </div>
            <!-- end statistics chart -->

            <!-- table sample -->
            <!-- the script for the toggle all checkboxes from header is located in js/theme.js -->
            <div class="table-products section">
                <div class="row-fluid head">
                    <div class="span12">
                        <h4>商品列表</h4>
                    </div>
                </div>

                <div class="row-fluid filter-block">
                    <div class="pull-right">
                        <div class="ui-select">
                            <select>
                                <option />过滤用户
                                <option />最近30天注册的
                                <option />已激活的用户
                            </select>
                        </div>
                        <input type="text" class="search" />
                        <a class="btn-flat new-product">+ 添加商品</a>
                    </div>
                </div>

                <div class="row-fluid">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th class="span3">
                                <input type="checkbox" />
                                商品名称
                            </th>
                            <th class="span3">
                                <span class="line"></span>商品描述
                            </th>
                            <th class="span3">
                                <span class="line"></span>商品状态
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        <!-- row -->
                        <tr class="first">
                            <td>
                                <input type="checkbox" />
                                <div class="img">
                                    <img src="assets/img/table-img.png" />
                                </div>
                                <a href="#">There are many variations </a>
                            </td>
                            <td class="description">
                                if you are going to use a passage of Lorem Ipsum.
                            </td>
                            <td>
                                <span class="label label-success">Active</span>
                                <ul class="actions">
                                    <li><i class="table-edit"></i></li>
                                    <li><i class="table-settings"></i></li>
                                    <li class="last"><i class="table-delete"></i></li>
                                </ul>
                            </td>
                        </tr>
                        <!-- row -->
                        <tr>
                            <td>
                                <input type="checkbox" />
                                <div class="img">
                                    <img src="assets/img/table-img.png" />
                                </div>
                                <a href="#">Internet tend</a>
                            </td>
                            <td class="description">
                                There are many variations of passages.
                            </td>
                            <td>
                                <ul class="actions">
                                    <li><i class="table-edit"></i></li>
                                    <li><i class="table-settings"></i></li>
                                    <li class="last"><i class="table-delete"></i></li>
                                </ul>
                            </td>
                        </tr>
                        <!-- row -->
                        <tr>
                            <td>
                                <input type="checkbox" />
                                <div class="img">
                                    <img src="assets/img/table-img.png" />
                                </div>
                                <a href="#">Many desktop publishing </a>
                            </td>
                            <td class="description">
                                if you are going to use a passage of Lorem Ipsum.
                            </td>
                            <td>
                                <ul class="actions">
                                    <li><i class="table-edit"></i></li>
                                    <li><i class="table-settings"></i></li>
                                    <li class="last"><i class="table-delete"></i></li>
                                </ul>
                            </td>
                        </tr>
                        <!-- row -->
                        <tr>
                            <td>
                                <input type="checkbox" />
                                <div class="img">
                                    <img src="assets/img/table-img.png" />
                                </div>
                                <a href="#">Generate Lorem </a>
                            </td>
                            <td class="description">
                                There are many variations of passages.
                            </td>
                            <td>
                                <span class="label label-info">Standby</span>
                                <ul class="actions">
                                    <li><i class="table-edit"></i></li>
                                    <li><i class="table-settings"></i></li>
                                    <li class="last"><i class="table-delete"></i></li>
                                </ul>
                            </td>
                        </tr>
                        <!-- row -->
                        <tr>
                            <td>
                                <input type="checkbox" />
                                <div class="img">
                                    <img src="assets/img/table-img.png" />
                                </div>
                                <a href="#">Internet tend</a>
                            </td>
                            <td class="description">
                                There are many variations of passages.
                            </td>
                            <td>
                                <ul class="actions">
                                    <li><i class="table-edit"></i></li>
                                    <li><i class="table-settings"></i></li>
                                    <li class="last"><i class="table-delete"></i></li>
                                </ul>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="pagination">
                    <ul>
                        <li><a href="#">&#8249;</a></li>
                        <li><a class="active" href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#">&#8250;</a></li>
                    </ul>
                </div>

            </div>
            <!-- end table sample -->
        </div>
    </div>
</div>





<!-- scripts -->
<script src="/assets/js/jquery-latest.js"></script>
<script src="/assets/js/bootstrap.min.js"></script>
<script src="/assets/js/jquery-ui-1.10.2.custom.min.js"></script>
<!-- knob -->
<script src="/assets/js/jquery.knob.js"></script>
<!-- flot charts -->
<script src="/assets/js/jquery.flot.js"></script>
<script src="/assets/js/jquery.flot.stack.js"></script>
<script src="/assets/js/jquery.flot.resize.js"></script>
<script src="/assets/js/theme.js"></script>
<script src="/assets/js/wysihtml5-0.3.0.js"></script>
<script src="/assets/js/bootstrap-wysihtml5-0.0.2.js"></script>

<script type="text/javascript">
    $(function () {

        // jQuery Knobs
        $(".knob").knob();



        // jQuery UI Sliders
        $(".slider-sample1").slider({
            value: 100,
            min: 1,
            max: 500
        });
        $(".slider-sample2").slider({
            range: "min",
            value: 130,
            min: 1,
            max: 500
        });
        $(".slider-sample3").slider({
            range: true,
            min: 0,
            max: 500,
            values: [ 40, 170 ],
        });



        // jQuery Flot Chart
        var visits = [[1, 50], [2, 40], [3, 45], [4, 23],[5, 55],[6, 65],[7, 61],[8, 70],[9, 65],[10, 75],[11, 57],[12, 59]];
        var visitors = [[1, 25], [2, 50], [3, 23], [4, 48],[5, 38],[6, 40],[7, 47],[8, 55],[9, 43],[10,50],[11,47],[12, 39]];

        var plot = $.plot($("#statsChart"),
            [ { data: visits, label: "注册量"},
                { data: visitors, label: "访客量" }], {
                series: {
                    lines: { show: true,
                        lineWidth: 1,
                        fill: true,
                        fillColor: { colors: [ { opacity: 0.1 }, { opacity: 0.13 } ] }
                    },
                    points: { show: true,
                        lineWidth: 2,
                        radius: 3
                    },
                    shadowSize: 0,
                    stack: true
                },
                grid: { hoverable: true,
                    clickable: true,
                    tickColor: "#f9f9f9",
                    borderWidth: 0
                },
                legend: {
                    // show: false
                    labelBoxBorderColor: "#fff"
                },
                colors: ["#a7b5c5", "#30a0eb"],
                xaxis: {
                    ticks: [[1, "一月"], [2, "二月"], [3, "三月"], [4,"四月"], [5,"五月"], [6,"六月"],
                        [7,"七月"], [8,"八月"], [9,"九月"], [10,"十月"], [11,"十一月"], [12,"十二月"]],
                    font: {
                        size: 12,
                        family: "Open Sans, Arial",
                        variant: "small-caps",
                        color: "#697695"
                    }
                },
                yaxis: {
                    ticks:3,
                    tickDecimals: 0,
                    font: {size:12, color: "#9da3a9"}
                }
            });

        function showTooltip(x, y, contents) {
            $('<div id="tooltip">' + contents + '</div>').css( {
                position: 'absolute',
                display: 'none',
                top: y - 30,
                left: x - 50,
                color: "#fff",
                padding: '2px 5px',
                'border-radius': '6px',
                'background-color': '#000',
                opacity: 0.80
            }).appendTo("body").fadeIn(200);
        }

        var previousPoint = null;
        $("#statsChart").bind("plothover", function (event, pos, item) {
            if (item) {
                if (previousPoint != item.dataIndex) {
                    previousPoint = item.dataIndex;

                    $("#tooltip").remove();
                    var x = item.datapoint[0].toFixed(0),
                        y = item.datapoint[1].toFixed(0);

                    var month = item.series.xaxis.ticks[item.dataIndex].label;

                    showTooltip(item.pageX, item.pageY,
                        item.series.label + " of " + month + ": " + y);
                }
            }
            else {
                $("#tooltip").remove();
                previousPoint = null;
            }
        });
    });
    $(".wysihtml5").wysihtml5({
        "font-styles": false
    });
    $("#addpic").click(function(){
        var pic = $("#product-pics").clone();
        pic.attr("style", "margin-left:120px");
        $("#product-pics").parent().append(pic);
    });

</script>

</body>
</html>
