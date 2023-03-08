@extends('layouts.master')
@section('title', 'Home')

@section('main')

		<div class="hero my-3 min-h-screen rounded-lg bg-base-200">
				<div class="hero-content text-center">
						<div>
								<h1 class="text-5xl font-light capitalize leading-[3.5rem] md:leading-none">
										welcome to our online shop
								</h1>
								<p class="py-6 text-2xl capitalize">
										get the best product at your home
								</p>
								<button class="btn-primary btn">Get Started</button>
						</div>
				</div>
		</div>

		<div class="grid grid-cols-[repeat(auto-fill,minmax(250px,1fr))] gap-3 my-3 justify-items-center">
				<x-cards></x-cards>
		</div>

@endsection
