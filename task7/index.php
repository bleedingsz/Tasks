<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Task #7</title>
</head>
<body>


<div class="wrapper">
    <div class="drop file transition" id="drop-file">
        Drop file
    </div>
    <div class="output transition hide">
    </div>
</div>
<style>
    *{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }
    .wrapper{
        height: calc(100vh - 40px);
        margin: 20px;
        border: 2px #000000 dashed;
    }
    .drop{
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
        text-align: center;
    }
    .transition{
        transition: 0.3s all ease;
    }
    .output{
        background: #f6f6f6;
        height: 100%;
    }
    .hide{
        height: 0;
        opacity: 0;
        z-index: -1;
    }
    ul{
        margin-left: 20px;
    }
</style>


<script>
    document.addEventListener('DOMContentLoaded', () => {
        const fileArea = document.getElementById('drop-file'),
            outputArea = document.querySelector('.output'),
            {log} = console;

        fileArea.addEventListener('dragover',(event) => {
           event.preventDefault();
        });
        fileArea.addEventListener('drop', (event) => {
            event.preventDefault();
            const uploadFile = event.dataTransfer.files[0];
            let formData = new FormData();

            if (uploadFile.type !== 'application/json') {
                fileArea.innerHTML += '<br>Разрешены только расширением .json';
                return;
            }
            formData.append('file', uploadFile);

            fetch('handler.php',{
                method: 'POST',
                body: formData
            })
                .then((response) => response.ok ? response.text() : Promise.reject(response))
                .then((text) => {
                    fileArea.classList.add('hide');
                    outputArea.innerHTML += text;
                    setTimeout(() => outputArea.classList.remove('hide'), 300);
                })
                .catch(error => log(error.statusText));

        })

    })

</script>
</body>
</html>