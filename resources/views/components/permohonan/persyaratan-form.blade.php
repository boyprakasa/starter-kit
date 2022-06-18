<form id="uploadForm" action="{{ route('upload-syarat', ['service' => request()->service]) }}" method="POST"
    enctype="multipart/form-data" class="card">
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
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $requirement->requirements->name }}</td>
                        <td align="right">
                            @if ($requirement->files->isNotEmpty())
                                <a href="{{ asset('storage/' . $requirement->files[0]->path) }}"
                                    class="btn btn-sm btn-info" target="_blank">
                                    <i class="fas fa-file-pdf"></i>
                                </a>
                                <button type="button" class="btn btn-sm btn-danger hapus-syarat"
                                    id="{{ $requirement->files[0]->id }}"><i class="fas fa-trash-alt"></i></button>
                            @else
                                <input type="hidden" name="checklist_id[]" value="{{ $requirement->id }}">
                                <input type="file" name="files[]" class="InputPdf{{ $requirement->id }}"
                                    onchange="selectFile({{ $requirement->id }});" accept="application/pdf" hidden>
                                <span class="fileName{{ $requirement->id }}"></span>&nbsp;
                                <button type="button" class="btn btn-sm btn-secondary btnPdf{{ $requirement->id }}"
                                    onclick="selectPdf({{ $requirement->id }})" style="padding: 6px"><i
                                        class="fas fa-folder-open"></i></button>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</form>
