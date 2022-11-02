<div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
    <div class="carousel-inner">
        @foreach ($slider as $key => $sliderItem)
            <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                @if ($sliderItem->image)
                    <img src="{{ asset("$sliderItem->image") }}" class="d-block w-100" style="height:500px;" alt="...">
                @endif
                <div class="carousel-caption d-none d-md-block">
                    <div class="custom-carousel-content">
                        <h1>
                            <span>
                                <b> {!! $sliderItem->title !!}
                                </b>
                            </span>
                        </h1>
                        <p>
                        <h3> {!! $sliderItem->description !!}.</h3>
                        </p>
                        <div>
                            <a href="#" class="btn btn-slider">
                                Get Now
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

<style>
    .carousel-item .custom-carousel-content {
        width: 50%;
        transform: translate(0%, -10%);
    }

    .custom-carousel-content {
        text-align: start;
    }

    .custom-carousel-content h1 {
        font-size: 40px;
        font-weight: 700;
        color: #fff;
        margin-bottom: 30px;
    }

    .custom-carousel-content h1 span {
        color: #fbff00;
    }

    .custom-carousel-content p {
        font-size: 18px;
        font-weight: 400;
        color: #fff;
        margin-bottom: 30px;
    }

    .custom-carousel-content .btn-slider {
        border: 1px solid #fff;
        border-radius: 0px;
        padding: 8px 26px;
        color: #fff;
        font-size: 18px;
        font-weight: 600;
        letter-spacing: 0.5px;
    }
</style>
