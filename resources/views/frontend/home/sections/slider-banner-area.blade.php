<div class="slider-with-banner mt-3">
    <div class="container">
        <div class="row">
            <!-- Begin Slider Area -->
            <div class="col-lg-8 col-md-8">
                <div class="slider-area pt-sm-30 pt-xs-30">
                    <div class="slider-active owl-carousel">
                        {{-- <div class="slider-progress"></div> --}}
                        @foreach ($sliders as $slider)   
                        <div class="single-slide align-center-left {{$loop->iteration % 2 == 0 ? 'animation-style-02' : 'animation-style-01'}}">
                            <div class="slider-progress"></div>
                            <img src="{{ asset($slider->banner) }}" alt="{{ $slider->title }}"  class="slider-image">
                            <div class="slider-content">
                                <h5>{{ $slider->type }}</h5>
                                <h2>{{ $slider->title }}</h2>
                                <h3>Starting at <span>${{ $slider->starting_price }}</span></h3>
                                <div class="default-btn slide-btn">
                                    <a class="links" href="{{ $slider->btn_url }}">Shop Now</a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <!-- Slider Area End Here -->

            <!-- Begin Banner Area -->
            <div class="col-lg-4 col-md-4 text-center pt-sm-30 pt-xs-30">
                <div class="li-banner">
                    <a href="#">
                        <img src="images/banner/1_1.jpg" alt="Banner 1">
                    </a>
                </div>
                <div class="li-banner mt-15 mt-md-30 mt-xs-25 mb-xs-5">
                    <a href="#">
                        <img src="images/banner/1_2.jpg" alt="Banner 2">
                    </a>
                </div>
            </div>
            <!-- Banner Area End Here -->
        </div>
    </div>
</div>
