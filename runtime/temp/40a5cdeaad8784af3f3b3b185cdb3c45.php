<?php /*a:3:{s:86:"C:\Users\Administrator\Documents\program\neaman\application\admin\view\main\index.html";i:1615277930;s:88:"C:\Users\Administrator\Documents\program\neaman\application\admin\view\index_layout.html";i:1615334545;s:81:"C:\Users\Administrator\Documents\program\neaman\application\admin\view\layui.html";i:1615277930;}*/ ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>后台管理系统</title>
    <meta name="author" content="YZNCMS">
    <link rel="stylesheet" href="/static/libs/layui/css/layui.css">
    <link rel="stylesheet" href="/static/admin/css/admin.css?v=<?php echo htmlentities(app('config')->get('version.yzncms_release')); ?>">
    <link rel="stylesheet" href="/static/common/font/iconfont.css?v=<?php echo htmlentities(app('config')->get('version.yzncms_release')); ?>">
    <script src="/static/libs/layui/layui.js"></script>
    <script src="/static/libs/jquery/jquery.min.js"></script>
    <script type="text/javascript">
    //全局变量
    var GV = {
        'image_upload_url': '<?php echo !empty($image_upload_url) ? htmlentities($image_upload_url) :  url("attachment/upload/upload", ["dir" => "images", "module" => request()->module()]); ?>',
        'file_upload_url': '<?php echo !empty($file_upload_url) ? htmlentities($file_upload_url) :  url("attachment/upload/upload", ["dir" => "files", "module" => request()->module()]); ?>',
        'jcrop_upload_url': '<?php echo !empty($jcrop_upload_url) ? htmlentities($jcrop_upload_url) :  url("attachment/Attachments/cropper"); ?>',
        'ueditor_upload_url': '<?php echo !empty($ueditor_upload_url) ? htmlentities($ueditor_upload_url) :  url("attachment/upload/upload", ["dir" => "images","from"=>"ueditor", "module" => request()->module()]); ?>',
        'ueditor_grabimg_url': '<?php echo !empty($ueditor_upload_url) ? htmlentities($ueditor_upload_url) :  url("attachment/Attachments/geturlfile"); ?>',
        'image_select_url': '<?php echo !empty($image_select_url) ? htmlentities($image_select_url) :  url("attachment/Attachments/select"); ?>',
        'filter_word_url': '<?php echo !empty($filter_word_url) ? htmlentities($filter_word_url) :  url("admin/ajax/filterWord"); ?>',
    };
    </script>
</head>

<body class="childrenBody <?php echo defined('IS_DIALOG') && IS_DIALOG ? 'is-dialog' : ''; ?>">
    
<?php if(!(empty($default_pass) || (($default_pass instanceof \think\Collection || $default_pass instanceof \think\Paginator ) && $default_pass->isEmpty()))): ?>
<blockquote class="layui-elem-quote layui-bg-red" style="border-left: 5px solid #d4491d;">
    安全提示：超级管理员默认密码未修改，建议马上修改。
</blockquote>
<?php endif; if(app('config')->get('app_debug')): ?>
<blockquote class="layui-elem-quote layui-bg-red" style="border-left: 5px solid #d4491d;">
    安全提示：当前网站【调试模式】开启中，强烈建议在正式部署后关闭调试模式
</blockquote>
<?php endif; if(app('config')->get('app_trace')): ?>
<blockquote class="layui-elem-quote layui-bg-red" style="border-left: 5px solid #d4491d;">
    安全提示：当前网站【Trace调试】开启中，强烈建议在正式部署后关闭Trace调试
</blockquote>
<?php endif; ?>
<blockquote class="layui-elem-quote layui-bg-green">
    <div id="nowTime"></div>
</blockquote>
<div class="layui-row layui-col-space10 panel_box">
    <div class="panel layui-col-xs12 layui-col-sm6 layui-col-md4 layui-col-lg3">
        <a href="http://bbs.yzncms.com" target="_blank">
            <div class="panel_icon yzn-bg-green">
                <i class="layui-icon layui-icon-survey layui-anim"></i>
            </div>
            <div class="panel_word">
                <span>论坛</span>
                <cite>交流社区</cite>
            </div>
        </a>
    </div>
    <div class="panel layui-col-xs12 layui-col-sm6 layui-col-md4 layui-col-lg3">
        <a href="https://www.kancloud.cn/ken678/yzncms/352683" target="_blank">
            <div class="panel_icon yzn-bg-blue">
                <i class="layui-icon layui-icon-read layui-anim"></i>
            </div>
            <div class="panel_word">
                <span>文档</span>
                <cite>使用手册</cite>
            </div>
        </a>
    </div>
    <div class="panel layui-col-xs12 layui-col-sm6 layui-col-md4 layui-col-lg3">
        <a href="https://gitee.com/ken678/YZNCMS" target="_blank">
            <div class="panel_icon yzn-bg-orange">
                <i class="layui-icon layui-icon-fonts-code layui-anim"></i>
            </div>
            <div class="panel_word">
                <span>代码</span>
                <cite>下载链接</cite>
            </div>
        </a>
    </div>
    <div class="panel layui-col-xs12 layui-col-sm6 layui-col-md4 layui-col-lg3">
        <a href="javascript:;">
            <div class="panel_icon yzn-bg-purple">
                <i class="layui-icon layui-icon-log layui-anim"></i>
            </div>
            <div class="panel_word">
                <span class="loginTime">
                    <?php if($userInfo['last_login_time'] > 0) { echo $userInfo['last_login_time'];} else { echo '--';}?></span>
                <cite>上次登录时间</cite>
            </div>
        </a>
    </div>
