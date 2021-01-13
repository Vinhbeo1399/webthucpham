
@extends('frontend.layouts.main')

@section('content')

    <section id="home-section" class="hero">
        <!-- Hoạt ảnh động -->
        <div class="home-slider owl-carousel">
            @foreach($banners as $banner)
                <div class="slider-item" style="background-image: url({{ asset($banner->image) }});">
                <div class="overlay"></div>
                <div class="container">
                    <div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">
                        <div class="col-md-12 text-center">
                            <h1 class="mb-2">{{$banner->title}}</h1>
                            <h2 class="subheading mb-4">Chúng tôi cung cấp các loại rau, củ &amp; hoa quả hữu cơ</h2>
                            <p><a href="{{ route('shop.product') }}" class="btn btn-primary">Chi tiết</a></p>
                        </div>

                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </section>

    <section class="ftco-section">
        <div class="container">
            <div class="row no-gutters ftco-services">
                <div class="col-md-3 text-center d-flex align-self-stretch ftco-animate">
                    <div class="media block-6 services mb-md-0 mb-4">
                        <div class="icon bg-color-1 active d-flex justify-content-center align-items-center mb-2">
                            <span class="flaticon-shipped"></span>
                        </div>
                        <div class="media-body">
                            <h3 class="heading">Free Shipping</h3>
                            <span>On order over $100</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 text-center d-flex align-self-stretch ftco-animate">
                    <div class="media block-6 services mb-md-0 mb-4">
                        <div class="icon bg-color-2 d-flex justify-content-center align-items-center mb-2">
                            <span class="flaticon-diet"></span>
                        </div>
                        <div class="media-body">
                            <h3 class="heading">Always Fresh</h3>
                            <span>Product well package</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 text-center d-flex align-self-stretch ftco-animate">
                    <div class="media block-6 services mb-md-0 mb-4">
                        <div class="icon bg-color-3 d-flex justify-content-center align-items-center mb-2">
                            <span class="flaticon-award"></span>
                        </div>
                        <div class="media-body">
                            <h3 class="heading">Superior Quality</h3>
                            <span>Quality Products</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 text-center d-flex align-self-stretch ftco-animate">
                    <div class="media block-6 services mb-md-0 mb-4">
                        <div class="icon bg-color-4 d-flex justify-content-center align-items-center mb-2">
                            <span class="flaticon-customer-service"></span>
                        </div>
                        <div class="media-body">
                            <h3 class="heading">Support</h3>
                            <span>24/7 Support</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

