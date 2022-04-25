<div class="d-flex">
	<a href="{{ $editUrl }}" class="btn text-inverse pr-2"
	   data-toggle="tooltip" title="Edit">
		<i class="ti-marker-alt text-warning"></i>
	</a>
	<form action="{{ $deleteUrl }}" method="post">
		@csrf
		@method('delete')
		<button onclick="return confirm('Hapus ?')" class="btn" type="submit"><i class="ti-trash text-danger"></i></button>
	</form>
</div>
