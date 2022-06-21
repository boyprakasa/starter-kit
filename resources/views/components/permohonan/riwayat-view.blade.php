<div class="card @if ($histories->isEmpty()) d-none @endif">
    <div class="card-header bg-danger text-white rounded">Riwayat</div>
    <div id="historyList" class="card-body overflow-auto" style="min-height: 0px; max-height: 300px">
        <ul class="timeline timeline-left">
            @foreach ($histories as $history)
                @php
                    $date = fullDate($history->created_at);
                    $splitDescription = explode('~', $history->description);
                    $typeClass = $splitDescription[0];
                    $iconClass = $splitDescription[1];
                    $logText = $splitDescription[2];
                @endphp
                <li class="timeline-inverted timeline-item">
                    <div class="timeline-badge {{ $typeClass }}">
                        <i class="{{ $iconClass }}"></i>
                    </div>
                    <div class="timeline-panel p-1">
                        <div class="timeline-heading">
                            <h6 class="timeline-title mb-0">
                                @if ($history->causer->memberProfile)
                                    {{ $history->causer->name }}
                                @elseif ($history->causer->adminProfile)
                                    {{ $history->causer->adminProfile->flow->name }}
                                @endif
                            </h6>
                            <small class="text-muted">
                                <i class="fa fa-clock"></i> {{ $date }}
                            </small>
                        </div>
                        <div class="timeline-body">
                            {{ $logText }}
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
</div>

@push('sub-scripts')
    <script>
        $(document).ready(function() {
            $('#historyList').scrollTop($('#historyList').prop('scrollHeight'));
        });
    </script>
@endpush
