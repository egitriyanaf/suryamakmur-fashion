@extends('layouts.ecommerce')

@section('title')
    <title>Surya Makmur Ecommerce - Pusat Belanja Fashion Online</title>
@endsection

@section('content')
    <section class="home_banner_area">
        <div class="overlay"></div>
            <div class="banner_inner d-flex align-items-center">
                <div class="container">
                    <div class="banner_content row">
                        <div class="offset-lg-2 col-lg-8">
                            <h3>Fashion for
                                <br />Upcoming Winter</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna
                                aliqua. Ut enim ad minim veniam, quis nostrud exercitation.</p>
                            <a class="white_bg_btn" href="#">View Collection</a>
                        </div>
                    </div>
                </div>
            </div>
    </section>
{{-- end home banner area --}}

{{-- hot deals area --}}
<section class="hot_deals_area section_gap">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6">
                <div class="hot_deal_box">
                    <img class="img-fluid" src="{{ asset('ecommerce/img/product/hot_deals/deal1.jpg') }}" alt="">
                    <div class="content">
                        <h2>Hot Deals of this Month</h2>
                        <p>shop now</p>
                    </div>
                    <a class="hot_deal_link" href="#"></a>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="hot_deal_box">
                    <img class="img-fluid" src="{{ asset('ecommerce/img/product/hot_deals/deal1.jpg') }}" alt="">
                    <div class="content">
                        <h2>Hot Deals of this Month</h2>
                        <p>shop now</p>
                    </div>
                    <a class="hot_deal_link" href="#"></a>
                </div>
            </div>
        </div>
    </div>
</section>
{{-- end hot deals area --}}

{{-- feature product area --}}
<section class="feature_product_area section_gap">
    <div class="main_box">
        <div class="container-fluid">
            <div class="row">
                <div class="main_title">
                    <h2>Produk Terbaru</h2>
                    <p>Tampil trendi dengan kumpulan produk kekinian kami.</p>
                </div>
            </div>
            <div class="row">
                @forelse($products as $row)
					<div class="col col1">
						<div class="f_p_item">
							<div class="f_p_img">
                                <img class="img-fluid" src="{{ asset('storage/products/' . $row->image) }}" alt="{{ $row->name }}">
								<li class="nav-item">
									<a href="{{ route('front.list_cart') }}" class="icons">
										<i class="lnr lnr lnr-cart"></i>
									</a>
								</li>
							</div>
                            <a href="{{ url('/product/'. $row->slug) }}">
                                <h4>{{ $row->name }}</h4>
                            </a>
                            <h5>Rp {{ number_format($row->price) }}</h5>
						</div>
					</div>
                @empty
                @endforelse
				</div>
                <div class="row">
					{{ $products->links() }}
				</div>
			</div>
		</div>
	</section>
{{-- end feature product area --}}
@endsection