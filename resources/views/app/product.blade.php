@extends('layouts.master')
@section('title', 'Home')

@section('main')

		<x-flash-msg />

		<div class="mt-5 sm:mt-10 flex gap-5 flex-wrap md:gap-3 min-h-screen">

				<div class="w-full md:w-6/12">
						<div>
								<img src="{{ $product->image }}" alt="{{ $product->title }}" class="w-full rounded-lg max-w-full max-h-full h-[300px] xs:h-auto">
						</div>
				</div>

				<div class="w-full md:w-5/12">
						<ul class="space-y-5 capitalize">
								<li class="flex flex-wrap items-center justify-between gap-3">
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
								<li class="flex flex-wrap items-center justify-between gap-5">
										<span class="text-xl font-bold">description :</span>
										<span class="text-base font-bold">{{ $product->description }}</span>
								</li>
								<li class="flex items-center justify-between">
										<a href="{{ route('basket.add', $product->slug) }}" class="w-full sm:w-[initial] btn-primary btn">
												add to cart
										</a>
								</li>
						</ul>
				</div>
		</div>

@endsection
