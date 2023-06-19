<div class="row mt-3">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h5><b>Laporan anda</b></h5>
                <hr>

                <table class="table w-100" id="tableReport">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Tanggal</th>
                            <th>Hal yang terjadi</th>
                            <th>Unit kerja di laporkan</th>
                            <th>Status kasus</th>
                            <th><i class="fa fa-cogs"></i></th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>

            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="detailmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header bg-secondary text-white">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Detail Laporan</h1>
      </div>
      <div class="modal-body" id="loadDetail">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<script>
    let spinner = '<div class="text-center"><div class="spinner-border text-primary" role="status"><span class="visually-hidden">Loading...</span></div></div>';

    $(document).ready(function(){
        load_data();
    })

    $(document).on('click', '.detail', function(){
        $('#detailmodal').modal('show');
        let id = $(this).data('id');
        $('#loadDetail').html(spinner);

        $.ajax({
            url: '<?= base_url('ajax/get_detail_report_for_user') ?>',
            data: {id: id},
            type: 'POST',
            success: function(d){
                $('#loadDetail').html(d);
            },
            error: function(xhr){
                    if(xhr.status === 0){
                        //no internet connection
                        toastr["error"]('No internet connection', "Error")
                    } else if(xhr.status == 403){
                        //access forbidden
                        toastr["error"]('Access forbidden', "Error")
                    } else if(xhr.status == 404){
                        //page not found
                        toastr["error"]('Page not found', "Error")
                    } else if(xhr.status == 500){
                        //internal server error
                        toastr["error"]('Internal server error', "Error")
                    } else {
                        //unknow error
                        toastr["error"]('Unknow error', "Error")
                    }
            }
        })

    })

    function load_data(){
        $('#tableReport').dataTable({
            "ordering": false,
            "processing": true,
            "serverSide": true,
            "deferRender": true,
            "order": [],
            "columnDefs": [
                { 
                    "targets": [ 0 ], //first column / numbering column
                    "orderable": false, //set not orderable
                },
            ],
            "ajax": {
                "url": "<?= base_url('ajax/get_report_for_user')?>",
                "type": "POST"
            }
        });
    }
</script>