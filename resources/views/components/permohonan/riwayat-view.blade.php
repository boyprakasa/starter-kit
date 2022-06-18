<div class="card">
    <div class="card-header bg-danger text-white rounded">Riwayat</div>
    <div id="historyList" class="card-body overflow-auto" style="min-height: 0px; max-height: 300px">
        <ul class="timeline timeline-left">
            <li class="timeline-inverted timeline-item">
                <div class="timeline-badge success">
                    <i class="fa fa-check"></i>
                </div>
                <div class="timeline-panel p-1">
                    <div class="timeline-heading">
                        <h6 class="timeline-title">Genelia</h6>
                        <small class="text-muted"><i class="fa fa-clock"></i> 11 hours ago via
                            Twitter</small>
                    </div>
                    <div class="timeline-body">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                    </div>
                </div>
            </li>
            <li class="timeline-inverted timeline-item">
                <div class="timeline-badge warning">
                    <i class="fa fa-credit-card"></i>
                </div>
                <div class="timeline-panel p-1">
                    <div class="timeline-heading">
                        <h6 class="timeline-title">Genelia</h6>
                        <small class="text-muted"><i class="fa fa-clock"></i> 11 hours ago via
                            Twitter</small>
                    </div>
                    <div class="timeline-body">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                    </div>
                </div>
            </li>
            <li class="timeline-inverted timeline-item">
                <div class="timeline-badge danger">
                    <i class="fa fa-check"></i>
                </div>
                <div class="timeline-panel p-1">
                    <div class="timeline-heading">
                        <h6 class="timeline-title">Genelia</h6>
                        <small class="text-muted"><i class="fa fa-clock"></i> 11 hours ago via
                            Twitter</small>
                    </div>
                    <div class="timeline-body">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                    </div>
                </div>
            </li>
            <li class="timeline-inverted timeline-item">
                <div class="timeline-badge info">
                    <i class="fa fa-save"></i>
                </div>
                <div class="timeline-panel p-1">
                    <div class="timeline-heading">
                        <h6 class="timeline-title">Genelia</h6>
                        <small class="text-muted"><i class="fa fa-clock"></i> 11 hours ago via
                            Twitter</small>
                    </div>
                    <div class="timeline-body">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                    </div>
                </div>
            </li>
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
