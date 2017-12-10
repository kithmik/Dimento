<script src="/libs/threejs/js/three.js"></script>
<script src="/libs/threejs/js/loaders/AWDLoader.js"></script>

<script src="/libs/threejs/js/controls/OrbitControls.js"></script>

<script src="/libs/threejs/js/Detector.js"></script>
<script src="/libs/threejs/js/libs/stats.min.js"></script>

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
    if ( ! Detector.webgl ) Detector.addGetWebGLMessage();
    var container, stats;
    var camera, scene, renderer, objects, controls;
    var particleLight, pointLight;
    var trunk;
    var loader = new THREE.AWDLoader();
    loader.materialFactory = createMaterial;
    loader.load( '{{ $object->object_location }}', function ( _trunk ) {
        trunk = _trunk;
        init();
        render();
    } );
    function createMaterial( name ){
        // console.log( name );
        // var mat = new THREE.MeshPhongMaterial({
        // 	color: 0xaaaaaa,
        // 	shininess: 20
        // });
        // return mat;
        return null;
    }
    function init() {

        container = document.getElementById('object-view-div');


        camera = new THREE.PerspectiveCamera( 45, window.innerWidth / window.innerHeight, 1, 2000 );
        camera.position.set( 70, 50, -100 );
        controls = new THREE.OrbitControls( camera );
        scene = new THREE.Scene();
        scene.background = new THREE.Color( 0x333333 );
        // Add the AWD SCENE
        scene.add( trunk );
        // Lights
        scene.add( new THREE.AmbientLight( 0x606060 ) );
        var directionalLight = new THREE.DirectionalLight(/*Math.random() * 0xffffff*/0xeeeeee );
        directionalLight.position.set( .2, -1, .2 );
        directionalLight.position.normalize();
        scene.add( directionalLight );
        pointLight = new THREE.PointLight( 0xffffff, .6 );
        scene.add( pointLight );
        renderer = new THREE.WebGLRenderer();
        renderer.setPixelRatio( window.devicePixelRatio );


        var div_w = $('#object-view-div').innerWidth();
        var div_h = $('#viewer-col-parent').innerHeight();

        renderer.setSize(div_w, div_h);

//        renderer.setSize( window.innerWidth, window.innerHeight );


        container.appendChild( renderer.domElement );
        stats = new Stats();
        container.appendChild( stats.dom );
        //
        window.addEventListener( 'resize', onWindowResize, false );
    }
    function onWindowResize() {
        camera.aspect = window.innerWidth / window.innerHeight;
        camera.updateProjectionMatrix();
        renderer.setSize( window.innerWidth, window.innerHeight );
    }
    function render() {
        requestAnimationFrame( render );
        var timer = Date.now() * 0.0005;
        pointLight.position.x = Math.sin( timer * 4 ) * 3000;
        pointLight.position.y = 600;
        pointLight.position.z = Math.cos( timer * 4 ) * 3000;
        renderer.render( scene, camera );
        stats.update();
    }
</script>
