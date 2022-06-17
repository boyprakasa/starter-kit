<script>
    $.extend(true, $.fn.dataTable.defaults, {
        language: {
            // url: 'https://cdn.datatables.net/plug-ins/1.11.5/i18n/id.json'
        },
        columnDefs: [{
            target: 0,
            width: '5%'
        }, {
            target: -1,
            width: '15%'
        }, {
            className: 'text-center',
            targets: [0, -1],
            orderable: false,
            searchable: false,
        }],
    });
</script>
