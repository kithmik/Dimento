<!DOCTYPE html>
<html>
<head>
    <title>Submit your questions</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

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

    <style type="text/css">
        body{
            padding-top: 65px;
        }
    
    </style>
    



</head>
<body>
    @include('includes.navbar')


      <form action="{{ route('post.store') }}" method="POST">
      	{{ csrf_field() }}
        <br />

        <center><h1><b>Submit Your Questions Here.</b></h1></center>
        <div class="container">
          <H3>Name:</H3>
      	<input type="text" name="name">
        <br/>
        <br/>
         <H3>Category:</H3>

        {{--<div class="btn-group">--}}
            {{--<button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Select 3D model category</button>--}}

        {{--</div> --}}



      	<select class="mdb-select" name="category">
      		<option value="a">NURBS Modelling</option>
      		<option value="b">Polygon Modelling</option>
          <option value="c">NURMS Modelling</option>
          <option value="c">Rendering</option>
          <option value="c">Visualiation</option>
          <option value="c">Architectural 3D</option>
          <option value="c">UV Mapping</option>
          <option value="c">Baking</option>
          <option value="c">Texture Mapping</option>
      	</select>
        <h3>Submit your questions here:</h3>
        <textarea name="description" id="description" cols="30" rows="10"></textarea>
      	<input type="submit" name="submit">
        </div>
      </form>

      <script type="text/javascript" src="/libs/mdb4/js/jquery-3.1.1.js"></script>
      <!-- Bootstrap tooltips -->
      <script type="text/javascript" src="/libs/mdb4/js/popper.min.js"></script>
      <!-- Bootstrap core JavaScript -->
      <script type="text/javascript" src="/libs/mdb4/js/bootstrap.js"></script>
      <!-- MDB core JavaScript -->
      <script type="text/javascript" src="/libs/mdb4/js/mdb.js"></script>
      </body>
      <!-- compiled core JavaScript -->
      <script
      type="text/javascript" src="/libs/mdb4/js/compiled.min.js"></script>
    
      <script> 

        $(document).ready(function() {
              $('.mdb-select').material_select();
            });
              
      </script>
</body>
</html>
