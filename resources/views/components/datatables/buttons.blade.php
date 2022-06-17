{{-- Modal --}}

@if (isset($urlDownload))
    <button type="button" class="btn btn-sm btn-info download" data-url="{{ $urlDownload }}" data-toggle="modal"
        data-target=".component-modal-pdf-iframe" data-size="{{ $size ?? 'modal-md' }}"
        data-title="{{ $title ?? '' }}">
        <i class="mdi mdi-cloud-download"></i>
    </button>
@endif

@if (isset($urlOpen))
    <button type="button" class="btn btn-sm btn-success showComponentModal" data-url="{{ $urlOpen }}"
        data-toggle="modal" data-target=".component-modal" data-size="{{ $size ?? 'modal-md' }}"
        data-title="{{ $title ?? '' }}">
        <i class=" mdi mdi-folder-multiple"></i>
    </button>
@endif

@if (isset($urlEdit))
    <button type="button" class="btn btn-sm btn-warning showComponentModal" data-url="{{ $urlEdit }}"
        data-toggle="modal" data-target=".component-modal" data-size="{{ $size ?? 'modal-md' }}"
        data-title="{{ $title ?? '' }}">
        <i class=" mdi mdi-lead-pencil"></i>
    </button>
@endif

@if (isset($urlDelete))
    <button type="button" class="btn btn-sm btn-danger delete" data-url="{{ $urlDelete }}">
        <i class="mdi mdi-delete-forever"></i>
    </button>
@endif

{{-- Page --}}

@if (isset($pgOpen))
    <a class="btn btn-sm btn-success" href="{{ $pgOpen }}">
        <i class=" mdi mdi-folder-multiple"></i>
    </a>
@endif

@if (isset($pgEdit))
    <a class="btn btn-sm btn-warning" href="{{ $pgEdit }}">
        <i class=" mdi mdi-lead-pencil"></i>
    </a>
@endif
