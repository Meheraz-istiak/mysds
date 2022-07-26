<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use App\Mail\MailSending;
use App\Models\SafetyCommittee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function sendMail(Request $request, $id) {

        $safety_committee = SafetyCommittee::leftJoin('l_employees as emp', 'emp.id', '=', 'safety_committees.employee_id')
            ->leftJoin('company_profile as com', 'com.id', '=', 'emp.company_id')
            ->leftJoin('designations as des', 'des.id', '=', 'emp.em_designation')
            ->select('safety_committees.designation', 'emp.em_name', 'emp.em_ic_passport_no','emp.em_profile','emp.em_mail','des.ds_name', 'com.company_name')
            ->find($id);

        $toEmail    =   $safety_committee->em_mail;

        $data       =   array(
            "emp_name"    =>   $safety_committee->em_name,
            "em_designation"    =>   $safety_committee->ds_name,
            "company_name"    =>   $safety_committee->company_name
        );

        // pass dynamic message to mail class
        Mail::to($toEmail)->send(new MailSending($data));

        if(Mail::failures() !== 0) {
            return back()->with("success", "E-mail sent successfully!");
        }

        else {
            return back()->with("failed", "E-mail not sent!");
        }
    }
}
