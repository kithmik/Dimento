{{--@extends('layouts.app')--}}
@include('includes.header')
@include('includes.navbar')

<div class="container" style="padding-top: 50px">
    <div class="row">

    </div>
</div>


<!-- SCRIPTS -->

<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="/libs/mdb4/js/bootstrap.min.js"></script>

<!-- MDB core JavaScript -->
<script type="text/javascript" src="/libs/mdb4/js/mdb.js"></script>

<script type="text/javascript" src="/libs/mdb4/js/compiled.min.js"></script>

<!-- Bootstrap dropdown -->
<script type="text/javascript" src="/libs/mdb4/js/popper.min.js"></script>

<script>
    new WOW().init();
</script>

{{--modal--}}
<!--Modal: Contact form-->
<div class="modal fade" id="more" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog cascading-modal" role="document">
        <!--Content-->
        <div class="modal-content">

            <!--Header-->
            <div class="modal-header blue-grey lighten-5">
                <h4 class="title"><i class="fa fa-user"></i>User Info</h4>
                <button type="button" class="close waves-effect waves-light black-text" data-dismiss="modal"
                        aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!--Body-->
            <div class="modal-body mb-0">
                <p class="text-lg-left"><b>Name: </b> {{ Auth::user()->first_name.' '.auth()->user()->last_name}}</p>
                <p class="text-lg-left">
                    <b>Type: </b> {{ Auth::user()->type == 1?'Designer':(Auth::user()->type == 2?'Individual Customer':(Auth::user()->type == 3?'Business Organization':'')) }}
                </p>
                <p class="text-lg-left"><b>Phone Number: </b> {{ Auth::user()->phone}}</p>
                <p class="text-lg-left"><b>Email: </b> {{ Auth::user()->email}}</p>
                <p class="text-lg-left"><b>Date of
                        Birth: </b> {{ \Carbon\Carbon::parse(Auth::user()->dob)->format('Y M d')}}</p>
                <p class="text-lg-left"><b>Date
                        Joined: </b>{{ \Carbon\Carbon::parse(Auth::user()->created_at)->format('Y M d')}}</p>
            </div>
        </div>
        <!--/.Content-->
    </div>
</div>
<!--Modal: Contact form-->

<script>
    $(function () {
        $('#data1').DataTable({
            'paging': true,
            'lengthChange': true,
            'searching': false,
            'ordering': true,
            'info': true,
            'autoWidth': true
        })
        $('#data2').DataTable({
            'paging': true,
            'lengthChange': true,
            'searching': false,
            'ordering': true,
            'info': true,
            'autoWidth': true
        })
    })


</script>