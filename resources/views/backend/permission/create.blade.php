@extends('layouts.default')

@section('title')
    Create Permission
@endsection

@section('css')

@endsection

@section('content')
    <div class="card mb-3">
        <div class="card-header d-flex justify-content-between">
            <h5>Create Permission</h5>
            <a href="{{ route('permission.index') }}" class="btn btn-falcon-default rounded-capsule btn-sm"> <i class="fas fa-arrow-left"></i> Back To List</a>
        </div>
        <span class="divider"></span>
        <div class="card-body">
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
@endsection

@section('javascript')

@endsection
