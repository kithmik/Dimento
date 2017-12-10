@extends('layouts.objects')

@section('title', ' - Object ')

@section('content')

    @auth
        <!--Modal: Post Report form-->
        <div class="modal fade" id="objectReportModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
             aria-hidden="true">
            <div class="modal-dialog {{--cascading-modal--}} modal-warning" role="document">
                <!--Content-->
                <div class="modal-content">

                    <!--Header-->
                    <div class="modal-header light-blue darken-3 white-text">
                        <button type="button" class="close waves-effect waves-light" data-dismiss="modal"
                                aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="title"><i class="fa fa-pencil"></i> Report Post</h4>
                    </div>
                    <!--Body-->
                    <div class="modal-body mb-0">

                        <h5 id="reporting-post-title"></h5>
                        <div id="reporting-post-user"></div>
                        <br>

                        <form method="POST" action="/report/object" id="post-reporting-form">
                            {{ csrf_field() }}

                            <input type="hidden" name="reporting_post_id" id="reporting_post_id" value="-1">
                            <div class="md-form form-sm">
                                <i class="fa fa-building-o prefix"></i>
                                <select class="mdb-select pl-5" id="report_category" name="report_category" required>
                                    <option value="" disabled selected>Choose your option</option>
                                    <option value="Irrelevant">Irrelevant Content</option>
                                    <option value="Abusive">Abusive Content</option>
                                    <option value="Hate Speech">Hate Speech</option>
                                    <option value="Other">Other</option>
                                </select>
                                <label>Reporting Category</label>
                            </div>

                            <div class="md-form form-sm">
                                <i class="fa fa-exclamation-triangle prefix"></i>
                                <input type="text" id="report_reason" name="report_reason" class="md-form" required>
                                <label for="report_reason">Please specify a brief reason for this report </label>
                            </div>

                            <div class="md-form form-sm">
                                <i class="fa fa-list prefix"></i>
                                <textarea name="report_description" id="report_description" cols="30" rows="10"
                                          class="md-textarea"></textarea>
                                <label for="report_description">Please provide us with more details about this
                                    report</label>
                            </div>

                            <div class="text-center mt-1-half">
                                <button type="submit" class="btn btn-danger mb-2">Submit Report <i
                                            class="fa fa-send ml-1"></i></button>
                            </div>

                        </form>
                    </div>
                </div>
                <!--/.Content-->
            </div>
        </div>
        <!--Modal: Post Report form-->
    @endauth


    <script src="/libs/threejs/js/three.js"></script>
    <script src="/libs/threejs/js/controls/TrackballControls.js"></script>
    <script src="/libs/threejs/js/loaders/TDSLoader.js"></script>

    {{--View the 3D models--}}

    <div class="container" style="padding-top: 30px; padding-bottom: 20px;">
        <div class="row">

            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-12" id="viewer-col-parent" style="min-height: 60%;">
                        <div class="card hoverable">

                            <div class="row">
                                <div class="col-md-9">

                                </div>
                                <div class="col-md-1">
                                    @if(auth()->check())
                                        <div class="col-md-2 mr-auto right-aligned text-right">
                                            <div class="dropdown">
                                                <button class="btn-flat {{--dropdown-toggle--}}" type="button"
                                                        id="object-card-dropdown-{{ $object->id }}"
                                                        data-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false">
                                                    <i class="fa fa-bars"></i>
                                                </button>
                                                <div class="dropdown-menu"
                                                     aria-labelledby="object-card-dropdown-{{ $object->id }}">
                                                    <div>

                                                        @if(auth()->user()->id == $object->user_id)
                                                            <h5 class="dropdown-header">Actions</h5>
                                                            <a href="{{ route('object.edit', [$object->id]) }}"
                                                               class="dropdown-item">
                                                                Edit
                                                            </a>
                                                            <a href="{{ route('object.destroy', [$object->id]) }}"
                                                               class="dropdown-item"
                                                               onclick="event.preventDefault();if(confirm('Are you sure that you want to delete this? Once you delete this, all data associated with this would also be deleted.')){document.getElementById('delete-object-form-of-{{ $object->id }}').submit();}">
                                                                Delete
                                                            </a>

                                                            <form id="delete-object-form-of-{{ $object->id }}"
                                                                  action="{{ route('object.destroy', [$object->id]) }}"
                                                                  method="POST" style="display: none;">
                                                                {{ csrf_field() }}
                                                                {{ method_field('DELETE') }}
                                                            </form>
                                                        @else
                                                            {{--<div class="dropdown-divider"></div>--}}
                                                            <a type="button" role="button"
                                                               class="btn btn-flat danger-color object-report-a"
                                                               data-user="{{ $object->user->first_name }} {{ $object->user->middle_name }} {{ $object->user->last_name }}"
                                                               data-object="{{ $object->title }}"
                                                               data-id="{{ $object->id }}" data-animation="false"
                                                               data-toggle="modal" data-target="#objectReportModal">
                                                                Report
                                                            </a>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    @endif
                                </div>
                            </div>

                            <div class="card-image">
                                <div id="object-view-div">
                                </div>
                            </div>

                            <div class="card-header">
                                <div class="row">
                                    <div class="col-md-12 pull-left d-inline-block">

                                        <h3 class="inline">
                                            {{--<i class="fa fa-object-group" aria-hidden="true"></i>--}}
                                            {{ $object->title }}
                                        </h3>

                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        {{--<i class="fa fa-user" aria-hidden="true"></i>--}}
                                        <a href="{{ route('user.show', $object->user->id) }}">
                                            {{ $object->user->first_name." ".$object->user->last_name }}
                                        </a>

                                    </div>
                                    <div class="col-md-8 pull-right text-right" title="{{ $object->getTimeAttr() }}">
                                        <i class="fa fa-clock-o" aria-hidden="true"></i>
                                        {{ $object->getAgeAttr() }}
                                        <span class="m-0 d-inline-block impressions" data-animation="false"
                                              data-toggle="tooltip" data-placement="bottom" title="All Impressions">
                           |
                            <i class="fa fa-binoculars" aria-hidden="true"></i>
                                            {{ $object->public_views + $object->getUserViewCount() }}
                                            |
                        </span>
                                        <span class="m-0 d-inline-block impressions" data-animation="false"
                                              data-toggle="tooltip" data-placement="bottom"
                                              title="Registered User Impressions">
                            <i class="fa fa-eye" aria-hidden="true"></i>
                                            {{ $object->getUserViewCount() }}
                                            |
                        </span>
                                        <span class="m-0 d-inline-block impressions" data-animation="false"
                                              data-toggle="tooltip" data-placement="bottom"
                                              title="Registered Users who viewed this 3D model">
                            <i class="fa fa-book" aria-hidden="true"></i>
                                            {{ $object->getUserReadCount() }}
                                            |
                        </span>

                                    </div>
                                </div>

                            </div>

                            <div class="card-body">
                                <p>
                                    {{ $object->description }}
                                </p>
                            </div>

                            <div class="card-footer">
                                <div class="row">
                                    <div class="col-md-12">

                                        @if(auth()->check())
                                            <span class="m-0 d-inline-block blue-grey-text">
                            <a type="button" data-toggle="tooltip" data-placement="bottom" data-animation="false"
                               title="Likes: {{ $object->getLikesCount() }}" data-id="{{ $object->id }}" data-status="1"
                               data-current="{{ $object->userReaction()['status'] or '' }}"
                               class="icons-sm like-thumb m-0 like-thumb-up">
                                <i class="fa {{ $object->userReaction()['status'] === 1?'fa-thumbs-up':'fa-thumbs-o-up' }}"> </i>
                            </a>
                            <span class="like-count badge badge-black" data-id="{{ $object->id }}">
                                {{ $object->getLikesCount() }}
                            </span> <span style="color: black">|</span>
                            <a type="button" data-toggle="tooltip" data-placement="bottom" data-animation="false"
                               title="Dislikes: {{ $object->getDisLikesCount() }}" data-id="{{ $object->id }}"
                               data-status="0" data-current="{{ $object->userReaction()['status'] or '' }}"
                               class="icons-sm like-thumb m-0 like-thumb-down">
                                <i class="fa {{ $object->userReaction()['status'] === 0?'fa-thumbs-down':'fa-thumbs-o-down' }}"> </i>
                            </a>
                            <span class="dislike-count badge badge-black" data-id="{{ $object->id }}">
                                {{ $object->getDisLikesCount() }}
                            </span>
                        </span>
                                            <br>
                                            <span class="m-0 d-inline-block gold-text avg_rating"
                                                  data-id="{{ $object->id }}">
                              {{ round($object->avgRating(), 2) }}
                        </span>
                                            <span class="m-0 d-inline-block gold-text" style="color: gold;">
                                                @for($s = 1; $s <= $object->userReaction()['rating']; $s++)
                                                    @if($s <= 5)
                                                        <a type="button" data-id="{{ $s }}"
                                                           data-object="{{ $object->id }}"
                                                           data-rating="{{ $object->userReaction()['rating'] or 0 }}"
                                                           class="icons-sm m-0 star-rating"><i class="fa fa-star"> </i></a>
                                                    @else
                                                        @break
                                                    @endif
                                                @endfor
                                                @for($si = 1; $si <= (5 - $object->userReaction()['rating']); $si++)
                                                    <a type="button"
                                                       data-id="{{ $object->userReaction()['rating']+$si }}"
                                                       data-object="{{ $object->id }}"
                                                       data-rating="{{ $object->userReaction()['rating'] or 0 }}"
                                                       class="icons-sm m-0 star-rating"><i
                                                                class="fa fa-star-o"> </i></a>
                                                @endfor
                                            </span>
                                            <br>
                                        @endif
                                    </div>
                                    <a class="btn btn-md btn-outline-elegant waves-effect"
                                       data-toggle="collapse" href="#comments-of-{{ $object->id }}"
                                       aria-expanded="false" aria-controls="collapseExample">
                                        Comments <span class="badge badge-black">{{ count($object->comments) }}</span>
                                    </a>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        @include('includes.post_comments')
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-md-4">
            @foreach($ads as $ad)
                <!--Card-->
                    <div class="card">
                        <!--Card image-->
                        <img class="img-fluid" src="{{$ad->image}}" alt="Card image cap" style="max-height: 300px">
                        <!--Card content-->
                        <div class="card-body">
                            <!--Title-->
                            <h4 class="card-title">{{$ad->title}}</h4>
                            <!--Text-->
                            <p class="card-text" style="text-transform: capitalize">{{$ad->description}}</p>
                            <a href="{{ route('advertisement.show',$ad->id) }}"
                               class="btn btn-outline-elegant waves-effect btn-sm">View</a>
                        </div>
                    </div>
                    <br>
                    <!--/.Card-->
                @endforeach
            </div>


        </div>
    </div>

    <script>

        var container, controls;
        var camera, scene, renderer;


        init();
        animate();

        function init() {

//        container = document.createElement( 'div' );
            container = document.getElementById('object-view-div');
//        document.body.appendChild( container );

            camera = new THREE.PerspectiveCamera(60, window.innerWidth / window.innerHeight, 0.1, 10);
            camera.position.z = 3;

            controls = new THREE.TrackballControls(camera, container);

            scene = new THREE.Scene();
            scene.add(new THREE.HemisphereLight());

            scene.background = new THREE.Color(0x607d8b);

            var directionalLight = new THREE.DirectionalLight(0xffeedd);
            directionalLight.position.set(0, 0, 2);
            scene.add(directionalLight);

            var ambientLight = new THREE.AmbientLight(0xffffff, 1, 1000);
            scene.add(ambientLight);

            var material = new THREE.MeshLambertMaterial();  // default color is 0xffffff

            //3ds files dont store normal maps
            var loader = new THREE.TextureLoader();
            var normal = loader.load('{{ $object->texture_location }}');

            var loader = new THREE.TDSLoader();
//            loader.setPath( '/models/3ds/portalgun/textures/' );
            loader.setPath('/storage/models/main/{{ $object->id }}/textures/');
            loader.load('{{ $object->object_location }}', function (object) {

                object.traverse(function (child) {

                    if (child instanceof THREE.Mesh) {

                        child.material.normalMap = normal;
                    }

                });

                scene.add(object);

            });

            /*renderer = new THREE.WebGLRenderer({ alpha: true });
            renderer.setClearColor( 0x000000, 0 ); // the default*/

            renderer = new THREE.WebGLRenderer();

            renderer.setPixelRatio(window.devicePixelRatio);
            // renderer.setSize( window.innerWidth/2, window.innerHeight/2 );
//            renderer.setSize( 400,250 );
//            renderer.setSize(500, 300, true);
            /*var div_ele = document.getElementById('viewer-col-parent');
            console.log(div_ele.width + " "+div_ele.offsetWidth);*/

            var div_w = $('#object-view-div').innerWidth();
            var div_h = $('#viewer-col-parent').innerHeight();

            console.log(div_w + " " + div_h);

            renderer.setSize(div_w, div_h);
//            renderer.setSize(500, 500);
            container.appendChild(renderer.domElement);

            window.addEventListener('resize', resize, true);

        }

        function resize() {

//            camera.aspect = 100;
            camera.aspect = window.innerWidth / window.innerHeight;

//            camera.fov = ( 360 / Math.PI ) * Math.atan( tanFOV * ( window.innerHeight / windowHeight ) );


            camera.updateProjectionMatrix();

//            camera.lookAt( scene.position );
//            var div_ele = document.getElementById('viewer-col-parent');

            var div_w = $('#object-view-div').innerWidth();
            var div_h = $('#viewer-col-parent').innerHeight();
            renderer.setSize(div_w, div_h);

//            renderer.render( scene, camera );
//            renderer.setSize(500, 500, false);

            window.addEventListener('resize', resize, true);

//            renderer.setSize( window.innerWidth, window.innerHeight );
            // renderer.setSize( window.innerWidth/2, window.innerHeight/2 );

        }

        function animate() {

            controls.update();
            renderer.render(scene, camera);

            requestAnimationFrame(animate);

        }
    </script>

    <script src="/js/object-view.js"></script>

    <script>
        $(function () {

            $('.mdb-select').material_select();

            $(document).on('click', '.object-report-a', function (e) {
                e.preventDefault();
                $('#reporting_post_id').val($(this).attr('data-id'));
                $('#reporting-post-title').html($(this).attr('data-object'));
                $('#reporting-post-user').html($(this).attr('data-user'));

//                console.log($(this).attr('data-object'));

            });

            $('#post-reporting-form').submit(function (e) {
                e.preventDefault();
                $.ajax({
                    url: $(this).attr('action'),
                    method: $(this).attr('method'),
                    data: $(this).serializeArray(),
                    success: function (returnedData) {
                        if (returnedData['status'] == 1) {
                            toastr["success"]('Success: ' + returnedData['msg']);
                        }
                        else if (returnedData['status'] == 0) {
                            toastr["info"](returnedData['msg']);
                        }

                    }
                });

            });


            $(document).on('click', '.like-thumb', function (e) {
                e.preventDefault();

                var status = $(this).attr('data-status');
                var current = $(this).attr('data-current');
                var post_id = $(this).attr('data-id');
                url = '/reaction/' + post_id + '/like/';

                if (status !== current) {
                    url += status;
                }
                console.log(url);

                $.ajax({
                    url: url,
                    method: 'get',
                    success: function (returnedData) {
                        toastr["success"]('Success: ' + returnedData.message);
                        // console.log(status);
                        $('.like-count[data-id="' + post_id + '"]').html(returnedData.like_count);
                        $('.dislike-count[data-id="' + post_id + '"]').html(returnedData.dislike_count);
                        if (status === current) {
                            $('.like-thumb[data-id="' + post_id + '"]').attr('data-current', '');
                            $('.like-thumb-up[data-id="' + post_id + '"]').html('<i class="fa fa-thumbs-o-up"></i>');
                            $('.like-thumb-down[data-id="' + post_id + '"]').html('<i class="fa fa-thumbs-o-down"></i>');
                        }
                        else {
                            $('.like-thumb[data-id="' + post_id + '"]').attr('data-current', status);
                            if (status === '1') {
                                $('.like-thumb-down[data-id="' + post_id + '"]').html('<i class="fa fa-thumbs-o-down"></i>');
                                $('.like-thumb-up[data-id="' + post_id + '"]').html('<i class="fa fa-thumbs-up"></i>');
                            }
                            else if (status === '0') {
                                $('.like-thumb-up[data-id="' + post_id + '"]').html('<i class="fa fa-thumbs-o-up"></i>');
                                $('.like-thumb-down[data-id="' + post_id + '"]').html('<i class="fa fa-thumbs-down"></i>');
                            }
                        }
                    },
                    error: function (error) {
                        toastr["danger"]('Success: ' + error);
                    }

                });
            });

            $(document).on('click', '.star-rating', function () {
                var rating = $(this).attr('data-id');
                var post_id = $(this).attr('data-post');
                var star_ele = $(this);
                $.ajax({
                    url: '/reaction/' + post_id + '/rate/' + rating,
                    method: 'get',
                    success: function (returnedData) {
                        toastr["success"]('Success: ' + returnedData.message);
                        if (returnedData.avg_rating !== null) {
                            $('.avg_rating[data-id="' + post_id + '"]').html(' | ' + returnedData.avg_rating);
                        }
                        else {
                            $('.avg_rating[data-id="' + post_id + '"]').html(' | ');
                        }

                        $('.star-rating[data-post="' + post_id + '"][data-post="' + post_id + '"]').html('<i class="fa fa-star-o"> </i>').attr('data-rating', rating);

                        if (returnedData.status < 0) {
                            rating = 0;
                        }

                        $('.star-rating[data-post="' + post_id + '"]').attr('data-rating', rating);

                        for (var i = 1; i <= rating; i++) {
                            if (i > 0) {
                                $('.star-rating[data-id="' + i + '"][data-post="' + post_id + '"]').html('<i class="fa fa-star"> </i>');
                            }

                        }
                    },
                    error: function (error) {
                        toastr["danger"]('Success: ' + error);
                    }
                });
            });


        });
    </script>

@endsection