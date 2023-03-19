<div class="card col-span-12 shadow-lg sm:col-span-6 md:col-span-4 xl:col-span-3">
		<div class="flex h-full select-none flex-col justify-center rounded-lg border border-neutral-content bg-base-200 p-3 gap-5">
				<div class="w-full">
						<img src="{{ $product->image }}" alt="{{ $product->title }}" class="h-48 w-full rounded-lg object-fill"
								loading="lazy">
				</div>
				<div class="flex items-center gap-5 flex-col text-center capitalize">
						<h2 class="text-2xl font-bold">{{ $product->title }}</h2>
						<p class="text-xl font-bold">{{ moneyFormat($product->price) }}</p>
				</div>
				<div class="flex justify-center">
						<a href="{{ route('product', $product->slug) }}" class="btn-primary btn-sm btn w-full italic">
								more details
						</a>
				</div>
		</div>
</div>
