<html>
<head>


    <!-- Font Awesome -->
    <link rel="stylesheet" href="/font-awesome/css/font-awesome.min.css">

    <!-- Bootstrap core CSS -->
    <link href="/libs/mdb4/css/bootstrap.css" rel="stylesheet">

    <!-- Material Design Bootstrap -->
    <link href="/libs/mdb4/css/mdb.css" rel="stylesheet">

    <!-- Material Design Bootstrap Extra-->
    <link href="/libs/mdb4/css/compiled.min.css" rel="stylesheet">

    <!-- JQuery -->
    <script type="text/javascript" src="/libs/mdb4/js/jquery-3.1.1.min.js"></script>
</head>
<body>


<div>


    <ul class="nav md-pills nav-justified pills-secondary">
        <li class="nav-item">
            <a class="nav-link active" data-toggle="tab" data-id="1" href="#panel4" role="tab">Active</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" data-id="2" href="#panel11" role="tab">Link</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" data-id="3" href="#panel12" role="tab">Link</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" data-id="4" href="#panel13" role="tab">Help</a>
        </li>
    </ul>

    <!-- Tab panels -->
    <div class="tab-content">

        <!--Panel 1-->
        <div class="tab-pane fade in show active" id="panel11" role="tabpanel">
            <br>

            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nihil odit magnam minima, soluta doloribus
                reiciendis molestiae placeat unde eos molestias. Quisquam aperiam, pariatur. Tempora, placeat ratione
                porro voluptate odit minima.</p>

        </div>
        <!--/.Panel 1-->

        <!--Panel 2-->
        <div class="tab-pane fade" id="panel12" role="tabpanel">
            <br>

            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nihil odit magnam minima, soluta doloribus
                reiciendis molestiae placeat unde eos molestias. Quisquam aperiam, pariatur. Tempora, placeat ratione
                porro voluptate odit minima.</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nihil odit magnam minima, soluta doloribus
                reiciendis molestiae placeat unde eos molestias. Quisquam aperiam, pariatur. Tempora, placeat ratione
                porro voluptate odit minima.</p>

        </div>
        <!--/.Panel 2-->

        <!--Panel 3-->
        <div class="tab-pane fade" id="panel13" role="tabpanel">
            <br>

            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nihil odit magnam minima, soluta doloribus
                reiciendis molestiae placeat unde eos molestias. Quisquam aperiam, pariatur. Tempora, placeat ratione
                porro voluptate odit minima.</p>

        </div>
        <!--/.Panel 3-->

        <!--Panel 4-->
        <div class="tab-pane fade" id="panel14" role="tabpanel">
            <br>

            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nihil odit magnam minima, soluta doloribus
                reiciendis molestiae placeat unde eos molestias. Quisquam aperiam, pariatur. Tempora, placeat ratione
                porro voluptate odit minima.</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nihil odit magnam minima, soluta doloribus
                reiciendis molestiae placeat unde eos molestias. Quisquam aperiam, pariatur. Tempora, placeat ratione
                porro voluptate odit minima.</p>

        </div>
        <!--/.Panel 4-->

    </div>
</div>


<script>
    $(function () {
       /* $('#myTab a').click(function (e) {
            e.preventDefault()
            $(this).tab('show')
        })*/

       $('a.nav-link').click(function (e) {
           e.preventDefault();
           var id = $(this).attr('data-id');

           console.log('your id: '+id);
           $(this).tab('show');
       });
    });
</script>

<!-- SCRIPTS -->

<!-- Bootstrap dropdown -->
<script type="text/javascript" src="/libs/mdb4/js/popper.min.js"></script>

<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="/libs/mdb4/js/bootstrap.min.js"></script>

<!-- MDB core JavaScript -->
<script type="text/javascript" src="/libs/mdb4/js/mdb.js"></script>

<script type="text/javascript" src="/libs/mdb4/js/compiled.min.js"></script>

<script>
    new WOW().init();
</script>

</body>
</html>