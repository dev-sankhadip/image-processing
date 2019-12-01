<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script> -->
    <script src="js/jquery.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <title>Document</title>
    <style>
        *:focus {
            box-shadow: none !important;
            outline: none !important;
        }
    </style>
</head>

<body class="container-fluid p-4 bg-light">
    <div class="row main">
        <div class="col-md-3">
            <form>
                <h4>Create Custom Image</h4>
                <hr>
                <input type="number" class="form-control mb-4" id="width" placeholder="Width" required>
                <input type="number" class="form-control mb-4" id="height" placeholder="Height" required>
                <input type="color" id="color" class="form-control mb-4">
                <select class="form-control mb-4" id="format">
                    <option>jpeg</option>
                    <option>png</option>
                    <option>gif</option>
                </select>
                <button type="button" class="btn btn-primary">Generate</button>
            </form>
        </div>
        <div class="col-md-9 text-center bg-white shadow-sm overflow-auto">
            <div id="result" class="mt-5">

            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(".main").css({
            height: $(window).height()-50
        });
        $(window).resize(function()
        {
            $(".main").css({
                height: $(window).height()-50
            }); 
        })
        $("button").click(function() {
            const width = $("#width").val();
            const height = $("#height").val();
            const color = $("#color").val();
            const format = $("#format").val();
            const a = color[1] + color[2];
            const b = color[3] + color[4];
            const c = color[5] + color[6];
            const red = parseInt(a, 16);
            const green = parseInt(b, 16);
            const black = parseInt(c, 16);

            $.ajax({
                type: "POST",
                url: 'php/image.php',
                data: {
                    width,
                    height,
                    format,
                    red,
                    green,
                    black
                },
                success: function(res) {
                    document.getElementById("result").innerHTML="";
                    const name=res;
                    const img=document.createElement("img");
                    img.src="images/"+name;
                    img.style.width="80%";
                    img.style.marginLeft="10%";
                    $("#result").append(img);

                    const a=document.createElement("a");
                    a.href="image/"+name;
                    a.download=name;
                    a.innerHTML="Download";
                    a.className="btn btn-warning py-2 my-5";
                    document.querySelector("#result").appendChild(a);
                },
                error: function() {

                }
            })
        })
    </script>
</body>

</html>