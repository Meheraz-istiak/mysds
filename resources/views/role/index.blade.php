@extends('layouts.default')

@section('title')

@endsection

@section('css')

@endsection

@section('content')

    <div class="container">
        <role></role>
    </div>

@endsection

@section('javascript')
    <script>
        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            {{--$('.datatable').DataTable({--}}
            {{--    processing: true,--}}
            {{--    serverSide: true,--}}
            {{--    "bDestroy": true,--}}
            {{--    ajax: {--}}
            {{--        url: '{{ route('roleDatatable') }}',--}}
            {{--        type: 'POST',--}}
            {{--        'headers': {--}}
            {{--            'X-CSRF-TOKEN': '{{ csrf_token() }}'--}}
            {{--        }--}}
            {{--    },--}}
            {{--    "columns": [--}}
            {{--        {"data": 'DT_RowIndex', "name": 'DT_RowIndex'},--}}
            {{--        {"data": "name"},--}}
            {{--        {"data": "permissions"},--}}
            {{--        {"data": "created_at"},--}}
            {{--        {data: 'action', name: 'action', orderable: false, searchable: false}--}}
            {{--    ],--}}
            {{--    language: {--}}
            {{--        paginate: {--}}
            {{--            next: '<i class="fas fa-chevron-right"></i>',--}}
            {{--            previous: '<i class="fas fa-chevron-left"></i>'--}}
            {{--        }--}}
            {{--    }--}}
            {{--});--}}
            $(document).on('click', '.close-btn', function(id){
                $('#roleEdit').modal('hide');
            });
            // $(document).on('click', '.edit-btn', function(id){
            //     $('#roleEdit').modal('show');
            //     let p_id = $(this).data('id');
            //     console.log(p_id);
            //     $('#roleEdit').find('form')[0].reset();
            //     $('#roleEdit').find('span.error-text').text('');
            //     $.post('/role-details'+'/'+ p_id,{ id:p_id }, function (data) {
            //         console.log(data)
            //         // $('#roleEdit').find('input[name="pid"]').val(data.permissionDetails.id);
            //         $('#roleEdit').find('input[name="name"]').val(data.roleDetails.name);
            //         // $('#profileEditModal').modal('show');
            //     }, 'json');
            // });
        });
    </script>
@endsection
