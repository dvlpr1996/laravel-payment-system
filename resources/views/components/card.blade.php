<div class="card max-w-[340px] select-none gap-5 border border-neutral-content bg-base-200 p-2 shadow-lg sm:max-w-none">
		<div class="w-full">
				<img src="{{ $product->image }}" alt="{{ $product->title }}" class="h-48 w-full rounded-lg object-fill" loading="lazy">
		</div>
		<div class="space-y-4 text-center">
				<h2 class="text-2xl font-bold capitalize">{{ $product->title }}</h2>
				<p class="text-xl font-bold">{{ $product->price ?? 'Not Defined' }}</p>
				<a href="{{ route('product', $product->slug) }}" class="btn-primary btn-sm btn w-full italic">
						more details
				</a>
		</div>
</div>
