@extends('layouts.master')
@section('title', 'Orders')

@section('main')
		<h1 class="text-3xl capitalize">{{ $user->fullName() }} Orders List : </h1>

		<div class="my-5 min-h-screen">
				<div class="overflow-x-auto">
						<table class="table-zebra table w-full border border-neutral-content rounded-lg">
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
										@foreach ($user->orders as $key => $order)
												<tr>
														<td class="text-center">{{ ++$key }}</td>
														<td class="text-center">{{ $order->code }}</td>
														<td class="text-center">{{ $order->amount }}</td>
														<td class="text-center">{{ $order->totalCost() }}</td>
														<td class="text-center">{{ $order->payment->status ?? 'not' }}</td>
														<td class="text-center">{{ $order->created_at }}</td>
														<td class="text-center">{{ $order->payment->method ?? '0' }}</td>
														<td class="text-center">
                              <a href="" class="btn">Invoice File</a>
                            </td>
												</tr>
										@endforeach
								</tbody>
						</table>
				</div>

		</div>
@endsection
