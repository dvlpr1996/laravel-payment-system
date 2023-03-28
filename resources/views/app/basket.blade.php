@extends('layouts.master')
@section('title', 'shopping cart')

@section('main')
		<div class="my-3 flex min-h-screen flex-col gap-5 md:flex-row">
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
																		<td class="text-center">
																				<a href="{{ route('product', $basket->slug) }}" target="_blank" class="underline">
																						{{ $basket->title }}
																				</a>
																		</td>
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

				<x-payment-card />

		</div>
@endsection
