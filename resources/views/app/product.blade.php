@extends('layouts.master')
@section('title', 'Home')

@section('main')

		<div class="my-10 flex flex-wrap items-center gap-5">
				<div class="w-full md:w-6/12">
						<div>
								<img src="{{ $product->image }}" alt="{{ $product->title }}"
                 class="rounded-lg w-full h-44">
						</div>
				</div>
				<div class="w-full md:w-5/12">
						<ul class="space-y-5 capitalize">
								<li class="flex items-center justify-between">
										<span class="text-xl font-bold">product name :</span>
										<span class="text-base font-bold">{{ $product->title }}</span>
								</li>
								<li class="flex items-center justify-between">
										<span class="text-xl font-bold">price :</span>
										<span class="text-base font-bold">{{ $product->price }}</span>
								</li>
								<li class="flex items-center justify-between">
										<span class="text-xl font-bold">stock :</span>
										<span class="badge-primary badge text-base font-bold">{{ $product->stock }}</span>
								</li>
								<li class="flex items-center justify-between">
										<span class="text-xl font-bold">description :</span>
										<span class="text-base font-bold">{{ $product->description }}</span>
								</li>
						</ul>
				</div>
		</div>

@endsection
