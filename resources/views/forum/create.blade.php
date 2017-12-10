@include('includes.header')
@include('includes.navbar')

<body>
<div class="container" style="padding-top: 100px">
    <div class="row">
        <div class="col-3"></div>
        <div class="col-6">
            <!--Panel-->
            <div class="card  text-center" >
                <div class="card-header black white-text">
                    Ask a Question
                </div>
                <div class="card-body">

                    @foreach($errors->all() as $error)
                        {{ $error }}

                    @endforeach

                    <form class="form-horizontal" method="POST" action="{{ route('post.store') }}"  enctype="multipart/form-data">
                        {{ csrf_field() }}

                        {{-- topic--}}
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4 text-right">
                                    <label for="topic" class="control-label">Topic</label>
                                </div>
                                <div class="col-md-8">
                                    <input id="topic" type="text" name="title" required autofocus>
                                </div>
                            </div>
                        </div>
                        {{-- desc --}}
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4 text-right">
                                    <label for="topic" class="control-label">Description</label>
                                </div>
                                <div class="col-md-8">
                                    <input id="topic" type="text" name="description" required>
                                </div>
                            </div>
                        </div>
                        {{--type--}}
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4 text-right">
                                    <label for="category" class="control-label">Category</label>
                                </div>
                                <div class="col-md-8">
                                    <select name="category" id="category" class="mdb-select" required>
                                        <option value="" disabled selected>Choose Category</option>
                                        <option value="NURBS/NURMS Modelling">NURBS/NURMS Modelling</option>
                                        <option value="Polygon Modelling">Polygon Modelling</option>
                                        <option value="Rendering">Rendering</option>
                                        <option value="Visualization">Visualization</option>
                                        <option value="Architectural 3D">Architectural 3D</option>
                                        <option value="UV Mapping">UV Mapping</option>
                                        <option value="Baking">Baking</option>
                                        <option value="Texture Mapping">Texture Mapping</option>
                                        <option value="Other">Other</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <br>
                        <div class="row">
                            <div class="col-sm-9"></div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-elegant waves-effect btn-md" name="submit">
                                        Ask
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <br><br>
            <!--/.Panel-->
        </div>
    </div>
</div>
</body>



<!-- SCRIPTS -->
<!-- JQuery -->
<script type="text/javascript" src="/libs/mdb4/js/jquery-3.1.1.js"></script>
<!-- Bootstrap tooltips -->
{{--<script type="text/javascript" src="/libs/mdb4/js/popper.min.js"></script>--}}
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="/libs/mdb4/js/bootstrap.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="/libs/mdb4/js/mdb.js"></script>
<!-- compiled core JavaScript -->
<script type="text/javascript" src="/libs/mdb4/js/compiled.min.js"></script>

<script>
    // Material Select Initialization
    $(document).ready(function() {
        $('.mdb-select').material_select();
    });
</script>