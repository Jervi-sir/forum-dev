@extends('blade.master')

@section('top-style')
<link href="https://unpkg.com/@yaireo/tagify/dist/tagify.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="css/post.css">
@endsection

@section('top-script')
<script src="https://unpkg.com/@yaireo/tagify"></script>
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
                <input name="tags"  type="text" class="tags" placeholder="add tags.." required>
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

<style>
    .tags {
        display: flex;
        align-items: center;
        gap: 1rem;
    }
    .tagify__input {
        margin: 0;
    }
    .tagify__tag {
        margin: 0;
    }
    main .edit-container .title-tags .tags, main .edit-container .title-tags .tags::placeholder {
        font-size: 2rem;
    }
    .tagify__dropdown__item {
        font-size: 1.5rem;
        color: #000;
    }
    .tagify__dropdown {
        background: #252A3F;
    }
</style>
<script>
    function publish() {
        var submit = document.getElementById("publish");
        submit.click();
    }
</script>


<script>
    var input1 = document.querySelector('input[name=tags]');
    var tagify1 = new Tagify(input1, {
            whitelist : ["A# .NET", "A# (Axiom)", "A-0 System", "A+", "A++", "ABAP", "ABC", "ABC ALGOL", "ABSET", "ABSYS", "ACC", "Accent", "Ace DASL", "ACL2", "Avicsoft", "ACT-III", "Action!", "ActionScript", "Ada", "Adenine", "Agda", "Agilent VEE", "Agora", "AIMMS", "Alef", "ALF", "ALGOL 58", "ALGOL 60", "ALGOL 68", "ALGOL W", "Alice", "Alma-0", "AmbientTalk", "Amiga E", "AMOS", "AMPL", "Apex (Salesforce.com)", "APL", "AppleScript", "Arc", "ARexx", "Argus", "AspectJ", "Assembly language", "ATS", "Ateji PX", "AutoHotkey", "Autocoder", "AutoIt", "AutoLISP / Visual LISP", "Averest", "AWK", "Axum", "Active Server Pages", "ASP.NET", "B", "Babbage", "Bash", "BASIC", "bc", "BCPL", "BeanShell", "Batch (Windows/Dos)", "Bertrand", "BETA", "Bigwig", "Bistro", "BitC", "BLISS", "Blockly", "BlooP", "Blue", "Boo", "Boomerang", "Bourne shell (including bash and ksh)", "BREW", "BPEL", "B", "C--", "C++ – ISO/IEC 14882", "C# – ISO/IEC 23270", "C/AL", "Caché ObjectScript", "C Shell", "Caml", "Cayenne", "CDuce", "Cecil", "Cesil", "Céu", "Ceylon", "CFEngine", "CFML", "Cg", "Ch", "Chapel", "Charity", "Charm", "Chef", "CHILL", "CHIP-8", "chomski", "ChucK", "CICS", "Cilk", "Citrine (programming language)", "CL (IBM)", "Claire", "Clarion", "Clean", "Clipper", "CLIPS", "CLIST", "Clojure", "CLU", "CMS-2", "COBOL – ISO/IEC 1989", "CobolScript – COBOL Scripting language", "Cobra", "CODE", "CoffeeScript", "ColdFusion", "COMAL", "Combined Programming Language (CPL)", "COMIT", "Common Intermediate Language (CIL)", "Common Lisp (also known as CL)", "COMPASS", "Component Pascal", "Constraint Handling Rules (CHR)", "COMTRAN", "Converge", "Cool", "Coq", "Coral 66", "Corn", "CorVision", "COWSEL", "CPL", "CPL", "Cryptol", "csh", "Csound", "CSP", "CUDA", "Curl", "Curry", "Cybil", "Cyclone", "Cython", "M2001", "M4", "M#", "Machine code", "MAD (Michigan Algorithm Decoder)", "MAD/I", "Magik", "Magma", "make", "Maple", "MAPPER now part of BIS", "MARK-IV now VISION:BUILDER", "Mary", "MASM Microsoft Assembly x86", "MATH-MATIC", "Mathematica", "MATLAB", "Maxima (see also Macsyma)", "Max (Max Msp – Graphical Programming Environment)", "MaxScript internal language 3D Studio Max", "Maya (MEL)", "MDL", "Mercury", "Mesa", "Metafont", "Microcode", "MicroScript", "MIIS", "Milk (programming language)", "MIMIC", "Mirah", "Miranda", "MIVA Script", "ML", "Model 204", "Modelica", "Modula", "Modula-2", "Modula-3", "Mohol", "MOO", "Mortran", "Mouse", "MPD", "Mathcad", "MSIL – deprecated name for CIL", "MSL", "MUMPS", "Mystic Programming L"],
            blacklist : ["fuck", "shit"],
            enforceWhitelist : {
                enabled: 1
            },
            dropdown : {
                enabled       : 0,              // show the dropdown immediately on focus
                maxItems      : 7,
                position      : "text",         // place the dropdown near the typed text
                closeOnSelect : false,          // keep the dropdown open after selecting a suggestion
                highlightFirst: true
            }
    });

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
