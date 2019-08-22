<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="table-datatables" width="100%" cellspacing="10">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Podcast By</th>
                    <th>Title</th>
                    <th>Is Explicit Content</th>
                    <th>Is Published</th>
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
            ajax: '{!! route("podcastepisodes.datatables") !!}',
            columns: [
                { data: 'no', searchable: false, width: '5%', className: 'center'},
                { data: 'podcast_id', name: 'podcast_id' },
                { data: 'title', name: 'title' },
                { data: 'explicit_content', name: 'explicit_content' },
                { data: 'is_published', name: 'is_published' },
                { data: 'action', orderable: false, searchable: false, width: '15%', className: 'center action'},
            ]
        });
    });

</script>
