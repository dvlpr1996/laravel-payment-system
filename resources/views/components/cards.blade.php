<div class="my-3 grid grid-cols-[repeat(auto-fill,minmax(250px,1fr))] justify-items-center gap-3">
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
