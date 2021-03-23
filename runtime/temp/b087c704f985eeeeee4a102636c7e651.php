<?php /*a:2:{s:87:"C:\Users\Administrator\Documents\program\neaman\application\admin\view\index\index.html";i:1615277930;s:82:"C:\Users\Administrator\Documents\program\neaman\application\admin\view\layout.html";i:1615334834;}*/ ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>后台管理系统</title>
    <meta name="author" content="">
    <link rel="stylesheet" href="/static/libs/layui/css/layui.css">
    <link rel="stylesheet" href="/static/admin/css/global.css?v=<?php echo htmlentities(app('config')->get('version.yzncms_release')); ?>">
    <link rel="stylesheet" href="/static/common/font/iconfont.css?v=<?php echo htmlentities(app('config')->get('version.yzncms_release')); ?>">
    <style id="layui-bg-color"></style>
</head>

<body class="layui-layout-body layui-all layui-multi-module">
    <div class="layui-layout layui-layout-admin">
        <div class="layui-header">
        	<div class="layui-logo">
	            <a href="#">
	            	<i class="layui-icon layui-icon-component"></i>
	            	<h1>后台</h1>
	            </a>
        	</div>
        	<div class="layui-header-content">
        		<a href="javascript:;">
	        		<div class="layui-tool">
	        			<i class="layui-icon layui-icon-shrink-right" title="展开" data-side-fold="1"></i>
	        		</div>
        		</a>
                <!--电脑端头部菜单-->
				<ul class="layui-nav Menus-winner topLevelMenus layui-layout-left layui-header-menu layui-menu-header-pc layui-pc-show" id="J_B_main_block">
		            <!--AJAX数据-->
		        </ul>
		        <!--手机端头部菜单-->
		        <ul class="layui-nav layui-layout-left layui-header-menu layui-mobile-show">
	                <li class="layui-nav-item">
	                    <a href="javascript:;"><i class="icon iconfont icon-other"></i> 选择模块</a>
	                    <dl class="layui-nav-child layui-menu-header-mobile">
	                    	<!--AJAX数据-->
	                    </dl>
	                </li>
		        </ul>

		        <ul class="layui-nav layui-layout-right">
		            <li class="layui-nav-item"><a href="<?php echo htmlentities(ROOT_URL); ?>" target="_blank"><i class="layui-icon layui-icon-website" title="站点首页"></i></a></li>
                    <li class="layui-nav-item"><a href="javascript:;" data-check-screen="full"><i class="layui-icon layui-icon-screen-full" title="全屏"></i></a></li>
		            <li class="layui-nav-item"><a href="javascript:;"><i class="iconfont icon-trash" title="清空缓存"></i></a>
		                <dl class="layui-nav-child" id="deletecache">
		                    <dd><a href="javascript:;" data-type="all">一键清理缓存<span class="layui-badge-dot"></span></a></dd>
		                    <dd><a href="javascript:;" data-type="data">清理数据缓存</a></dd>
		                    <dd><a href="javascript:;" data-type="template">清理模板缓存</a></dd>
		                </dl>
		            </li>
		            <li class="layui-nav-item"><a href="javascript:;"><img src="/static/admin/img/avatar.png" class="layui-nav-img userAvatar" width="35" height="35"><?php echo htmlentities($userInfo['username']); ?></a>
		                <dl class="layui-nav-child">
		                	<dd><a href="javascript:;" layui-href="<?php echo url('admin/profile/index'); ?>" lay-id="1profile"><i class="iconfont icon-user-line"></i>&nbsp;个人资料</a></dd>
		                    <dd><a href="<?php echo url('admin/index/logout'); ?>"><i class="iconfont icon-logout-box-r-line"></i>&nbsp;安全退出</a></dd>
		                </dl>
		            </li>
                    <li class="layui-nav-item layui-select-bgcolor" lay-unselect="">
                        <a href="javascript:;" data-bgcolor="配色方案"><i class="layui-icon layui-icon-more-vertical"></i></a>
                    </li>
		        </ul>
        	</div>
        </div>
        <div class="layui-side layui-bg-black layui-menu-left">
            <div class="navBar layui-side-scroll" id="navBar">
                <ul class="layui-nav layui-nav-tree" id="B_menubar">
                    <!--AJAX数据-->
                </ul>
            </div>
        </div>
	    <!--手机端遮罩层-->
	    <div class="layui-make"></div>
	    <!-- 移动导航 -->
        <div class="site-tree-mobile layui-hide">
            <i class="layui-icon">&#xe602;</i>
        </div>
        <div class="site-mobile-shade"></div>
        <div class="layui-body" id="B_frame">
            <div class="layui-tab mag0" id="top_tabs_box" lay-filter="Tab">
                <div class="tab-go-refresh" id="J_refresh"><i class="layui-icon iconfont icon-shuaxin1"></i></div>
                <div class="tab-go-left" id="page-prev"><i class="layui-icon layui-icon-left"></i></div>
                <ul class="layui-tab-title top_tab" id="B_history">
                    <li class="layui-this" lay-id="default"><i class="iconfont icon-homepage"></i>&nbsp;后台首页
                    </li>
                </ul>
                <div class="tab-right">
                    <div class="tab-go-right" id="page-next"><i class="layui-icon layui-icon-right"></i></div>
                    <ul class="layui-nav closeBox">
                        <li class="layui-nav-item">
                            <a href="javascript:;"><i class="layui-icon layui-icon-radio"></i>&nbsp;页面操作</a>
                            <dl class="layui-nav-child">
                                <dd><a href="javascript:;" class="closePageAll"><i class="layui-icon layui-icon-close"></i>&nbsp;关闭全部</a></dd>
                                <!--<dd><a href="javascript:;" class="closePageOther"><i class="seraph icon-prohibit"></i> 关闭其他</a></dd>
                        -->
                            </dl>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="layui-tab-content clildFrame">
                <div class="iframe_box">
                    <iframe id="iframe_default" src="<?php echo url('main/index'); ?>" style="height: 100%; width: 100%;display:none;" lay-id="default" frameborder="0" scrolling="auto"></iframe>
                </div>
            </div>
        </div>
        <div class="layui-footer">
            © YznCMS v<?php echo htmlentities(app('config')->get('version.yzncms_version')); ?>
        </div>
    </div>
    <script src="/static/libs/layui/layui.js"></script>
    <script type="text/javascript">
    layui.config({
      base: '/static/libs/layui_exts/'
    }).extend({
      theme: 'theme/theme',
    });
    </script>
    <script type="text/javascript">
    layui.use(['element', 'layer', 'jquery','theme'], function() {
        var $ = layui.jquery,
            element = layui.element,
            theme = layui.theme,
            layer = layui.layer;
        var SUBMENU_CONFIG = <?php echo $SUBMENU_CONFIG; ?>;
        var openTabNum = 10; //最大可打开窗口数量
        //iframe 加载事件
        var iframe_default = document.getElementById('iframe_default');
        var def_iframe_height = 0;
        $(iframe_default.contentWindow.document).ready(function() {
            /*setTimeout(function() {
                $('#loading').hide();
            }, 500);*/
            $(iframe_default).show();
        });
        var html = [];
        var html2 = [];
        $.each(SUBMENU_CONFIG, function(i, o) {
            html.push('<li class="layui-nav-item"><a href="javascript:;" title="' + o.title + '" lay-id="' + o.id + '"><i class="iconfont ' + o.icon + '"></i>&nbsp;' + o.title + '</a></li>');
            html2.push('<dd><a href="javascript:;" title="' + o.title + '" lay-id="' + o.id + '"><i class="iconfont ' + o.icon + '"></i>&nbsp;' + o.title + '</a></dd>');
        });
        $('#J_B_main_block').html(html.join(''));
        $('.layui-menu-header-mobile').html(html2.join(''));
        element.render(); //重新渲染

        theme.render({
            bgColorDefault: false,
            listen: true,
        });
        //维持在线
        /*setInterval(function() {
            online();
        }, 60000);*/

        //顶部导航点击
        $('#J_B_main_block,.layui-mobile-show dl').on('click', 'a', function(e) {
            if($(this).parent().is('dd')){
                var loading = layer.load(0, {shade: false, time: 2 * 1000});
                var check = $('.layui-tool [data-side-fold]').attr('data-side-fold');
                if(check === "1"){
                    $('.site-tree-mobile').trigger("click");
                    //element.init();
                }
                layer.close(loading);
            }
            //取消事件的默认动作
            e.preventDefault();
            //终止事件 不再派发事件
            e.stopPropagation();
            $(this).parent().addClass('current').siblings().removeClass('current');
            var data_id = $(this).attr('lay-id'),
                data_list = SUBMENU_CONFIG[data_id],
                html = [],
                child_html = [],
                child_index = 0,
                B_menubar = $('#B_menubar');

            if (B_menubar.attr('lay-id') == data_id) {
                return false;
            };
            //显示左侧菜单
            //console.log(data_list['items']);
            show_left_menu(data_list['items']);
            B_menubar.html(html.join('')).attr('lay-id', data_id);
            element.render(); //重新渲染
            //左侧导航复位
            //$("#B_menunav").css({ "margin-top": "0px" });
            //检查是否应该出现上一页、下一页
            //checkMenuNext();
            //
            //显示左侧菜单
            function show_left_menu(data) {
                for (var attr in data) {
                    if (data[attr] && typeof(data[attr]) === 'object') {
                        //循环子对象
                        if (!data[attr].url && attr === 'items') {
                            //子菜单添加识别属性
                            $.each(data[attr], function(i, o) {
                                child_index++;
                                o.isChild = true;
                                o.child_index = child_index;
                            });
                        }
                        show_left_menu(data[attr]); //继续执行循环(筛选子菜单)
                    } else {
                        if (attr === 'title') {
                            data.url = data.url ? data.url : '#';
                            if (!(data['isChild'])) {
                                //一级菜单
                                /*html.push('<li class="layui-nav-item layui-nav-itemed menu-li"><a layui-href="' + data.url + '" lay-id="' + data.id + '"><i class="iconfont ' + data.icon + '"></i>&nbsp;<b>' + data.title + '</b></a>');*/
                                html.push('<li class="layui-nav-item layui-nav-itemed menu-li"><a href="javascript:;" lay-id="' + data.id + '"><i class="iconfont ' + data.icon + '"></i>&nbsp;<b>' + data.title + '</b></a>');
                            } else {
                                //二级菜单
                                child_html.push('<dd><a href="javascript:;" layui-href="' + data.url + '" lay-id="' + data.id + '"><i class="iconfont ' + data.icon + '"></i>&nbsp;' + data.title + '</a></dd>');
                                //二级菜单全部push完毕
                                if (data.child_index == child_index) {
                                    html.push('<dl class="layui-nav-child">' + child_html.join('') + '</dl></li>');
                                    child_html = [];
                                }
                            }
                        }
                    }
                }
            };
        });

        //后台位在第一个导航
        $('#J_B_main_block li:first > a').trigger("click");

        //左边菜单点击
        /*$('#B_menubar').on('click', 'a', function(e) {*/
        $('body').on('click', '[layui-href]', function (e) {
            var loading = layer.load(0, {shade: false,time: 2 * 1000});
            e.preventDefault();
            e.stopPropagation();
            //iframe_height();
            var $this = $(this),
                _dt = $this.parent(),
                _dl = $this.next('dl');
            //$("#B_menubar li").removeClass('current');
            //当前菜单状态
            //_dt.addClass('current').siblings('dt.current').removeClass('current');
            //子菜单显示&隐藏
            if (_dl.length) {
                //_dt.toggleClass('current');
                //_dl.toggle();
                //检查上下分页
                //checkMenuNext();
                return false;
            };

            //$('#loading').show().focus(); //显示loading
            //$('#B_history li').removeClass('current');
            var data_id = $(this).attr('lay-id'),
                li = $('#B_history li[lay-id=' + data_id + ']');
            var href = $(this).attr('layui-href');

            iframeJudge({
                elem: $this,
                href: href,
                id: data_id
            });
            layer.close(loading);
        });

        //判断显示或创建iframe
        function iframeJudge(options) {
            var elem = options.elem,
                href = options.href,
                id = options.id,
                li = $('#B_history li[lay-id=' + id + ']');
            //如果iframe标签是已经存在的，则显示并让选项卡高亮,并不显示loading
            if (li.length > 0) {
                var iframe = $('#iframe_' + id);
                setTimeout(function() {
                    $('#loading').hide();
                }, 500);
                li.addClass('current');
                if (iframe[0].contentWindow && iframe[0].contentWindow.location.href !== href) {
                    iframe[0].contentWindow.location.href = href;
                }
                $('#B_frame iframe').hide();
                $('#iframe_' + id).show();
                showTab(li); //计算此tab的位置，如果不在屏幕内，则移动导航位置
            } else {

                if ($("#B_history li").length == openTabNum) {
                    layer.msg('只能同时打开' + openTabNum + '个选项卡哦。不然系统会卡的！');
                    return;
                }

                //创建一个并加以标识
                var iframeAttr = {
                    src: href,
                    id: 'iframe_' + id,
                    frameborder: '0',
                    scrolling: 'auto',
                    height: '100%',
                    width: '100%'
                };
                var iframe = $('<iframe/>').prop(iframeAttr).appendTo('#B_frame .layui-tab-content .iframe_box');

                $(iframe[0].contentWindow.document).ready(function() {
                    $('#B_frame iframe').hide();
                    setTimeout(function() {
                        $('#loading').hide();
                    }, 500);
                    var li = $('<li>' + elem.html() + '<i class="layui-icon layui-unselect layui-tab-close">&#x1006;</i></li>').attr('lay-id', id);
                    li.appendTo('#B_history');
                    showTab(li); //计算此tab的位置，如果不在屏幕内，则移动导航位置
                    //$(this).show().unbind('load');
                });
            }
        }

        //点击一个tab页
        $('#B_history').on('click focus', 'li', function(e) {
            e.preventDefault();
            e.stopPropagation();
            var data_id = $(this).attr('lay-id');
            if (data_id) {
                //选择顶部菜单
                var curid = data_id;
                if (curid == "default") curid = "changyong";
                var topmenu = getTopMenuByID(curid);
                var objtopmenu = $('#J_B_main_block').find("a[lay-id=" + topmenu.id + "]");
                if (objtopmenu.parent().attr("class") != "layui-this") {
                    //选中当前顶部菜单
                    objtopmenu.parent().addClass('layui-this').siblings().removeClass('layui-this');
                    //触发事件
                    objtopmenu.click();
                }
                //选择左边菜单
                $("#B_menubar").find(".layui-this").removeClass('layui-this');
                $("#B_menubar").find("a[lay-id=" + data_id + "]").parent().addClass('layui-this');
            }

            $(this).addClass('layui-this').siblings('li').removeClass('layui-this');
            /*try {
                var menuid = parseInt(data_id);
                if (menuid) {
                    setCookie("menuid", menuid);
                }
            } catch (err) {}*/
            $('#iframe_' + data_id).show().siblings('iframe').hide(); //隐藏其它iframe
        });

        //关闭一个tab页
        $('#B_history').on('click', '.layui-tab-close', function(e) {
            e.stopPropagation();
            e.preventDefault();
            var li = $(this).parent(),
                prev_li = li.prev('li'),
                data_id = li.attr('lay-id');
            li.hide(60, function() {
                $(this).remove(); //移除选项卡
                $('#iframe_' + data_id).remove(); //移除iframe页面
                var current_li = $('#B_history li.layui-this');
                //找到关闭后当前应该显示的选项卡
                current_li = current_li.length ? current_li : prev_li;
                current_li.addClass('layui-this');
                cur_data_id = current_li.attr('lay-id');
                $('#iframe_' + cur_data_id).show();
            });
        });

        //上一个选项卡
        $('#page-prev').click(function(e) {
            e.preventDefault();
            e.stopPropagation();
            var ul = $('#B_history'),
                current = ul.find('.layui-this'),
                li = current.prev('li');
            showTab(li);
        });


        //下一个选项卡
        $('#page-next').click(function(e) {
            e.preventDefault();
            e.stopPropagation();
            var ul = $('#B_history'),
                current = ul.find('.layui-this'),
                li = current.next('li');
            showTab(li);
        });

        //显示顶部导航时作位置判断，点击左边菜单、上一tab、下一tab时公用
        function showTab(li) {
            if (li.length) {
                var ul = $('#B_history'),
                    li_offset = li.offset(),
                    li_width = li.outerWidth(true),
                    next_left = $('#page-next').offset().left, //右边按钮的界限位置
                    prev_right = $('#page-prev').offset().left + $('#page-prev').outerWidth(true); //左边按钮的界限位置
                if (li_offset.left + li_width > next_left) { //如果将要移动的元素在不可见的右边，则需要移动
                    var distance = li_offset.left + li_width - next_left; //计算当前父元素的右边距离，算出右移多少像素
                    ul.animate({
                        left: '-=' + distance
                    }, 200, 'swing');
                } else if (li_offset.left < prev_right) { //如果将要移动的元素在不可见的左边，则需要移动
                    var distance = prev_right - li_offset.left; //计算当前父元素的左边距离，算出左移多少像素
                    ul.animate({
                        left: '+=' + distance
                    }, 200, 'swing');
                }
                li.trigger('click');
            }
        }

        //tab点击刷新
        $('#J_refresh').click(function(e) {
            e.preventDefault();
            e.stopPropagation();
            const J_refresh = $("#J_refresh i");
            J_refresh.removeClass("icon-shuaxin1 iconfont");
            J_refresh.addClass("layui-anim layui-anim-rotate layui-anim-loop layui-icon-loading");
            var index = layer.load(0,{time: 4*1000});
            setTimeout(function() {
                J_refresh.addClass("icon-shuaxin1 iconfont");
                J_refresh.removeClass("layui-anim layui-anim-rotate layui-anim-loop layui-icon-loading");
                var id = $('#B_history .layui-this').attr('lay-id'),
                    iframe = $('#iframe_' + id);
                if (iframe[0].contentWindow) {
                    //common.js
                    reloadPage(iframe[0].contentWindow);
                    layer.close(index);
                }
            }, 600)
        });

        //关闭全部选项卡
        $(".closePageAll").on("click", function() {
            if ($("#B_history li").length > 1) {
                $("#B_history li").each(function() {
                    data_id = $(this).attr('lay-id');
                    if (data_id != '' && data_id != 'default') {
                        //$(this).remove(); //移除选项卡
                        element.tabDelete("Tab", data_id);
                        $('#iframe_' + data_id).remove(); //移除iframe页面
                        $('#iframe_default').show();
                    }
                })

            } else {
                layer.msg("没有可以关闭的窗口了@_@");
            }

        })

        //通过菜单id查找菜单配置对象
        function getMenuByID(mid, menugroup) {
            var ret = {};
            mid = parseInt(mid);
            if (!menugroup) menugroup = SUBMENU_CONFIG;
            if (isNaN(mid)) {
                ret = menugroup['changyong'];
            } else {
                $.each(menugroup, function(i, o) {
                    if (o.id && parseInt(o.id) == mid) {
                        ret = o;
                        return false
                    } else if (o.items) {
                        var tmp = getMenuByID(mid, o.items);
                        if (tmp.id && parseInt(tmp.id) == mid) {
                            ret = tmp;
                            return false
                        }
                    }
                });
            }
            return ret;
        }

        function getTopMenuByID(mid) {
            var ret = {};
            var menu = getMenuByID(mid);
            if (menu) {
                if (menu.parent) {
                    var tmp = getTopMenuByID(menu.parent);
                    if (tmp && tmp.id) {
                        ret = tmp;
                    }
                } else {
                    ret = menu;
                }
            }
            return ret;
        }

        //左侧收缩时候
        $("body").on("mouseenter", ".layui-nav-tree .menu-li", function () {
            if (checkMobile()) {
                return false;
            }
            var classInfo = $(this).attr('class'),
                tips = $(this).prop("innerHTML"),
                isShow = $('.layui-tool i').attr('data-side-fold');
            if (isShow == 0 && tips) {
                tips = "<ul class='layui-menu-left-zoom layui-nav layui-nav-tree layui-this'><li class='layui-nav-item layui-nav-itemed'>"+tips+"</li></ul>" ;
                window.openTips = layer.tips(tips, $(this), {
                    tips: [2, '#2f4056'],
                    time: 300000,
                    skin:"popup-tips",
                    success:function (el) {
                        var left = $(el).position().left - 10 ;
                        $(el).css({ left:left });
                        //element.render();
                    }
                });
            }
        });

        $("body").on("mouseleave", ".popup-tips", function () {
            if (checkMobile()) {
                return false;
            }
            var isShow = $('.layui-tool i').attr('data-side-fold');
            if (isShow == 0) {
                try {
                    layer.close(window.openTips);
                } catch (e) {
                    console.log(e.message);
                }
            }
        });

        //菜单缩放
        $('body').on('click', '[data-side-fold]', function () {
            var loading = layer.load(0, {shade: false, time: 2 * 1000});
            var isShow = $('.layui-tool [data-side-fold]').attr('data-side-fold');
            if (isShow == 1) { // 缩放
                $('.layui-tool [data-side-fold]').attr('data-side-fold', 0);
                $('.layui-tool [data-side-fold]').attr('class', 'layui-icon layui-icon-spread-left');
                $('.layui-layout-body').removeClass('layui-all').addClass('layui-mini');
            } else { // 正常
                $('.layui-tool [data-side-fold]').attr('data-side-fold', 1);
                $('.layui-tool [data-side-fold]').attr('class', 'layui-icon layui-icon-shrink-right');
                $('.layui-layout-body').removeClass('layui-mini').addClass('layui-all');
                layer.close(window.openTips);
            }
            //element.init();
            layer.close(loading);
        });

        //重新刷新页面，使用location.reload()有可能导致重新提交
        function reloadPage(win) {
            var location = win.location;
            location.href = location.pathname + location.search;
        }

        //手机设备的简单适配
        $('body').on('click', '.site-tree-mobile', function () {
            var loading = layer.load(0, {shade: false, time: 2 * 1000});
            var isShow = $('.layui-tool [data-side-fold]').attr('data-side-fold');
            if (isShow == 1) { // 缩放
                $('.layui-tool [data-side-fold]').attr('data-side-fold', 0);
                $('.layui-tool [data-side-fold]').attr('class', 'layui-icon layui-icon-spread-left');
                $('.layui-layout-body').removeClass('layui-all');
                $('.layui-layout-body').addClass('layui-mini');
            } else { // 正常
                $('.layui-tool [data-side-fold]').attr('data-side-fold', 1);
                $('.layui-tool [data-side-fold]').attr('class', 'layui-icon layui-icon-shrink-right');
                $('.layui-layout-body').removeClass('layui-mini');
                $('.layui-layout-body').addClass('layui-all');
                layer.close(window.openTips);
            }
            //element.init();
            layer.close(loading);
        });

        //用于维持在线
        function online() {}

        /**
         * 判断是否为手机
         * @returns {boolean}
         */
        function checkMobile() {
            var ua = navigator.userAgent.toLocaleLowerCase();
            var pf = navigator.platform.toLocaleLowerCase();
            var isAndroid = (/android/i).test(ua) || ((/iPhone|iPod|iPad/i).test(ua) && (/linux/i).test(pf))
                || (/ucweb.*linux/i.test(ua));
            var isIOS = (/iPhone|iPod|iPad/i).test(ua) && !isAndroid;
            var isWinPhone = (/Windows Phone|ZuneWP7/i).test(ua);
            var clientWidth = document.documentElement.clientWidth;
            if (!isAndroid && !isIOS && !isWinPhone && clientWidth > 1024) {
                return false;
            } else {
                return true;
            }
        };

        //点击遮罩层
        $('body').on('click', '.layui-make', function () {
            if (checkMobile()) {
                $('.layui-tool i').attr('data-side-fold', 1);
                $('.layui-tool i').attr('class', 'layui-icon layui-icon-shrink-right');
                $('.layui-layout-body').removeClass('layui-mini');
                $('.layui-layout-body').addClass('layui-all');
            }
        });

        //全屏
        $('body').on('click', '[data-check-screen]', function () {
            var check = $(this).attr('data-check-screen');
            if (check == 'full') {
                fullScreen();
                $(this).attr('data-check-screen', 'exit');
                $(this).html('<i class="layui-icon layui-icon-screen-restore"></i>');
            } else {
                exitFullScreen();
                $(this).attr('data-check-screen', 'full');
                $(this).html('<i class="layui-icon layui-icon-screen-full"></i>');
            }
        });

        function fullScreen() {
            var el = document.documentElement;
            var rfs = el.requestFullScreen || el.webkitRequestFullScreen;
            if (typeof rfs != "undefined" && rfs) {
                rfs.call(el);
            } else if (typeof window.ActiveXObject != "undefined") {
                var wscript = new ActiveXObject("WScript.Shell");
                if (wscript != null) {
                    wscript.SendKeys("{F11}");
                }
            } else if (el.msRequestFullscreen) {
                el.msRequestFullscreen();
            } else if (el.oRequestFullscreen) {
                el.oRequestFullscreen();
            } else if (el.webkitRequestFullscreen) {
                el.webkitRequestFullscreen();
            } else if (el.mozRequestFullScreen) {
                el.mozRequestFullScreen();
            } else {
                miniAdmin.error('浏览器不支持全屏调用！');
            }
        };

        //退出全屏
        function exitFullScreen() {
            var el = document;
            var cfs = el.cancelFullScreen || el.webkitCancelFullScreen || el.exitFullScreen;
            if (typeof cfs != "undefined" && cfs) {
                cfs.call(el);
            } else if (typeof window.ActiveXObject != "undefined") {
                var wscript = new ActiveXObject("WScript.Shell");
                if (wscript != null) {
                    wscript.SendKeys("{F11}");
                }
            } else if (el.msExitFullscreen) {
                el.msExitFullscreen();
            } else if (el.oRequestFullscreen) {
                el.oCancelFullScreen();
            }else if (el.mozCancelFullScreen) {
                el.mozCancelFullScreen();
            } else if (el.webkitCancelFullScreen) {
                el.webkitCancelFullScreen();
            } else {
                miniAdmin.error('浏览器不支持全屏调用！');
            }
        };

        //清除缓存
        $(document).on('click', "dl#deletecache dd a", function() {
            $.ajax({
                url: '<?php echo url("admin/index/cache"); ?>',
                dataType: 'json',
                data: { type: $(this).data("type") },
                cache: false,
                success: function(res) {
                    if (res.code == 1) {
                        var index = layer.msg('清除缓存中，请稍候', { icon: 16, time: false, shade: 0.8 });
                        setTimeout(function() {
                            layer.close(index);
                            layer.msg("缓存清除成功！");
                        }, 1000);
                    }else{
                        layer.msg('清除缓存失败');
                    }
                },
                error: function() {
                    layer.msg('清除缓存失败');
                }
            });
        });
    })
    </script>
</body>

</html>