@extends('layouts.default')

@section('title')
    Department
@endsection

@section('css')
    <style>
        div#myProjectTable_length {
            position: absolute;
        }
        div.dt-buttons {
            position: absolute;
            margin-left: 11rem;
        }
        button.dt-button {
            font-size: .78rem;
        }
    </style>
@endsection

@section('content')
    <div>
        @if(session()->has('message'))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert">X</button>
                {{session()->get('message')}}
            </div>
        @endif
    </div>
    
    <div class="card mb-3">
        <div
            class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
            <h3 class="fw-bold mb-0" style="margin-left: 1rem">team</h3>
        </div>

        <form method="POST" enctype="multipart/form-data" id="form">
            @csrf
             <div class="card-body">

                <div class="row g-3 align-items-center">

                <div class="col-md-6">
                    <label for="firstname" class="form-label">Name
                            <span class="text-danger">*</span>
                    </label>
                        <input 
                            name="name"

                            type="text"

                            value=""

                            class="form-control" 

                            id="name" 

                            required>

                 </div>


                <div class="col-md-6">
                    <label for="firstname" class="form-label">phone
                            <span class="text-danger">*</span>
                    </label>
                        <input 
                            name="phone"

                            type="text"

                            value=""

                            class="form-control" 

                            id="phone" 

                            required>

                 </div>

                  <div class="col-md-6">
                    <label for="firstname" class="form-label">email
                            <span class="text-danger">*</span>
                    </label>
                        <input 
                            name="email"

                            type="email"

                            value=""

                            class="form-control" 

                            id="email" 

                            required>

                 </div>

                   
                <div class="col-md-6">
                    <label for="firstname" class="form-label">password
                            <span class="text-danger">*</span>
                    </label>
                        <input 
                            name="password"

                            type="password"

                            value=""

                            class="form-control" 

                            id="password" 

                            required>

                 </div>



                  <div class="col-md-6 image_box">
                    <label for="firstname" class="form-label">image
                            <span class="badge bade-secondary" onclick="add_more()"><i class="fa fa-plus"></i></span>

                    </label>
                        <input 
                            name="image[]"

                            type="file"

                            value=""

                            class="form-control-file" 

                            id="image[]"
                            multiple 

                            required>

                 </div>

             
              </div>

                <button
                       type="submit" 
                       class="btn btn-primary"
                        style="padding: 10px 40px; 
                        margin-top:10px">submit
                </button>
          </div>
       </form>
</div>

<!-- ====================================
 -->
     <div class="card mb-3">
        <div
            class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
            <h3 class="fw-bold mb-0 ml-3">team list</h3>

        </div>
        <div class="card-body">
            <table id="myProjectTable" class="table table-hover datatable align-middle mb-0  table table-bordered"
                   style="width:100%">
                <thead>
                <tr>
                    <th>Sl</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Photo</th>
                    <th>Action</th>

                  </tr>
                </thead>

                   <tbody>
                       @foreach($demo as $key=>$value)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$value->name}}</td>
                        <td>{{$value->phone}}</td>
                        <td>{{$value->email}}</td>
                        @php
                         $imageArr = explode(',',$value->image);
                        @endphp

                        <td> 
                            @foreach($imageArr as $image)
                            <div class="p-4">
                            <img height="50px" width="40px" src="{{asset('storage/demo_image/'.$image)}}" alt="not found">
                            </div>
                            @endforeach
                        </td>
                            
                            
                       
                        <td>
                            <a href="{{route('demo.edit',$value->id)}}" class=""> <i class="fas fa-edit"></i></a>||

                            <a href="{{route('demo.destroy',$value->id)}}" class=""> <i
                                    class="fas fa-trash cursor-pointer" style="color: darkred"></i></a>

                        </td>
                    </tr>

                @endforeach
               

                  </tbody>
            </table>
        </div>
    </div>

@endsection

@section('javascript')
<script>
    var count = 0;


    function add_more(){
        count++;

         $html='<div class="form-group" id="image_box_'+count+'"><div class="row"><div class="col-md-6" ><input type="file" id="image[]" name="image[]"multiple></div><div  class="col-md-4"><span class="btn btn-danger" onclick = "remove_more('+count+')"><i class="fa fa-minus"></i>remove</span></div></div></div>';
        $('.image_box').after($html);
    }

    function remove_more(count){
        $('#image_box_'+count).remove();

    }
      
  $(document).ready(function(){
        $('#form').submit(function(e)
        {
            e.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                url:"{{route('demo.store')}}",
                data:formData,
                type:'POST',
                cache:false,
                contentType:false,
                processData:false,

                success:function(response)
                {
                    alert(response);
                },

               

            });

        });

    });
 </script>

    <script>
        // project data table
        $(document).ready(function() {
            $('#myProjectTable')
            .addClass( 'nowrap' )
            .dataTable( {
                responsive: true,
                columnDefs: [
                    { targets: [-1, -3], className: 'dt-body-left' }
                ]
            });
            $('.deleterow').on('click',function(){
            var tablename = $(this).closest('table').DataTable();  
            tablename
                    .row( $(this)
                    .parents('tr') )
                    .remove()
                    .draw();

            } );
        });
    </script>

@endsection



