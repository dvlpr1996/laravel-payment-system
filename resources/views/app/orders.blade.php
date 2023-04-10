@extends('layouts.master')
@section('title', 'Orders')

@section('main')
		@can('view', $user)

       <x-flash-msg />

				<h1 class="text-3xl capitalize my-5">{{ $user->fullName() }} Orders List : </h1>

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
																		<td class="text-center">{{ $order->amount }}</td>
																		<td class="text-center">{{ $order->totalCost() }}</td>
																		<td class="text-center">
                                      {{ $order->payment->checkStatus() }}
                                    </td>
																		<td class="text-center">{{ $order->created_at }}</td>
																		<td class="text-center">
                                      {{ $order->payment->method }}
                                    </td>
																		<td class="text-center">
																				<a href="{{ route('order.invoice.download', $order->id) }}" class="btn">
																						Invoice File
																				</a>
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
