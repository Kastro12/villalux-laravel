<div class="header">
@include('inc.header')
    <!--  CAROUSEL   -->

    <div id="carouselExampleIndicators" class="my-c carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" src="{{asset('storage/images/slika3.jpeg')}}" alt="First slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="{{asset('storage/images/slika1.jpeg')}}" alt="Second slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="{{asset('storage/images/slika2.jpeg')}}" alt="Third slide">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

</div>