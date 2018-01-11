<!DOCTYPE html>
<html>
<head>
    <title></title>
    <!-- Styles -->
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.0/css/font-awesome.min.css">
    <!-- Bootstrap core CSS -->
    <link href="/libs/mdb4/css/bootstrap.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="/libs/mdb4/css/mdb.min.css" rel="stylesheet">
    <!-- compiled core CSS -->
    <link href="/libs/mdb4/css/compiled.min.css" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <link href="/libs/mdb4/css/style.css" rel="stylesheet">

</head>
<body>

@include('includes.navbar')

@foreach($errors->all() as $error)
    {{ $error }}
@endforeach


<div class="container" style="padding-top: 20px">

    <div class="col-md-12">
        <div class="card  text-center">
            <div class="card-header black white-text">
                Making Payments are now easy!
            </div>

            <center>
                <div class="text-center">
                    <h4 style="margin: 20px;">
                        Once your payment is confirmed, your advertisement would be live
                    </h4>

                    <form action="/payment/handle/ad" method="POST">

                        {{ csrf_field() }}

                        <input type="hidden" name="ad_id" value="{{ $ad->id }}">

                        <script
                                src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                                data-key="pk_test_2BdROVNqwIfmrLz4GCfts4tW"
                                data-amount="{{ $ad->total_impressions }}"
                                data-name="Advertisement Payment"
                                data-description="0.01$ per impression"
                                data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
                                data-locale="auto">
                        </script>
                    </form>

                </div>
            </center>
            <br/>
            {{--<div class="text-left">--}}
            {{--<h4 style="margin-left: 200px;">{{$ad->texture}}</h4>--}}


            {{--</div>--}}
        </div>
    </div>
</div>

{{--{{ \Carbon\Carbon::parse($ad->created_at)->format('Y M d g:i A')}}--}}
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


</body>
</html>