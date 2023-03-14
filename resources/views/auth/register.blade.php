@extends('auth.layouts.master')
@section('body', 'py-4 sm:py-0')
@section('title', 'Registeration')

@section('main')
		<div class="mx-auto flex min-h-screen max-w-5xl items-center justify-center bg-base-100">
				<div class="card w-[500px] bg-base-200 shadow-2xl">

						<h3 class="mt-3 text-center text-3xl font-light capitalize">
								registeration
						</h3>

						<x-formErorr :errors="$errors"></x-formErorr>

						<form action="{{ route('register') }}" method="POST">
								@csrf
								<div class="card-body pt-1">
										<div class="flex flex-col items-center justify-between gap-3 sm:flex-row">
												<div class="form-control w-full">
														<x-lable>First Name</x-lable>
														<x-input type="text" place="First Name" name="fname"></x-input>
												</div>

												<div class="form-control w-full">
														<x-lable>Last Name</x-lable>
														<x-input type="text" place="Last Name" name="lname"></x-input>
												</div>
										</div>

										<div class="flex flex-col items-center justify-between gap-3 sm:flex-row">
												<div class="form-control w-full">
														<x-lable>phone number</x-lable>
														<x-input type="tel" place="phone number" name="tel"></x-input>
												</div>

												<div class="form-control w-full">
														<x-lable>email</x-lable>
														<x-input type="email" place="email address" name="email"></x-input>
												</div>
										</div>

										<div class="form-control">
												<x-lable>Password</x-lable>
												<x-input type="Password" place="Password" name="password">
												</x-input>
										</div>

										<div class="form-control">
												<x-lable>confirm Password</x-lable>
												<x-input type="Password" place="confirm password" name="password_confirmation"></x-input>
										</div>

										<div class="form-control mt-6">
												<button class="btn-primary btn" type="submit">
														register
												</button>
										</div>
								</div>
						</form>
				</div>
		</div>
@endsection
