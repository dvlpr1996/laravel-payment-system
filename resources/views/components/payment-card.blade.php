@inject('basketCalculator', 'App\Service\Basket\Basket')

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
								<span>{{ $basketCalculator->transportationCosts }}</span>
						</li>

						<li class="flex items-center justify-between">
								<span>The amount payable</span>
								<span>
										{{ moneyFormat($basketCalculator->payableAmount()) }}
								</span>
						</li>
				</ul>

				<a href="{{ route('checkout.index') }}" class="btn-primary btn w-full">
						checkout
				</a>
		</div>
</div>
