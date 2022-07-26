@extends('layouts.default')

@section('title')
    || Safe Work Procedure
@endsection

@section('css')

@endsection

@section('content')
       <div class="card mb-3">
        <div class="card-header d-flex justify-content-between">
            <h5 class="mb-0">Safe Work Procedure </h5>

        </div>

        <div class="main px-lg-4 px-md-4">
            <div class="container-xxl">

                <div class="row justify-content-center">
                    <div class="col-lg-12 col-md-12">
                        <div class="row justify-content-center">
                            <div class="col-lg-12 col-md-12">

                                    <table class="table table-bordered">
                                        <thead>
                                          <tr>
                                            <th scope="col">Company Name</th>
                                            <th scope="col">Department name</th>
                                            <th scope="col">Title</th>
                                            <th scope="col">before work</th>
                                            <th scope="col">during work</th>
                                            <th scope="col">after work</th>
                                            <th scope="col">potential_hazard</th>
                                            <th scope="col">Work Procedure</th>
                                            <th scope="col">PPE</th>
                                            <th scope="col">potentialHazard Image</th>
                                            <th scope="col">during_work_image</th>
                                            <th scope="col">Afetr Work</th>
                                            <th scope="col">Before work</th>
                                            <!-- <th scope="col">PPE</th> -->

                                          </tr>
                                        </thead>
                                        <tbody>
                                          <tr>
                                            <td>{{ $values->company_name }}</td>
                                              <td>{{ $values->depertment_name }}</td>
                                            <td>{{ $values->work_title }}</td>
                                            <td>{!!$values->before_work_rules!!}</td>
                                            <td> {!!$values->during_work_rules!!}</td>
                                            <td> {!!$values->after_work_rules!!}</td>
                                            <td>{!!$values->potential_hazard!!}</td>
                                            <td>{!! $values->during_work_rules!!}</td>
                                            <td>
                                                @foreach ($pp_data as $pp)
                                                {{ $pp->ppe }}{{ ','}}
                                                @endforeach
                                                </td>
                                            <td> <img src="/image/SafetyWorkProcedure/potentialHazard/{{$values->potential_hazard_image }}" alt="activity_img" style="width:50px;"></td>
                                            <td> <img src="/image/SafetyWorkProcedure/duringWork/{{$values->during_work_image }}" alt="activity_img" style="width:50px;"></td>
                                            <td> <img src="/image/SafetyWorkProcedure/afterWork/{{$values->after_work_image }}" alt="activity_img" style="width:50px;"></td>
                                            <td> <img src="/image/SafetyWorkProcedure/beforeWork/{{$values->before_work_image }}" alt="activity_img" style="width:50px;"></td>
                                          </tr>

                                        </tbody>
                                      </table>
                </div> <!-- Row end  -->
            </div>
        </div>
    </div>
</div>
</div>

</div>
        @endsection
