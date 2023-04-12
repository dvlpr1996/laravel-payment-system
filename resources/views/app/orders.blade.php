@extends('layouts.master')
@section('title', 'Orders')

@section('main')
		@can('view', $user)

				<x-flash-msg />

				<h1 class="my-5 text-3xl capitalize">{{ $user->fullName() }} Orders List : </h1>

				<div class="my-5 min-h-screen">
						@if (isset($user) && !empty($user))
								<div class="overflow-x-auto rounded-md">
										<table class="table-zebra table w-full border border-neutral-content">
												<!-- head -->
												<thead>
														<tr>
																<th class="text-center text-base capitalize">#</th>
																<th class="text-center text-base capitalize">order code</th>
																<th class="text-center text-base capitalize">amount</th>
																<th class="text-center text-base capitalize">totla amount</th>
																<th class="text-center text-base capitalize">status</th>
																<th class="text-center text-base capitalize">purchase date</th>
																<th class="text-center text-base capitalize">method</th>
																<th class="text-center text-base capitalize">action</th>
														</tr>
												</thead>
												<tbody>
														@forelse ($user->orders as $key => $order)
																<tr>
																		<td class="text-center">{{ ++$key }}</td>
																		<td class="text-center">{{ $order->code }}</td>
																		<td class="text-center">{{ moneyFormat($order->amount) }}</td>
																		<td class="text-center">
																				{{ moneyFormat($order->totalCost()) }}
																		</td>
																		@php
																				$status = $order->payment?->checkStatus() ?? 'Failed';
																		@endphp
																		<td class="@checkFailed($status) text-center">
																				{{ $status }}
																		</td>
																		<td class="text-center">{{ $order->created_at }}</td>
																		<td class="text-center">
																				{{ $order->payment?->method ?? 'online' }}
																		</td>
																		<td class="text-center">
																				<a href="{{ route('order.invoice.download', $order->id) }}" class="btn" @disabled(!$order->checkInvoiceFile())>
																						Invoice File
																				</a>
																				@if ($order->unfinished())
																						<a href="{{ route('order.pay', $order->id) }}" class="btn">
																								pay
																						</a>
																				@endif
																		</td>
																</tr>
														@empty
																<tr>
																		<td colspan="8" class="text-center text-2xl capitalize">
																				there is no orders yet !!!
																		</td>
																</tr>
														@endforelse
												</tbody>
										</table>
								</div>
						@endif

				@empty($user)
						<p class="mt-10 rounded-lg bg-base-300 py-5 text-center text-3xl capitalize shadow-xl">
								there is no orders yet !!!
						</p>
				@endempty
		</div>
@endcan
@endsection