</div>
<div class="layui-row layui-col-space10">
    <div class="layui-col-lg12 layui-col-md12">
        <div class="layui-card">
            <div class="layui-card-header" style="border-bottom: 1px solid #eee;">版本信息</div>
            <div class="layui-card-body">
                <table class="layui-table magt0" lay-even>
                    <colgroup>
                        <col width="10%">
                        <col width="40%">
                        <col width="10%">
                        <col width="40%">
                    </colgroup>
                    <tbody>
                        <tr>
                            <td>当前版本</td>
                            <td class="version">yzncms v<?php echo htmlentities(app('config')->get('version.yzncms_version')); ?></td>
                            <td>当前版本</td>
                            <td class="version">yzncms v<?php echo htmlentities(app('config')->get('version.yzncms_version')); ?></td>
                        </tr>
                        <tr>
                            <td>PHP 版本</td>
                            <td><?php echo htmlentities($sys_info['phpv']); ?></td>
                            <td>数据库版本</td>
                            <td><?php echo htmlentities($sys_info['mysql_version']); ?></td>
                        </tr>
                        <tr>
                            <td>服务器域名/IP</td>
                            <td><?php echo htmlentities($sys_info['domain']); ?> [ <?php echo htmlentities($sys_info['ip']); ?> ]</td>
                            <td>服务器环境</td>
                            <td class="server"><?php echo htmlentities($sys_info['web_server']); ?></td>
                        </tr>
                        <tr>
                            <td>服务器时间</td>
                            <td><?php echo htmlentities($sys_info['time']); ?></td>
                            <td>剩余空间</td>
                            <td><?php echo htmlentities($sys_info['remaining_space']); ?></td>
                        </tr>
                        <tr>
                            <td>最大上传限制</td>
                            <td><?php echo htmlentities($sys_info['fileupload']); ?></td>
                            <td>最大占用内存</td>
                            <td><?php echo htmlentities($sys_info['memory_limit']); ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

    
    <script type="text/javascript">
layui.config({
	version: '<?php echo htmlentities(app('config')->get('version.yzncms_release')); ?>',
	base: '/static/libs/layui_exts/'
}).extend({
	yzn: 'yzn/yzn',
	yznForm: 'yznForm/yznForm',
	yznTable: 'yznTable/yznTable',
	treeGrid: 'treeGrid/treeGrid',
	clipboard: 'clipboard/clipboard',
	notice: 'notice/notice',
	iconPicker: 'iconPicker/iconPicker',
	tableSelect: 'tableSelect/tableSelect',
	ztree: 'ztree/ztree',
	dragsort: 'dragsort/dragsort',
	tagsinput: 'tagsinput/tagsinput',
	xmSelect: 'xmSelect/xm-select',
	selectPage: 'selectPage/selectpage',
	echarts: 'echarts/echarts',
	echartsTheme: 'echarts/echartsTheme',
	citypicker: 'citypicker/city-picker',
	webuploader: 'webuploader/webuploader',
	ueditor: 'ueditor/ueditor.min',
}).use('yznForm');
</script>
    
    
<script type="text/javascript">
//获取系统时间
var newDate = '';
getLangDate();
//值小于10时，在前面补0
function dateFilter(date) {
    if (date < 10) { return "0" + date; }
    return date;
}

function getLangDate() {
    var dateObj = new Date(); //表示当前系统时间的Date对象
    var year = dateObj.getFullYear(); //当前系统时间的完整年份值
    var month = dateObj.getMonth() + 1; //当前系统时间的月份值
    var date = dateObj.getDate(); //当前系统时间的月份中的日
    var day = dateObj.getDay(); //当前系统时间中的星期值
    var weeks = ["星期日", "星期一", "星期二", "星期三", "星期四", "星期五", "星期六"];
    var week = weeks[day]; //根据星期值，从数组中获取对应的星期字符串
    var hour = dateObj.getHours(); //当前系统时间的小时值
    var minute = dateObj.getMinutes(); //当前系统时间的分钟值
    var second = dateObj.getSeconds(); //当前系统时间的秒钟值
    var timeValue = "" + ((hour >= 12) ? (hour >= 18) ? "晚上" : "下午" : "上午"); //当前时间属于上午、晚上还是下午
    newDate = dateFilter(year) + "年" + dateFilter(month) + "月" + dateFilter(date) + "日 " + " " + dateFilter(hour) + ":" + dateFilter(minute) + ":" + dateFilter(second);
    document.getElementById("nowTime").innerHTML = "亲爱的<?php echo htmlentities($userInfo['username']); ?>，" + timeValue + "好！ 欢迎使用YznCMS v<?php echo htmlentities(app('config')->get('version.yzncms_version')); ?>,当前时间为： " + newDate + "　" + week;
    setTimeout("getLangDate()", 1000);
}

layui.use(['jquery'], function() {
    var $ = layui.jquery;
    //icon动画
    $(".panel a").hover(function() {
        $(this).find(".layui-anim").addClass("layui-anim-scaleSpring");
    }, function() {
        $(this).find(".layui-anim").removeClass("layui-anim-scaleSpring");
    })
    $(".panel a").click(function() {
        parent.addTab($(this));
    })
})
</script>

</body>

</html>