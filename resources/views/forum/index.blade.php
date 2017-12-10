@include('includes.header')
@include('includes.navbar')


<div class="container" style="padding-top: 30px; padding-bottom: 50px">
    <div class="row">
        <div class="col-md-8">
            <div class="container">
                <!--Panel-->
                @foreach($posts as $post)
                    <div class="card card-body">
                        <h4 class="card-title">{{ $post->title }}</h4>
                        <p class="card-text">{{ $post->description }}</p>
                        <div class="flex-row">
                            <a class="card-link">Card link</a>
                            <a class="card-link">Another link</a>
                        </div>
                    </div>
                @endforeach
                <br>
                <!--/.Panel-->
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card">
                    <h3 class="card-header font-up font-bold text-center py-5">Other Categories</h3>
                    <div class="card-body">
                        <ul class="list-group">
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <a href="/forum/post/{{ urlencode('NURBS/NURMS Modelling') }}">NURBS/NURMS Modelling</a>
                                <span class="badge badge-primary badge-pill"></span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <a href="/forum/post/{{ urlencode('Polygon Modelling') }}">Polygon Modelling</a>
                                <span class="badge badge-primary badge-pill"></span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <a href="/forum/post/{{ urlencode('Rendering') }}">Rendering</a>
                                <span class="badge badge-primary badge-pill"></span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <a href="/forum/post/{{ urlencode('Visualization') }}">Visualization</a>
                                <span class="badge badge-primary badge-pill"></span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <a href="/forum/post/{{ urlencode('Architectural 3D') }}">Architectural 3D</a>
                                <span class="badge badge-primary badge-pill"></span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <a href="/forum/post/{{ urlencode('UV Mapping') }}">UV Mapping</a>
                                <span class="badge badge-primary badge-pill"></span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <a href="/forum/post/{{ urlencode('Baking') }}">Baking</a>
                                <span class="badge badge-primary badge-pill"></span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <a href="/forum/post/{{ urlencode('Other') }}">Other</a>
                                <span class="badge badge-primary badge-pill"></span>
                            </li>
                        </ul>
                        <p class="text-small text-muted mb-0 pt-3">*</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- SCRIPTS -->

<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="/libs/mdb4/js/bootstrap.min.js"></script>

<!-- MDB core JavaScript -->
<script type="text/javascript" src="/libs/mdb4/js/mdb.js"></script>

<script type="text/javascript" src="/libs/mdb4/js/compiled.min.js"></script>

<!-- Bootstrap dropdown -->
{{--<script type="text/javascript" src="/libs/mdb4/js/popper.min.js"></script>--}}

<script>
    new WOW().init();
</script>
