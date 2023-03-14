@extends('auth.layouts.master')
@section('body', 'py-4 sm:py-0')
@section('title', 'login')

@section('main')
		<div class="mx-auto flex min-h-screen max-w-5xl items-center justify-center bg-base-100">
				<div class="card w-[500px] bg-base-200 shadow-2xl">

						<h3 class="mt-3 text-center text-3xl font-light capitalize">
								welcome back
						</h3>

						<x-formErorr :errors="$errors"></x-formErorr>

						<form action="{{ route('login') }}" method="POST">
								@csrf
								<div class="card-body">
										<div class="form-control w-full">
												<x-lable>email</x-lable>
												<x-input type="email" place="email address" name="email"></x-input>
										</div>

										<div class="form-control w-full">
												<x-lable>password</x-lable>
												<x-input type="password" place="password" name="password"></x-input>
										</div>

										<div class="form-control mt-6">
												<button class="btn-primary btn" type="submit">
														login
												</button>
										</div>
								</div>
						</form>
				</div>
		</div>
@endsection
