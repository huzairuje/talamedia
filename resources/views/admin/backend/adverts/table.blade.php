{{--@section('scripts')--}}

<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
        <table class="table table-bordered" id="table-datatables" width="100%" cellspacing="10">
            <thead>
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Date</th>
                <th>Created By</th>
                <th>Status</th>
                <th>Featured</th>
                <th>Action</th>
            </tr>
            </thead>
        </table>
    </div>
</div>
</div>
<script type="text/javascript">
    $(function() {
        $('#table-datatables').DataTable({
            processing: true,
            serverSide: true,
            scrollX: true,
            ajax: '{!! route("advert.datatables") !!}',
            columns: [
                { data: 'no', searchable: false, width: '5%', className: 'center'},
                { data: 'name', name: 'name' },
                { data: 'publish_datetime', name: 'publish_datetime' },
                { data: 'created_by', name: 'created_by' },
                { data: 'status', name: 'status' },
                { data: 'is_featured_advert', name: 'is_featured_advert' },
                { data: 'action', orderable: false, searchable: false, width: '15%', className: 'center action'},
            ]
        });
    });

</script>
{{--    @endsection--}}
