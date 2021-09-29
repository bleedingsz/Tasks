<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Task #3</title>
</head>
<body>
    <div class="box">
        <div class="box__field">
            <textarea name="textarea" id="id1" placeholder="Enter your comments"></textarea>
        </div>
    </div>

<style>
    *{
        padding: 0;
        margin: 0;
        box-sizing: border-box;
    }
    .box{
        display: block;
        width: 100%;
        height: 100vh;
        border: 8px solid #000000;
        position: relative;
    }
    .box .box__field{
        position: absolute;
        top: 0;
        left: 0;
        max-width: 200px;
        height: 100px;
        width: 100%;
        border: 2px dashed gray;
        padding: 5px;
        cursor: pointer;
        transition: 0.3s all ease;
    }
    #id1{
        border: none;
        resize: none;
        height: 100%;
        width: 100%;
        cursor: pointer;
    }
</style>
    <script>
        const textarea = document.querySelector('.box__field'),
            boxwidth = textarea.offsetWidth,
            boxheight = textarea.offsetHeight,
            borderwidth = 6,
            { log } = console;
        textarea.addEventListener("mouseenter", (event) => {
            event.target.style.top = getRndInteger(borderwidth, innerHeight - boxheight - borderwidth) + 'px';
            event.target.style.left = getRndInteger(borderwidth, innerWidth - boxwidth - borderwidth) + 'px';
        });
        function getRndInteger(min, max) {
            return Math.floor(Math.random() * (max - min) ) + min;
        }
    </script>

</body>
</html>