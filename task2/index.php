<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Task 2</title>
</head>
<body>

<div class="wrapper">
    <div class="wrapper__text">
        <textarea name="textarea" id="id1" placeholder="click me"></textarea>
    </div>

</div>
<style>
    body{
        margin: 0;
        padding: 0;
    }
    .wrapper{
        width: 100%;
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .wrapper .wrapper__text{
        max-width: 800px;
        margin: auto;
        border: 1px solid #000000;
        padding: 20px;
        width: 100% ;
        text-align: center;
        box-sizing: border-box;
    }
    #id1{
        box-sizing: border-box;
        width: 100%;
        height: 100%;
        resize: none;
        padding: 5px;
        display: block;
    }
</style>
<script>
    document.addEventListener("DOMContentLoaded", () => {
        const textarea = document.getElementById("id1"),
            { log } = console;

        textarea.addEventListener("click", () => {
            fetch('1.txt')
                .then((response) => response.ok ? response.text() : Promise.reject(response))
                .then((text) => {
                    textarea.value = text;
                })
                .catch(error => textarea.value = error.statusText);
        });
    });
</script>

</body>
</html>