@extends('common.dinavbar')

@section('content')
 <!-- Product filter section -->
	<section class="product-filter-section">
		<div class="container">
			<div class="section-title">
				<h2>Select Size</h2>
			</div>
			<ul class="product-filter-menu text-center">
				<li><a href="{{$category}}/16">16</a></li>
                <li><a href="{{$category}}/18">18</a></li>
                <li><a href="{{$category}}/20">20</a></li>
                <li><a href="{{$category}}/22">22</a></li>
                <li><a href="{{$category}}/24">24</a></li>
                <li><a href="{{$category}}/26">26</a></li>
                <li><a href="{{$category}}/28">28</a></li>
                <li><a href="{{$category}}/30">30</a></li>
                <li><a href="{{$category}}/32">32</a></li>
                <li><a href="{{$category}}/34">34</a></li>
			</ul>
			
			
		</div>
	</section>
@endsection