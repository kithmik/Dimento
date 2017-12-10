@extends('layouts.objects')

@section('title', ' - Objects')

@section('content')


    {{--<h1>
        Upload a new 3D model
    </h1>--}}

    <div class="row">
        <div class="col-md-8 mx-auto">

            <form action="{{ route('object.store') }}" method="post" enctype="multipart/form-data" id="obj-create-form"
                  name="obj-create-form">
            {{ csrf_field() }}
            <!--Rotating card-->
                <div class="card-wrapper" style="padding-top: 50px">
                    <div id="card-1" class="card-rotating effect__click m-1 p-1 pb-2" style="display: inline-block; ">

                        <!--Front Side-->
                        <div class="face front" id="face-front" >

                            <!-- Image-->
                        {{--<div class="card-up">
                            <img src="https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20%2859%29.jpg" class="img-fluid">
                        </div>
                        <!--Avatar-->
                        <div class="avatar"><img src="https://mdbootstrap.com/img/Photos/Avatars/img%20%289%29.jpg" class="rounded-circle">
                        </div>--}}
                        <!--Content-->
                            <div class="card-body" >
                                <h4>Upload a new 3D model</h4>
                                <hr>

                                {{--<div id="drop-obj">
                                    <div class="dropzone-previews" style="display: inline-block;"></div>
                                    <div class="file-field dropzone" id="drop-image">
                                        <div class="fallback">
                                            <div class="btn">
                                                <span>Objects</span>
                                                <input type="file" id="object" name="object" --}}{{--accept="image/*"--}}{{-->
                                            </div>
                                            <div class="file-path-wrapper">
                                                <input class="file-path validate" type="text" placeholder="This will be the main object that appears on the wall">
                                            </div>
                                        </div>
                                        <div class="input-field"></div>
                                        <div id="fileDisplayArea"></div>
                                    </div>
                                </div>--}}

                                <div class="" id="file-input-div">
                                    <div class="row">
                                        <div class="card z-depth-0 hoverable mx-auto ">

                                            <div class="row">
                                                <div class="col-md-12 ">
                                                    <div class="row">
                                                        {{--<div class="col-md-5">--}}
                                                            <div class="file-field">
                                                                <div class="btn btn-elegant btn-sm">
                                                                    <span>Choose A 3D object file</span>
                                                                    <input type="file" name="object" id="object">
                                                                </div>
                                                            {{--</div>--}}
                                                        {{--</div>--}}
                                                        {{--<div class="col-md-7">--}}
                                                            <div class="file-path-wrapper">
                                                                <input class="file-path validate" type="text"
                                                                       placeholder=".3ds, .obj, .md2">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        {{--<div class="col-md-5">--}}
                                                            <div class="file-field">
                                                                <div class="btn btn-elegant btn-sm">
                                                                    <span>Choose A Texture &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</span>
                                                                    <input type="file" name="texture[]" id="texture" multiple>
                                                                </div>
                                                            {{--</div>--}}
                                                       {{-- </div>
                                                        <div class="col-md-7">--}}
                                                            <div class="file-path-wrapper">
                                                                <input class="file-path validate" type="text"
                                                                       placeholder=".jpg, .png">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <br>
                                                    {{--place for more objects--}}
                                                    <div class="" id="extra-files-div"></div>
                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <br>



                                <div class="row">
                                    <div class="col-md-6 pull-left">
                                        <div class="md-form">
                                            <button type="button" id="add-more-btn"
                                                    class="btn btn-outline-elegant waves-effect btn-sm">
                                                Add More Objects
                                            </button>
                                        </div>
                                    </div>

                                    <div class="col-md-6 pull-right">
                                        <a class="rotate-btn btn btn-elegant waves-effect btn-sm" data-card="card-1"><i
                                                    class="fa fa-arrow-circle-right"></i> Next </a>
                                    </div>

                                </div>


                            {{--<p>Web developer</p>--}}
                            <!--Triggering button-->


                            </div>
                        </div>
                        <!--/.Front Side-->

                        <!--Back Side-->
                        <div class="face back">

                            <!--Content-->
                            {{--<h4>About me</h4>--}}
                            <h4 class="text-center">Say Something About This Model</h4>
                            <hr>
                            {{--<p>

                            </p>--}}

                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="md-form">
                                            {{--<i class="fa fa-text-width prefix"></i>--}}
                                            <input type="text" id="title" name="title" class="form-control"
                                                   length="150">
                                            <label for="title">Title</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="md-form">
                                            {{--<i class="fa fa-text-width prefix"></i>--}}

                                            <select class="mdb-select black-text" id="category" name="category">
                                                <option value="" disabled selected>Select Category</option>
                                                <option value="Animals">Animals</option>
                                                <option value="Architecture">Architecture</option>
                                                <option value="Art">Art</option>

                                                <option value="Characters">Characters</option>
                                                <option value="Food">Food</option>
                                                <option value="Furniture">Furniture</option>
                                            </select>
                                            <label for="category">Select Category</label>

                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="md-form">
                                            {{--<i class="fa fa-text-width prefix"></i>--}}
                                            <textarea type="text" id="description" name="description"
                                                      class="md-textarea"> </textarea>
                                            <label for="description">Description</label>
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-md-6 pull-right">
                                        <!--Triggering button-->
                                        <a class="rotate-btn btn btn-outline-elegant waves-effect btn-sm" data-card="card-1"><i
                                                    class="fa fa-arrow-circle-left"></i> Back </a>
                                    </div>

                                    <div class="col-md-6 pull-left">
                                        <div class="md-form">
                                            <input type="submit" class="btn btn-elegant waves-effect btn-sm"
                                                   name="submit" id="submit">
                                        </div>
                                    </div>


                                </div>


                            </div>


                        {{--  <!--Social Icons-->
                          <ul class="inline-ul">
                              <li><a class="icons-sm fb-ic"><i class="fa fa-facebook"></i></a></li>
                              <li><a class="icons-sm tw-ic"><i class="fa fa-twitter"></i></a></li>
                              <li><a class="icons-sm gplus-ic"><i class="fa fa-google-plus"></i></a></li>
                              <li><a class="icons-sm li-ic"><i class="fa fa-linkedin"></i></a></li>
                          </ul>--}}

                        </div>
                        <!--/.Back Side-->

                    </div>
                </div>
                <!--/.Rotating card-->
            </form>

        </div>
    </div>

    <script>
        var i = 0;
        $(function () {


            $('.mdb-select').material_select();

            //Appending new form elements when add more is clicked

            $('#add-more-btn').click(function (e) {
                e.preventDefault();
                i++;

                var card = $('#face-front');

                var extra_ele_div = $('#extra-files-div');

//               card.height(card.height()-extra_ele_div.height());

                var beforeH = extra_ele_div.height();
                console.log('before ' + extra_ele_div.height());

                var html_eles = '<div class="appended-div" data-id="' + i + '"> <div class="row"> <div class="card z-depth-1 hoverable"> ' +
                    '<div class="card-body"> ' +
                    '<div class="row"> ' +
                        '<div class="col-md-10"> ' +
                            '<div class="row"> ' +
                            /*'<div class="col-md-5"> ' +*/
                                '<div class="file-field"> ' +
                                '<div class="btn btn-elegant btn-sm"> ' +
                                    '<span>Choose A 3D object file</span> ' +
                                    '<input type="file" name="objects[]" id="objects-' + i + '"> ' +
                                '</div> ' +
                                /*'</div> ' +*/
                            /*'</div> ' +*/
                           /* '<div class="col-md-7">' +*/
                                '<div class="file-path-wrapper"> ' +
                                '<input class="file-path validate" type="text" placeholder=".3ds, .obj, .md2"> ' +
                                '</div> ' +
                            '</div>'+
                            '</div> ' +
                    '<div class="row"> ' +
                   /* '<div class="col-md-5"> ' +*/
                    '<div class="file-field"> ' +
                    '<div class="btn btn-elegant btn-sm"> ' +
                    '<span>Choose A Texture &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</span> ' +
                    '<input type="file" name="textures[]" id="texture-' + i + '" multiple> ' +
                    '</div> ' +
                    /*'</div> ' +*/
                    /*'</div> ' +*/
                    /*'<div class="col-md-7">' +*/
                    '<div class="file-path-wrapper"> ' +
                    '<input class="file-path validate" type="text" placeholder=".jpg, .png"> ' +
                    '</div> ' +
                    '</div>'+
                    '</div> ' +
                        '</div> ' +
                        '<div class="col-md-1"> ' +
                            '<div class=" text-right"> ' +
                            '<button type="button" class="btn btn-flat close-btn" data-id="' + i + '"> ' +
                            '<i class="fa fa-window-close"></i> </button> ' +
                            '</div> ' +
                        '</div> ' +
                    '</div> </div> </div> </div> <br> </div>  ';

                extra_ele_div.append(html_eles);


                var afterH = extra_ele_div.height();
                console.log('after ' + extra_ele_div.height());

                card.height(card.height() + (afterH - beforeH));

            });

            //Removing the added elements when close button is clicked

            $(document).on('click', '.close-btn', function (e) {
                e.preventDefault();

                var id = $(this).attr('data-id');

                var card = $('#face-front');

                var extra_ele_div = $('#extra-files-div');

//                card.height(card.height()-extra_ele_div.height());

                var beforeH = extra_ele_div.height();
                console.log('before ' + extra_ele_div.height());

                $('.appended-div[data-id="' + id + '"').remove();

                var afterH = extra_ele_div.height();
                console.log('after ' + extra_ele_div.height());


                card.height(card.height() - (beforeH - afterH));
            });


        });
    </script>

    <script>

        /*        Dropzone.autoDiscover = false;

                $('#drop-obj').dropzone({
                    url: "/file/post",
                    clickable: true
                });

                var myDropzone;*/
        /*var data = {};
        var post_id = -1;
        var i = 0;
        var isImage = false;*/
        //        var my_dropzone = new Dropzone("div#drop-obj" , { url: "/file/post"});
        //        var my_dropzone = new Dropzone("div#drop-obj" , {
        //        myDropzone.opetio
        //        Dropzone.options.dropImage = { // The camelized version of the ID of the form element
        /*

        my_dropzone.options.dropImage = { // The camelized version of the ID of the form element


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
        //            acceptedFiles: 'image/!*, .gif',
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
                        /!*document.querySelector("button[id='submit']").addEventListener("click", function(e) {
                         // Make sure that the form isn't actually being sent.
                         e.preventDefault();
                         e.stopPropagation();

                         //myDropzone.processQueue();
                         });*!/

                        /!*!// Listen to the sendingmultiple event. In this case, it's the sendingmultiple event instead
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
                         });*!/
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

        */


    </script>

@endsection