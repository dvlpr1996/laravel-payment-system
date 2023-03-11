<div class="max-w-[340px] sm:max-w-none card bg-base-200 shadow-lg p-2 gap-5 border border-neutral-content">
		<div class="w-full">
				<img src="{{ $product->image }}" alt="{{ $product->title }}"
         class="h-48 rounded-lg w-full object-fill" loading="lazy">
		</div>
		<div class="text-center space-y-4">
				<h2 class="text-2xl font-bold">{{ $product->title }}</h2>
				<p class="text-xl font-bold">{{ $product->price }}</p>
				<a href="#" class="btn-primary btn btn-sm w-full italic">
          more details
        </a>
		</div>
</div>
