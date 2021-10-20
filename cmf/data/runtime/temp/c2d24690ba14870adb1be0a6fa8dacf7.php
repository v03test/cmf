<?php /*a:2:{s:50:"themes/admin_simpleboot3/admin\qyq\qyq_detail.html";i:1610355174;s:80:"D:\phpstudy_pro\WWW\ThinkCMF\public/themes/admin_simpleboot3/public\headers.html";i:1610004213;}*/ ?>
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
    .ibox-content {
        background-color: #fff;
        color: inherit;
        padding: 15px 20px 200px;
        border-color: #e7eaec;
        -webkit-border-image: none;
        -o-border-image: none;
        border-image: none;
        border-style: solid solid none;
        border-width: 1px 0;
    }
</style>
<body class="gray-bg">
<div class="wrapper wrapper-content animated fadeInRight" id="qyqDetail">
    <!-- Panel Other -->
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>亲友圈资料</h5>
        </div>
        <div class="ibox-content">
            <!--搜索框开始-->
            <div class="row">
                <div class="col-sm-12">
                    <form name="admin_list_sea" class="form-search" method="post">
                        <div class="col-sm-3">
                            <div class="input-group">
                                <input type="text" v-model="groupId" class="form-control" placeholder="输入需查询的亲友圈ID" />
                                <span class="input-group-btn">
                                    <button type="button" class="btn btn-primary" @click="seach()"><i class="fa fa-search"></i> 搜索</button>
                                </span>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!--搜索框结束-->
            <div class="hr-line-dashed"></div>
            <div class="example-wrap">
                <div class="example">
                    <div style="height:500px;padding: 20px; background-color: #F2F2F2;">
                        <div class="layui-row layui-col-space15">
                            <div class="col-sm-3">
                                <div class="panel panel-info">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">亲友圈ID</h3>
                                    </div>
                                    <div class="panel-body">
                                        {{groupId}}
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="panel panel-info">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">亲友圈ID</h3>
                                    </div>
                                    <div class="panel-body">
                                        {{groupId}}
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="panel panel-info">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">亲友圈名称</h3>
                                    </div>
                                    <div class="panel-body">
                                        {{groupName}}
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="panel panel-info">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">最大人数</h3>
                                    </div>
                                    <div class="panel-body">
                                        {{maxCount}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="layui-row layui-col-space15">
                            <div class="col-sm-3">
                                <div class="panel panel-info">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">成员人数</h3>
                                    </div>
                                    <div class="panel-body">
                                        {{currentCount}}
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="panel panel-info">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">创建时间</h3>
                                    </div>
                                    <div class="panel-body">
                                        {{createdTime}}
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="panel panel-info">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">状态</h3>
                                    </div>
                                    <div class="panel-body">
                                        <span v-if="kf_start==1" class="layui-badge layui-bg-green">开启</span>
                                        <span v-if="kf_start==0" class="layui-badge layui-bg-gray">暂停</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="panel panel-info">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">昨日局数</h3>
                                    </div>
                                    <div class="panel-body">
                                        {{day_js}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="layui-row layui-col-space15">
                            <div class="col-sm-3">
                                <div class="panel panel-info">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">本月局数</h3>
                                    </div>
                                    <div class="panel-body">
                                        {{month_js}}
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="panel panel-info">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">是否开通大联盟</h3>
                                    </div>
                                    <div class="panel-body">
                                        <span v-if="isCredit==1" class="layui-badge layui-bg-green">已开通</span>
                                        <span v-if="isCredit==0" class="layui-badge layui-bg-gray">未开通</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>

                    <div class="ibox-title">
                        <h5>群主资料</h5>
                    </div>
                    <div style="padding: 20px; background-color: #F2F2F2;">
                        <div class="layui-row layui-col-space15">
                            <div class="layui-col-md2">
                                <div class="layui-card">
                                    <div class="layui-card-header">群主id</div>
                                    <div class="layui-card-body" style="color:red">
                                        {{userId}}
                                    </div>
                                </div>
                            </div>
                            <div class="layui-col-md2">
                                <div class="layui-card">
                                    <div class="layui-card-header">群主昵称</div>
                                    <div class="layui-card-body">
                                        <span v-show="nickname" class="layui-badge">{{nickname}}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="layui-col-md2">
                                <div class="layui-card">
                                    <div class="layui-card-header">联系人</div>
                                    <div class="layui-card-body">
                                        <span v-show="name" class="layui-badge"> {{name}}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="layui-col-md2">
                                <div class="layui-card">
                                    <div class="layui-card-header">手机号码</div>
                                    <div class="layui-card-body">
                                        {{phoneNum}}
                                    </div>
                                </div>
                            </div>
                            <div class="layui-col-md2">
                                <div class="layui-card">
                                    <div class="layui-card-header">群主当前房钻</div>
                                    <div class="layui-card-body" style="color: green;font-weight: bold">
                                        {{card}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div style="padding: 20px; background-color: #F2F2F2;" v-show="is_newqz">
                        <div class="layui-row layui-col-space15">
                            <div class="layui-col-md3">
                                <div class="layui-card">
                                    <div class="layui-card-header">新群主id</div>
                                    <div class="layui-card-body" style="color:red">
                                        <input type="text" v-model="newUserid" class="input-group" style="margin-bottom: 20px">
                                        <button class="btn btn-primary" style="margin-right: 20px;width: 77px" @click="move_qz()">确定</button>
                                        <button class="btn btn-danger" style="width: 77px" @click="closes(1)">取消</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div style="padding: 20px; background-color: #F2F2F2;" v-show="is_maxCount">
                        <div class="layui-row layui-col-space15">
                            <div class="layui-col-md3">
                                <div class="layui-card">
                                    <div class="layui-card-header">设置群最大人数</div>
                                    <div class="layui-card-body" style="color:red">
                                        <input type="text" v-model="maxCounts" class="input-group" style="margin-bottom: 20px">
                                        <button class="btn btn-primary" style="margin-right: 20px;width: 77px" @click="up_max_number()">确定</button>
                                        <button class="btn btn-danger" style="width: 77px" @click="closes(2)" >取消</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <button class="col-sm-2 btn btn-danger"  @click="stop_qyq(1)" v-show="kf_start==1">暂停亲友圈</button>
                        <button class="col-sm-2 btn btn-primary"  @click="stop_qyq(0)" v-show="kf_start==0">开启亲友圈</button>
                        <button class="col-sm-2 btn btn-warning" @click="show_qz()" style="margin-left: 10px">转移群主</button>
                        <button class="col-sm-2 btn btn-info"     @click="show_qs()" style="margin-left: 10px">修改群最大人数</button>
                        <button class="col-sm-2 btn btn-info"     @click="show_list()" style="margin-left: 10px">查看群成员列表</button>
                        <button class="col-sm-2 btn btn-danger"  @click="stop_dlm(0)"  style="margin-left: 10px" v-show="isCredit==1">关闭大联盟</button>
                        <button class="col-sm-2 btn btn-primary"  @click="stop_dlm(1)" style="margin-left: 10px" v-show="isCredit==0">开启大联盟</button>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group" style="margin-top: 150px">
                        <div class="col-sm-2">
                            <div class="input-group">
                                <input type="text" v-model="fromGroupId" class="form-control" placeholder="被转移亲友圈ID" />
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="input-group">
                                <input type="text" v-model="fromUserId" class="form-control" placeholder="被转移玩家ID" />
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="input-group">
                            <input type="text" v-model="toGroupId" class="form-control" placeholder="转移到的亲友圈ID" />
                        </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="input-group">
                                <input type="text" v-model="toUserId" class="form-control" placeholder="转移到的玩家ID" />
                            </div>
                        </div>
                        <button class="col-sm-2 btn btn-info"  @click="zy_cy()">转移</button>
                    </div>
                </div>
            </div>
            <!-- End Example Pagination -->
        </div>
    </div>
</div>
<!-- End Panel Other -->
</div>
<script type="text/javascript">
    var app = new Vue({
        el: '#qyqDetail',
        data: {
            groupId: '',
            is_newqz: false,
            is_maxCount: false,
            groupName: '',
            maxCount: '',
            currentCount: '',
            createdTime: '',
            day_js: '',
            month_js: '',
            userId: '',
            name: '',
            nickname: '',
            phoneNum: '',
            card: '',
            groupState: '',
            newUserid: '',
            maxCounts: '',
            kf_start: 1,
            isCredit: 0,
            fromGroupId: '',
            fromUserId: '',
            toGroupId: '',
            toUserId: '',
        },
        created () {

        },
        methods: {
            seach () {
                let vm = this;
                let groupId = vm.groupId;
                if(!groupId){
                    layer.msg("请填写亲友圈id!");
                    return;
                }
                axios
                    .post('/api.php/demo/qyq/getid_by_detail',{groupId: groupId})
                    .then(function (response) {
                        console.log(response.data.data);
                        if(response.data.code==1) {
                                vm.card = response.data.data.cards + response.data.data.freeCards;
                                vm.currentCount = response.data.data.currentCount;
                                vm.maxCount = response.data.data.maxCount;
                                vm.name      = response.data.data.name;
                                vm.nickname = response.data.data.userNickname;
                                vm.groupState = response.data.data.groupState;
                                vm.groupName = response.data.data.groupName;
                                vm.phoneNum  = response.data.data.phoneNum;
                                vm.userId    = response.data.data.promoterId1;
                                vm.createdTime = response.data.data.createdTime;
                                vm.day_js      = response.data.y_info;
                                vm.month_js   = response.data.m_info;
                                vm.kf_start   = response.data.data.kf_start;
                                vm.isCredit   = response.data.data.isCredit;
                        }else{
                              layer.msg(response.data.msg);
                        }
                        console.log(response);
                    })
                    .catch(function (error) { // 请求失败处理
                        console.log(error);
                    });
            },
            show_qz() {
               this.is_newqz = true;
               this.is_maxCount = false;
            },
            show_qs() {
                this.is_newqz = false;
                this.is_maxCount = true;
            },
            closes(i) {
                if(i===1) {
                    this.is_newqz = false;
                }else{
                    this.is_maxCount = false;
                }
            },
            stop_qyq (start) {
                let vm = this;
                let msg;
                if(start===0 ){
                    msg = "您确定要开启亲友圈吗！";
                }else{
                    msg = "您确定要暂停亲友圈吗！";
                }
                let groupId = vm.groupId;
                layer.confirm(msg, {
                        btn: ['确定','取消'] //按钮
                    }, function() {
                    axios
                        .post('/api.php/demo/qyq/stop_qyq', {groupId: groupId,stat:start})
                        .then(function (response) {
                            if (response.data.code == 0) {
                                layer.msg(response.data.message);
                                vm.seach();
                            } else {
                                layer.msg(response.data.message);
                            }
                        })
                        .catch(function (error) { // 请求失败处理
                            console.log(error);
                        });
                });
            },
            stop_dlm (start) {
                let vm = this;
                let msg;
                if(start===0 ){
                    msg = "您确定要开启大联盟吗！";
                }else{
                    msg = "您确定要关闭大联盟吗！";
                }
                let groupId = vm.groupId;
                layer.confirm(msg, {
                    btn: ['确定','取消'] //按钮
                }, function() {
                    axios
                        .post('/api.php/demo/qyq/stop_dlm', {groupId: groupId,isCredit:start})
                        .then(function (response) {
                            if (response.data.code == 0) {
                                layer.msg(response.data.message);
                                vm.seach();
                            } else {
                                layer.msg(response.data.message);
                            }
                        })
                        .catch(function (error) { // 请求失败处理
                            console.log(error);
                        });
                });
            },
            zy_cy() {
                let vm = this;
                let fromGroupId = vm.fromGroupId;
                let fromUserId = vm.fromUserId;
                let toGroupId = vm.toGroupId;
                let toUserId = vm.toUserId;
                if(!fromGroupId){
                    layer.msg('被转移亲友圈不能为空！');
                    return;
                }
                if(!fromUserId){
                    layer.msg('被转移到的用户userId不能为空');
                    return;
                }
                if(!toGroupId){
                    layer.msg('转移到的亲友圈不能为空！');
                    return;
                }
                if(!toUserId){
                    layer.msg('转移到的用户userId不能为空！');
                    return;
                }
                let msg;
                msg = "您确定要将亲友圈"+fromGroupId+"的成员"+fromUserId+"转移到亲友圈"+toGroupId+"的成员"+toUserId+"名下吗";
                let groupId = vm.groupId;
                layer.confirm(msg, {
                    btn: ['确定','取消'] //按钮
                }, function() {
                    axios
                        .post('/api.php/demo/qyq/zy_cy', {fromGroupId: fromGroupId,fromUserId: fromUserId,toGroupId: toGroupId,toUserId: toUserId,})
                        .then(function (response) {
                            if (response.data.code == 0) {
                                layer.msg(response.data.message);
                            } else {
                                layer.msg(response.data.message);
                            }
                        })
                        .catch(function (error) { // 请求失败处理
                            console.log(error);
                        });
                });
            },
            move_qz() {
                let vm = this;
                let groupId = vm.groupId;
                let userId  = vm.newUserid;
                let is_newqz = vm.is_newqz;
                if(!is_newqz) {
                    vm.is_newqz = true;
                    return;
                }
                if(!userId || !groupId){
                    layer.msg('参数错误！');
                    return;
                }
                layer.confirm('您确定要转换群主吗？', {
                        btn: ['确定','取消'] //按钮
                    }, function() {
                    axios
                        .post('/api.php/demo/qyq/move_qz', {userId: userId, groupId: groupId})
                        .then(function (response) {
                            if (response.data.code == 0) {
                                layer.msg(response.data.message);
                                vm.is_newqz = false;
                            } else {
                                layer.msg(response.data.message);
                            }
                        })
                        .catch(function (error) { // 请求失败处理
                            console.log(error);
                        });
                });
            },
            up_max_number() {
                let vm = this;
                let groupId = vm.groupId;
                let maxCount= vm.maxCounts;
                let is_maxCount = vm.is_maxCount;
                if(!is_maxCount) {
                    vm.is_maxCount = true;
                    return;
                }
                if(!maxCount){
                    layer.msg('请填写需要修改最大群人数');
                    return;
                }
                if(!groupId){
                    layer.msg('请填写亲友圈Id');
                    return;
                }
                layer.confirm('您确定要修改最大人数吗？', {
                        btn: ['确定','取消'] //按钮
                    }, function() {
                    axios
                        .post('/api.php/demo/qyq/up_max_number', {groupId: groupId, maxCount: maxCount})
                        .then(function (response) {
                            if (response.data.code == 0) {
                                layer.msg(response.data.message);
                                vm.is_maxCount = false;
                                vm.seach();
                            } else {
                                layer.msg(response.data.message);
                            }
                        })
                        .catch(function (error) { // 请求失败处理
                            console.log(error);
                        });
                });
            },
            show_list() {
                let vm = this;
                let groupId = vm.groupId;
                if(!groupId) {
                    layer.msg("请填写groupId!");
                    return;
                }
                location.href = '/admin/qyq/qyq_list/?key='+groupId;
            },
        },
        mounted:function(){
        }
    })
</script>
</body>
</html>