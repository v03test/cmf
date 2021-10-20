<?php /*a:2:{s:55:"themes/admin_simpleboot3/admin\statistics\add_data.html";i:1611042043;s:80:"D:\phpstudy_pro\WWW\ThinkCMF\public/themes/admin_simpleboot3/public\headers.html";i:1610004213;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <!-- Set render engine for 360 browser -->
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- HTML5 shim for IE8 support of HTML5 elements -->
    <!--[if lt IE 9]>

    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <![endif]-->
    <link href="/themes/admin_simpleboot3/public/assets/themes/<?php echo cmf_get_admin_style(); ?>/bootstrap.min.css" rel="stylesheet">
    <link href="/themes/admin_simpleboot3/public/assets/simpleboot3/css/simplebootadmin.css" rel="stylesheet">
    <link href="/static/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="/static/layui/css/layui.css" rel="stylesheet" type="text/css">
    <link href="/static/css/jedate.css" rel="stylesheet" type="text/css">
    <!--[if lt IE 9]>
    <script src="https://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
        form .input-order {
            margin-bottom: 0px;
            padding: 0 2px;
            width: 42px;
            font-size: 12px;
        }

        form .input-order:focus {
            outline: none;
        }

        .table-actions {
            margin-top: 5px;
            margin-bottom: 5px;
            padding: 0px;
        }

        .table-list {
            margin-bottom: 0px;
        }

        .form-required {
            color: red;
        }
    </style>
    <?php $_app=app()->http->getName(); ?>
    <script type="text/javascript">
        //全局变量
        var GV = {
            ROOT: "/",
            WEB_ROOT: "/",
            JS_ROOT: "static/js/",
            APP: '<?php echo $_app; ?>'/*当前应用名*/
        };
    </script>
    <script src="/themes/admin_simpleboot3/public/assets/js/jquery-1.10.2.min.js"></script>
    <script src="/static/js/wind.js"></script>
    <script src="/themes/admin_simpleboot3/public/assets/js/bootstrap.min.js"></script>
    <script src="/static/js/layer/layer.js"></script>
    <script src="/static/js/laypage/laypage.js"></script>
    <script src="/static/js/laytpl/laytpl.js"></script>
    <script src="/static/js/echarts/echarts.min.js"></script>
    <script src="/static/js/jedate.js"></script>
    <script src="/static/js/vue.js"></script>
    <script src="/static/js/axios.min.js"></script>
    <script>
        Wind.css('artDialog');
        Wind.css('layer');
        $(function () {
            $("[data-toggle='tooltip']").tooltip({
                container:'body',
                html:true,
            });
            $("li.dropdown").hover(function () {
                $(this).addClass("open");
            }, function () {
                $(this).removeClass("open");
            });
        });
    </script>
    <?php if(APP_DEBUG): ?>
        <style>
            #think_page_trace_open {
                z-index: 9999;
            }
        </style>
    <?php endif; ?>

<style>
    td{
        text-align: center;
    }
</style>
<body class="gray-bg">
<div style="padding: 20px; background-color: #F2F2F2;" id="dailyStat">
    <div class="layui-row layui-col-space15">
        <div class="layui-col-md12">
            <div class="layui-card">
                <div class="layui-card-header">
                    <div class="col-sm-2" style="font-weight: bold;color: red"> 生成统计数据</div>
                    <div class="col-sm-4">
                                <span class="input-group-btn" id="dateShowBtn" style="height: 50px;">
                                    <input type="text" name="start_time" id="dateSelectorTwo" lay-verify="date" placeholder="开始时间" autocomplete="off"
                                           class="form-control jeinput" value="<?php echo $start_time; ?>">
                                </span>
                    </div>
                    <button class="layui-btn" @click="add_ptdata()">生成平台统计数据</button>
                    <button class="layui-btn" @click="add_qyqdata()">生成亲友圈统计数据</button>
                </div>
                <div class="layui-card-body">
                    <div id="containertrend" style="border: 1px solid #e2e2e2;height: 600px">
                        <!-- 加载动画 -->
                        <div class="spiner-example" v-show="is_ok">
                            <div class="sk-spinner sk-spinner-three-bounce">
                                <div class="sk-bounce1"></div>
                                <div class="sk-bounce2"></div>
                                <div class="sk-bounce3"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="layui-col-md12">
            <div class="layui-card">
                <div class="layui-card-header"></div>
                <div class="layui-card-body">
                </div>
            </div>
        </div>
    </div>

</div>
</div>
</div>
<script type="text/javascript">
    var app = new Vue({
        el: '#dailyStat',
        data: {
            dateData: [],
            start_time: "<?php echo $start_time; ?>",
            is_ok: false,
        },
        created () {

        },
        methods: {
            add_ptdata() {
              let vm = this;
              let date = $('#dateSelectorTwo').val();
                axios
                    .post('/api.php/demo/statistics/get_t_datad',{date:date})
                    .then(function (response) {
                        if(response.data.code==1) {
                            layer.msg('生成成功');
                        }else{
                            layer.msg(response.data.message);
                        }
                        console.log(response);
                    })
                    .catch(function (error) { // 请求失败处理
                        console.log(error);
                    });
            },
            add_qyqdata() {
              let vm = this;
               vm.is_ok=true;
                let date = $('#dateSelectorTwo').val();
                axios
                    .post('/api.php/demo/statistics/get_qyq_datad',{date:date})
                    .then(function (response) {
                        if(response.data.code==1) {
                            vm.is_ok = false;
                            layer.msg('生成成功');
                        }else{
                            layer.msg(response.data.message);
                            vm.is_ok = false;
                        }
                        console.log(response);
                    })
                    .catch(function (error) { // 请求失败处理
                        console.log(error);
                    });
            },
        },
        mounted:function(){
        }
    })

    jeDate("#dateSelectorTwo",{
        theme:{bgcolor:"#1ab394",pnColor:"#00CCFF"},
        format: "YYYY-MM-DD"
    });

</script>
</body>
</html>
