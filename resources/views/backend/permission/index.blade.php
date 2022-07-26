@extends('layouts.default')

@section('title')
     Permission
@endsection

@section('css')

@endsection

@section('content')
    <div class="card mb-3">
        <div class="card-header d-flex justify-content-between">
            <h5 class="mb-0">Default Example</h5>
            <button type="button" class="btn btn-falcon-default rounded-capsule btn-sm" data-toggle="modal" data-target="#profileModal"> <i class="fas fa-plus"></i> Create</button>
        </div>
        <div class="card-body">
            <table class="table table-sm table-dashboard datatable table-bordered data-table no-wrap mb-0 fs--1 w-100" id="permission-table">
                <thead class="bg-200">
                <tr>
                    <th class="sort">ID</th>
                    <th class="sort">Name</th>
                    <th class="sort">Parent Name</th>
                    <th class="sort">Date Posted</th>
                    <th class="sort">Action</th>
                </tr>
                </thead>
                <tbody class="bg-white">
{{--                @forelse($permissions as $k => $list)--}}
{{--                    <tr>--}}
{{--                        <td>{{ ++$k }}</td>--}}
{{--                        <td>{{ $list->name }}</td>--}}
{{--                        <td>{{ $list->created_at }}</td>--}}
{{--                        <td>--}}
{{--                            <span data-toggle="tooltip" data-placement="top" title="Edit Permission">--}}
{{--                            <button type="button" class="btn btn-falcon-default rounded-capsule btn-sm edit-btn" data-toggle="modal" data-target="#profileModal"> <i class="fas fa-edit"></i> </button>--}}
{{--                            </span>--}}
{{--                        </td>--}}
{{--                    </tr>--}}
{{--                @empty--}}
{{--                    <tr>--}}
{{--                        <td>No Result Found !!</td>--}}
{{--                    </tr>--}}
{{--                @endforelse--}}
                </tbody>
            </table>
        </div>
    </div>
    <!-- Modal-->
    <div class="modal fade" id="profileModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal Title</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span class="font-weight-light" aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('permission.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="name">Permission Name</label>
                            <input id="name" type="name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Name">
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                        </span>
                            @enderror
                        </div>
                        <span class="divi"></span>
                        <div class="sub-btn">
                            <button class="btn btn-falcon-default rounded-capsule btn-sm mr-2" type="button" data-dismiss="modal">Close</button>
                            <button class="float-right btn btn-falcon-primary rounded-capsule btn-sm" type="submit">
                                <i class="fas fa-save"></i> Save Permission
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal-->
    <div class="modal fade" id="profileEditModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Profile Edit Title</h5>
                    <button class="close close-btn" type="button"><span class="font-weight-light" aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('permissionUpdate') }}" method="post" id="update-permission">
                        @csrf
                        <input type="hidden" name="pid">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Permission Name</label>
                                    <input id="name" type="name"
                                           class="form-control @error('name') is-invalid @enderror"
                                           name="name" value="{{ old('name') }}" autocomplete="name" autofocus placeholder="Name">
                                    <span class="text-danger error-text name_error"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Parent Permission Name</label>
                                    <select name="parent_id" id="parent_id" class="form-control">
                                        <option value=""></option>
                                        @foreach($parentPermissions as $data)
                                        <option value="{{ $data->id }}">{{ $data->name }}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger error-text name_error"></span>
                                </div>
                            </div>
                        </div>
                        <span class="divi"></span>
                        <div class="sub-btn">
                            <button class="btn btn-falcon-default rounded-capsule close-btn btn-sm mr-2" type="button" >Close</button>
                            <button class="float-right btn btn-falcon-primary rounded-capsule btn-sm" type="submit">
                                <i class="fas fa-save"></i> Save Permission
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('javascript')
    <script>
        $(document).ready(function () {
            $('.datatable').DataTable({
                processing: true,
                serverSide: true,
                "bDestroy": true,
                ajax: {
                    url: '{{ route('permissionDatatable') }}',
                    type: 'POST',
                    'headers': {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                },
                "columns": [
                    {"data": 'DT_RowIndex', "name": 'DT_RowIndex'},
                    {"data": "name"},
                    {"data": "parent_name"},
                    {"data": "created_at"},
                    {data: 'action', name: 'action', orderable: false, searchable: false}
                ],
                language: {
                    paginate: {
                        next: '<i class="fas fa-chevron-right"></i>',
                        previous: '<i class="fas fa-chevron-left"></i>'
                    }
                }
            });

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $(document).on('click', '.close-btn', function(id){
                $('#profileEditModal').modal('hide');
            });
            $(document).on('click', '.edit-btn', function(id){
                let p_id = $(this).data('id');
                $('#profileEditModal').find('form')[0].reset();
                $('#profileEditModal').find('span.error-text').text('');
                $.post('/permission-details'+'/'+ p_id,{ id:p_id }, function (data) {
                    console.log(data)
                    $('#profileEditModal').find('input[name="pid"]').val(data.permissionDetails.id);
                    $('#profileEditModal').find('select[name="parent_id"]').val(data.permissionDetails.parent_id);
                    $('#profileEditModal').find('input[name="name"]').val(data.permissionDetails.name);
                    $('#profileEditModal').modal('show');
                }, 'json');
            });

            $('#update-permission').on('submit', function (e) {
                e.preventDefault();
                let form = this;
                $.ajax({
                    url: $(form).attr('action'),
                    method: $(form).attr('method'),
                    data: new FormData(form),
                    processData: false,
                    dataType: 'json',
                    contentType: false,
                    beforeSend: function () {
                        $(form).find('span.error-text').text('');
                    },
                    success: function (data) {
                        if(data.code == 0)
                        {
                            $.each(data.error, function (prefix, val) {
                                // console.log(val[0]);
                                $(form).find('span.'+prefix+'_error').text(val[0]);
                            });
                        }
                        else
                        {
                            $('#permission-table').DataTable().ajax.reload(null, false);
                            $('#profileEditModal').modal('hide');
                            $('#profileEditModal').find('form')[0].reset();
                            toastr.success(data.msg);
                        }
                    }
                })

            })
         });
        // $(document).ready(function() {
            {{--let table = $('#example').DataTable( {--}}
            {{--    "ajax": "{{ route('permission.index') }}",--}}
            {{--    "columnDefs": [ {--}}
            {{--        "targets": -1,--}}
            {{--        "data": null,--}}
            {{--        "defaultContent": "<button>Click!</button>"--}}
            {{--    } ]--}}
            {{--} );--}}
            {{--$('#permission-table tbody').on( 'click', 'button', function () {--}}
            {{--    let data = table.row( $(this).parents('tr') ).data();--}}
            {{--    console.log(data);--}}
            {{--} );--}}
        // } );

    </script>
@endsection
