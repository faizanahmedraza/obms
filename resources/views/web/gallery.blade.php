@extends('web.layouts.master')

@push('styles')
@endpush

@section('content')
    <!--Page Title-->
    <section class="page-title centred" style="background-image: url(assets/web/images/background/page-title-4.jpg);">
        <div class="auto-container">
            <div class="content-box clearfix">
                <h1>Gallery</h1>
                <ul class="bread-crumb clearfix">
                    <li><a href="index-2.html">Home</a></li>
                    <li>Gallery</li>
                </ul>
            </div>
        </div>
    </section>
    <!--End Page Title-->


    <!-- gallery-style-one -->
    <section class="gallery-style-one centred">
        <div class="auto-container">
            <div class="sec-title">
                <h5>Gallery</h5>
            </div>
            <div class="sortable-masonry">
                <div class="items-container row clearfix">
                    @forelse($gallery as $gall)
                        <div class="col-lg-4 col-md-6 col-sm-12 masonry-item small-column all real_estate">
                            <div class="gallery-block-one">
                                <div class="inner-box">
                                    <div class="image-box">
                                        <figure class="image"><img src="{{$gall->image}}" alt="">
                                        </figure>
                                        <a href="" class="lightbox-image"
                                           data-fancybox="gallery"><i class="icon-31"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                    @endforelse
                </div>
            </div>
        </div>
    </section>
    <!-- gallery-style-one end -->

@endsection

@push('scripts')
@endpush