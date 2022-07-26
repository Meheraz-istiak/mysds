@extends('layouts.default')
@section('title')
    Why Incidence Happen
@endsection
@section('css')
@endsection
@section('content')


    <!-- Body: Body -->
    <div class="card">
        <div class="card-header" style="font-size: 1.3rem"><b>WHY DID THE INCIDENT HAPPEN?</b></div>
        <div class="card-body">
            <form action="{{ route('accident_report.why_incident_happen_store') }}" method="post">
                @csrf
                <table class="display table table-bordered table-striped" style="width:100%">
                    <thead>
                    <tr>
                        <th>Unsafe conditions: (Check all that apply)</th>
                        <th>Unsafe acts: (Check all that apply)</th>
                    </tr>
                    </thead>
                    <tbody>
                    <input type="hidden" name="inc_number" id="inc_number" value="{{ request('id') }}">

                    <tr>
                        <td>
                            <div class="d-flex justify-content-between">
                                <label class="form-label">Inadequate guard</label>
                                <input type="checkbox" name="in_guard" id="in_guard" value="Inadequate guard"
                                       class="form-check">
                            </div>
                        </td>
                        <td>
                            <div class="d-flex justify-content-between">
                                <label class="form-label">Operating without permission</label>
                                <input type="checkbox" class="form-check" name="operating_permission"
                                       id="operating_permission" value="Operating without permission">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="d-flex justify-content-between">
                                <label class="form-label">Unguarded hazard</label>
                                <input type="checkbox" class="form-check" name="hazard" id="hazard"
                                       value="Unguarded hazard">
                            </div>
                        </td>
                        <td>
                            <div class="d-flex justify-content-between">
                                <label class="form-label">Using the wrong techniques</label>
                                <input type="checkbox" class="form-check" name="techniques" id="techniques"
                                       value="Using the wrong techniques">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="d-flex justify-content-between">
                                <label class="form-label">The safety device is defective</label>
                                <input type="checkbox" class="form-check" name="device_defective" id="device_defective"
                                       value="The safety device is defective">
                            </div>
                        </td>
                        <td>
                            <div class="d-flex justify-content-between">
                                <label class="form-label">Did not follow SWP</label>
                                <input type="checkbox" class="form-check" name="swp" id="swp"
                                       value="Did not follow SWP">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="d-flex justify-content-between">
                                <label class="form-label">Tool or equipment defective</label>
                                <input type="checkbox" class="form-check" name="equipment_defective"
                                       id="equipment_defective" value="Tool or equipment defective">
                            </div>
                        </td>
                        <td>
                            <div class="d-flex justify-content-between">
                                <label class="form-label">Making a safety device inoperative</label>
                                <input type="checkbox" class="form-check" name="device_inoperative"
                                       id="device_inoperative" value="Making a safety device inoperative">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="d-flex justify-content-between">
                                <label class="form-label">Workstation layout is hazardous</label>
                                <input type="checkbox" class="form-check" name="layout_hazardous" id="layout_hazardous"
                                       value="Workstation layout is hazardous">
                            </div>
                        </td>
                        <td>
                            <div class="d-flex justify-content-between">
                                <label class="form-label">Using defective equipment</label>
                                <input type="checkbox" class="form-check" name="defective_equipment"
                                       id="defective_equipment" value="Using defective equipment">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="d-flex justify-content-between">
                                <label class="form-label">Unsafe lighting</label>
                                <input type="checkbox" class="form-check" name="unsafe_lighting" id="unsafe_lighting"
                                       value="Unsafe lighting">
                            </div>
                        </td>
                        <td>
                            <div class="d-flex justify-content-between">
                                <label class="form-label">Using equipment in an unapproved way</label>
                                <input type="checkbox" class="form-check" name="unapproved_way" id="unapproved_way"
                                       value="Using equipment in an unapproved way">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="d-flex justify-content-between">
                                <label class="form-label">Unsafe ventilation</label>
                                <input type="checkbox" class="form-check" name="unsafe_ventilation"
                                       id="unsafe_ventilation" value="Unsafe ventilation">
                            </div>
                        </td>
                        <td>
                            <div class="d-flex justify-content-between">
                                <label class="form-label">Unsafe lifting by hand</label>
                                <input type="checkbox" class="form-check" name="lifting_hand" id="lifting_hand"
                                       value="Unsafe lifting by hand">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="d-flex justify-content-between">
                                <label class="form-label">Lack of needed Personal Protective Equipment</label>
                                <input type="checkbox" class="form-check" name="protective_equipment"
                                       id="protective_equipment" value="Lack of needed Personal Protective Equipment">
                            </div>
                        </td>
                        <td>
                            <div class="d-flex justify-content-between">
                                <label class="form-label">Wrong posture</label>
                                <input type="checkbox" class="form-check" name="wrong_posture" id="wrong_posture"
                                       value="Wrong posture">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="d-flex justify-content-between">
                                <label class="form-label">Lack of appropriate equipment/tool</label>
                                <input type="checkbox" class="form-check" name="appropriate_equipment"
                                       id="appropriate_equipment" value="Lack of appropriate equipment/tool">
                            </div>
                        </td>
                        <td>
                            <div class="d-flex justify-content-between">
                                <label class="form-label">Distraction, teasing, horseplay</label>
                                <input type="checkbox" class="form-check" name="horseplay" id="horseplay"
                                       value="Distraction, teasing, horseplay">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="d-flex justify-content-between">
                                <label class="form-label">Unsafe chemical handling</label>
                                <input type="checkbox" class="form-check" name="chemical_handling"
                                       id="chemical_handling" value="Unsafe chemical handling">
                            </div>
                        </td>
                        <td>
                            <div class="d-flex justify-content-between">
                                <label class="form-label">Failure to wear personal protective equipment</label>
                                <input type="checkbox" class="form-check" name="protective_equipment"
                                       id="protective_equipment" value="Failure to wear personal protective equipment">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="d-flex justify-content-between">
                                <label class="form-label"><strong>No training or insufficient training</strong></label>
                                <input type="checkbox" class="form-check" name="insufficient_training"
                                       id="insufficient_training" value="No training or insufficient training">
                            </div>
                        </td>
                        <td>
                            <div class="d-flex justify-content-between">
                                <label class="form-label">Failure to use the available equipment/tools</label>
                                <input type="checkbox" class="form-check" name="available_equipment"
                                       id="available_equipment" value="Failure to use the available equipment/tools">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="d-flex justify-content-between">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="form-label">Others</label>
                                        <input type="text" class="form-control" name="others1" id="others1">
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="d-flex justify-content-between">
                                <div class="col-md-12">
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
                            <div class="d-flex justify-content-between">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="form-label">Why did the unsafe conditions exist?</label>
                                        <textarea name="unsafe_conditions" id="unsafe_conditions"
                                                  class="form-control"></textarea>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <div class="d-flex justify-content-between">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="form-label">Why did the unsafe acts occur?</label>
                                        <textarea name="unsafe_acts" id="unsafe_acts" class="form-control"></textarea>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <div class="d-flex justify-content-between">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="form-label" style="margin-right: 1rem;">Were the unsafe acts or
                                            conditions reported prior to the incident?</label>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="prior_incident"
                                                   id="prior_incident1" value="Yes">
                                            <label class="form-check-label" for="prior_incident1">Yes</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="prior_incident"
                                                   id="prior_incident2" value="No">
                                            <label class="form-check-label" for="prior_incident2">No</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <div class="d-flex justify-content-between">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="form-label" style="margin-right: 1rem;">Have there been similar
                                            incidents or near misses prior to this one?</label>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="similar_incidents"
                                                   id="similar_incidents1" value="Yes">
                                            <label class="form-check-label" for="similar_incidents1">Yes</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="similar_incidents"
                                                   id="similar_incidents2" value="No">
                                            <label class="form-check-label" for="similar_incidents2">No</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <div class="d-flex justify-content-between">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="form-label">What Personal Protective Equipment was being used (if
                                            any)?</label>
                                        <textarea name="protective_equipment" id="protective_equipment"
                                                  class="form-control"></textarea>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <div class="col-md-12 d-flex justify-content-center">
                                <div class="form-group">
                                    <button type="submit" name="wih" class="btn btn-outline-success"><i
                                            class="fas fa-save"></i> Save
                                    </button>
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
@endsection
