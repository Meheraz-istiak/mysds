@if ($message = Session::get('success'))
    <div class="alert alert-success alert-block" id="alert">
        <button class="close" type="button" data-dismiss="alert">&#10008;</button>
        <i class="fas fa-check"></i> {{ $message }}
    </div>
@endif

@if ($message = Session::get('error'))
    <div class="alert alert-danger alert-block" id="alert">
        <button class="close" type="button" data-dismiss="alert">x</button>
        <i class="fas fa-ban"></i> {{ $message }}
    </div>
@endif
