@forelse ([1,2,3,4,5,6,7,8] as $i)
		<x-card></x-card>
@empty
		<div class="my-3 w-full rounded-lg bg-base-200 p-4 text-center">
				<p class="text-3xl capitalize">
						not production found !!!
				</p>
		</div>
@endforelse
