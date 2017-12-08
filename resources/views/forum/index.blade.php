@foreach($posts as $post)
    {{ $post->id }}
    {{ $post }}
@endforeach

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Welcome to Forum</title>
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



<br />
<br />

  <style>
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
    

		#wrap{
		border: 2px solid lightgray;
		
		width: 1000px;
		margin-left: 0.5px;
		margin-top: 10px;
		box-shadow: 5px 0 #e6e6e6;
		padding-bottom: 50px;

		}
		h1{
		color: blue-violet;
		text-align: center;
		}

		h3.heading{
		margin-left: 20px;
		background-color: #fafafa;
		font-size: 25px;
		float: left;
		padding-left: 40px;
		position: relative;
		width: 405px;
		height: 40px;
		padding-top: 5px;

		}
		#upper_blank{
		border-bottom: 7px solid steelblue;
		margin-top: 40px;
		margin-right: 485px;
		width: 570px;
		padding-right: 480px;
		}
		p{
		margin-left: 5px;
		padding: 8px;
		padding-left: 20px;
		}
		#name{
		margin-left: 20px;
		box-shadow: 0 2px 0 #e6e6e6;
		height: 40px;
		padding-left: 10px;
		width: 500px;
		}
		
		#comment{
		margin-left: 20px;
		box-shadow: 0 2px 0 #e6e6e6;
		height: 40px;
		padding-left: 10px;
		width: 650px;
		height: 200px;
		}
		#commentSubmit{
		margin-left: 20px;
		width: 250px;
		height: 55px;
		color: white;
		font-size: 20px;
		background-color: #2c95dc;
		box-shadow: 0 3px 0 #09466f;
		margin-bottom: 30px;
		padding-left: 20px;
				}
		#commentSubmit:hover {
		background-color: #09466f;

		}

		p{
		font-size: 18px;
		color: gray;
		padding-bottom: 15px;
		padding-top: 15px;
		}
		p1{
		font-size: 18px;
		padding-top: 20px;
		}

		h3.second_heading{
		margin-left: 0;
		margin-top: 30px;
		font-size: 20px;
		width: 250px;
		height: 50px;
		padding-top: 10px;
		padding-left: 55px;

		}
		#middle{
		border: 1px solid lightgray;
		width: 1000px;
		height: 200px;
		background-color: lightyellow;
		margin-left: 45px;
		text-align: left;
		margin-top: 10px;
		box-shadow: 0 2px 0 lightgray;
		}
		.blank{
		border-bottom: 7px solid steelblue;
		margin-top: 50px;
		margin-left: 50px;
		margin-right: 100px;
		width: 800px;
		}

		#inner_reply{

		margin-left: 800px;
		margin-top: 160px;
		width: 100px;
		height: 30px;
		background-color: #2c95dc;
		text-align: center;
		font-size: 18px;
		color: white;
		border-radius: 18px;
		}

    </style>
</head>
<body>


<div class="container-fluid">
	<a href="http://localhost:8000/object/create" type="button" class="btn btn-outline-elegant waves-effect btn-sm"> <i class="fa fa-plus-circle" aria-hidden="true"></i> Create</a>
  <div class="row content">
    <div class="col-sm-3 sidenav">
      <h4>Trending Questions</h4>
      <ul class="nav nav-pills nav-stacked">
      	<ul>
        <li class="active"><a href="#section1">What is the most used 3D model?</a></li>
        <li><a href="#section2">Is it worth learning 3D modelling?</a></li>
        <li><a href="#section3">How about community for 3D modelling in the world?</a></li>
        <li><a href="#section3">My uploaded 3D model is not rotating. Can anyone help me please?</a></li></ul>
      </ul><br>
      <div class="input-group">
        <input type="text" class="form-control" placeholder="Search Blog..">
        <span class="input-group-btn">
          <button class="btn btn-default" type="button">
            <span class="glyphicon glyphicon-search"></span>
          </button>
        </span>
      </div>
    </div>

    <div class="col-sm-6">
      <hr>
      <h2>Loading interactive 3D module in iOS App [on hold]</h2>
      <h5><span class="glyphicon glyphicon-time"></span> Post by Jane Dane, Sep 27, 2015.</h5>
      
      <br>
      <br><br>

      <div class="panel panel-white post panel-shadow">
                <div class="post-heading">
                    <div class="pull-left image">
                        <img src="http://bootdey.com/img/Content/user_1.jpg" class="img-circle avatar" alt="user profile image">
                    </div>
                    <div class="pull-left meta">
                        <div class="title h5">
                            <a href="#"><b>Jane Dane</b></a>
                            
                        </div>
                        <h6 class="text-muted time">1 minute ago</h6>
                    </div>
                </div> 
                <div class="post-description"> 
                    <p>Ok so I have a project for my high school speech class were I have to interview someone who has the same job that I want when I get older so if anyone here does like 3D modeling for games I would like you to please answer these basic questions.
Don't worry will not mention your name in the speech if you use your name in tom's hardware.<br>

1. Is the job fun or does it get boring after while?<br>
2. Do you usually work on one project by yourself or do you work on one thing with multiple people?<br>
3. Do you specialize and work on one type of model (characters, basic objects, scenery, etc) or do you work on anything assigned?</p>
                    <div class="stats">
                        <a href="#" class="btn btn-default stat-item">
                            <i class="fa fa-thumbs-up icon"></i>2
                        </a>
                        <a href="#" class="btn btn-default stat-item">
                            <i class="fa fa-thumbs-down icon"></i>12
                        </a>
                    </div>
                </div>
            </div>
            <div class="container">


			<!-------Wrap------------>
		
			<br>
            <h2>Express your Idea</h2>
			<p>Your email address will not be published. Required fields are marked *</p>

			<!------------Form Start---------->

			<div id='form'>
			<div class="row">
			<div class="col-md-12">

			<form action="{{ route('reply.store') }}" method="POST" id="commentform">

				{{ csrf_field() }}
            <div id="comment-name" class="form-row">
			<input type = "text" placeholder = "Email (required)" name = "dname"  id = "name" >
			</div>
		
			
			<div id="comment-message" class="form-row">
			<textarea name = "comment" placeholder = "Message" id = "comment" ></textarea>
			</div>
			<a href="#"><input type="submit" name="dsubmit" id="commentSubmit" value="Submit"></a>
			<input style="width: 30px" type="checkbox" value="1" name="subscribe" id="subscribe" checked="checked">
			
			</form>

			</div>
			</div>
			</div>
			</div>


        
</div>
</div>
</body>
</html>
