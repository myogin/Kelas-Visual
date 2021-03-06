@extends('layouts.global')
@section('title')

@endsection
@section('css')

@endsection
@section('content')
<!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Users
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
        <div class="col-xs-12">
            @if(session('status'))
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Alert!</h4>
                {{session('status')}}
            </div>
            @endif
            <div class="box">
                    <div class="box-header">
                        <h4>User list
                            <a onclick="addForm()" class="btn btn-primary pull-right" style="margin-top: -8px;">Add Users</a>
                        </h4>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="tabel-users" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>

                        </tbody>
                        <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </tfoot>
                        </table>
                    </div>
                    <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
        </div>
        </div>

        {{-- form edit --}}
        <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Default Modal</h4>
            </div>
            <form role="form" id="sectionForm" enctype="multipart/form-data" action="{{route('users.store')}}" method="POST">
            <div class="modal-body">

                    {{ csrf_field() }} {{ method_field('POST') }}
                    <input type="hidden" id="id" name="id">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Full Name"  >
                    </div>
                    <div class="form-group">
                        <label for="email">email</label>
                        <input type="text" class="form-control" id="email" name="email" placeholder="email" >
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password" >
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" id="password2" name="password2" placeholder="Konfirm Password" >
                    </div>
                    <div class="form-group">
                        <label>Select</label>
                        <select class="form-control" name="role">
                          <option id="rclient" value="client">client</option>
                          <option id="radmin" value="admin">admin</option>
                        </select>
                      </div>
                    <!-- radio -->
                    <div class="form-group" style="display: none;" id="status">
                            <label for="">Status</label>
                        <div class="radio">
                        <label>
                            <input type="radio" name="status" id="optionsRadios1" value="ACTIVE" checked>
                            AKTIVE
                        </label>
                        </div>
                        <div class="radio">
                        <label>
                            <input type="radio" name="status" id="optionsRadios2" value="INACTIVE">
                            INAKTIVE
                        </label>
                        </div>
                    </div>
                    <!-- /.card-body -->

            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary pull-left submit">Tambah Users</button>
                <button type="buton" class="btn btn-default " data-dismiss="modal">Close</button>

            </div>
            </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->


        {{-- form show --}}
        <div class="modal fade" id="modal-show">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Default Modal</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                    <div class="col-md-6">
                        <h5>Tanggal Daftar</h5>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                            <input type="text" id="stgl"class="form-control" disabled="">
                        </div>
                        <h5>Status</h5>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-exclamation"></i></span>
                            <input type="text" id="sstatus"class="form-control" disabled="">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <h5>Nama</h5>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                            <input type="text" id="sname" class="form-control" disabled="">
                        </div>
                        <h5>Email</h5>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                            <input type="email" id="semail"class="form-control" disabled="">
                        </div>
                        <h5>Role</h5>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                            <input type="text" id="srole" class="form-control" disabled="">
                        </div>
                    </div>
                </div>
                </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->


    </section>
    <!-- /.content -->
