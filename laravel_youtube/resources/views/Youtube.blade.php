
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.0.1">
    <title>Starter Template · Bootstrap</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/starter-template/">

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Favicons -->
<link rel="apple-touch-icon" href="/docs/4.5/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
<link rel="icon" href="/docs/4.5/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
<link rel="icon" href="/docs/4.5/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
<link rel="manifest" href="/docs/4.5/assets/img/favicons/manifest.json">
<link rel="mask-icon" href="/docs/4.5/assets/img/favicons/safari-pinned-tab.svg" color="#563d7c">
<link rel="icon" href="/docs/4.5/assets/img/favicons/favicon.ico">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/fontawesome.min.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css" />
<link type="text/css" rel="stylesheet" href="path_to/simplePagination.css"/>
<link rel="shortcut icon" href="/img/favicon.ico">
<meta name="msapplication-config" content="/docs/4.5/assets/img/favicons/browserconfig.xml">
<meta name="theme-color" content="#563d7c">


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <link href="starter-template.css" rel="stylesheet">
    

  </head>
  <body>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
    <a class="navbar-brand" href="/json-api">
          <img src="/img/yt_logo.png" alt="YouTube Logo" style="height:51px;">
    </a>
  <a class="navbar-brand" style="color:#fff;font-weight:bold;font-family: inherit;font-size: 33px;">YouTube</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarsExampleDefault">
  
    <form class="form-inline my-2 my-lg-0" style="margin-left:24%;">
      <input class="form-control mr-sm-2" type="text" style="width:500px;" id="search_field" placeholder="Search for your favorite videos" aria-label="Search">
      <button class="btn my-2 my-sm-0" id="yt_search" style="background-color:#CE2F2B;color:#fff" type="button"><i class="fa fa-search" aria-hidden="true"></i></button>
    </form>
 
  </div>
</nav>


<main role="main" class="container">
  <div style="margin-top:100px;">  
        <div id="result" >
          <div class="row"></div>
        </div>
  </div> 
</main>


<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script src="/docs/4.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-1CmrxMRARb6aLqgBO7yyAxTOQE2AKb9GfXnEo760AUcUmFx3ibVJJAzGytlQcNXd" crossorigin="anonymous"></script></body>
<script type="text/javascript" src="/css/jquery.simplePagination.js"></script>


<script type="text/javascript">

//document.addEventListener('DOMContentLoaded',function(){
var key_id = "AIzaSyBEdk9CDHtYM1jb11AJXmnlmsV9joYy5wI";
var part = "snippet";
var maxResults = 10;

   $('#yt_search').click(function(){
     var q = document.getElementById('search_field').value;
     var ajaxurl = 'https://www.googleapis.com/youtube/v3/search?part='+part+'&key='+key_id+'&q='+q+'&maxResults='+maxResults;
     //var ajaxurl = 'https://www.googleapis.com/youtube/v3/search?part='+part+'&key='+key_id+'&q='+q;
     //console.log(ajaxurl);

    if(q != ""){
          $.ajax({
            type: "GET",
            url: ajaxurl,
            dataType:"jsonp",
            success: function(response){
            //console.log(response);
            
              if(response.items){
                $("#result > .row").empty();
                $("#result > .desc").empty();
                $.each(response.items, function(i,items){
                  var video_id=items.id.videoId;
                  var video_title=items.snippet.title;
                  // IFRAME Embed for YouTube     
                  var video_frame="<div class='col-md-6 col-xs-12' style='margin-bottom:40px;'><iframe width='100%' height='385' src='http://www.youtube.com/embed/"+video_id+"' frameborder='0' type='text/html'></iframe><span align='center' style='font-weight:bold;font-size:22px;'>"+video_title+"</span></div>";
                  $("#result > .row").append(video_frame);
                });
              }
            }
          });
     }   
     else{
            $("#result > .row").empty();
            var blank_msg = "You just performed and empty search so we had nothing to show. Please try a new search!!"
            var blank_desc="<div style='font-size:40px;font-weight:bold;font-family:inherit;color:black;margin-top:270px;'>"+blank_msg+"</div>";
            $("#result > .row").append(blank_desc);
     } 

  //});
});
</script>

</body>
</html>
