@extends('layout')
  
@section('content')
    <div class="container">
        <div id="message">
        </div>
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col col-sm-9">Master Anggota</div>
                    <div class="col col-sm-3">
                        <button type="button" id="add_data" class="btn btn-success btn-sm float-end">Add</button>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered" id="sample_data">
                        <thead>
                            <tr>
                                <th>Kode Anggota</th>
                                <th>Nama Anggota</th>
                                <th>Tempat Lahir Anggota</th>
                                <th>Tanggal Lahir Anggota</th>
                                <th>Jenis Kelamin</th>
                                <th>Alamat</th>
                                <th>No Hp</th>
                                <th>Jenis Anggota</th>
                                <th>Status</th>
                                <th>Jumlah Pinjam</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="modal" tabindex="-1" id="action_modal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form method="post" id="sample_form">
                        <div class="modal-header">
                            <h5 class="modal-title" id="dynamic_modal_title"></h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label class="form-label">Kode Anggota</label>
                                <input type="text" name="kd_anggota" id="kd_anggota" class="form-control" />
                                <span id="kd_anggota_error" class="text-danger"></span>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Nama Anggota</label>
                                <input type="text" name="nm_anggota" id="nm_anggota" class="form-control" />
                                <span id="nm_anggota_error" class="text-danger"></span>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Jenis Kelamin</label>
                                <select class="form-select" id="jk" name="jk" aria-label="jk">
                                    <option value="">Choose</option>
                                    <option value="Laki-laki">Laki-laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                                <span id="jk_error" class="text-danger"></span>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Tempat Lahir</label>
                                <input type="text" name="tp_lahir" id="tp_lahir" class="form-control" />
                                <span id="tp_lahir_error" class="text-danger"></span>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Tanggal Lahir</label>
                                <input type="date" name="tg_lahir" id="tg_lahir" class="form-control" />
                                <span id="tg_lahir_error" class="text-danger"></span>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Alamat</label>
                                <input type="text" name="alamat" id="alamat" class="form-control" />
                                <span id="alamat_error" class="text-danger"></span>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">No Hp</label>
                                <input type="text" name="no_hp" id="no_hp" class="form-control" />
                                <span id="ano_hp_error" class="text-danger"></span>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Jenis Anggota</label>
                                <select class="form-select" id="jns_anggota" name="jns_anggota" aria-label="jns_anggota">
                                    <option value="">Choose</option>
                                    <option value="Member">Member</option>
                                    <option value="Non Member">Non Member</option>
                                </select>
                                <span id="jk_error" class="text-danger"></span>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Status</label>
                                <select class="form-select" id="status" name="status" aria-label="status">
                                    <option value="">Choose</option>
                                    <option value="active">Active</option>
                                    <option value="inactive">In Active</option>
                                </select>
                                <span id="jk_error" class="text-danger"></span>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Jumlah Pinjam</label>
                                    <input type="text" name="jml_pjm" id="jml_pjm" class="form-control" />
                                    <span id="jml_pjm_error" class="text-danger"></span>
                                </div>
                        </div>
                        <div class="modal-footer">
                            <input type="hidden" name="id" id="id" />
                            <input type="hidden" name="action" id="action" value="Add" />
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" id="action_button">Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    
    <script>
    $(document).ready(function() {
        showAll();

        $('#add_data').click(function(){
            $('#dynamic_modal_title').text('Add Data');
            $('#sample_form')[0].reset();
            $('#action').val('Add');
            $('#action_button').text('Add');
            $('.text-danger').text('');
            $('#action_modal').modal('show');
        });
        
        $('#sample_form').on('submit', function(event){
            event.preventDefault();
            if($('#action').val() == "Add"){
                var formData = {
                '_token': '{{ csrf_token() }}',
                'kd_anggota' : $('#kd_anggota').val(),
                'nm_anggota' : $('#nm_anggota').val(),
                'tp_lahir' : $('#tp_lahir').val(),
                'tg_lahir' : $('#tg_lahir').val(),
                'jk' : $('#jk').val(),
                'alamat' : $('#alamat').val(),
                'no_hp' : $('#no_hp').val(),
                'jns_anggota' : $('#jns_anggota').val(),
                'status' : $('#status').val(),
                'jml_pjm' : $('#jml_pjm').val(),
                }

                $.ajax({
                    headers: {
                        "Content-Type":"application/json"
                    },
                    url:"{{ route('anggotas.store') }}",
                    method:"POST",
                    data: JSON.stringify(formData),
                    success:function(data){
                        $('#action_button').attr('disabled', false);
                        $('#message').html('<div class="alert alert-success">'+data.message+'</div>');
                        $('#action_modal').modal('hide');
                        $('#sample_data').DataTable().destroy();
                        showAll();
                    },
                    error: function(err) {
                        console.log(err);
                    }
                });
            }else if($('#action').val() == "Update"){
                var formData = {
                    '_token': '{{ csrf_token() }}',
                    'kd_anggota' : $('#kd_anggota').val(),
                    'nm_anggota' : $('#nm_anggota').val(),
                    'tp_lahir' : $('#tp_lahir').val(),
                    'tg_lahir' : $('#tg_lahir').val(),
                    'jk' : $('#jk').val(),
                    'alamat' : $('#alamat').val(),
                    'no_hp' : $('#no_hp').val(),
                    'jns_anggota' : $('#jns_anggota').val(),
                    'status' : $('#status').val(),
                    'jml_pjm' : $('#jml_pjm').val(),
                }


                $.ajax({ 
                    headers: {
                        "Content-Type":"application/json"
                    },
                    url:"{{ url('anggotas/')}}/"+$('#id').val(),
                    method:"PUT",
                    data: JSON.stringify(formData),
                    success:function(data){
                        $('#action_button').attr('disabled', false);
                        $('#message').html('<div class="alert alert-success">'+data.message+'</div>');
                        $('#action_modal').modal('hide');
                        $('#sample_data').DataTable().destroy();
                        showAll();
                    },
                    error: function(err) {
                        console.log(err);
                    }
                });
            }
            });
    });

    function showAll() {
        $.ajax({
            type: "GET",
            headers: {
                "Content-Type":"application/json"
            },
            url:"{{ route('anggota.all') }}",
            success: function(response) {
            // console.log(response);
                var json = response;
                var dataSet=[];
                for (var i = 0; i < json.length; i++) {
                    var sub_array = {
                        'kd_anggota' : json[i].kd_anggota,
                        'nm_anggota' : json[i].nm_anggota,
                        'tp_lahir' : json[i].tp_lahir,
                        'tg_lahir' : json[i].tg_lahir,
                        'jk' : json[i].jk,
                        'alamat' : json[i].alamat,
                        'no_hp' : json[i].no_hp,
                        'jns_anggota' : json[i].jns_anggota,
                        'status' : json[i].status,
                        'jml_pjm' : json[i].jml_pjm,
                        'action' : '<button onclick="showOne('+json[i].id+')" class="btn btn-sm btn-warning">Edit</button>'+
                        '<button onclick="deleteOne('+json[i].id+')" class="btn btn-sm btn-danger">Delete</button>'
                    };
                    dataSet.push(sub_array);
                }
                $('#sample_data').DataTable({
                    data: dataSet,
                    columns : [
                        { data : "kd_anggota" },
                        { data : "nm_anggota" },
                        { data : "tp_lahir" },
                        { data : "tg_lahir" },
                        { data : "jk" },
                        { data : "alamat" },
                        { data : "no_hp" },
                        { data : "jns_anggota" },
                        { data : "status" },
                        { data : "jml_pjm" },
                        { data : "action" }
                    ]
                });
            },
            error: function(err) {
                console.log(err);
            }
        });
    }

    function showOne(id) {
        $('#dynamic_modal_title').text('Edit Data');
        $('#sample_form')[0].reset();
        $('#action').val('Update');
        $('#action_button').text('Update');
        $('.text-danger').text('');
        $('#action_modal').modal('show');

        $.ajax({
            type: "GET",
            headers: {
                "Content-Type":"application/json"
            },
            url:"{{ url('anggotas')}}/"+id,
            success: function(response) {
                $('#id').val(response.id);
                $('#kd_anggota').val(response.kd_anggota);
                $('#nm_anggota').val(response.nm_anggota);
                $('#tp_lahir').val(response.tp_lahir);
                $('#tg_lahir').val(response.tg_lahir);
                $('#jk').val(response.jk);
                $('#alamat').val(response.alamat);
                $('#no_hp').val(response.no_hp);
                $('#jns_anggota').val(response.jns_anggota);
                $('#status').val(response.status);
                $('#jml_pjm').val(response.jml_pjm);
            },
            error: function(err) {
                console.log(err);
            }
        });
    }

    function deleteOne(id) {
        alert('Yakin untuk hapus data ?');
        $.ajax({
            headers: {
                "Content-Type":"application/json"
            },
            url:"{{ url('anggotas')}}/"+id,
            method:"DELETE",            
            data: JSON.stringify({
                    '_token': '{{ csrf_token() }}'
                }),
            success:function(data){
                $('#action_button').attr('disabled', false);
                $('#message').html('<div class="alert alert-success">'+data.message+'</div>');
                $('#action_modal').modal('hide');
                $('#sample_data').DataTable().destroy();
                showAll();
            },
            error: function(err) {
                console.log(err);
            }
        });
    }
    </script>
@endsection