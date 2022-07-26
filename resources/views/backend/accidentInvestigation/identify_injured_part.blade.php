@extends('layouts.default')
@section('title')
    Identify Injured Part
@endsection
@section('css')
@endsection
@section('content')
    <!-- Body: Body -->

    <div class="card">
        <div class="card-header" style="font-size: 1.3rem"><b>Include sketch of the incident and Identify Part of Injury</b></div>
        <div class="card-body">
            <form action="{{ route('accident_report.identify_injured_part_store') }}" method="post">
                @csrf
                <table class="display table table-bordered table-striped" style="width:100%">
                    <thead>
                    <tr>
                        <th>
                            <div class="d-flex justify-content-between">
                                <span>Check If Body Part Injured</span>
                                <div class="form-group">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" checked type="radio" name="body_part" id="right_part">
                                        <label class="form-check-label" for="right_part">Right</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="body_part" id="left_part">
                                        <label class="form-check-label" for="left_part">Left</label>
                                    </div>
                                </div>
                            </div>
                        </th>
                        <th>
                            <div class="mb-3">
                                <span>NATURE OF INJURY</span>
                            </div>
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    <input type="hidden" name="inc_number" id="inc_number" value="{{ request('id') }}">

                    <tr>
                        <td>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="d-flex justify-content-between">
                                        <label class="form-label">Head</label>
                                        <input type="checkbox" name="head" id="head" value="head" class="form-check">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="d-flex justify-content-between">
                                        <label class="form-label d-flex">
                                            <span style="display: none"> Right&nbsp;</span>
                                            <span> Toe</span>
                                        </label>
                                        <input type="checkbox" name="right_toe" id="right_toe" value="right toe" class="form-check">
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="d-flex justify-content-between">
                                        <label class="form-label">Burn</label>
                                        <input type="checkbox" name="burn" id="burn" value="burn" class="form-check">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="d-flex justify-content-between">
                                        <label class="form-label">Sprain</label>
                                        <input type="checkbox" name="sprain" id="sprain" value="sprain" class="form-check">
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td id="left" style="display: none">
                            <div class="row">
                                <div class="col-md-6">
                                </div>
                                <div class="col-md-6">
                                    <div class="d-flex justify-content-between">
                                        <label class="form-label">Left Toe</label>
                                        <input type="checkbox" name="left_toe" id="left_toe" value="Left Toe" class="form-check">
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="d-flex justify-content-between">
                                        <label class="form-label d-flex">
                                            <span style="display: none"> Right&nbsp;</span>
                                            <span>Eye</span>
                                        </label>
                                        <input type="checkbox" name="right_eye" id="right_eye" value="right eye" class="form-check">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="d-flex justify-content-between">
                                        <label class="form-label">Neck</label>
                                        <input type="checkbox" name="neck" id="neck" value="Neck" class="form-check">
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="d-flex justify-content-between">
                                        <label class="form-label">Bruise</label>
                                        <input type="checkbox" name="bruise" id="bruise" value="Bruise" class="form-check">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="d-flex justify-content-between">
                                        <label class="form-label">Fracture</label>
                                        <input type="checkbox" name="fracture" id="fracture" value="Fracture" class="form-check">
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td id="left1" style="display: none">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="d-flex justify-content-between">
                                        <label class="form-label">Left Eye</label>
                                        <input type="checkbox" name="left_eye" id="left_eye" value="Left Eye" class="form-check">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="d-flex justify-content-between">
                                        <label class="form-label d-flex">
                                            <span style="display: none"> Right&nbsp;</span>
                                            <span>Ear</span>
                                        </label>
                                        <input type="checkbox" name="right_ear" id="right_ear" value="right Ear" class="form-check">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="d-flex justify-content-between">
                                        <label class="form-label">Back</label>
                                        <input type="checkbox" name="back" id="back" value="Back" class="form-check">
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="d-flex justify-content-between">
                                        <label class="form-label">Concussion</label>
                                        <input type="checkbox" name="concussion" id="concussion" value="Concussion" class="form-check">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="d-flex justify-content-between">
                                        <label class="form-label">Foreign Body</label>
                                        <input type="checkbox" name="foreign_body" id="foreign_body" value="Foreign Body" class="form-check">
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td id="left2" style="display: none">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="d-flex justify-content-between">
                                        <label class="form-label">Left Ear</label>
                                        <input type="checkbox" name="left_ear" id="left_ear" value="Left Ear" class="form-check">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="d-flex justify-content-between">
                                        <label class="form-label d-flex">
                                            <span style="display: none"> Right&nbsp;</span>
                                            <span>Arm</span>
                                        </label>
                                        <input type="checkbox" name="right_arm" id="right_arm" value="right Arm" class="form-check">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="d-flex justify-content-between">
                                        <label class="form-label d-flex">
                                            <span style="display: none"> Right&nbsp;</span>
                                            <span>Chest</span>
                                        </label>
                                        <input type="checkbox" name="right_chest" id="right_chest" value="Right Chest" class="form-check">
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="d-flex justify-content-between">
                                        <label class="form-label">Laceration</label>
                                        <input type="checkbox" name="laceration" id="laceration" value="Laceration" class="form-check">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="d-flex justify-content-between">
                                        <label class="form-label">Amputation</label>
                                        <input type="checkbox" name="amputation" id="amputation" value="Amputation" class="form-check">
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td id="left3" style="display: none">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="d-flex justify-content-between">
                                        <label class="form-label">Left Arm</label>
                                        <input type="checkbox" name="left_arm" id="left_arm" value="Left Arm" class="form-check">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="d-flex justify-content-between">
                                        <label class="form-label">Left Chest</label>
                                        <input type="checkbox" name="left_chest" id="left_chest" value="Left Chest" class="form-check">
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="d-flex justify-content-between">
                                        <label class="form-label d-flex">
                                            <span style="display: none"> Right&nbsp;</span>
                                            <span>Hand</span>
                                        </label>
                                        <input type="checkbox" name="right_hand" id="right_hand" value="right Hand" class="form-check">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="d-flex justify-content-between">
                                        <label class="form-label"> Internal</label>
                                        <input type="checkbox" name="internal" id="internal" value="Internal" class="form-check">
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="d-flex justify-content-between">
                                        <label class="form-label">Crush</label>
                                        <input type="checkbox" name="crush" id="crush" value="Crush" class="form-check">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="d-flex justify-content-between">
                                        <label class="form-label">Rash</label>
                                        <input type="checkbox" name="rash" id="rash" value="Rash" class="form-check">
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td id="left4" style="display: none">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="d-flex justify-content-between">
                                        <label class="form-label">Left Hand</label>
                                        <input type="checkbox" name="left_hand" id="left_hand" value="Left Hand" class="form-check">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="d-flex justify-content-between">
                                        <label class="form-label d-flex">
                                            <span style="display: none"> Right Hand&nbsp;</span>
                                            <span>Finger</span>
                                        </label>
                                        <input type="checkbox" name="right_hand_finger" id="right_hand_finger" value="Right Hand Finger" class="form-check">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="d-flex justify-content-between">
                                        <label class="form-label"> Abdomen</label>
                                        <input type="checkbox" name="abdomen" id="abdomen" value="Abdomen" class="form-check">
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="d-flex justify-content-between">
                                        <label class="form-label">Eclectic Shock</label>
                                        <input type="checkbox" name="eclectic_shock" id="eclectic_shock" value="Eclectic Shock" class="form-check">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="d-flex justify-content-between">
                                        <label class="form-label">Inhalation</label>
                                        <input type="checkbox" name="inhalation" id="inhalation" value="Inhalation" class="form-check">
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td id="left5" style="display: none">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="d-flex justify-content-between">
                                        <label class="form-label">Left Hand Finger</label>
                                        <input type="checkbox" name="left_hand_finger" id="left_hand_finger" value="Left Hand Finger" class="form-check">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="d-flex justify-content-between">
                                        <label class="form-label d-flex">
                                            <span style="display: none"> Right&nbsp;</span>
                                            <span>Leg</span>
                                        </label>
                                        <input type="checkbox" name="right_leg" id="right_leg" value="Right Leg" class="form-check">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="d-flex justify-content-between">
                                        <label class="form-label d-flex">
                                            <span style="display: none"> Right&nbsp;</span>
                                            <span>Groin</span>
                                        </label>
                                        <input type="checkbox" name="right_groin" id="right_groin" value="Right Groin" class="form-check">
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="d-flex justify-content-between">
                                        <label class="form-label">Hernia</label>
                                        <input type="checkbox" name="hernia" id="hernia" value="Hernia" class="form-check">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="d-flex justify-content-between">
                                        <label class="form-label">Abrasion</label>
                                        <input type="checkbox" name="abrasion" id="abrasion" value="Abrasion" class="form-check">
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td id="left6" style="display: none">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="d-flex justify-content-between">
                                        <label class="form-label">Left Leg</label>
                                        <input type="checkbox" name="left_leg" id="left_leg" value="Left Leg" class="form-check">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="d-flex justify-content-between">
                                        <label class="form-label">Left Groin</label>
                                        <input type="checkbox" name="left_groin" id="left_groin" value="Left Groin" class="form-check">
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="d-flex justify-content-between">
                                        <label class="form-label d-flex">
                                            <span style="display: none"> Right&nbsp;</span>
                                            <span>Knee</span>
                                        </label>
                                        <input type="checkbox" name="right_knee" id="right_knee" value="Right Knee" class="form-check">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="d-flex justify-content-between">
                                        <label class="form-label d-flex">
                                            <span style="display: none"> Right&nbsp;</span>
                                            <span>Shoulder</span>
                                        </label>
                                        <input type="checkbox" name="right_shoulder" id="right_shoulder" value="Right Shoulder" class="form-check">
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="d-flex justify-content-between">
                                        <label class="form-label">Tendinitis</label>
                                        <input type="checkbox" name="tendinitis" id="tendinitis" value="Tendinitis" class="form-check">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="d-flex justify-content-between">
                                        <label class="form-label">Other</label>
                                        <input type="checkbox" name="nature_injury_other" id="nature_injury_other" class="form-check">
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td id="left7" style="display: none">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="d-flex justify-content-between">
                                        <label class="form-label">Left Knee</label>
                                        <input type="checkbox" name="left_knee" id="left_knee" value="Left Knee" class="form-check">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="d-flex justify-content-between">
                                        <label class="form-label">Left Shoulder</label>
                                        <input type="checkbox" name="left_shoulder" id="left_shoulder" value="Left Shoulder" class="form-check">
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="d-flex justify-content-between">
                                        <label class="form-label d-flex">
                                            <span style="display: none"> Right&nbsp;</span>
                                            <span>Foot</span>
                                        </label>
                                        <input type="checkbox" name="right_foot" id="right_foot" value="Right Foot" class="form-check">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="d-flex justify-content-between">
                                        <label class="form-label d-flex">
                                            <span style="display: none"> Right&nbsp;</span>
                                            <span>Ankle</span>
                                        </label>
                                        <input type="checkbox" name="right_ankle" id="right_ankle" value="Right Ankle" class="form-check">
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="d-flex justify-content-between">
                                        <label class="form-label">Strain</label>
                                        <input type="checkbox" name="strain" id="strain" value="Strain" class="form-check">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td id="left8" style="display: none">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="d-flex justify-content-between">
                                        <label class="form-label">Left Foot</label>
                                        <input type="checkbox" name="left_foot" id="left_foot" value="Left Foot" class="form-check">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="d-flex justify-content-between">
                                        <label class="form-label">Left Ankle</label>
                                        <input type="checkbox" name="left_ankle" id="left_ankle" value="Left Ankle" class="form-check">
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="d-flex justify-content-between">
                                        <label class="form-label"> Hip</label>
                                        <input type="checkbox" name="hip" id="hip" value="Hip" class="form-check">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="d-flex justify-content-between">
                                        <label class="form-label"> Other</label>
                                        <input type="checkbox" name="body_part_other" id="body_part_other" class="form-check">
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="row">
                                <div class="col-md-6">
                                </div>
                                <div class="col-md-6">
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="d-flex justify-content-between">
                                <div id="others1_input" class="col-md-12" style="display: none">
                                    <div class="form-group">
                                        <label class="form-label">Others</label>
                                        <input type="text" class="form-control" name="others1" id="others1">
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td >
                            <div class="d-flex justify-content-between">
                                <div id="others2_input" class="col-md-12" style="display: none">
                                    <div class="form-group">
                                        <label class="form-label">Others</label>
                                        <input type="text" class="form-control" name="others2" id="others2">
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <div class="col-md-12 d-flex justify-content-center">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-outline-success" > <i class="fas fa-save"></i> Save</button>
                                </div>
                            </div>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </form>
        </div>
    </div>
