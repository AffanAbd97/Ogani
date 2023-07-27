@extends('layouts.template')

@section('content')
    <!-- Product Details Section Begin -->
    <section class="product-details spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="product__details__pic">
                        <div class="product__details__pic__item">
                            @if (file_exists(public_path('image' . '/' . $products->gambar)))
                                <img class="product__details__pic__item--large"
                                    src="{{ asset('image/' . $products->gambar) }}" alt="">
                            @else
                                <img class="product__details__pic__item--large" src="{{ $products->gambar }}" alt="">
                            @endif

                        </div>

                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="product__details__text">
                        <h3>{{ $products->nama }}</h3>
                        <div href="" class="product__details__rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-half-o"></i>
                            <span>(18 reviews)</span>
                        </div>
                        <div class="product__details__price">Rp. {{ number_format($products->harga) }}</div>
                        <p>{{ $products->deskripsi }}</p>
                        <div class="product__details__quantity">
                            <div class="quantity">
                                <div class="pro-qty">
                                    <input type="text" value="1">
                                </div>
                            </div>
                        </div>
                        <a href="/cart/{{ $products->id }}" class="primary-btn">ADD TO CARD</a>
                        <a href="#" class="heart-icon"><span class="icon_heart_alt"></span></a>
                        <ul>
                            <li><b>Availability</b> <span>In Stock</span></li>
                            <li><b>Shipping</b> <span>01 day shipping. <samp>Free pickup today</samp></span></li>
                            <li><b>Weight</b> <span>0.5 kg</span></li>
                            <li><b>Share on</b>
                                <div class="share">
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                    <a href="#"><i class="fa fa-instagram"></i></a>
                                    <a href="#"><i class="fa fa-pinterest"></i></a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>

        <div class="col-lg-12">
            <div class="product__details__tab">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="" id="tabs-1" role="tab"
                            aria-selected="false">Reviews <span></span></a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active " id="tabs-1" role="tabpanel">
                        <div class="product__details__tab__desc">
                            {{-- <h6 class="text-center">Review User</h6> --}}
                            <form action="/review" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="checkout__input">
                                    <p>Komentar<span>*</span></p>
                                    <textarea class="form-control" id="review" name="review" rows="4"></textarea>
                                </div>
                                @error('review')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <input type="hidden" id="produk_id" name="produk_id" value="{{$products->id}}" >
                                <div class="checkout__input">
                                    <p>Rating<span>*</span></p>
                                    <input class="form-control" id="skor" name="skor" placeholder="Rate (1-5)">
                                </div>
                                @error('skor')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                @enderror

                                <button href="" type="submit" class="site-btn">Review</button>
                            </form>
    
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </section>


    <!-- Product Details Section End -->

    {{-- <!-- Related Product Section Begin -->
    <section class="related-product">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title related__product__title">
                        <h2>Related Product</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($products as $product)
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="product__item">
                        <div class="product__item__pic set-bg" data-setbg="{{ $product->gambar }}">
                            <ul class="product__item__pic__hover">
                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <div class="product__item__text">
                            <h6><a href="#">{{ $product->nama }}</a></h6>
                            <h5>Rp. {{ number_format($product->harga) }}</h5>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- Related Product Section End --> --}}

    @push('script')
    <script src="https://cdn.tiny.cloud/1/00799zeprcot5j37bz733m0xyvdsybd7vvm19spjr60pkbuc/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
          selector: 'textarea',
          plugins: 'a11ychecker advcode casechange export formatpainter image editimage linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tableofcontents tinycomments tinymcespellchecker',
          toolbar: 'a11ycheck addcomment showcomments casechange checklist code export formatpainter image editimage pageembed permanentpen table tableofcontents',
          toolbar_mode: 'floating',
          tinycomments_mode: 'embedded',
          tinycomments_author: 'Author name',
        });
      </script>
    @endpush
@endsection
