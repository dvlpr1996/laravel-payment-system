<div class="navbar my-3 rounded-lg border border-neutral-content bg-base-200">
		<div class="flex-1">
				<a href="{{ route('index') }}" class="text-xl normal-case">
						<i class="fas fa-shopping-bag ml-2"></i>
						{{ str_replace('-', ' ', __('app.title')) }}
				</a>
		</div>
		<div class="flex-none gap-1 md:gap-3">
				@auth
						<div class="dropdown-end dropdown">
								<label tabindex="0" class="btn-ghost btn-circle btn">
										<div class="indicator">
												<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
														stroke="currentColor">
														<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
																d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
												</svg>
												<span class="badge badge-sm indicator-item">8</span>
										</div>
								</label>
								<div tabindex="0" class="card dropdown-content card-compact mt-3 w-52 bg-base-100 shadow">
										<div class="card-body">
												<span class="text-lg font-bold">8 Items Selected</span>
												<span class="text-info">Subtotal: $999</span>
												<div class="card-actions">
														<button class="btn-primary btn-block btn">View cart</button>
												</div>
										</div>
								</div>
						</div>
						<div class="dropdown-end dropdown">
								<label tabindex="0" class="btn-ghost btn-circle avatar btn">
										<div class="w-10 rounded-full">
												<img src="/images/stock/photo-1534528741775-53994a69daeb.jpg" />
										</div>
								</label>
								<ul tabindex="0" class="dropdown-content menu rounded-box menu-compact mt-3 w-52 bg-base-100 p-2 shadow">
										<li><a>Logout</a></li>
								</ul>
						</div>
				@endauth

				@guest
            <a href="" class="capitalize">login</a>
            <a href="" class="capitalize">register</a>
				@endguest
		</div>
</div>
