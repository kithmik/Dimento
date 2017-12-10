<script src="/libs/threejs/js/three.js"></script>
<script src="/libs/threejs/js/loaders/3MFLoader.js"></script>

<script src="/libs/threejs/js/Detector.js"></script>
<script src="/libs/threejs/js/controls/OrbitControls.js"></script>

<script src="/libs/threejs/js/libs/jszip.min.js"></script>

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
    var camera, scene, renderer;
    init();
    function init() {

        var container = document.getElementById('object-view-div');

        renderer = new THREE.WebGLRenderer( { antialias: true } );
        renderer.setPixelRatio( window.devicePixelRatio );

        var div_w = $('#object-view-div').innerWidth();
        var div_h = $('#viewer-col-parent').innerHeight();

        renderer.setSize(div_w, div_h);

//        renderer.setSize( window.innerWidth, window.innerHeight );
//        document.body.appendChild( renderer.domElement );
        container.appendChild( renderer.domElement );

        scene = new THREE.Scene();
        scene.background = new THREE.Color( 0x333333 );
        scene.add( new THREE.AmbientLight( 0xffffff, 0.2 ) );
        camera = new THREE.PerspectiveCamera( 35, window.innerWidth / window.innerHeight, 1, 500 );
        // Z is up for objects intended to be 3D printed.
        camera.up.set( 0, 0, 1 );
        camera.position.set( - 80, - 90, 150 );
        scene.add( camera );
        var controls = new THREE.OrbitControls( camera, renderer.domElement );
        controls.addEventListener( 'change', render );
        controls.minDistance = 50;
        controls.maxDistance = 300;
        controls.enablePan = false;
        controls.target.set( 80, 65, 20 );
        controls.update();
        var pointLight = new THREE.PointLight( 0xffffff, 0.8 );
        camera.add( pointLight );
        var loader = new THREE.ThreeMFLoader();
        loader.load( '{{ $object->object_location }}', function ( object ) {
            scene.add( object );
            render();
        } );
        window.addEventListener( 'resize', onWindowResize, false );
    }
    function onWindowResize() {
        camera.aspect = window.innerWidth / window.innerHeight;
        camera.updateProjectionMatrix();

        var div_w = $('#object-view-div').innerWidth();
        var div_h = $('#viewer-col-parent').innerHeight();

        renderer.setSize(div_w, div_h);

//        renderer.setSize( window.innerWidth, window.innerHeight );
        render();
    }
    function render() {
        renderer.render( scene, camera );
    }
</script>


{{--
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

//        console.log(div_w + " " + div_h);

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
</script>--}}