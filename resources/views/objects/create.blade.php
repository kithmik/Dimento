@extends('layouts.objects')

@section('title', ' - Objects')

@section('content')


    {{--<h1>
        Upload a new 3D model
    </h1>--}}

    <div class="row">
        <div class="col-md-6 mx-auto">

            <form  action="{{ route('object.create') }}" method="post" enctype="multipart/form-data" id="obj-create-form" name="obj-create-form">
                {{ csrf_field() }}
                <!--Rotating card-->
                <div class="card-wrapper">
                    <div id="card-1" class="card-rotating effect__click">

                        <!--Front Side-->
                        <div class="face front">

                            <!-- Image-->
                        {{--<div class="card-up">
                            <img src="https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20%2859%29.jpg" class="img-fluid">
                        </div>
                        <!--Avatar-->
                        <div class="avatar"><img src="https://mdbootstrap.com/img/Photos/Avatars/img%20%289%29.jpg" class="rounded-circle">
                        </div>--}}
                        <!--Content-->
                            <div class="card-body">
                                <h4>Upload a new 3D model</h4>

                                <div id="drop-obj">
                                    <div class="dropzone-previews" style="display: inline-block;"></div>
                                    <div class="file-field dropzone" id="drop-image">
                                        <div class="fallback">
                                            <div class="btn">
                                                <span>Objects</span>
                                                <input type="file" id="object" name="object" {{--accept="image/*"--}}>
                                            </div>
                                            <div class="file-path-wrapper">
                                                <input class="file-path validate" type="text" placeholder="This will be the main object that appears on the wall">
                                            </div>
                                        </div>
                                        <div class="input-field"></div>
                                        <div id="fileDisplayArea"></div>
                                    </div>
                                </div>

                                {{--<p>Web developer</p>--}}
                                <!--Triggering button-->
                                <a class="rotate-btn" data-card="card-1"><i class="fa fa-arrow-circle-right"></i> Next </a>
                            </div>
                        </div>
                        <!--/.Front Side-->

                        <!--Back Side-->
                        <div class="face back">

                            <!--Content-->
                            <h4>About me</h4>
                            <hr>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maxime quae, dolores dicta. Blanditiis rem amet repellat, dolores nihil quae in mollitia asperiores ut rerum repellendus, voluptatum eum, officia laudantium quaerat?</p>
                            <hr>
                            <!--Social Icons-->
                            <ul class="inline-ul">
                                <li><a class="icons-sm fb-ic"><i class="fa fa-facebook"></i></a></li>
                                <li><a class="icons-sm tw-ic"><i class="fa fa-twitter"></i></a></li>
                                <li><a class="icons-sm gplus-ic"><i class="fa fa-google-plus"></i></a></li>
                                <li><a class="icons-sm li-ic"><i class="fa fa-linkedin"></i></a></li>
                            </ul>
                            <!--Triggering button-->
                            <a class="rotate-btn" data-card="card-1"><i class="fa fa-undo"></i> Click here to rotate back</a>

                        </div>
                        <!--/.Back Side-->

                    </div>
                </div>
                <!--/.Rotating card-->
            </form>

        </div>
    </div>


    <script>
        var myDropzone;
        /*var data = {};
        var post_id = -1;
        var i = 0;
        var isImage = false;*/
        var my_dropzone = new Dropzone("div#drop-obj" /*, { url: "/file/post"});*/);
//        myDropzone.opetio
        Dropzone.options.dropImage = { // The camelized version of the ID of the form element

            // The configuration we've talked about above
            dictDefaultMessage: "Drag and drop or click to upload your object files",
            autoProcessQueue: false,
            uploadMultiple: true,
            parallelUploads: 100,
            maxFiles: 100,
            url: $('#obj-create-form').attr('action'),
            method: 'post' ,
            paramName: "obj-files", // The name that will be used to transfer the file
            maxFilesize: 25, // MB,
            filesizeBase: 1024,
            addRemoveLinks: true,
            clickable: true,
//            acceptedFiles: 'image/*, .gif',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            },
//            previewsContainer: '.dropzone-previews',
//            previewTemplate: document.getElementById('dropzone-previews').innerHTML,

            // The setting up of the dropzone
            init: function() {

                myDropzone = this;

                this.on("addedfile", function(file) {
//                    isImage = true;
                });

                myDropzone.on('thumbnail', function(file, thumb) {

                });


                // First change the button to actually tell Dropzone to process the queue.
//                this.element.querySelector("button[id='img_submit']").addEventListener("click", function(e) {
                /*document.querySelector("button[id='submit']").addEventListener("click", function(e) {
                 // Make sure that the form isn't actually being sent.
                 e.preventDefault();
                 e.stopPropagation();

                 //myDropzone.processQueue();
                 });*/

                /*// Listen to the sendingmultiple event. In this case, it's the sendingmultiple event instead
                 // of the sending event because uploadMultiple is set to true.
                 this.on("sendingmultiple", function() {
                 // Gets triggered when the form is actually being sent.
                 // Hide the success button or the complete form.
                 });
                 this.on("successmultiple", function(files, response) {
                 // Gets triggered when the files have successfully been sent.
                 // Redirect user or notify of success.
                 });
                 this.on("errormultiple", function(files, response) {
                 // Gets triggered when there was an error sending the files.
                 // Maybe show form again, and notify user of error
                 });*/
                myDropzone.on("sending", function(file, xhr, formData) {
//
                });

                myDropzone.on("removedfile", function(file) {
                });

                myDropzone.on("complete", function(file) {

                });
                myDropzone.on("success", function(file, serverMessage) {

                });

                myDropzone.on("error", function(file, errorMessage) {

                });
            }

        };



    </script>

@endsection