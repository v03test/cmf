<?php /*a:2:{s:61:"themes/admin_simpleboot3/admin\statistics\daily_stat_qyq.html";i:1609998743;s:80:"D:\phpstudy_pro\WWW\ThinkCMF\public/themes/admin_simpleboot3/public\headers.html";i:1610004213;}*/ ?>
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
    .layui-form-label {
        /* float: left; */
        display: block;
        padding: 9px 15px;
        width: 100px;
        font-weight: 400;
        line-height: 20px;
        text-align: right;
    }
</style>
<body class="gray-bg">
<div style="padding: 20px; background-color: #F2F2F2;" id="dailyStat">
    <div class="layui-row layui-col-space15">
        <div class="layui-col-md12">
            <div class="layui-card">
                <div class="layui-card-header">
                    <div class="col-sm-2" style="font-weight: bold;color: red">亲友圈数据统计</div>
                    <div class="col-sm-4">
                                <span class="input-group-btn" id="dateShowBtn" style="height: 50px;">
                                    <input type="text" name="start_time" id="dateSelectorTwo" lay-verify="date" placeholder="开始时间" autocomplete="off"
                                           class="form-control jeinput" value="<?php echo $start_time; ?>">
                                </span>
                        <span class="input-group-btn" id="dateShowBtn1" style="height: 50px;">
                                    <input type="text" name="end_time" id="dateSelectorTwo1" lay-verify="date" placeholder="结束时间" autocomplete="off" class="form-control jeinput" value="<?php echo $end_time; ?>">
                                </span>
                    </div>
                    <div class="layui-inline">
                        <label class="layui-form-label">亲友圈Id</label>
                        <div class="layui-input-inline">
                            <input type="text" v-model="uid" class="layui-input"  placeholder="亲友圈ID">
                        </div>
                    </div>
                    <button class="layui-btn" @click="seach()">搜索</button></div>
                <div class="layui-card-body">
                    <div id="containertrend" style="border: 1px solid #e2e2e2;height: 600px"></div>
                </div>
            </div>
        </div>

        <div class="layui-col-md12">
            <div class="layui-card">
                <div class="layui-card-header"></div>
                <div class="layui-card-body">
                    <table class="table table-bordered table-hover">
                        <thead>
                        <tr class="long-tr">
                            <th width="9%">开始日期</th>
                            <th width="5%">注册人数</th>
                            <th width="6%">玩牌用户数</th>
                            <th width="5%">玩牌总局数</th>
                            <th width="5%">玩牌小局数</th>
                            <th width="5%">钻石消耗</th>
                            <th width="5%">钻石剩余</th>
                            <!--<th width="5%">钻石总赠送</th>-->
                            <!--<th width="5%">钻石总补偿</th>-->
                        </tr>
                        </thead>
                        <tbody id="list-content">
                            <tr v-for="item in data_list">
                                <td>{{item.tdate}}</td>
                                <td>{{item.xzdata}}</td>
                                <td>{{item.djdata}}</td>
                                <td>{{item.zjs}}</td>
                                <td>{{item.xjs}}</td>
                                <td style="color: red;font-weight: bold">{{item.card_xh}}</td>
                                <td style="color: green">{{item.card_sy}}</td>
                            </tr>
                        </tbody>
                    </table>
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
            zcdata: [1,2,3,4,5,6,7],
            hydata: [3,7,8,9,10,11,12],
            czdata: [98,71,66,113,212,31,31],
            dldata: [198,171,266,13,212,31,31],
            fkdata: [298,271,366,53,22,312,311],
            zjsdata: [398,371,466,113,212,31,31],
            xdata: [9,7,6,13,12,33,21],
            myChart: '',
            start_time: "<?php echo $start_time; ?>",
            end_time: "<?php echo $end_time; ?>",
            data_list: [],
            uid: '',
        },
        created () {
            this.myChart = echarts.init(document.getElementById('containertrend'));
        },
        methods: {
                seach () {
                    let vm = this;
                    let start_time = $('#dateSelectorTwo').val();
                    let end_time   = $('#dateSelectorTwo1').val();
                    let uid = vm.uid;
                    axios
                        .post('/admin/statistics/daily_stat_qyq',{start_time: start_time,end_time: end_time,uid:uid})
                        .then(function (response) {
                            if(response.data.code==1) {
                                vm.data_list = response.data.data;
                                vm.options(response.data.tdate,response.data.xzdata,response.data.djdata,response.data.card_sy,response.data.card_xh,response.data.zjs,response.data.xjs);
                            }else{
                                layer.msg(response.data.msg);
                            }
                            console.log(response);
                        })
                        .catch(function (error) { // 请求失败处理
                            console.log(error);
                        });
                },
                options (dateData,zcdata,djdata,card_sy,card_xh,zjs,xjs) {
                    let option = {
                        title: {
                            text: '每日数据统计',
                            subtext: '今日'
                        },
                        tooltip: {
                            trigger: 'axis'
                        },
                        legend: {
                            data: ['注册人数', '对局次数', '钻石剩余', '钻石消耗', '大局数', '小局数']
                        },
                        toolbox: {
                            show: true,
                            feature: {
                                dataZoom: {
                                    yAxisIndex: 'none'
                                },
                                dataView: {readOnly: false},
                                magicType: {type: ['line', 'bar']},
                                restore: {},
                                saveAsImage: {}
                            }
                        },
                        xAxis: {
                            type: 'category',
                            boundaryGap: false,
                            data: dateData
                        },
                        yAxis: {
                            type: 'value',
                            axisLabel: {
                                formatter: '{value} 人'
                            }
                        },
                        series: [
                            {
                                name: '注册人数',
                                type: 'line',
                                data: zcdata,
                                markPoint: {
                                    data: [
                                        {type: 'max', name: '最大值'},
                                        {type: 'min', name: '最小值'}
                                    ]
                                },
                                markLine: {
                                    data: [
                                        {type: 'average', name: '平均值'}
                                    ]
                                }
                            },
                            {
                                name: '对局次数',
                                type: 'line',
                                data: djdata,
                                markPoint: {
                                    data: [
                                        {type: 'max', name: '最大值'},
                                        {type: 'min', name: '最小值'}
                                    ]
                                },
                                markLine: {
                                    data: [
                                        {type: 'average', name: '平均值'}
                                    ]
                                }
                            },
                            {
                                name: '钻石剩余',
                                type: 'line',
                                data: card_sy,
                                markPoint: {
                                    data: [
                                        {type: 'max', name: '最大值'},
                                        {type: 'min', name: '最小值'}
                                    ]
                                },
                                markLine: {
                                    data: [
                                        {type: 'average', name: '平均值'}
                                    ]
                                }
                            },
                            {
                                name: '钻石消耗',
                                type: 'line',
                                data: card_xh,
                                markPoint: {
                                    data: [
                                        {type: 'max', name: '最大值'},
                                        {type: 'min', name: '最小值'}
                                    ]
                                },
                                markLine: {
                                    data: [
                                        {type: 'average', name: '平均值'}
                                    ]
                                }
                            },
                            {
                                name: '大局数',
                                type: 'line',
                                data: zjs,
                                markPoint: {
                                    data: [
                                        {type: 'max', name: '最大值'},
                                        {type: 'min', name: '最小值'}
                                    ]
                                },
                                markLine: {
                                    data: [
                                        {type: 'average', name: '平均值'}
                                    ]
                                }
                            },
                            {
                                name: '小局数',
                                type: 'line',
                                data: xjs,
                                markPoint: {
                                    data: [
                                        {type: 'max', name: '最大值'},
                                        {type: 'min', name: '最小值'}
                                    ]
                                },
                                markLine: {
                                    data: [
                                        {type: 'average', name: '平均值'}
                                    ]
                                }
                            }
                        ]
                    }
                    this.myChart.setOption(option);
                }
        },
        mounted:function(){
        }
    })

    jeDate("#dateSelectorTwo",{
        theme:{bgcolor:"#1ab394",pnColor:"#00CCFF"},
        format: "YYYY-MM-DD hh:mm:ss"
    });
    jeDate("#dateSelectorTwo1",{
        theme:{bgcolor:"#1ab394",pnColor:"#00CCFF"},
        format: "YYYY-MM-DD hh:mm:ss"
    });
</script>
</body>
</html>
