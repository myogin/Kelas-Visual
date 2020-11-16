@extends('layouts.global')
@section('title')

@endsection
@section('css')

@endsection
@section('content')
<!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        lessons
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
                        <h4>lesson list
                            <a onclick="addForm()" class="btn btn-primary pull-right" style="margin-top: -8px;">Add lessons</a>
                        </h4>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="tabel-lessons" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Aksi</th>
                        </tr>
                        </thead>
                        <tbody>

                        </tbody>
                        <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Aksi</th>
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
            <form role="form" id="sectionForm" enctype="multipart/form-data" action="{{route('lessons.store')}}" method="POST">
            <div class="modal-body">

                    {{ csrf_field() }} {{ method_field('POST') }}
                    <input type="hidden" id="id" name="id">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Full Name"  >
                    </div>
                    <!-- /.card-body -->

            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary pull-left submit">Tambah lessons</button>
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
                        <h5>Name</h5>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-exclamation"></i></span>
                            <input type="text" id="sstatus"class="form-control" disabled="">
                        </div>
                    </div>>
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

    var table = $('#tabel-lessons').DataTable({
        aaSorting: [[0, "desc"]],
        processing: true,
        serverSide: true,
        ajax: "{{ route('api.lesson') }}",
        columns: [
        {data: 'id', sortable: true,
                render: function (data, type, row, meta) {
                return meta.row + meta.settings._iDisplayStart + 1;
                },width: '20'},
        {data: 'name', name: 'name'},
        {data: 'action', name: 'action', orderable: false, searchable: false,width: '115px'}
        ]
    });

    function addForm() {
        save_method = "add";
        $('input[name=_method]').val('POST');
        $('#modal-default').modal('show');
        $('#modal-default form')[0].reset();
        $('.modal-title').text('Add lesson');

        $('.submit').text('Add lesson');
        document.getElementById("status").style.display = "none";
    }

    function editForm(id) {
        save_method = 'edit';
        $('input[name=_method]').val('PATCH');
        $('#modal-default form')[0].reset();
        $.ajax({
            url: "{{ url('lessons') }}" + '/' + id + "/edit",
            type: "GET",
            dataType: "JSON",
            success: function(data) {
            $('#modal-default').modal('show');
            $('.modal-title').text('Edit lesson');

            $('.submit').text('Edit lesson');

            $('#id').val(data.id);
            $('#name').val(data.name);
            },
            error : function() {
                alert("Nothing Data");
            }
        });
        }
        function showForm(id) {
        document.getElementById("status").style.display = "block";
        $.ajax({
            url: "{{ url('lessons') }}" + '/' + id,
            type: "GET",
            dataType: "JSON",
            success: function(data) {
            $('#modal-show').modal('show');
            $('.modal-title').text('Info Data lesson');

            $('#sname').val(data.name);

            document.getElementById("savatar").src = "{{asset('storage/')}}/"+data.avatar;
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
                url : "{{ url('lessons') }}" + '/' + id,
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
                    if (save_method == 'add') url = "{{ url('lessons') }}";
                    else url = "{{ url('lessons') . '/' }}" + id;

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
