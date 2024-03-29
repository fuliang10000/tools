<?php

/* @var $this \yii\web\View */

use frontend\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?=yii\helpers\Html::csrfMetaTags();?>
    <title>xhr2</title>
</head>
<body>
<?php $this->beginBody() ?>
<div id="drop_area" style="border:3px dashed silver;width:200px; height:200px">
    将图片拖拽到此
</div>

<progress value="0" max="10" id="prouploadfile"></progress>

<span id="persent">0%</span>
<br/>
<!--<button onclick="xhr2()">ajax上传</button>-->
<button onclick="stopup()" id="stop">上传</button>
<script type="text/javascript">
    <?php $this->beginBlock('JS_END') ?>
    //拖拽上传开始
    //-1.禁止浏览器打开文件行为
    document.addEventListener("drop", function (e) {  //拖离
        e.preventDefault();
    })
    document.addEventListener("dragleave", function (e) {  //拖后放
        e.preventDefault();
    })
    document.addEventListener("dragenter", function (e) {  //拖进
        e.preventDefault();
    })
    document.addEventListener("dragover", function (e) {  //拖来拖去
        e.preventDefault();
    })
    //上传进度
    var pro = document.getElementById('prouploadfile');
    var persent = document.getElementById('persent');

    function clearpro() {
        pro.value = 0;
        persent.innerHTML = "0%";
    }

    //2.拖拽
    var stopbutton = document.getElementById('stop');

    var resultfile = ""
    var box = document.getElementById('drop_area'); //拖拽区域
    box.addEventListener("drop", function (e) {
        var fileList = e.dataTransfer.files; //获取文件对象
        console.log(fileList)
        //检测是否是拖拽文件到页面的操作
        if (fileList.length == 0) {
            return false;
        }
        //拖拉图片到浏览器，可以实现预览功能
        //规定视频格式
        //in_array
        Array.prototype.S = String.fromCharCode(2);
        Array.prototype.in_array = function (e) {
            var r = new RegExp(this.S + e + this.S);
            return (r.test(this.S + this.join(this.S) + this.S));
        };
        var video_type = ["video/mp4", "video/ogg"];

        //创建一个url连接,供src属性引用
        var fileurl = window.URL.createObjectURL(fileList[0]);
        if (fileList[0].type.indexOf('image') === 0) {  //如果是图片
            var str = "<img width='200px' height='200px' src='" + fileurl + "'>";
            document.getElementById('drop_area').innerHTML = str;
        } else if (video_type.in_array(fileList[0].type)) {   //如果是规定格式内的视频
            var str = "<video width='200px' height='200px' controls='controls' src='" + fileurl + "'></video>";
            document.getElementById('drop_area').innerHTML = str;
        } else { //其他格式，输出文件名
            //alert("不预览");
            var str = "文件名字:" + fileList[0].name;
            document.getElementById('drop_area').innerHTML = str;
        }
        resultfile = fileList[0];
        console.log(resultfile);

        //切片计算
        filesize = resultfile.size;
        setsize = 500 * 1024;
        filecount = filesize / setsize;
        //console.log(filecount)
        //定义进度条
        pro.max = parseInt(Math.ceil(filecount));


        i = getCookie(resultfile.name);
        i = (i != null && i != "") ? parseInt(i) : 0

        if (Math.floor(filecount) < i) {
            alert("已经完成");
            pro.value = i + 1;
            persent.innerHTML = "100%";

        } else {
            alert(i);
            pro.value = i;
            p = parseInt(i) * 100 / Math.ceil(filecount)
            persent.innerHTML = parseInt(p) + "%";
        }

    }, false);

    //3.ajax上传

    var stop = 1;

    function xhr2() {
        if (stop == 1) {
            return false;
        }
        if (resultfile == "") {
            alert("请选择文件")
            return false;
        }
        i = getCookie(resultfile.name);
        console.log(i)
        i = (i != null && i != "") ? parseInt(i) : 0

        if (Math.floor(filecount) < parseInt(i)) {
            alert("已经完成");
            return false;
        } else {
            //alert(i)
        }
        var xhr = new XMLHttpRequest();//第一步
        //新建一个FormData对象
        var formData = new FormData(); //++++++++++
        //追加文件数据

        //改变进度条
        pro.value = i + 1;
        p = parseInt(i + 1) * 100 / Math.ceil(filecount)
        persent.innerHTML = parseInt(p) + "%";
        //进度条


        if ((filesize - i * setsize) > setsize) {
            blobfile = resultfile.slice(i * setsize, (i + 1) * setsize);
        } else {
            blobfile = resultfile.slice(i * setsize, filesize);
            formData.append('lastone', Math.floor(filecount));
        }
        formData.append('UploadImageForm[file]', blobfile);
        //return false;
        formData.append('blobname', i); //++++++++++
        formData.append('filename', resultfile.name); //++++++++++
        //post方式
        xhr.open('POST', '<?=\yii\helpers\Url::to(['site/upload'])?>'); //第二步骤
        xhr.setRequestHeader('X-CSRF-TOKEN', getMeta('csrf-token'));
        //发送请求
        xhr.send(formData);  //第三步骤
        stopbutton.innerHTML = "暂停"
        //ajax返回
        xhr.onreadystatechange = function () { //第四步
            if (xhr.readyState == 4 && xhr.status == 200) {
                console.log(xhr.responseText);
                if (i < filecount) {
                    xhr2();
                } else {
                    i = 0;
                }
            }
        };
        //设置超时时间
        xhr.timeout = 20000;
        xhr.ontimeout = function (event) {
            alert('请求超时，网络拥堵！低于25K/s');
        }

        i = i + 1;
        setCookie(resultfile.name, i, 365)

    }

    //设置cookie
    function setCookie(c_name, value, expiredays) {
        var exdate = new Date()
        exdate.setDate(exdate.getDate() + expiredays)
        document.cookie = c_name + "=" + escape(value) +
            ((expiredays == null) ? "" : ";expires=" + exdate.toGMTString() + ";path=/")
    }

    //获取cookie
    function getCookie(c_name) {
        if (document.cookie.length > 0) {
            c_start = document.cookie.indexOf(c_name + "=")
            if (c_start != -1) {
                c_start = c_start + c_name.length + 1
                c_end = document.cookie.indexOf(";", c_start)
                if (c_end == -1) c_end = document.cookie.length
                return unescape(document.cookie.substring(c_start, c_end))
            }
        }
        return ""
    }


    function stopup() {
        if (stop == 1) {
            stop = 0

            xhr2();
        } else {
            stop = 1
            stopbutton.innerHTML = "继续"

        }

    }
    function getMeta(metaName) {
        const metas = document.getElementsByTagName('meta');

        for (let i = 0; i < metas.length; i++) {
            if (metas[i].getAttribute('name') === metaName) {
                return metas[i].getAttribute('content');
            }
        }

        return '';
    }
    <?php $this->endBlock(); ?>
</script>
<?php $this->registerJs($this->blocks['JS_END'], yii\web\View::POS_END); ?>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
