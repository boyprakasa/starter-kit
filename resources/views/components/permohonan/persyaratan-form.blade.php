<form id="uploadForm" action="{{ route('upload', ['service' => request()->service]) }}" method="POST"
    enctype="multipart/form-data" class="card">
    <div class="card-header bg-warning rounded">Persyaratan</div>
    <div class="card-body">
        <input type="hidden" name="fileable_id" value="{{ request()->id }}">
        <ol>
            @foreach ($requirements as $requirement)
                <li>
                    <span>{{ $requirement->requirements->name }}</span>
                    <input type="hidden" name="checklist_id[]" value="{{ $requirement->id }}">
                    <input type="file" name="files[]" accept="application/pdf">
                </li>
            @endforeach
        </ol>
    </div>
    <div class="card-footer">
        <button class="btn btn-success float-right">
            <i class="fa fa-upload"></i> Upload
        </button>
    </div>
</form>

@push('sub-scripts')
    @include('components.sweetalert-init')
    <script>
        $('#uploadForm').on('submit', function(e) {
            e.preventDefault();
            var url = $(this).attr('action');

            $.ajax({
                type: 'POST',
                url: url,
                data: new FormData(this),
                contentType: false,
                processData: false,
                success: function(data) {
                    successAlert(data.message);
                },
                error: function(result) {
                    dangerAlert(data.message);
                }
            });
        });
    </script>
@endpush
