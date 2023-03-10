@extends('layouts.master')
@section('title', 'Home')

@section('main')

		<div class="hero my-3 min-h-screen rounded-lg bg-base-200">
				<div class="hero-content text-center text-white">
						<div>
								<h1 class="text-4xl font-bold capitalize leading-[3.5rem] md:text-5xl">
										welcome to our sticker online shop
								</h1>
								<p class="py-6 text-xl font-bold capitalize">
										get the best product at your home
								</p>
								<button class="btn-primary btn">Get Started</button>
						</div>
				</div>
		</div>

		<div class="my-3 grid grid-cols-[repeat(auto-fill,minmax(250px,1fr))] justify-items-center gap-3">
				<x-cards></x-cards>
		</div>

@endsection
