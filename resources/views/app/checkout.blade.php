@extends('layouts.master')
@section('title', 'checkout')

@section('main')
		<div class="my-3 flex flex-col gap-5 md:flex-row">
				<div class="w-full md:w-7/12 lg:w-8/12">
						<div class="space-y-5 rounded-lg border border-neutral-content bg-base-200 p-5">
								<h3 class="text-2xl capitalize">user information</h3>
								<hr class="my-5">
								<ul class="space-y-6 capitalize">
										<li class="flex items-center justify-between border-b pb-3">
												<span class="capitalize">full name</span>
												<span>{{ auth()->user()->fullName() }}</span>
										</li>
										<li class="flex items-center justify-between border-b pb-3">
												<span class="capitalize">phone number</span>
												<span>{{ auth()->user()->tel }}</span>
										</li>
										<li class="flex items-center justify-between border-b pb-3">
												<span class="capitalize">email address</span>
												<span>{{ auth()->user()->email }}</span>
										</li>
										<li class="flex items-center justify-between">
												<span class="capitalize">address</span>
												<span>
														{{ auth()->user()->address }}
												</span>
										</li>
								</ul>
						</div>
				</div>

				<x-payment-card />

		</div>

		<div class="my-3">
				<div class="space-y-5 rounded-lg border border-neutral-content bg-base-200 p-5">
						<h3 class="text-2xl capitalize">Payment methods</h3>
						<hr class="my-5">

            <x-formErorr :errors="$errors"></x-formErorr>
            
						<form action="{{ route('basket.checkOut') }}" method="POST">
								@csrf
								<ul class="list-none space-y-6 capitalize">
										<li class="flex items-center justify-between">

												<div class="flex items-center gap-2">
														<input type="radio" name="paymentMethod" value="online" id="online">
														<label for="online">online payment</label>
												</div>

												<div>
														<select class="select max-w-xs rounded-lg p-2" name="gateway">
																<option disabled selected>Select Payment gateway</option>
																<option value="saman">saman</option>
																<option value="pasargad">pasargad</option>
														</select>
												</div>
										</li>
										<li>
												<div class="flex items-center gap-2">
														<input type="radio" name="paymentMethod" value="cash" id="cash">
														<label for="cash">
																Cash payment (in this way, you can pay the amount at your door)
														</label>
												</div>
										</li>
										<li class="space-y-3">
												<div class="flex items-center gap-2">
														<input type="radio" name="paymentMethod" value="transfer" id="transfer">
														<label for="transfer">transfer between cards</label>
												</div>
										</li>
										<li>
												<button class="btn-primary btn w-full sm:w-[initial]" type="submit">
														payment
												</button>
										</li>
								</ul>
						</form>
				</div>
		</div>
@endsection
