<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ public_path('bootstrap/css') }}" />


</head>
<body>
  <div class="container">
    <div class="row">

      <div class="col-md-6 ">
        <div class="">
          <div class="">
            <div
              class="card p-xl-5 p-lg-4 p-0"
              style="
                box-shadow: 0px 0px 5px 0px #ccc;
                background-image: url('assets/images/bg-2.png');
                background-size: 100% 100%;
              "
            >
              <div class="card-body">
                <div class="mb-3 pb-3 border-bottom text-center">
                  <h3><b> SAFETY & HEALTH POLICY</b></h3>
                </div>

                <div class="row mb-4">
                  <div class="col-sm-12">
                    <div>
                      <h6 style="font-size: 14px">
                        <strong>{{ $data->company->company_name }}</strong> is
                        committed to continual improvement in health,
                        safety and welfare of all its employees,
                        customers, contractors and visitors and those
                        under its influence in the neighborhood and
                        community at large.
                      </h6>
                    </div>
                    <div class="mid">
                      <p>
                        {!! $data->commitment!!}
                      </p>
                      <ul>
                        <li>
                          {{ $data->tagline}}
                        </li>

                      </ul>

                    </div>




                  </div>
                  </div>
                </div>
                <!-- Row end  -->
                <div class="row">
                  <div class="col-lg-12">
                    <h6>{{ $data->employee->em_name}}</h6>
                    <p class="text-muted">{{   $data->designation->ds_name }}</p>
                    <p>{{$data->company->company_name }}</p>
                    {{ $data->created_at->format('Y:M:D') }}</p>
                    <img src="/uploads/emp_signature/{{ $data->employee->em_signature }}" alt="not" height="50px";width="50px">

                  </div>

                </div>
                <!-- Row end  -->
              </div>
            </div>

          </div>

        <!-- Row end  -->
      </div>
    </div>

  </div>

     <script src="{{ public_path('bootstrap/js') }}"></script>
</body>
</html>



