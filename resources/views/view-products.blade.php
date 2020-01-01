@extends('common.dinavbar')

@section('content')
    
    <!-- Product filter section -->
	<section class="product-filter-section">
		<div class="container">
			
            @if ($product->count()>0)
            <div class="section-title">
				<h2>Products</h2>
            </div>
            <ul class="product-filter-menu text-center">
                <li><a data-filter='all'>All</a></li>
            @foreach (App\sub_category::all() as $subcategorie)
            <li><a data-filter='{{$subcategorie->sub_category}}'>{{$subcategorie->sub_category}}</a></li>
            @endforeach
            </ul>
            <div class="row filter-container">
            @foreach ($product as $item)
			    <div class="col-lg-3 col-sm-6 filtr-item" data-category="{{$item->sub_category}}">
					<div class="product-item">
						<div class="pi-pic">
                            <a href="{{asset($item->photho_path)}}" data-toggle="lightbox" data-gallery="example-gallery" data-type="image">
                            <img src="{{asset($item->photho_path)}}" alt="">
                             </a>
							<div class="pi-links">
								<a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
							</div>
						</div>
						<div class="pi-text">
							<h6>₹{{$item->price}}</h6>
                            <p>{{$item->company}}</p>
                            <p>{{$item->design_no}}</p>
						</div>
					</div>
				</div>
            @endforeach
            </div>
            @else
            <h1 class="text-center py-4">No products to show</h1>
            @endif
			
		</div>
	</section>
@endsection

@push('js')
    <script>
        $('.filter-container').filterizr({});
    </script>
@endpush

