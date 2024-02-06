<!-- ======= Hero Slider Section ======= -->

@extends('layouts.master')
@section('title')
    Trang chủ
@endsection
@section('content')
    <!-- ======= Hero Slider Section ======= -->
    <section id="hero-slider" class="hero-slider">
        <div class="container-md" data-aos="fade-in">
            <div class="row">
                <div class="col-12">
                    <div class="swiper sliderFeaturedPosts">
                        <div class="swiper-wrapper">
                            @php
                            $slides = (new \Asus\Mvcoop\Models\Slide)->getForSlide();
                        @endphp
                            @foreach($postSlideNew as $slide)
                            <div class="swiper-slide">
                                <a href="single-post.html" class="img-bg d-flex align-items-end"
                                    style="background-image: url('{{ $slide['image'] }}');">
                                    <div class="img-bg-inner">
                                        <h2>{{ $slide['title'] }}</h2>
                                        <p>{{ $slide['text'] }}</p>
                                    </div>
                                </a>
                            </div>
                            @endforeach
                        </div>
                        <div class="custom-swiper-button-next">
                            <span class="bi-chevron-right"></span>
                        </div>
                        <div class="custom-swiper-button-prev">
                            <span class="bi-chevron-left"></span>
                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- End Hero Slider Section -->
    <!-- ======= Post Grid Section ======= -->
    <section id="posts" class="posts">
        <div class="container" data-aos="fade-up">
            <div class="row g-5">
                <div class="col-lg-4">
                    @include('components.post-entry-1', ['post' => $postFirstLatest])
                </div>

                <div class="col-lg-8">
                    <div class="row g-5">


                        @foreach ($postTop6Chunk as $item)
                            <div class="col-lg-6 border-start custom-border">
                                @foreach ($item as $post)
                                    @include('components.post-entry-1', [
                                        'post' => $post,
                                        'hiddenAuthor' => false,
                                        'hiddenExcerpt' => false,
                                    ])
                                @endforeach
                            </div>
                        @endforeach
                    </div>
                </div>

            </div> <!-- End .row -->
        </div>
    </section> <!-- End Post Grid Section -->
@endsection
