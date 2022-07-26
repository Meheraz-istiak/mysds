@extends('layouts.default')
@section('title')
@endsection
@section('css')
    <style>
        .col-xs-12.textarea {
            width: 62rem;
        }
    </style>
@endsection
@section('content')

    <!-- main body area -->
    <div class="main px-lg-4 px-md-4">
    <!-- Body: Body -->
        <div class="card">
            <div class="card-header" style="font-size: 1.3rem"><b>WHY ANALYSIS</b></div>
            <div class="card-body">
                <div class="stepwizard">
                    <div class="stepwizard-row setup-panel list-inline">
                        <div class="stepwizard-step list-inline-item">
                            <a href="#step-1" type="button" class="btn btn-primary btn-circle"> Why 01</a>
                        </div>
                        <div class="stepwizard-step list-inline-item">
                            <a href="#step-2" type="button" class="btn btn-default btn-circle disabled"> Why 02</a>
                        </div>
                        <div class="stepwizard-step list-inline-item">
                            <a href="#step-3" type="button" class="btn btn-default btn-circle disabled"> Why 03</a>
                        </div>
                        <div class="stepwizard-step list-inline-item">
                            <a href="#step-4" type="button" class="btn btn-default btn-circle disabled"> Why 04</a>
                        </div>
                        <div class="stepwizard-step list-inline-item">
                            <a href="#step-5" type="button" class="btn btn-default btn-circle disabled"> Why 05</a>
                        </div>
                        <div class="stepwizard-step list-inline-item">
                            <a href="#step-6" type="button" class="btn btn-default btn-circle disabled">
                                ROOT CAUSE
                            </a>
                        </div>
                        <div class="stepwizard-step list-inline-item">
                            <a href="#step-7" type="button" class="btn btn-default btn-circle disabled">
                                RE-OCCURRENCE
                            </a>
                        </div>
                    </div>
                </div>
                <form role="form" id="form" action="{{ route('accident_report.store') }}" method="post">
                    @csrf
                    <input type="hidden" name="inc_number" id="inc_number" value="{{ request('id') }}">
                    <div class="row setup-content mt-4" id="step-1">
                        <div class="col-xs-12 textarea">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <textarea name="why1" rows="3" id="why1" autofocus class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="col-md-12 d-flex justify-content-center mt-3">
                                <button id="next1" class="btn btn-outline-success nextBtn float-right"
                                        style="font-weight: 800;letter-spacing: 3px" type="button">
                                    Next <i class="fas fa-long-arrow-alt-right"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="row setup-content mt-4" id="step-2">
                        <div class="col-xs-12 textarea">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <textarea name="why2" id="why2" autofocus class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="col-md-12 d-flex justify-content-center mt-3">
                                <button id="next2" class="btn btn-outline-success nextBtn float-right"
                                        style="font-weight: 800;letter-spacing: 3px" type="button">
                                    Next <i class="fas fa-long-arrow-alt-right"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="row setup-content mt-4" id="step-3">
                        <div class="col-xs-12 textarea">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <textarea name="why3" id="why3" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="col-md-12 d-flex justify-content-center mt-3">
                                <button id="next3" class="btn btn-outline-success nextBtn float-right"
                                        style="font-weight: 800;letter-spacing: 3px" type="button">
                                    Next <i class="fas fa-long-arrow-alt-right"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="row setup-content mt-4" id="step-4">
                        <div class="col-xs-12 textarea">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <textarea name="why4" id="why4" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="col-md-12 d-flex justify-content-center mt-3">
                                <button id="next4" class="btn btn-outline-success nextBtn float-right"
                                        style="font-weight: 800;letter-spacing: 3px" type="button">
                                    Next <i class="fas fa-long-arrow-alt-right"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="row setup-content mt-4" id="step-5">
                        <div class="col-xs-12 textarea">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <textarea name="why5" id="why5" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="col-md-12 d-flex justify-content-center mt-3">
                                <button id="next5" class="btn btn-outline-success nextBtn float-right"
                                        style="font-weight: 800;letter-spacing: 3px" type="button">
                                    Next <i class="fas fa-long-arrow-alt-right"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="row setup-content mt-4" id="step-6">
                        <div class="col-xs-12 textarea">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <textarea name="rootCause" id="rootCause" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="col-md-12 d-flex justify-content-center mt-3">
                                <button id="next6" class="btn btn-outline-success nextBtn float-right"
                                        style="font-weight: 800;letter-spacing: 3px" type="button">
                                    Next <i class="fas fa-long-arrow-alt-right"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="row setup-content mt-4" id="step-7">
                        <div class="col-xs-12 textarea">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <textarea name="reOccurrence" id="reOccurrence" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="col-md-12 d-flex justify-content-center mt-4">
                                <button class="btn btn-outline-success" type="submit" style="font-weight: 800;letter-spacing: 3px">
                                    Save <i class="fas fa-save fa-1x"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('javascript')
    <script src='https://cdnjs.cloudflare.com/ajax/libs/tooltipster/3.3.0/js/jquery.tooltipster.min.js'></script>
    <script src='https://cdn.jsdelivr.net/jquery.validation/1.15.0/jquery.validate.min.js'></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#example').DataTable();

            //validation
            $('input, select').tooltipster({
                trigger: 'custom',
                onlyOne: false,
                position: 'right',
                theme: 'tooltipster-light'
            });

            $("#form").validate({
                errorPlacement: function (error, element) {
                    let lastError = $(element).data('lastError'),
                        newError = $(error).text();

                    $(element).data('lastError', newError);

                    if(newError !== '' && newError !== lastError){
                        $(element).tooltipster('content', newError);
                        $(element).tooltipster('show');
                    }
                },
                success: function (label, element) {
                    $(element).tooltipster('hide');
                }
            });


            /* This code handles all of the navigation stuff.
            ** Probably leave it. Credit to https://bootsnipp.com/snippets/featured/form-wizard-and-validation
            */
            let navListItems = $('div.setup-panel div a'),
                allWells = $('.setup-content'),
                allNextBtn = $('.nextBtn');

            allWells.hide();

            // navListItems.click(function (e) {
            //
            // });

            navListItems.click(function (e) {
                e.preventDefault();
                let $target = $($(this).attr('href')),
                    $item = $(this);

                if (!$item.hasClass('disabled')) {
                    navListItems.removeClass('btn-primary').addClass('btn-default');
                    $item.addClass('btn-primary');
                    $('input, select').tooltipster("hide");
                    allWells.hide();
                    $target.show();
                    $target.find('input:eq(0)').focus();
                }
            });

            /* Handles validating using jQuery validate.
            */
            allNextBtn.click(function(){
                let curStep = $(this).closest(".setup-content"),
                    curStepBtn = curStep.attr("id"),
                    nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
                    curInputs = curStep.find("textarea"),
                    isValid = true;
                //Loop through all inputs in this form group and validate them.
                for(let i=0; i<curInputs.length; i++){
                    if (!$(curInputs[i]).valid()){
                        isValid = false;
                    }
                }

                if (isValid){
                    //Progress to the next page.
                    nextStepWizard.removeClass('disabled').trigger('click');
                    // # # # AJAX REQUEST HERE # # #

                    /*
                    Theoretically, in order to preserve the state of the form should the worst happen, we could use an ajax call that would look something like this:

                    //Prepare the key-val pairs like a normal post request.
                    var fields = {};
                    for(var i= 0; i < curInputs.length; i++){
                      fields[$(curInputs[i]).attr("name")] = $(curInputs[i]).attr("name").val();
                    }

                    $.post(
                        "location.php",
                        fields,
                        function(data){
                          //Silent success handler.
                        }
                    );

                    //The FINAL button on last page should have its own logic to finalize the enrolment.
                    */
                }
            });

            $('div.setup-panel div a.btn-primary').trigger('click');

        } );
        $(document).on('change', '#name', function () {
             $("#inv-table-card").css("display", "block");
        });
        $(document).on('click', '#next1', function () {
            $('#why2').focus();
        });
        $(document).on('click', '#next2', function () {
            $('#why3').focus();
        });
        $(document).on('click', '#next3', function () {
            $('#why4').focus();
        });
        $(document).on('click', '#next4', function () {
            $('#why5').focus();
        });
        $(document).on('click', '#next5', function () {
            $('#rootCause').focus();
        });
        $(document).on('click', '#next6', function () {
            $('#reOccurrence').focus();
        });
    </script>
@endsection
