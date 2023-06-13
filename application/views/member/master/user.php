
<h3>Master User</h3>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <button class="btn btn-sm btn-success text-light" id="add-user"><i class="fa fa-plus"></i> Tambah</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-primary text-light">
        <h5 class="modal-title title" id="exampleModalLabel"></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="<?= base_url('master/add_user'); ?>" id="formUser" method="post">
      <div class="modal-body">

        <input type="hidden" name="<?= $this->security->get_csrf_token_name() ?>" value="<?= $this->security->get_csrf_hash() ?>" id="token">

        <div class="form-group">
            <b>Role User</b>
            <select name="role" id="role" class="form-control" required>
                <option value="">--pilih--</option>
                <?php foreach($role as $r){ ?>
                    <option value="<?= $r->id_role ?>"><?= $r->nama_role ?></option>
                <?php } ?>
            </select>
        </div>

        <div class="form-group">
            <b>Nama User</b>
            <input type="text" name="user" id="user" class="form-control">
            <small class="text-danger" id="err_user"></small>
        </div>

        <div class="form-group">
            <b>Email</b>
            <input type="text" name="email" id="email" class="form-control">
            <small class="text-danger" id="err_email"></small>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" id="submit">Save</button>
      </div>
      </form>
    </div>
  </div>
</div>

<script>
    $('#add-user').click(function(){
        clean_form();
        $('#modalUser').modal('show');
        $('.title').html('Tambah User');
    });

    $('#formUser').submit(function(e){
        e.preventDefault();
        let link = $(this).attr('action');
        let form = $(this).serialize();
        disabled_form();

        $.ajax({
            url: link,
            data: form,
            type: 'POST',
            dataType: 'JSON',
            success: function(d){
                undisabled_form();
                $('#token').val(d.token);

                if(d.type == 'validation'){
                    if(d.err_user == ''){
                        $('#user').removeClass('is-invalid');
                        $('#err_user').html('');
                    } else {
                        $('#user').addClass('is-invalid');
                        $('#err_user').html(d.err_user);
                    }

                    if(d.err_email == ''){
                        $('#email').removeClass('is-invalid');
                        $('#err_email').html('');
                    } else {
                        $('#email').addClass('is-invalid');
                        $('#err_email').html(d.err_email);
                    }
                } else if(d.type == 'result'){

                    if(d.success == true){
                        toastr["success"](d.msg, "Success");
                        $('#modalUser').modal('hide');

                    } else {
                        toastr["error"](d.msg, "Error");
                    }

                } else if(d.type == 'email'){
                    toastr["error"](d.msg, "Error");
                }
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
                undisabled_form();
            }
        })


    })

    function clean_form(){
        $('#role').val('');
        $('#user').val('');
        $('#email').val('');
        $('#user').removeClass('is-invalid');
        $('#email').removeClass('is-invalid');
        $('#err_user').removeAttr('disabled');
        $('#err_email').removeAttr('disabled');
    }

    function disabled_form(){
        $('#submit').attr('disabled', true);
        $('#role').attr('disabled', true);
        $('#user').attr('disabled', true);
        $('#email').attr('disabled', true);
    }

    function undisabled_form(){
        $('#submit').removeAttr('disabled', true);
        $('#role').removeAttr('disabled', true);
        $('#user').removeAttr('disabled', true);
        $('#email').removeAttr('disabled', true);
    }
</script>