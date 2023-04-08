<div
		class="col-span-12 flex flex-col overflow-hidden rounded-lg border border-neutral-content bg-base-200 shadow-xl hover:border-indigo-700 sm:col-span-6 md:col-span-4 xl:col-span-3">

		<img src="{{ $product->image }}" alt="{{ $product->title }}"
				class="h-56 transform rounded-xl object-fill object-center p-2 shadow-lg duration-100 ease-in hover:scale-[1.05]"
				loading="lazy">

		<div class="flex flex-col items-center justify-start gap-2 px-2 py-4 text-center md:px-0 lg:px-2">
				<h2 class="text-xl font-bold capitalize md:text-2xl">{{ $product->title }}</h2>
		</div>

		<div class="flex flex-row items-center justify-between py-2 px-5">
				<p class="text-base text-orange-500">Stock : {{ $product->stock }}</p>
				<p class="text-base text-orange-600">{{ moneyFormat($product->price) }}</p>
		</div>

		<div class="px-6 py-3">
				<a href="{{ route('product', $product->slug) }}" class="btn-primary btn w-full p-1 text-sm font-medium italic">
						more details
				</a>
		</div>
</div>