@endsection
@section('js')
<script type="text/javascript">

    var table = $('#tabel-users').DataTable({
        aaSorting: [[0, "desc"]],
        processing: true,
        serverSide: true,
        ajax: "{{ route('api.user') }}",
        columns: [
        {data: 'id', sortable: true,
                render: function (data, type, row, meta) {
                return meta.row + meta.settings._iDisplayStart + 1;
                },width: '20'},
        {data: 'name', name: 'name'},
        {data: 'email', name: 'email'},
        {data: 'role', name: 'role'},
        {data: 'status', name: 'status'},
        {data: 'action', name: 'action', orderable: false, searchable: false,width: '115px'}
        ],
        columnDefs: [{targets: 3,
            render: function ( data, type, row ) {
            var css1 = 'black';
            if (data == 'admin') {
                css1 = ' bg-olive btn-flat btn-xs';
            }if (data == 'client') {
                css1 = ' bg-navy btn-flat btn-xs';
            }
            return '<span class="'+ css1 +'">' + data + '</span>';
            }
    }]
    });

    function addForm() {
        save_method = "add";
        $('input[name=_method]').val('POST');
        $('#modal-default').modal('show');
        $('#modal-default form')[0].reset();
        $('.modal-title').text('Add user');
            $('.submit').text('Add user');
        document.getElementById("status").style.display = "none";
    }

    function editForm(id) {
        save_method = 'edit';
        $('input[name=_method]').val('PATCH');
        $('#modal-default form')[0].reset();
        document.getElementById("status").style.display = "block";
        $.ajax({
            url: "{{ url('users') }}" + '/' + id + "/edit",
            type: "GET",
            dataType: "JSON",
            success: function(data) {
            $('#modal-default').modal('show');
            $('.modal-title').text('Edit user');
            $('.submit').text('Edit user');

            var role = data.role;
            if(role == 'admin'){
                $('#radmin').prop('selected',true)
            }
            if(role == 'client'){
                $('#rclient').prop('selected',true)
            }
            var status = data.status;
            if(status == 'ACTIVE'){
                $('#optionsRadios1').prop('checked',true)
            }
            if(status == 'INACTIVE'){
                $('#optionsRadios2').prop('checked',true)
            }
            $('#id').val(data.id);
            $('#name').val(data.name);
            $('#email').val(data.email);
            },
            error : function() {
                alert("Nothing Data");
            }
        });
        }
        function showForm(id) {
        document.getElementById("status").style.display = "block";
        $.ajax({
            url: "{{ url('users') }}" + '/' + id,
            type: "GET",
            dataType: "JSON",
            success: function(data) {
            $('#modal-show').modal('show');
            $('.modal-title').text('Info Data User');

            $('#sname').val(data.name);
            $('#semail').val(data.email);;
            $('#sstatus').val(data.status);
            $('#srole').val(data.role);
            $('#stgl').val(data.created_at);
            $('#sroles').val(data.roles);
            },
            error : function() {
                alert("Nothing Data");
            }
        });
        }
    function deleteData(id){
        var csrf_token = $('meta[name="csrf-token"]').attr('content');
        swal({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            cancelButtonColor: '#d33',
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'Yes, delete it!'
        }).then(function () {
            $.ajax({
                url : "{{ url('users') }}" + '/' + id,
                type : "POST",
                data : {'_method' : 'DELETE', '_token' : csrf_token},
                success : function(data) {
                    table.ajax.reload();
                    swal({
                        title: 'Success!',
                        text: data.message,
                        type: 'success',
                        timer: '1500'
                    })
                },
                error : function () {
                    swal({
                        title: 'Oops...',
                        text: data.message,
                        type: 'error',
                        timer: '1500'
                    })
                }
            });
        });
        }
    $(function(){
            $('#modal-default form').validator().on('submit', function (e) {

                var form =  $('#modal-default form');
                form.find('.help-block').remove();
                form.find('.form-group').removeClass('has-error');

                if (!e.isDefaultPrevented()){
                    var id = $('#id').val();
                    if (save_method == 'add') url = "{{ url('users') }}";
                    else url = "{{ url('users') . '/' }}" + id;

                    $.ajax({
                        url : url,
                        type : "POST",
                        // data : $('#modal-default form').serialize(),
                        data: new FormData($("#modal-default form")[0]),
                        contentType: false,
                        processData: false,
                        success : function(data) {
                            $('#modal-default').modal('hide');
                            table.ajax.reload();
                            swal({
                                title: 'Success!',
                                text: data.message,
                                type: 'success',
                                timer: '1500'
                            })
                        },
                        error : function(xhr){
                            var res = xhr.responseJSON;
                            if($.isEmptyObject(res) == false){
                                $.each(res.errors, function(key, value){
                                    $('#' + key)
                                        .closest('.form-group')
                                        .addClass('has-error')
                                        .append('<span class="help-block"><strong>'+ value +'</strong></span>')
                                });
                            }
                        }
                    });
                    return false;
                }
            });
        });
    </script>
@endsection
