<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Task #1</title>
</head>
<body>

<div class="wrapper">
    <div class="wrapper__text">
        <h2 class="text">
            Исходный: <pre>{ a : "foo" , b : "bar" , c : "car" }</pre>
            <br>
            После функции array_flip <pre id="result"></pre>
        </h2>
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
        max-width: 500px;
        margin: auto;
        border: 1px solid #000000;
        padding: 20px;
        width: 100% ;
        text-align: center;
    }
    .wrapper .wrapper__text .text{
        margin: 0;
        padding: 0;
    }
</style>

<script>
    document.addEventListener("DOMContentLoaded", () => {
        const result = document.getElementById("result");
        let testObj = { a : "foo" , b : "bar" , c : "car" },
            { log } =  console ;
        const arr = new Map([
            ['key1', 'value1'],
            ['key2', 'value2'],
            ['key3', 'value3']
        ]);

        result.innerText = JSON.stringify(array_flip(testObj));
        function array_flip  (array) {
            let tempObj = {};
            if (typeof array === "object"){
                if(array.constructor === Object){
                    Object.entries(array).forEach(([key]) => {
                        tempObj[array[key]] = key;
                    });
                }else{
                    array.forEach((value, key) => {
                        tempObj[value] = key;
                    });
                    tempObj = new Map(Object.entries(tempObj));
                }
            } else if (Array.isArray( array )){
                array.forEach((key) => {
                    tempObj[array[key]] = key;
                })
            }
            return tempObj;
        }
    });
</script>


</body>
</html>