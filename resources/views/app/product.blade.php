@extends('layouts.master')
@section('title', 'Home')

@section('main')
		<x-flash-msg />

		<div class="my-10 flex flex-wrap gap-5 md:gap-3">
				<div class="w-full md:w-6/12">
						<div>
								<img src="{{ $product->image }}" alt="{{ $product->title }}" class="w-full rounded-lg">
						</div>
				</div>
				<div class="w-full md:w-5/12">
						<ul class="space-y-5 capitalize">
								<li class="flex items-center justify-between flex-wrap gap-3">
										<span class="text-xl font-bold">product name :</span>
										<span class="text-base font-bold">{{ $product->title }}</span>
								</li>
								<li class="flex items-center justify-between">
										<span class="text-xl font-bold">price :</span>
										<span class="text-base font-bold">{{ moneyFormat($product->price) }}</span>
								</li>
								<li class="flex items-center justify-between">
										<span class="text-xl font-bold">stock :</span>
										<span class="badge-primary badge text-base font-bold">{{ $product->stock }}</span>
								</li>
								<li class="flex items-center justify-between flex-wrap gap-5">
										<span class="text-xl font-bold">description :</span>
										<span class="text-base font-bold">{{ $product->description }}</span>
								</li>
								<li class="flex items-center justify-between">
										<a href="{{ route('basket.add', $product->slug) }}" class="btn-primary btn">
												add to cart
										</a>
								</li>
						</ul>
				</div>
		</div>

@endsection
