@extends('layouts.master')
@section('title', 'shopping cart')

@section('main')
		<div class="my-3 flex gap-5 flex-col md:flex-row">
				<div class="w-full md:w-7/12 lg:w-8/12">
						<div class="overflow-x-auto rounded-lg border border-neutral-content">
								<table class="table w-full">
										<thead>
												<tr>
														<th class="text-center">#</th>
														<th class="text-center">Product</th>
														<th class="text-center">price</th>
														<th class="text-center">quantity</th>
														<th class="text-center">total</th>
														<th class="text-center"></th>
												</tr>
										</thead>
										<tbody>
												<tr>
														<td class="text-center">1</td>
														<td class="text-center">Lorem, ipsum dolor.</td>
														<td class="text-center">456,000</td>
														<td class="text-center">5</td>
														<td class="text-center">654,0000</td>
														<td class="cursor-pointer text-center">
																<i class="far fa-times-circle"></i>
														</td>
												</tr>
												<tr>
														<td class="text-center">1</td>
														<td class="text-center">Lorem, ipsum dolor.</td>
														<td class="text-center">456,000</td>
														<td class="text-center">5</td>
														<td class="text-center">654,0000</td>
														<td class="text-center"><i class="far fa-times-circle"></i></td>
												</tr>
												<tr>
														<td class="text-center">1</td>
														<td class="text-center">Lorem, ipsum dolor.</td>
														<td class="text-center">456,000</td>
														<td class="text-center">5</td>
														<td class="text-center">654,0000</td>
														<td class="text-center"><i class="far fa-times-circle"></i></td>
												</tr>
										</tbody>
								</table>
						</div>
				</div>

				<div class="w-full md:w-5/12 lg:w-4/12">
						<div class="bg-base-200 rounded-lg border border-neutral-content p-5 space-y-5">
              <h3 class="text-2xl capitalize">payment</h3>
              <hr class="my-5">
              <ul class="space-y-6 capitalize">
                <li class="flex justify-between items-center">
                  <span>total price</span>
                  <span>$546646</span>
                </li>
                <li class="flex justify-between items-center">
                  <span>Transportation costs</span>
                  <span>$546646</span>
                </li>
                <li class="flex justify-between items-center">
                  <span>The amount payable</span>
                  <span>$546646</span>
                </li>
              </ul>
              <a href="#" class="btn btn-primary w-full">checkout</a>
						</div>
				</div>
		</div>
@endsection
