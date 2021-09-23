@extends('blade.master')

@section('top-style')
<link rel="stylesheet" href="css/post.css">
@endsection

@section('top-script')

@endsection

@section('title')
<title>Profile</title>
@endsection

@section('body')
<main >
    <form action="{{ route('article.store') }}" method="POST" class="edit-container" enctype="multipart/form-data">
        @csrf
        <div class="tabs-container">
            <div class="tabs">
                <button type="button" class="edit active">Edit</button>
                <div class="vertical-line"></div>
                <button type="button" class="preview">Preview</button>
            </div>
        </div>
        <div class="image">
            <label for="cover">Add a cover image</label>
            <input name="image" type="file" id="cover" name="img" accept="image/*">
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
@endsection
