
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
    <a class="navbar-brand" href="#">
          <img src="http://placehold.it/150x50?text=Logo" alt="">
    </a>
  <a class="navbar-brand">YouTube</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarsExampleDefault">
  
    <form class="form-inline my-2 my-lg-0 right">
      <input class="form-control mr-sm-2" type="text" id="search_field" placeholder="Search" aria-label="Search">
      <button class="btn btn-secondary my-2 my-sm-0" id="yt_search" type="button">Search</button>
    </form>
 
  </div>
</nav>


<main style="margin-top:100px;" role="main" class="container">
  <div>  
        <div id="result" >
          <div class="row"></div>
        </div>
  </div> 
</main>


<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
      <script src="/docs/4.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-1CmrxMRARb6aLqgBO7yyAxTOQE2AKb9GfXnEo760AUcUmFx3ibVJJAzGytlQcNXd" crossorigin="anonymous"></script></body>


      <script type="text/javascript">

//document.addEventListener('DOMContentLoaded',function(){
var key_id = "AIzaSyBeToWz-t7fHQbINk0MqpS4amOXGbYQXWU";
var part = "snippet";

var maxResults = 20;

   $('#yt_search').click(function(){
     var q = document.getElementById('search_field').value;
     var ajaxurl = 'https://www.googleapis.com/youtube/v3/search?part='+part+'&key='+key_id+'&q='+q;
     console.log(ajaxurl);

      $.ajax({
        type: "GET",
        url: ajaxurl,
        dataType:"jsonp",
        success: function(response){
        //console.log(response);

          if(response.items){
            $("#result > .row").empty();
            $.each(response.items, function(i,items){

              //console.log(items);

              var video_id=items.id.videoId;
              var video_title=items.snippet.title;
              // IFRAME Embed for YouTube
              var video_frame="<div class='col-md-6 col-xs-12'><iframe width='100%' height='385' src='http://www.youtube.com/embed/"+video_id+"' frameborder='0' type='text/html'></iframe></div>";
              $("#result > .row").append(video_frame); // Result

             });
          }
          else{
            $("#result > .row").html("<div id='no'>No Video</div>");
          }
        }
      });


  //});
});
</script>

</body>
</html>
