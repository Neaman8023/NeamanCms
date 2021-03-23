<?php /*a:2:{s:87:"C:\Users\Administrator\Documents\program\neaman\application\admin\view\index\login.html";i:1615334413;s:81:"C:\Users\Administrator\Documents\program\neaman\application\admin\view\layui.html";i:1615277930;}*/ ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <title>登录</title>
    <link rel="stylesheet" type="text/css" href="/static/libs/layui/css/layui.css" />
    <link rel="stylesheet" type="text/css" href="/static/admin/css/style.css?t=1590725734" />
<script language="JavaScript">
<!--
	if(top!=self)
	if(self!=top) top.location=self.location;
//-->
</script>
<style type="text/css">
body {
    background-color: #2D2D2D
}
</style>
<?php echo hook('admin_login_style'); ?>
</head>

<body>
    <div id="mydiv">
        <div class="login-main">
            <div class="layui-elip">管理系统&nbsp;<span class="version">v<?php echo htmlentities(app('config')->get('version.yzncms_version')); ?></span><span class="bg1"></span><span class="bg2"></span></div>
            <form class="layui-form" action="<?php echo url('login'); ?>">
                <div class="layui-form-item">
                    <?php echo token(); ?>
                    <div class="layui-input-inline input-item">
                        <label class="layui-icon layui-icon-username"></label>
                        <input type="text" name="username" lay-verify="required" autocomplete="off" placeholder="账号" class="layui-input">
                    </div>
                    <div class="layui-input-inline input-item">
                        <label class="layui-icon layui-icon-password"></label>
                        <input type="password" name="password" lay-verify="required" autocomplete="off" placeholder="密码" class="layui-input">
                        <i></i>
                    </div>
                    <div class="layui-input-inline input-item verify-box">
                        <label class="layui-icon layui-icon-vercode"></label>
                        <input type="text" name="verify" lay-verify="required" placeholder="验证码" autocomplete="off" class="layui-input">
                        <img id="verify" src="<?php echo captcha_src(); ?>" alt="验证码" class="captcha">
                    </div>
                    <div class="layui-input-inline input-item">
                    	<input type="checkbox" name="keeplogin" title="保持会话" lay-skin="primary">
                    </div>
                    <div class="layui-input-inline login-btn">
                        <button class="layui-btn layui-btn-normal" lay-submit>登录</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script type="text/javascript" src="/static/libs/layui/layui.js"></script>
    <script src="/static/libs/jquery/jquery.min.js"></script>
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
    layui.use(['form', 'layer','yznForm'], function() {
        var form = layui.form,
            layer = layui.layer,
            yznForm = layui.yznForm;

            yznForm.listen('', function (res) {
                layer.msg('登入成功', {
                    offset: '15px',
                    icon: 1,
                    time: 1000
                }, function() {
                    window.location.href = res.url;
                });
                return false;
            }, function (res) {
                $("#verify").click();
            });
    });
    //刷新验证码
    $("#verify").click(function() {
        var verifyimg = $("#verify").attr("src");
        $("#verify").attr("src", verifyimg.replace(/\?.*$/, '') + '?' + Math.random());
    });
    </script>
    <?php echo hook('admin_login_form'); ?>
</body>

</html>