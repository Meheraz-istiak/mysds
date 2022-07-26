@extends('layouts.default')

@section('title')
    | Profile
@endsection

@section('css')
@endsection

@section('content')
    <div class="card mb-3">
        <div class="card-header position-relative min-vh-25 mb-7">
            <div class="bg-holder rounded-soft rounded-bottom-0" style="background-image:url(../assets/img/generic/4.jpg);">
            </div>
            <!--/.bg-holder-->

            <div class="avatar avatar-5xl avatar-profile"><img class="rounded-circle img-thumbnail shadow-sm" src="../assets/img/team/2.jpg" width="200" alt="" /></div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-8">
                    <h4 class="mb-1"> {{ Auth::user()->name }}<small class="fas fa-check-circle text-primary ml-1" data-toggle="tooltip" data-placement="right" title="Verified" data-fa-transform="shrink-4 down-2"></small>
                    </h4>
                    <h5 class="fs-0 font-weight-normal">{{ Auth::user()->email }}</h5>
                    <p class="text-500">{{ Auth::user()->phone }}</p>
                    <button class="btn btn-falcon-primary btn-sm px-3" type="button">Following</button>
                    <button class="btn btn-falcon-default btn-sm px-3 ml-2" type="button">Message</button>
                    <!-- Button trigger modal-->
                    <button class="btn btn-falcon-info btn-sm px-3 ml-2" id="updateProfile" type="button" data-toggle="modal" data-target="#profileModal"> <i class="fas fa-user-edit"></i> Edit Profile</button>

                    <hr class="border-dashed my-4 d-lg-none" />
                </div>
                <div class="col pl-2 pl-lg-3"><a class="media align-items-center mb-2" href="#"><span class="fas fa-user-circle fs-4 mr-2 text-700"></span>
                        <div class="media-body">
                            <h6 class="mb-0">See followers (330)</h6>
                        </div>
                    </a><a class="media align-items-center mb-2" href="#"><img class="d-flex align-self-center mr-2" src="../assets/img/logos/g.png" alt="Generic placeholder image" width="30" />
                        <div class="media-body">
                            <h6 class="mb-0">Google</h6>
                        </div>
                    </a><a class="media align-items-center mb-2" href="#"><img class="d-flex align-self-center mr-2" src="../assets/img/logos/apple.png" alt="Generic placeholder image" width="30" />
                        <div class="media-body">
                            <h6 class="mb-0">Apple</h6>
                        </div>
                    </a><a class="media align-items-center mb-2" href="#"><img class="d-flex align-self-center mr-2" src="../assets/img/logos/hp.png" alt="Generic placeholder image" width="30" />
                        <div class="media-body">
                            <h6 class="mb-0">Hewlett Packard</h6>
                        </div>
                    </a></div>
            </div>
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
                    <form action="{{ route('user.updateProfile', ['id'=>$user->id]) }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input id="name" type="name" class="form-control @error('name') is-invalid @enderror" name="name" value="" required autocomplete="name" autofocus placeholder="Name">
                            @error('name')
                                <span class="invalid-feedback error-text" role="alert">
                                        <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="" required autocomplete="email" autofocus placeholder="E-Mail">
                            @error('email')
                                <span class="invalid-feedback error-text" role="alert">
                                        <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone Number</label>
                            <input id="phone" type="number" value=""
                                   oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="11" class="form-control @error('phone') is-invalid @enderror" name="phone" required autocomplete="current-phone" placeholder="Phone">
                            @error('phone')
                                <span class="invalid-feedback error-text" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <span class="sub-btn-dev"></span>
                        <div class="sub-btn">
                            <button class="btn btn-falcon-default rounded-capsule btn-sm mr-2" type="button" data-dismiss="modal">Close</button>
                            <button class="float-right btn btn-falcon-primary rounded-capsule btn-sm" type="submit">
                                <i class="fas fa-user-edit"></i> Update Profile
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('javascript')
    <script type="text/javascript">
        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $(document).on('click', '#updateProfile', function(id){
                $.post('{{ route('user.profileUpdate', ['id'=>$user->id]) }}', function (data) {
                    console.log(data.user);
                    $('#profileModal').find('form')[0].reset();
                    $('#profileModal').find('span.error-text').text('');
                    $('#name').val(data.user.name);
                    $('#email').val(data.user.email);
                    $('#phone').val(data.user.phone);
                    // $('#profileModal').modal('show');
                }, 'json');
            });
        });

    </script>
@endsection
