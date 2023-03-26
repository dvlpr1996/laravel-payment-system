@extends('layouts.master')
@section('title', 'checkout')

@section('main')
		<div class="my-3 flex flex-col gap-5 md:flex-row min-h-screen">
				<div class="w-full md:w-7/12 lg:w-8/12">
						<div class="space-y-5 rounded-lg border border-neutral-content bg-base-200 p-5">
								<h3 class="text-2xl capitalize">user information</h3>
								<hr class="my-5">
								<ul class="space-y-6 capitalize">
										<li class="flex items-center justify-between border-b pb-3">
												<span>full name</span>
												<span>john doe</span>
										</li>
										<li class="flex items-center justify-between border-b pb-3">
												<span>phone number</span>
												<span>555 666 1241</span>
										</li>
										<li class="flex items-center justify-between border-b pb-3">
												<span>email</span>
												<span>example@example.com</span>
										</li>
										<li class="flex flex-col gap-5">
												<span>address</span>
												<span>
														Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quod, provident eveniet vel minima unde deleniti
												</span>
										</li>
								</ul>
						</div>
				</div>

				<div class="w-full md:w-5/12 lg:w-4/12">
						<div class="space-y-5 rounded-lg border border-neutral-content bg-base-200 p-5">
								<h3 class="text-2xl capitalize">payment</h3>
								<hr class="my-5">
								<ul class="space-y-6 capitalize">
										<li class="flex items-center justify-between">
												<span>total price</span>
												<span>$546646</span>
										</li>
										<li class="flex items-center justify-between">
												<span>Transportation costs</span>
												<span>$546646</span>
										</li>
										<li class="flex items-center justify-between">
												<span>The amount payable</span>
												<span>$546646</span>
										</li>
								</ul>
                <button type="submit" class="btn-primary btn w-full" form="pay">
                  pay
              </button>
						</div>
				</div>
		</div>

		<div class="my-3">
				<div class="space-y-5 rounded-lg border border-neutral-content bg-base-200 p-5">
						<h3 class="text-2xl capitalize">Payment methods</h3>
						<hr class="my-5">
						<form action="" id="pay">
								<ul class="list-none space-y-6 capitalize">
										<li class="flex items-center justify-between">
												<div class="flex items-center gap-2">
														<input type="radio" name="radio-2" class="radio-primary radio" id="">
														<label for="">online payment</label>
												</div>
												<div>
														<select class="select max-w-xs rounded-lg p-2">
																<option disabled selected>Pick your favorite Simpson</option>
																<option>Homer</option>
																<option>Marge</option>
																<option>Bart</option>
																<option>Lisa</option>
																<option>Maggie</option>
														</select>
												</div>
										</li>
										<li class="space-y-3">
												<div class="flex items-center gap-2">
														<input type="radio" name="radio-2" class="radio-primary radio" id="">
														<label for="">Cash payment</label>
												</div>
												<p>In this way, you can pay the amount at your door</p>
										</li>
										<li class="space-y-3">
												<div class="flex items-center gap-2">
														<input type="radio" name="radio-2" class="radio-primary radio">
														<label for="">transfer between cards</label>
												</div>
										</li>
								</ul>
						</form>
				</div>
		</div>
@endsection
