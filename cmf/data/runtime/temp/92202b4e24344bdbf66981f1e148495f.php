<?php /*a:2:{s:47:"themes/admin_simpleboot3/admin\qyq\add_qyq.html";i:1610336897;s:80:"D:\phpstudy_pro\WWW\ThinkCMF\public/themes/admin_simpleboot3/public\headers.html";i:1610004213;}*/ ?>
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

</head>
<body>
<div class="wrap js-check-wrap" id="addQyq">
    <div class="row">
        <div class="col-sm-3">
            <div class="input-group">
                <input type="text" class="form-control" v-model="uid" placeholder="输入需要查询的玩家Id">
                <span class="input-group-btn">
                <button class="btn btn-default" type="button" @click="seach()">搜索</button>
            </span>
            </div><!-- /input-group -->
        </div><!-- /.col-lg-6 -->
    </div><!-- /.row -->

        <div class="row" style="height: 300px;margin-top: 30px">
        <div class="col-sm-3">
        <div class="panel panel-info">
            <div class="panel-heading">
                <h3 class="panel-title">账号</h3>
            </div>
            <div class="panel-body">
                {{uid}}
            </div>
        </div>
        </div>
        <div class="col-sm-3">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title">昵称</h3>
                </div>
                <div class="panel-body">
                    {{username}}
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title">设备号</h3>
                </div>
                <div class="panel-body">
                    {{os}}
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title">注册时间</h3>
                </div>
                <div class="panel-body">
                    {{regTime}}
                </div>
            </div>
        </div>
        </div>
        <div class="row" style="height: 300px;margin-top: 30px">
        <div class="col-sm-3">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title">房钻</h3>
                </div>
                <div class="panel-body">
                    {{card}}
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title">上级邀请码</h3>
                </div>
                <div class="panel-body">
                    {{payBindId}}
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title">绑定时间</h3>
                </div>
                <div class="panel-body">
                    {{payBindTime}}
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title">账号状态</h3>
                </div>
                <div class="panel-body">
                    <span v-if="userState=='- -'" >- -</span>
                    <span v-if="userState==1" class="label label-primary">正常</span>
                    <span v-if="userState==0" class="label label-default">禁止登录</span>
                    <span v-if="userState==2" class="label label-danger">红名</span>
                </div>
            </div>
        </div>
        </div>
        <div class="row" style="height: 300px;margin-top: 30px">
        <div class="col-sm-3">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="请输入亲友圈靓号" aria-describedby="basic-addon2">
                <span class="input-group-addon" id="basic-addon2">亲友圈靓号</span>
            </div>
        </div>
        <div class="col-sm-3">
            <button type="button" class="btn btn-success" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" @click="add_qyq()">
            添加亲友圈
            </button>
            <button type="button" class="btn btn-warning" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                返回
            </button>
        </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    var app = new Vue({
        el: '#addQyq',
        data: {
            groupId: '',
            account: "- -",
            username: "- -",
            naccount: "- -",
            regTime: "- -",
            card: "- -",
            payBindId: "- -",
            payBindTime: "- -",
            userState: "- -",
            uid: '',
            os: '- -',
        },
        created () {

        },
        methods: {
            seach () {
                let vm = this;
                let uid = vm.uid;
                axios
                    .post('/api.php/demo/qyq/get_user',{uid: uid})
                    .then(function (response) {
                        if(response.data.code==1) {
                            vm.username = response.data.data.name;
                            vm.regTime = response.data.data.regTime;
                            vm.card = response.data.data.cards + response.data.data.freeCards;
                            vm.payBindId = response.data.data.payBindId;
                            if(response.data.data.payBindTime && response.data.data.payBindTime!=''){
                                vm.payBindTime = response.data.data.payBindTime;
                            }
                            if(response.data.data.os && response.data.data.os!=''){
                                vm.os = response.data.data.os;
                            }
                            vm.userState = response.data.data.userState;
                        }else{
                            alert(response.data.msg);
                        }
                        console.log(response);
                    })
                    .catch(function (error) { // 请求失败处理
                        console.log(error);
                    });
            },
            add_qyq () {
                let vm = this;
                let groupName = vm.uid;
                let userId = vm.uid;
                layer.confirm('您确定要添加亲友圈吗？', {
                    btn: ['确定','取消'] //按钮
                }, function() {
                    if(!userId) {
                        layer.msg('用户信息不存在');
                        return;
                    }
                    let groupId = vm.groupId;
                    // if(!groupId ){
                    //     layer.msg('亲友圈Id不能为空');
                    //     return;
                    // }
                    let gameIds = '';
                    axios
                        .post("/api.php/demo/qyq/add_qyq",{groupName: groupName,userId:userId,groupId:groupId,gameIds:gameIds})
                        .then(function (response) {
                            console.log(response);
                            if(response.data.code==0) {
                                layer.msg(response.data.message);
                                layer.closeAll('dialog');
                            }else{
                                layer.msg(response.data.message);
                            }

                        })
                        .catch(function (error) { // 请求失败处理
                            console.log(error);
                        });
                })


            },
        },
        mounted:function(){
        }
    })
</script>
</body>
</html>