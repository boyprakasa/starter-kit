<div class="card">
    <div class="hotreload">
        <form id="uploadForm" action="{{ route('upload-syarat', ['service' => request()->service]) }}" method="POST"
            enctype="multipart/form-data">
            <div class="card-header bg-warning rounded">Persyaratan</div>
            <div class="card-body p-15">
                <input type="hidden" name="fileable_id" value="{{ request()->id }}">
                <table class="table table-sm table-striped">
                    <thead align="center">
                        <tr>
                            <th>#</th>
                            <th>File</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($requirements as $requirement)
                            <tr>
                                <td>
                                    {{ $loop->iteration }}
                                    @if ($requirement->required)
                                        <em class="text-danger bold">*</em>
                                    @endif
                                </td>
                                <td>{{ $requirement->requirements->name }}</td>
                                <td align="right">
                                    @if ($requirement->files->isNotEmpty())
                                        <a href="{{ asset('storage/' . $requirement->files[0]->path) }}"
                                            class="btn btn-sm btn-info" target="_blank">
                                            <i class="fas fa-file-pdf"></i>
                                        </a>
                                        <button type="button" class="btn btn-sm btn-danger hapus-syarat"
                                            data-url="{{ route('hapus-syarat', ['file' => $requirement->files[0]->id, 'service_id' => request()->service, 'data_id' => request()->id]) }}">
                                            <i class="fas fa-trash-alt"></i></button>
                                    @else
                                        <input type="hidden" name="checklist_id[]" value="{{ $requirement->id }}">
                                        <input type="file" name="files[]" class="InputPdf{{ $requirement->id }}"
                                            onchange="selectFile({{ $requirement->id }});" accept="application/pdf"
                                            hidden>
                                        <span class="fileName{{ $requirement->id }}"></span>&nbsp;
                                        <button type="button"
                                            class="btn btn-sm btn-secondary btnPdf{{ $requirement->id }}"
                                            onclick="selectPdf({{ $requirement->id }})" style="padding: 4px 7px;"><i
                                                class="fas fa-folder-open"></i></button>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <span class="text-danger bold">
                    <em>* <u>Wajib diisi!</u></em>
                </span>
            </div>
        </form>
    </div>
    <div class="card-footer">
        <button class="btn btn-success float-right upload-btn">
            <i class="fa fa-upload"></i> Upload
        </button>
    </div>
</div>

@push('sub-scripts')
    @include('components.sweetalert-init')
    <script>
        // console.log("{{ $requirements->sum('files_count') }}",
        //     "{{ $requirements->where('required', 1)->count() }}");

        $('.select2').select2();

        function selectPdf(id) {
            $(`.InputPdf${id}`).click();
        }

        function selectFile(id) {
            if ($(`.InputPdf${id}`).val()) {
                var pdfName = $(`.InputPdf${id}`).val().replace(/C:\\fakepath\\/i, '');
                $(`.fileName${id}`).html(pdfName);
            } else {
                $(`.fileName${id}`).html('');
            }
        }

        $('.upload-btn').on('click', function(e) {
            e.preventDefault();

            var url = $('#uploadForm').attr('action');
            const form = $('#uploadForm')[0];

            $.ajax({
                type: 'POST',
                url: url,
                data: new FormData(form),
                contentType: false,
                processData: false,
                success: function(result) {
                    successAlert(result.message);
                    $(".hotreload").load(window.location.href + " .hotreload");
                    if (result.showFormAggrement) {
                        $('#aggrement-submit').removeClass('d-none');
                    }
                },
                error: function(result) {
                    dangerAlert(result.message);
                }
            });
        });

        $(document).on('click', '.hapus-syarat', function(e) {
            e.preventDefault();

            var url = $(this).data('url');

            warningAlert('Hapus syarat ?', '', function() {
                $.ajax({
                    type: 'DELETE',
                    url: url,
                    success: function(result) {
                        successAlert(result.message);
                        $(".hotreload").load(window.location.href + " .hotreload");
                        if (!result.showFormAggrement) {
                            $('#aggrement-submit').addClass('d-none');
                        }
                    },
                    error: function(result) {
                        var status = result.status;
                        dangerAlert(result.statusText);
                    }
                });
            });

        });
    </script>
@endpush
