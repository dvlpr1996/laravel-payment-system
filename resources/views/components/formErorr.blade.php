@if ($errors->any())
		<div class="bg-base-100 p-2 my-2 mx-4 rounded-lg">
				<ul class="space-y-1 list-disc pl-5">
						@foreach ($errors->all() as $error)
								<li class="capitalize text-rose-500">{{ $error }}</li>
						@endforeach
				</ul>
		</div>
@endif
