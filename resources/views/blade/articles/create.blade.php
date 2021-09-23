@extends('blade.master')

@section('top-style')
<link rel="stylesheet" href="css/post.css">
@endsection

@section('top-script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jic/2.0.2/JIC.min.js"></script>

@endsection

@section('title')
<title>Profile</title>
@endsection

@section('body')
<main>
    <form action="{{ route('article.store') }}" method="POST" class="edit-container" enctype="multipart/form-data">
        @csrf
        <div class="tabs-container">
            <div class="tabs">
                <button type="button" class="edit active">Edit</button>
                <div class="vertical-line"></div>
                <button type="button" class="preview">Preview</button>
            </div>
        </div>
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
    function previewFile() {
        var preview = document.getElementById('source_img');
        preview.style.opacity = 1;
        var file    = document.querySelector('input[type=file]').files[0];
        var reader  = new FileReader();

        reader.addEventListener("load", function () {
            preview.src = reader.result;
            myFunction();
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


</script>
@endsection
