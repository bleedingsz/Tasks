<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Task #8</title>
    <link rel="stylesheet" href="libs/jquery-ui-1.12.1/jquery-ui.theme.min.css">
    <link rel="stylesheet" href="libs/jquery-ui-1.12.1/jquery-ui.min.css">
</head>
<body>
<div class="box fl-box">
    <div class="box__left" id="resizable">
        <div class="content"></div>
    </div>
    <div class="box__right">
        <div class="box__right__up blue">
            <div class="content"></div>
        </div>
        <div class="box__right__down purple">
            <div id="tabs">
                <ul>
                    <li><a href="#tabs-1">1</a></li>
                    <li><a href="#tabs-2">2</a></li>
                </ul>
                <div id="tabs-1">
                    <textarea name="area1" id="area1" placeholder="Change left side"></textarea>
                </div>
                <div id="tabs-2">
                    <textarea name="area2" id="area2" placeholder="Change top side"></textarea>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    *{
        padding: 0;
        margin: 0;
        box-sizing: border-box;
    }
    .blue{
        border: 1px dashed blue;
    }
    .purple{
        border: 1px dotted purple;
    }
    body{
        height: 100vh;
    }
    .box{
        height: 100%;
        padding: 20px;
    }
    .fl-box{
        display: flex;
        position: relative;
    }
    .box .box__left{
        border: 1px solid #000000;
        width: 30%;
        display: block;
        word-wrap: break-word;
    }
    .box .box__right{
        display: block;
        width: 70%;
        height: 100%;
    }
    .box .box__right .box__right__up{
        height: 50%;
        word-wrap: break-word;
    }
    .box .box__right .box__right__down{
        height: 50%;
    }
    .ui-resizable-handle{
        background: #000;
    }
    .ui-resizable-s{
        bottom: 0;
    }
    .ui-resizable-e{
        right: 0;
    }
    .ui-resizable-n{
        left: 0;
    }
    .box__right__down__controls{
        height: 100%;
    }
    .box__tabs{
        width: 100%;
        height: 100%;
    }
    .ui-widget.ui-widget-content{
        height: 100%;
    }
    .ui-tabs .ui-tabs-panel{
        height: calc(100% - 44px);
    }
    textarea{
        display: block;
        resize: none;
        width: 100%;
        height: 100%;
    }
</style>
<script src="libs/jquery-ui-1.12.1/external/jquery/jquery.js"></script>
<script src="libs/jquery-ui-1.12.1/jquery-ui.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const rightblock = document.querySelector('.box__right'),
            textAreaForLeft = document.getElementById('area1'),
            textAreaForTop = document.getElementById('area2'),
            boxLeft = document.querySelector('.box__left .content'),
            boxTop = document.querySelector('.box__right__up .content');


        changeContent(textAreaForLeft, boxLeft);
        changeContent(textAreaForTop, boxTop);


        function changeContent(textArea, block) {
            textArea.addEventListener('keyup', (event) => {
                block.innerHTML = event.target.value;
            });
        }
       $("#resizable").resizable({
           handles: "n, e, s",
           resize: function (event, ui) {
               if(ui.originalSize.width != ui.size.width)
                   rightblock.style.width = `calc(100% - ${ui.size.width}px)`;
           }
       });
        $('#tabs').tabs({
            show: { effect: "fade", duration: 300 },
            hide: { effect: "fade", duration: 300 },
        });
    });
</script>
</body>
</html>