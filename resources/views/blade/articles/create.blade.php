@extends('blade.master')

@section('top-style')
<link rel="stylesheet" href="css/post.css">
@endsection

@section('top-script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jic/2.0.2/JIC.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

@endsection

@section('title')
<title>Profile</title>
@endsection

@section('body')
<main>
    <div class="container">
        <div class="tabs-container">
            <div class="tabs">
                <button id="edit-btn" type="button" class="edit active" onclick="edit()">Edit</button>
                <div class="vertical-line"></div>
                <button id="preview-btn" type="button" class="preview" onclick="preview()">Preview</button>
            </div>
        </div>
        <!-- edit -->
        <form id="edit" class="edit-container focus" action="{{ route('article.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="image" >
                <img id="source_img" src="" alt="Image preview..." style="opacity: 0">
                <label for="input_image">Add a cover image</label>
                <input type="file" id="input_image" accept="image/*" onchange="previewFile()">
                <input name="image" type="text" id="resultImage"  hidden>
            </div>

            <div class="title-tags">
                <input name="title" type="text" class="title" placeholder="Title" required>
                <input name="tags[]"  type="text" class="tags" placeholder="add tags.." required>
            </div>
            <div class="content">
                <textarea name="body" cols="100%" rows="10" placeholder="Write your post here ..." required></textarea>
            </div>
            <button type="submit" id="publish" hidden></button>
        </form>

        <div id="preview" class="preview-container">
            <div class="image">
                <img id="preview_image" src="" alt="Image preview..." style="opacity: 0">
            </div>
            <div class="title-tags">
                <h3 class="title">Title</h3>
                <span class="tags">tags</span>
            </div>

            <div class="content">
                Content
            </div>
        </div>

    </div>


    <div class="actions">
        <button class="pubilc" onclick="publish()">
            Publish
        </button>
        <button class="draft">
            Save draft
        </button>
    </div>
</main>
<script>
    function publish() {
        var submit = document.getElementById("publish");
        submit.click();
    }
</script>
<script>
    $('textarea').on('input', function () {
            this.style.height = 'auto';

            this.style.height = (this.scrollHeight) + 'px';
    });
    function previewFile() {
        var preview = document.getElementById('source_img');
        var preview2 = document.getElementById('preview_image');

        preview.style.opacity = 1;
        preview2.style.opacity = 1;
        var file    = document.querySelector('input[type=file]').files[0];
        var reader  = new FileReader();

        reader.addEventListener("load", function () {
            preview.src = reader.result;
            preview2.src = reader.result;
            setTimeout(myFunction(), 1000);
        }, false);

        if (file) {
            reader.readAsDataURL(file);
        }
    }

    function myFunction(){
        var source_img = document.getElementById("source_img");
        var quality =  60,
        output_format = 'jpg';
        document.getElementById("resultImage").value = jic.compress(source_img,quality,output_format).src;
    };


    function edit() {
        $('#edit-btn').addClass('active');
        $('#preview-btn').removeClass('active');
        $('#edit').addClass('focus');
        $('#preview').removeClass('focus');

    }

    function preview() {
        $('#edit-btn').removeClass('active');
        $('#preview-btn').addClass('active');
        $('#edit').removeClass('focus');
        $('#preview').addClass('focus');


        title = $('#edit').find('.title').val();
        tags = $('#edit').find('.tags').val();
        content = $('#edit').find('textarea').val();

        $('#preview').find('.title').text(title);
        $('#preview').find('.tags').text(tags);
        $('#preview').find('.content').text(content);
    }



</script>
@endsection
