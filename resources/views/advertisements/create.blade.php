@include('includes.header')
@include('includes.navbar')

@foreach($errors->all() as $error)
    {{ $error }}
@endforeach

<!-- Form advertisement -->
<form class="" action="{{ route('advertisement.store') }}" method="post" enctype="multipart/form-data">
    {{csrf_field()}}

    <div class="container" style="padding-top: 20px">

        <div class="col-md-8 mx-auto col-md-offset-6">
            <div class="card  mx-auto p-2 pl-5 pr-5">
                <div class="card-header black white-text text-center">
                    Advertisement form
                </div>


                <br/>
                <div class="md-form">
                    <i class="fa fa-tag prefix grey-text"></i>
                    <input type="text" id="form4" class="form-control  " name="title" required>
                    <label for="form4" class="">Title</label>
                </div>


                <div class="md-form">
                    <i class="fa fa-pencil prefix grey-text"></i>
                    <textarea type="text" id="form8" class="md-textarea" style="height: 80px" name="description"
                              required></textarea>
                    <label for="form8">Description</label>
                </div>


                <div class="file-field">
                    <div class="btn btn-outline-elegant waves-effect btn-md">
                        <span>Choose image file</span>
                        <input type="file" name="image">
                    </div>
                    <div class="file-path-wrapper">
                        <input class="file-path   " disabled type="text"
                               placeholder="This will be displayed as the advertisement image">
                    </div>
                </div>
                <br>
                <div class="text-right">
                    <button class="btn btn-outline-elegant waves-effect btn-md">Post</button>
                </div>
            </div>
        </div>
    </div>


</form>

<!-- Form advertisement -->


<!-- SCRIPTS -->
<!-- JQuery -->
<script type="text/javascript" src="/libs/mdb4/js/jquery-3.1.1.js"></script>
<!-- Bootstrap tooltips -->
{{--<script type="text/javascript" src="/libs/mdb4/js/popper.min.js"></script>--}}
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="/libs/mdb4/js/bootstrap.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="/libs/mdb4/js/mdb.js"></script>
</body>
<!-- compiled core JavaScript -->
<script type="text/javascript" src="/libs/mdb4/js/compiled.min.js"></script>

</html>