{{--    <section class="ftco-section ftco-category ftco-no-pt">--}}
{{--        <div class="container-fluid">--}}
{{--            <div class="row">--}}
{{--                <div class="col-md-12">--}}
{{--                    <div class="row">--}}
{{--              --}}{{--          <div class="col-md-6 order-md-last align-items-stretch d-flex">--}}
{{--                            <div class="category-wrap-2 ftco-animate img align-self-stretch d-flex" style="background-image: url(frontend/images/category.jpg);">--}}
{{--                                <div class="text text-center">--}}
{{--                                    <h2>Các loại Rau củ</h2>--}}
{{--                                    <p>Bảo vệ sức khỏe cho mọi gia đình</p>--}}
{{--                                    <p><a href="#" class="btn btn-primary">Mua hàng ngay</a></p>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--     --}}{{--                   <div class="col-md-6">--}}
{{--                            @foreach($categories as $category)--}}
{{--                                <div class="category-wrap ftco-animate img mb-4 d-flex align-items-end" style="background-image: url({{ asset($category->image) }});">--}}
{{--                                <div class="text px-3 py-1">--}}
{{--                                    <h2 class="mb-0"><a href="#">{{ $category->name }}</a></h2>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            @endforeach--}}
{{--                        </div>--}}
{{--                            @foreach($categories as $item)--}}
{{--                                @if($item->parent_id == 0 && $item->type == 1)--}}
{{--                                <div class="col-md-3">--}}
{{--                                        <div class="category-wrap ftco-animate img mb-4 d-flex align-items-end" style="background-image: url({{ asset($item->image) }});">--}}
{{--                                        <div class="text px-3 py-1">--}}
{{--                                            <h2 class="mb-0"><a href="{{ route('shop.category', ['slug' => $item->slug]) }}">{{ $item->name }}</a></h2>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                @endif--}}
{{--                            @endforeach--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}
    <section class="ftco-section ftco-category ftco-no-pt">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-md-6 order-md-last align-items-stretch d-flex">
                            <div class="category-wrap-2 ftco-animate img align-self-stretch d-flex" style="background-image: url(../frontend/images/category.jpg) ;">
                                <div class="text text-center">
                                    <h2>Vegetables</h2>
                                    <p>Protect the health of every home</p>
                                    <p><a href="{{route('shop.product')}}" class="btn btn-primary">Shop now</a></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            @foreach($menu as $item)
                                @if($item->type == 1 && $item->position == 1 )
                                    <div class="category-wrap ftco-animate img mb-4 d-flex align-items-end" style="background-image: url({{ asset($item->image) }});">
                                        <div class="text px-3 py-1">
                                            <h2 class="mb-0"><a href="{{route('shop.category' , ['slug' => $item->slug])}}">{{ $item->name }}</a></h2>
                                        </div>
                                    </div>
                                @endif
                                @if($item->type == 1 && $item->position == 2 )
                                    <div class="category-wrap ftco-animate img mb-4 d-flex align-items-end" style="background-image: url({{ asset($item->image) }});">
                                        <div class="text px-3 py-1">
                                            <h2 class="mb-0"><a href="{{route('shop.category' , ['slug' => $item->slug])}}">{{ $item->name }}</a></h2>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    @foreach($menu as $item)
                        @if($item->type == 1 && $item->position == 3)
                            <div class="category-wrap ftco-animate img mb-4 d-flex align-items-end" style="background-image: url({{asset($item->image)}});">
                                <div class="text px-3 py-1">
                                    <h2 class="mb-0"><a href="{{route('shop.category' , ['slug' => $item->slug])}}">{{$item->name}}</a></h2>
                                </div>
                            </div>
                        @endif
                        @if($item->type == 1 && $item->position == 4)
                            <div class="category-wrap ftco-animate img mb-4 d-flex align-items-end" style="background-image: url({{asset($item->image)}});">
                                <div class="text px-3 py-1">
                                    <h2 class="mb-0"><a href="{{route('shop.category' , ['slug' => $item->slug])}}">{{$item->name}}</a></h2>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center mb-3 pb-3">
                <div class="col-md-12 heading-section text-center ftco-animate">
                    <span class="subheading">Các sản phẩm nổi bật</span>
                    <h2 class="mb-4">Sản phẩm của chúng tôi</h2>
                    <p>Luôn luôn đem tới cho các bạn sản phẩm có chất lượng tốt nhất</p>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                @foreach($hotProducts as $product)
                        <div class="col-md-6 col-lg-3">
                            <div class="product">
                                <a href="{{ route('shop.productDetails',['slug' => $product->slug]) }}" class="img-prod"><img class="img-fluid" src="{{ asset($product->image)}}" style="height: 253px" alt="Colorlib Template">
                                    <div class="overlay"></div>
                                </a>
                                <div class="text py-3 pb-4 px-3 text-center">
                                    <h3><a href="{{ route('shop.productDetails',['slug' => $product->slug]) }}">{{ $product->name }}</a></h3>
                                    <div class="d-flex">
                                        <div class="pricing">
                                            <p class="price"><span class="mr-2 price-dc">{{ number_format($product -> price,0,",",".") }} đ</span><span>{{ number_format($product -> sale,0,",",".") }} đ</span></p>
                                        </div>
                                    </div>
                                    <div class="bottom-area d-flex px-3">
                                        <div class="m-auto d-flex">
                                            <a href="{{ route('shop.productDetails',['slug' => $product->slug]) }}" class="add-to-cart d-flex justify-content-center align-items-center text-center">
                                                <ion-icon name="information-outline" size="small"></ion-icon>
                                            </a>
                                            <a href="#" class="buy-now d-flex justify-content-center align-items-center mx-1">
                                                <span><i class="ion-ios-cart"></i></span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                @endforeach
            </div>
        </div>
    </section>

{{--    <section class="ftco-section img" style="background-image: url(frontend/images/bg_3.jpg);">--}}
{{--        <div class="container">--}}
{{--            <div class="row justify-content-end">--}}
{{--                <div class="col-md-6 heading-section">--}}
{{--                    <span class="subheading">Giá tốt nhất dành cho bạn</span>--}}
{{--                    <h2 class="mb-4">Sản phẩm trong ngày</h2>--}}
{{--                    <p>Luôn luôn đem tới cho các bạn sản phẩm có chất lượng tốt nhất</p>--}}
{{--                    <h3><a href="#">Hành lá, rau cải, rau xà lách, mướp đắng</a></h3>--}}
{{--                    <span class="price">Giá hấp dẫn chỉ còn <a href="#"> 25.000 đ</a></span>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}
    <section class="ftco-section testimony-section" style="padding: 0; padding-top: 3em">
        <div class="container-fluid text-center">
            <span class="subheading"
                  style="    font-size: 35px;display: block;margin-bottom: 10px;font-style: italic;font-family:Georgia, serif; color: #82ae46;">
                Thương hiệu</span>
            <div class="row justify-content-center">
                <div class="col-md-10 mb-5 text-center">
                    <ul class="product-category">
                        @foreach($brands as $brand)
                            <li style="margin: 0px 20px 0px 20px;border: 1px solid #eeeeee;"><a href=""><img src="{{ asset($brand->image) }}" alt="" width="80px"></a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')
    <script>
        $('.owl-carousel').owlCarousel({
            loop:true,
            margin:10,
            nav:true,
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:3
                },
                1000:{
                    items:5
                }
            }
        })
    </script>
@endsection
