<!DOCTYPE html>
<html>
<head>
    <title> Email Template in Laravel </title>
</head>
<body>
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden sm:rounded-lg">

            <div class="min-h-screen flex justify-center bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
                <div class="max-w-md w-full space-y-5" style="padding-right: 3rem">
{{--                    <h1>Mail Sending Successfully With Popup</h1>--}}
                    <p>{{ $data['emp_name']}}</p>
                    <p>Food & Beverage Manager</p>
                    <p> {{ $data['company_name']}} </p>

                    {{-- <h5>Date:{{ $data-> created_at }}</h5> --}}

                    <h4>RE : APPOINTMENT AS SAFETY & HEALTH COMMITTEE – {{ $data['em_designation']}}</h4>

                    <p style="text-align: justify">We are pleased to inform you that you have been appointed as an {{ $data['em_designation']}} for the Safety & Health Committee for a period of 2 years.</p>

                    <p style="text-align: justify">Your duties as stipulated in the Safety & Health Committee Regulations 1996  as far as reasonably practical includes amongst others: </p>

                    <p style="text-align: justify">Assist and provide feedback in development of safety and health rules and safe systems of work; </p>
                    <p style="text-align: justify">Attend safety and health committee meetings and inspect the place of work at least once in every three months for unsafe acts and unsafe conditions  prior to attending the meeting, and to discuss the matters in the meeting for resolution with the members  ( Reg 12 )</p>
                    <p style="text-align: justify">Review the trends of incident, near-miss incident, dangerous occurrence, occupational poisoning or occupational disease which occurs at the place of work, and shall report to the employer of any unsafe or unhealthy condition together with recommendations for corrective actions; (Reg 11)</p>
                    <p style="text-align: justify">Investigation of complaint, incidents, near misses and or accidents and provide and maintain a system of communication to enable any of your fellow employees to make a complaint on any unsafe condition or unsafe acts any other duties as stipulated by the SHC Reg 1996. (Reg 13)</p>

                    <p style="text-align: justify">No inspection shall be carried out without having the right / applicable  PPE.
                        Note : All members shall be provided with adequate training -  in occupational safety and health so as to enable them to perform the functions of the committee effectively and safely by abiding all safety and health rules set therein. Please ensure you attend the required training before commencing your duties. IF SHC training attended, then the appt letter will be finalized. (linked to the training module)
                        Training Dates : </p>

{{--                    <p>--}}
{{--                        @component('mail::button', ['url' => 'sdf'])--}}
{{--                            Accept--}}
{{--                        @endcomponent--}}

{{--                        @component('mail::button', ['url' => 'sd'])--}}
{{--                            Reject--}}
{{--                        @endcomponent--}}
{{--                    </p>--}}

                    <h4>Thank you.</h4>
                    <p>Yours faithfully, <br>Shakib Hasan</p>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>

{{--@component('mail::panel')--}}
{{--    {{$data['message']}}--}}

{{--    {{ $data['emp_name']}}--}}
{{--    Food & Beverage Manager--}}
{{--    $company_name--}}

{{--    --}}{{-- <h5>Date:{{ $data-> created_at }}</h5> --}}

{{--    RE : APPOINTMENT AS SAFETY & HEALTH COMMITTEE – {{ $data['em_designation']}}--}}

{{--    We are pleased to inform you that you have been appointed as an {{ $data['em_designation']}} for the Safety & Health Committee for a period of 2 years.--}}

{{--    Your duties as stipulated in the Safety & Health Committee Regulations 1996  as far as reasonably practical includes amongst others:--}}

{{--    Assist and provide feedback in development of safety and health rules and safe systems of work;--}}
{{--    Attend safety and health committee meetings and inspect the place of work at least once in every three months for unsafe acts and unsafe conditions  prior to attending the meeting, and to discuss the matters in the meeting for resolution with the members  ( Reg 12 )--}}
{{--    Review the trends of incident, near-miss incident, dangerous occurrence, occupational poisoning or occupational disease which occurs at the place of work, and shall report to the employer of any unsafe or unhealthy condition together with recommendations for corrective actions; (Reg 11)--}}
{{--    Investigation of complaint, incidents, near misses and or accidents and provide and maintain a system of communication to enable any of your fellow employees to make a complaint on any unsafe condition or unsafe acts any other duties as stipulated by the SHC Reg 1996. (Reg 13)--}}

{{--    No inspection shall be carried out without having the right / applicable  PPE.--}}
{{--        Note : All members shall be provided with adequate training -  in occupational safety and health so as to enable them to perform the functions of the committee effectively and safely by abiding all safety and health rules set therein. Please ensure you attend the required training before commencing your duties. IF SHC training attended, then the appt letter will be finalized. (linked to the training module)--}}
{{--        Training Dates :--}}


{{--    Thank you.--}}
{{--    Yours faithfully,--}}
{{--    Shakib Hasan--}}
{{--@endcomponent--}}
