
@foreach($posts as $post)
{{ $post->title }}
{{ $post->description}}
@endforeach



<!DOCTYPE html>
<html lang="en">
<head>
  <title>Welcome to Forum</title>
<!-- 

<script language="JavaScript">
    function showInput() {
        document.getElementById('display').innerHTML = 
                    document.getElementById("user_input").value;
    }
</script>
 -->

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
			        <a href="#" type="button" class="btn btn-outline-elegant waves-effect btn-sm"> <i class="fa fa-search prefix" aria-hidden="true"></i>Search</a>
			      </div>

			    </div>
                
			    <div class="col-sm-6">
                    
			    	<h2>Sculpting or Polygon Modelling / Box Modelling?</h2>
			      <hr>
			      
			      <br>

			      <div class="panel panel-white post panel-shadow">
			                <div class="post-heading">	            
			                        <div class="title h5">
			                            <a href="#"><b>Jane Dane</b></a>
			                            <div class="box-body">
                                <table id="data1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>Reply Count</th>

                                        <th>Views</th>
                                        <th>Category</th>
                                        
                                    </tr>
                                    </thead>
                                </table>
                        </div>
			                        </div>
			                    </div>
			                </div> 
			                <div class="post-description">
		                    <p>Ok so I have a project for my high school speech class were I have to interview someone who has the same job that I want when I get older so if anyone here does like 3D modeling for games I would like you to please answer these basic questions.
		Don't worry will not mention your name in the speech if you use your name in tom's hardware.<br>

		1. Is the job fun or does it get boring after while?<br>
		2. Do you usually work on one project by yourself or do you work on one thing with multiple people?<br>
		3. Do you specialize and work on one type of model (characters, basic objects, scenery, etc) or do you work on anything assigned?</p>
			                   
			                </div>
	                         <!--<textarea id="wmd-input" class="wmd-input processed" name="post-text" cols="92" rows="15" tabindex="101" data-min-length="" data-gramm="true" data-txt_gramm_id="d01d20f7-e9e5-ef92-b184-8191e444d488" data-gramm_id="d01d20f7-e9e5-ef92-b184-8191e444d488" spellcheck="false" data-gramm_editor="true" style="background: transparent none repeat scroll 0% 0% !important; z-index: auto; position: relative; line-height: 18.2px; font-size: 14px; transition: none 0s ease 0s; opacity: 1; height: 200px;"></textarea>-->
                        <label><b><strong>Add new post</strong></b></label>
                        <form action="{{ route('post.store') }}" methods="post">
                        	{{ csrf_field() }}
                        	<div class="form-group">
                        		<textarea class="form-control" name="body" id="new-post" rows="10" placeholder="Enter your new post"></textarea>
                        	</div>
							
							<input type="submit"><br/>
							<p><span id='display'></span></p>


						</form>



			            </div>
			        
			        </div>


</body>
</html>
