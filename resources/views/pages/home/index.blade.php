
<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>DonateYourBlood</title>

        <!-- Fonts -->
        <link href="{{ asset('fonts/fonts.css') }}" rel="stylesheet" type="text/css">

<!--
        <script src="https://code.jquery.com/jquery-3.3.1.min.js" crossorigin="anonymous"></script>

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" crossorigin="anonymous">

        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" crossorigin="anonymous"></script>-->


<link rel="stylesheet" href="{{ asset('bootstrap/bootstrap.min.css') }}" crossorigin="anonymous">

        <script src="{{ asset('bootstrap/jquery-3.3.1.min.js') }}" crossorigin="anonymous"></script>
        

        <link rel="stylesheet" href="{{ asset('font_awesome/font_awesome.css') }}" crossorigin="anonymous">

       

    </head>
    <body color="cyan;">


@include('layouts.header')

@section('title', 'Page Title')

@section('header')
  @parent


@endsection

@section('content')
 
@endsection



   
<!--

        <div class="row text-center">
            <div class="col-lg-1 col-md-1 col-sm-4 col-xs-12">
                <i class="fab fa-facebook"></i>
            </div>
            <div class="col-lg-11 col-md-11 col-sm-8 col-xs-12 text-left">
                <a href="{{ route('home') }}"><i class="fas fa-home"></i> home</a>
                <a href="{{ route('hello') }}"><i class="fas fa-comment"></i> hello</a>
            </div>
        </div>

        <h3 class="text-center">home page</h3>-->


<!-- каточка 
<div class="card-deck">
  <div class="card">
    <img class="card-img-top" src="{{ asset('img/unnamed.jpg') }}" alt="Card image cap">
    <div class="card-body">
      <h5 class="card-title">Про проект</h5>
      <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
      <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
    </div>
  </div>


</div>
 -->

<!--
<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="{{ asset('img/card.jpg') }}" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="{{ asset('img/card.jpg') }}" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="{{ asset('img/card.jpg') }}." alt="Third slide">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
  -->




@include('layouts.footer')

@section('title', 'Page Title')

@section('footer')
  @parent


@endsection

@section('content')
 
@endsection


   



    </body>
</html>


