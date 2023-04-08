<div class="my-3 grid gap-3 grid-cols-12" id="products">
		@forelse ($products as $product)
				<x-card :product="$product"></x-card>
		@empty
				<div class="my-3 w-full rounded-lg border border-neutral-content bg-base-200 p-4 text-center col-span-12">
						<p class="text-3xl capitalize">
								not production found !!!
						</p>
				</div>
		@endforelse
</div>
