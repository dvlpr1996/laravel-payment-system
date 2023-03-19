@extends('layouts.master')
@section('title', 'shopping cart')

@inject('basketCalculator', 'App\Service\Basket\Basket')

@section('main')
		<div class="my-3 flex flex-col gap-5 md:flex-row">
				<div class="w-full md:w-7/12 lg:w-8/12">

						<x-formErorr :errors="$errors"></x-formErorr>

						@if (!empty($baskets) && !is_null($baskets))
								<div class="overflow-x-auto rounded-lg border border-neutral-content">
										<table class="table w-full">
												<thead>
														<tr>
																<th class="text-center">#</th>
																<th class="text-center">Product</th>
																<th class="text-center">price</th>
																<th class="text-center">quantity</th>
																<th class="text-center">count update</th>
																<th class="text-center">total</th>
																<th class="text-center">remove</th>
														</tr>
												</thead>
												<tbody>
														@foreach ($baskets as $basket)
																<tr>
																		<td class="text-center">{{ ++$basket->index }}</td>
																		<td class="text-center">{{ $basket->title }}</td>
																		<td class="text-center">{{ $basket->price }}</td>
																		<td class="text-center">{{ $basket->quantity }}</td>
																		<td class="text-center">
																				<form action="{{ route('basket.update', $basket->id) }}">
																						@csrf
																						<select name="quantity" class="select-input mr-1">
																								@for ($i = 0; $i <= $basket->stock; $i++)
																										<option value="{{ $i }}">{{ $i }}</option>
																								@endfor
																						</select>
																						<button class="submit">
																								<i class="fas fa-check"></i>
																						</button>
																				</form>
																		</td>

																		<td class="text-center">
																				{{ moneyFormat($basket->quantity * $basket->price) }}
																		</td>

																		<td class="cursor-pointer text-center">
																				<a href="{{ route('basket.remove', $basket->id) }}">
																						<i class="far fa-times-circle"></i>
																				</a>
																		</td>

																</tr>
														@endforeach
												</tbody>
										</table>
								</div>
						@else
								<x-info />
						@endif
				</div>

				<div class="w-full md:w-5/12 lg:w-4/12">
						<div class="space-y-5 rounded-lg border border-neutral-content bg-base-200 p-5">
								<h3 class="text-2xl capitalize">payment</h3>
								<hr class="my-5">
								<ul class="space-y-6 capitalize">
										<li class="flex items-center justify-between">
												<span>total price</span>
												<span>{{ moneyFormat($basketCalculator->getBasketSubtotal()) }}</span>
										</li>
										<li class="flex items-center justify-between">
												<span>Transportation costs</span>
												<span>{{ moneyFormat(20000) }}</span>
										</li>
										<li class="flex items-center justify-between">
												<span>The amount payable</span>
												<span>
														{{ moneyFormat($basketCalculator->getBasketSubtotal() + 20000) }}
												</span>
										</li>
								</ul>
								<a href="#" class="btn-primary btn w-full">checkout</a>
						</div>
				</div>
		</div>
@endsection
