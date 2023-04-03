@inject('basket', 'App\Service\Basket\Basket')

<div class="navbar my-3 rounded-lg border border-neutral-content bg-base-200">
		<div class="flex-1">
				<a href="{{ route('index') }}" class="text-base normal-case sm:text-xl">
						<i class="fas fa-shopping-bag ml-2"></i>
						{{ str_replace('-', ' ', __('app.title')) }}
				</a>
		</div>
		<div class="flex-none gap-2 md:gap-3">
				<div class="dropdown-end dropdown">
						<label tabindex="0" class="btn-ghost btn-circle btn">
								<div class="indicator">
										<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
												stroke="currentColor">
												<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
														d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
										</svg>
										<span class="badge badge-sm indicator-item">
												{{ $basket->basketCount() }}
										</span>
								</div>
						</label>
						<div tabindex="0" class="card dropdown-content card-compact mt-3 w-52 bg-base-100 shadow">
								<div class="card-body">
										<span class="text-lg font-bold">
												{{ $basket->basketCount() }}
												Items Selected
										</span>

										<span class="text-info">
												Subtotal:
												{{ moneyFormat($basket->getBasketSubtotal()) }}
										</span>

										<div class="card-actions">
												<a href="{{ route('basket.index') }}" class="btn-primary btn-block btn">
														your basket
												</a>
										</div>
								</div>
						</div>
				</div>

				@auth
						<div class="dropdown-end dropdown">
								<label tabindex="0" class="btn-ghost btn-circle avatar btn">
										<div class="w-10 rounded-full">
												<img src="{{ auth()->user()->userGravatar() }}">
										</div>
								</label>
								<ul tabindex="0"
										class="dropdown-content menu menu-compact w-52 space-y-4 rounded-lg border border-neutral-content bg-base-100 p-5 shadow">
										<li>{{ ucfirst(auth()->user()->fullName()) }}</li>
										<li>
												<form id="logout" action="{{ route('logout') }}" method="post" class="hidden">@csrf</form>
												<a href="{{ route('logout') }}" class="p-0"
														onclick="event.preventDefault();
                        document.getElementById('logout').submit();">
														Logout
												</a>
										</li>
								</ul>
						</div>
				@endauth

				@guest
						<div class="flex items-center gap-2">
								<a href="{{ route('login') }}" class="capitalize">
										<i class="fas fas fa-sign-in-alt block sm:hidden"></i>
										<span class="hidden text-base sm:block">login</span>
								</a>
								<a href="{{ route('register') }}" class="capitalize">
										<i class="fas fa-user-plus block sm:hidden"></i>
										<span class="hidden text-base sm:block">register</span>
								</a>
						</div>
				@endguest
		</div>
</div>
