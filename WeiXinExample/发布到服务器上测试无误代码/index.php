<?php
require_once "wx/jssdk.php";
$jssdk = new JSSDK("wx4a14bf95e973b059", "af99ce68694f39e2712e7cf7c22fe224");
$signPackage = $jssdk->GetSignPackage();
?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <title>Egret1</title>
    <meta name="viewport" content="width=device-width,initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no"/>
    <meta name="apple-mobile-web-app-capable" content="yes"/>
    <meta name="full-screen" content="true"/>
    <meta name="screen-orientation" content="portrait"/>
    <meta name="x5-fullscreen" content="true"/>
    <meta name="360-fullscreen" content="true"/>
    <style>
        html, body {
            -ms-touch-action: none;
            background: #888888;
            padding: 0;
            border: 0;
            margin: 0;
            height: 100%;
        }
    </style>

    <!--这个标签为通过egret提供的第三方库的方式生成的 javascript 文件。删除 modules_files 标签后，库文件加载列表将不会变化，请谨慎操作！-->
    <!--modules_files_start-->
	<script egret="lib" src="libs/modules/egret/egret.min.js"></script>
	<script egret="lib" src="libs/modules/egret/egret.web.min.js"></script>
	<script egret="lib" src="libs/modules/eui/eui.min.js"></script>
	<script egret="lib" src="libs/modules/res/res.min.js"></script>
	<script egret="lib" src="libs/modules/tween/tween.min.js"></script>
	<script egret="lib" src="libs/modules/weixinapi/weixinapi.min.js"></script>
	<!--modules_files_end-->

    <!--这个标签为不通过egret提供的第三方库的方式使用的 javascript 文件，请将这些文件放在libs下，但不要放在modules下面。-->
    <!--other_libs_files_start-->
    <!--other_libs_files_end-->

    <!--这个标签会被替换为项目中所有的 javascript 文件。删除 game_files 标签后，项目文件加载列表将不会变化，请谨慎操作！-->
    <!--game_files_start-->
	<script src="main.min.js?ver=1.29"></script>
	<!--game_files_end-->
	<script src="jquery-1.5.2.min.js"></script>
</head>
<body>

    <div style="margin: auto;width: 100%;height: 100%;" class="egret-player" id="gameDiv"
         data-entry-class="Main"
         data-orientation="portrait"
         data-scale-mode="fixedWidth"
         data-frame-rate="30"
         data-content-width="480"
         data-content-height="800"
         data-show-paint-rect="false"
         data-multi-fingered="2"
         data-show-fps="true" data-show-log="true"
         data-show-fps-style="x:0,y:0,size:12,textColor:0xffffff,bgAlpha:0.3">
    </div>
    <script>
			var version = "1.29";

	    	var wxInfo = {};
	    	wxInfo.debug = true;
	    	wxInfo.appId = '<?php echo $signPackage["appId"];?>';
	    	wxInfo.timestamp = '<?php echo $signPackage["timestamp"];?>';	    	
	    	wxInfo.nonceStr = '<?php echo $signPackage["nonceStr"];?>';
	    	wxInfo.signature = '<?php echo $signPackage["signature"];?>';

			function getToken(code){
    			var url = "https://api.weixin.qq.com/sns/oauth2/access_token?appid=wx4a14bf95e973b059&secret=af99ce68694f39e2712e7cf7c22fe224&code=" + code + "&grant_type=authorization_code";
		    	$.ajax({  
			    	type : "get",  
			    	async:false,  
			    	url : url,  
			    	dataType : "json",//数据类型为jsonp  
			    	
			    	success : function(data){  
			    		alert('success:',data);
			    	},  
			    	error:function(){  
			    		alert('fail');  
			    	}  
		    	});
    		}
    	
        /**
         * {
         * "renderMode":, //引擎渲染模式，"canvas" 或者 "webgl"
         * "audioType": "" //使用的音频类型，0:默认，1:qq audio，2:web audio，3:audio
         * "antialias": //WebGL模式下是否开启抗锯齿，true:开启，false:关闭，默认为false
         * }
         **/
        egret.runEgret({renderMode:"webgl", audioType:0});
    </script>
</body>
</html>