@endsection
@section('javascript')
    <script type="text/javascript">
        $(document).on('click', '#left_part', function () {
            $('#left').css('display', 'block');
            $('#left1').css('display', 'block');
            $('#left2').css('display', 'block');
            $('#left3').css('display', 'block');
            $('#left4').css('display', 'block');
            $('#left5').css('display', 'block');
            $('#left6').css('display', 'block');
            $('#left7').css('display', 'block');
            $('#left8').css('display', 'block');
            $('.form-label span').css('display', 'block');
        });
        $(document).on('click', '#right_part', function () {
            $('#left').css('display', 'none');
            $('#left1').css('display', 'none');
            $('#left2').css('display', 'none');
            $('#left3').css('display', 'none');
            $('#left4').css('display', 'none');
            $('#left5').css('display', 'none');
            $('#left6').css('display', 'none');
            $('#left7').css('display', 'none');
            $('#left8').css('display', 'none');
            // $('.form-label span').css('display', 'none');
        });
        $(document).on('change', '#nature_injury_other', function () {
            if (this.checked){
                $('#others2_input').css('display', 'block');
            }else{
                $('#others2_input').css('display', 'none');
            }
        });
        $(document).on('change', '#body_part_other', function () {
            if (this.checked){
                $('#others1_input').css('display', 'block');
            }else{
                $('#others1_input').css('display', 'none');
            }
        });
    </script>
@endsection
