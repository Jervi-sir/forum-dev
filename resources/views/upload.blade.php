<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel File Upload</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jic/2.0.2/JIC.min.js"></script>
    <!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
    </style>
</head>
<body>
    <div class="flex-center position-ref full-height">
        <div class="content">
            <div class="title m-b-md">
                Laravel File Upload
            </div>

            @if ($message = Session::get('success'))
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{{ $message }}</strong>
                </div>
            @endif

            <div class="links">
                 <form action="/upload" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">

                        <input name="source" type="file" id="input_image" onchange="previewFile()">
                        <br>
                        <img id="source_img" src="" height="200" alt="Image preview...">
                        <br>

                        <button type="button" onclick="myFunction()" >compress</button>
                        <br>

                        <img id="target_img" src="" height="200" alt="Image preview...">
                        <br>

                        <input name="image" type="text" id="resultImage"  hidden>
                        <br>

                        <div class="col-md-6">
                            <button type="submit" class="btn btn-success">Upload a File</button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>

        function previewFile() {
              var preview = document.querySelector('img');
              var file    = document.querySelector('input[type=file]').files[0];
              var reader  = new FileReader();

              reader.addEventListener("load", function () {
                preview.src = reader.result;

              }, false);

              if (file) {
                reader.readAsDataURL(file);
              }
        }

        function myFunction(){
            var source_img = document.getElementById("source_img"),
                target_img = document.getElementById("target_img");
            var quality =  60,
            output_format = 'jpg';
            target_img.src = jic.compress(source_img,quality,output_format).src;

            document.getElementById("resultImage").value = jic.compress(source_img,quality,output_format).src;

            console.log("I am a myFunction!");
        };

    </script>
</body>
</html>
