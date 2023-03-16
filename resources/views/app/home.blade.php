@extends('layouts.master')
@section('title', 'Home')

@section('main')

		<div class="my-3">
				<div class="hero-main hero my-3 min-h-screen rounded-lg bg-base-200">
						<div class="hero-content text-center text-white">
								<div>
										<h1 class="text-4xl font-bold capitalize leading-[3.5rem] md:text-5xl">
												welcome to our sticker online shop
										</h1>
										<p class="py-6 text-xl font-bold capitalize">
												get the best product at your home
										</p>
										<a href="{{ route('index') }}" class="btn-primary btn">Get Started</a>
								</div>
						</div>
				</div>

				<x-cards></x-cards>
		</div>

@endsection
