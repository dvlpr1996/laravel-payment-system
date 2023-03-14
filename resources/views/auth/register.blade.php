@extends('auth.layouts.master')
@section('body', 'py-4 sm:py-0')
@section('title', 'Registeration')

@section('main')
		<div class="mx-auto flex min-h-screen max-w-5xl items-center justify-center bg-base-100">
				<div class="card w-[500px] bg-base-200 shadow-2xl">

						@if ($errors->any())
								<div class="">
										<ul>
												@foreach ($errors->all() as $error)
														<li>{{ $error }}</li>
												@endforeach
										</ul>
								</div>
						@endif

						<h3 class="mt-3 text-center text-3xl font-light capitalize">
								registeration
						</h3>

						<form action="{{ route('register') }}" method="POST">
								@csrf

								<div class="card-body">
										<div class="flex flex-col items-center justify-between gap-3 sm:flex-row">
												<div class="form-control w-full">
														<label class="label">
																<span class="label-text">First Name</span>
														</label>
														<input type="text" placeholder="First Name" class="input-bordered input" name="fname">
												</div>

												<div class="form-control w-full">
														<label class="label">
																<span class="label-text">Last Name</span>
														</label>
														<input type="text" placeholder="Last Name" class="input-bordered input" name="lname">
												</div>
										</div>

										<div class="flex flex-col items-center justify-between gap-3 sm:flex-row">
												<div class="form-control w-full">
														<label class="label">
																<span class="label-text">phone number</span>
														</label>
														<input type="tel" placeholder="phone number" class="input-bordered input" name="tel">
												</div>

												<div class="form-control w-full">
														<label class="label">
																<span class="label-text">email</span>
														</label>
														<input type="email" placeholder="email address" class="input-bordered input" name="email">
												</div>
										</div>

										<div class="form-control">
												<label class="label">
														<span class="label-text">Password</span>
												</label>
												<input type="Password" placeholder="password" class="input-bordered input" name="password">
										</div>

										<div class="form-control">
												<label class="label">
														<span class="label-text">confirm Password</span>
												</label>
												<input type="Password" placeholder="confirm password" class="input-bordered input"
														name="password_confirmation">
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
