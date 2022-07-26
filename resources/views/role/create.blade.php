@extends('layouts.default')

@section('title')
    Create Role
@endsection

@section('css')

@endsection

@section('content')
    <div class="card mb-3">
        <div class="card-header d-flex justify-content-between">
            <h5>Add New Role</h5>
            <a href="{{ route('role.index') }}" class="btn btn-falcon-info rounded-capsule btn-sm"> <i class="fas fa-arrow-left"></i> Roles List</a>
        </div>
        <span class="divider"></span>
        <div class="card-body">
            <role></role>
        </div>
    </div>
@endsection

@section('javascript')

@endsection
