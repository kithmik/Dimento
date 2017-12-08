<form action="{{ route('post.store') }}" method="POST">
	{{ csrf_field() }}

	<input type="text" name="title">
	<textarea name="description" id="description" cols="30" rows="10"></textarea>

	<select name="category" id="category">
		<option value="a">a</option>
		<option value="b">b</option>
	</select>
	<input type="submit" name="submit">
</form>
{{--

<!DOCTYPE html>
<html lang="en">
<head>

	<title>Create Now</title>
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
    
    <h1 class="h1">Submit Your Quaries Here</h1>

    <br>
    <br>
    <br>
    <style>

    .h1 {
    	padding-left:590px;
    } 
    /* Set height of the grid so .sidenav can be 100% (adjust if needed) */
    .row.content {height: 1500px}
    
    /* Set gray background color and 100% height */
    .sidenav {
      background-color: #f1f1f1;
      height: 100%;
    }
    
    /* Set black background color, white text and some padding */
    footer {
      background-color: #555;
      color: white;
      padding: 15px;
    }
    
    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;
      }
      .row.content {height: auto;} 
    }
    

  </style>
</head>
<body>
	
<div  class="container-fluid">
  <div class="row content">


    <div class="col-sm-9">
        <div class="container">
		  <form action="/action_page.php">
		    <div class="form-group">
		    	<div class="form-group">
                    <i class="fa fa-bandcamp" aria-hidden="true"></i>

		            <label for="email">Name:</label>
          <input type="email" class="form-control" id="name" placeholder="Enter your name" name="name">
		        </div>
		        <i class="fa fa-bandcamp" aria-hidden="true"></i>

		      <label for="email">Email:</label>
		      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
		    </div>
                

		    <div class="form-group">
		       <i class="fa fa-bandcamp" aria-hidden="true"></i>

		       <label for="pwd">Password:</label>
		       <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd">
		    </div>
		   
		    <div class="form-group">
		    	<i class="fa fa-bandcamp" aria-hidden="true"></i>

            <label for="comment">Enter description:</label>
            <textarea rows="5" class="form-control" id="comment" ></textarea>
            </div>

             <div class="dropdown">
		    	<button type="button" data-toggle="dropdown" class="btn btn-info dropdown-toggle" id="dropdownmenu">Select 3D model category
		    		<span class="caret"></span>
		    	</button>
		    <ul class="dropdown-menu" aria-label-by="dropdownmenu">
		    	<li><a href="#">Art</a></li>
		    	<li><a href="#">Vehiles</a></li>
		    	<li><a href="#">Education</a></li>
                <li><a href="#">Gaming</a></li>
		    	<li><a href="#">Sports</a></li>
		    	<li><a href="#">Furniture</a></li>
		    	<li><a href="#">Health</a></li>
		    	<li><a href="#">Food</a></li>
		    	<li><a href="#">Technology</a></li>
		    </ul>
		    </div>
			   <br>

		    <button type="submit" class="btn btn-default">Submit</button>
		  </form>
		</div>

</body>
</html>
--}}
