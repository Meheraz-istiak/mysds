<?php
//app/Helpers/HelperClass.php
namespace App\Helpers;

use App\Entities\Admin\LGeoDistrict;
use App\Entities\Admin\LGeoThana;
use App\Entities\Ams\LPriorityType;
use App\Entities\Ams\OperatorMapping;
use App\Entities\Security\Menu;
use App\Enums\Secdbms\Watchman\AppointmentType;
use App\Managers\Authorization\AuthorizationManager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class HelperClass
{

    public $id;
    public $links;

    public static function breadCrumbs($routeName)
    {
        if (in_array($routeName, ['secdbms.ims.incidence-type.edit'])) {
            return [
                ['submenu_name' => 'Setup', 'action_name' => ''],
                ['submenu_name' => ' Incidence Type', 'action_name' => '']
            ];
        } else if (in_array($routeName, ['secdbms.ims.incidence-setup.edit'])) {
            return [
                ['submenu_name' => 'Setup', 'action_name' => ''],
                ['submenu_name' => ' Incidence Setup', 'action_name' => '']
            ];
        } else if (in_array($routeName, ['secdbms.ims.incidence-setup.edit'])) {
            return [
                ['submenu_name' => 'Setup', 'action_name' => ''],
                ['submenu_name' => ' Incidence Setup', 'action_name' => '']
            ];
        } else if (in_array($routeName, ['secdbms.ims.incidence-location.edit'])) {
            return [
                ['submenu_name' => 'Setup', 'action_name' => ''],
                ['submenu_name' => ' Incidence Location', 'action_name' => '']
            ];
        } else if (in_array($routeName, ['secdbms.ims.incident-entry.edit'])) {
            return [
                ['submenu_name' => ' Incident Entry', 'action_name' => '']
            ];
        } else if (in_array($routeName, ['secdbms.ims.incident-assignment.edit'])) {
            return [
                ['submenu_name' => ' Incident Assign', 'action_name' => '']
            ];
        } else if (in_array($routeName, ['secdbms.ims.incident-investigation.edit'])) {
            return [
                ['submenu_name' => ' Start Investigation', 'action_name' => '']
            ];
        } else if (in_array($routeName, ['secdbms.ims.incident-report-submission.form'])) {
            return [
                ['submenu_name' => ' Report Submission', 'action_name' => '']
            ];
        } else if (in_array($routeName, ['secdbms.ims.incident-action-circulation.edit'])) {
            return [
                ['submenu_name' => ' Action Circulation', 'action_name' => '']
            ];
        } else if (in_array($routeName, ['secdbms.ims.incident-report-other-info.form'])) {
            return [
                ['submenu_name' => ' Incident Other Info', 'action_name' => '']
            ];
        } else if (in_array($routeName, ['lagency-type-edit'])) {
            return [
                ['submenu_name' => 'Setup', 'action_name' => ''],
                ['submenu_name' => ' Agency Type', 'action_name' => '']
            ];
        } else if (in_array($routeName, ['agency-edit'])) {
            return [
                ['submenu_name' => 'Setup', 'action_name' => ''],
                ['submenu_name' => ' Agency', 'action_name' => '']
            ];
        } else if (in_array($routeName, ['address-get', 'appointment-get', 'training-get', 'practical-exam', 'exam-result-get', 'attachment-get', 'profile-get'])) {
            return [
                ['submenu_name' => ' Watchman Registry', 'action_name' => '']
            ];
        } else if (in_array($routeName, ['requisition-edit'])) {
            return [
                ['submenu_name' => ' Watchman Requisition', 'action_name' => '']
            ];
        } else if (in_array($routeName, ['booking-edit'])) {
            return [
                ['submenu_name' => ' Watchman Booking', 'action_name' => '']
            ];
        } else if (in_array($routeName, ['duty-acknowledgement-edit'])) {
            return [
                ['submenu_name' => ' Duty Acknowledgement', 'action_name' => '']
            ];
        } else if (in_array($routeName, ['invoice-status-edit'])) {
            return [
                ['submenu_name' => ' Invoice Status', 'action_name' => '']
            ];
        } else if (in_array($routeName, ['loan-edit'])) {
            return [
                ['submenu_name' => 'Payroll', 'action_name' => ''],
                ['submenu_name' => ' Loan', 'action_name' => '']
            ];
        } else {
            $breadMenus = [];

            try {
                $authorizationManager = new AuthorizationManager();
                $getRouteMenuId = $authorizationManager->findSubMenuId($routeName);
                if ($getRouteMenuId && !empty($getRouteMenuId)) {
                    $breadMenus[] = $bm = $authorizationManager->findParentMenu($getRouteMenuId);
                    if ($bm && isset($bm['parent_submenu_id']) && !empty($bm['parent_submenu_id'])) {
                        $breadMenus[] = $authorizationManager->findParentMenu($bm['parent_submenu_id']);
                    }
                }
            } catch (\Exception $e) {
                return false;
            }

            return is_array($breadMenus) ? array_reverse($breadMenus) : false;
        }
    }

    public static function findDistrictByDivision($divisionId)
    {
        return LGeoDistrict::where('geo_division_id', $divisionId)->get();
    }

    public static function findDivisionByThana ($districtId)
    {
        return LGeoThana::where('geo_district_id', $districtId)->get();
    }

    public static function isNewspaper($typeId)
    {
        return ( (AppointmentType::NEWSPAPER_ADVERTISEMENT == $typeId) || ($typeId == null) );
    }

    public static function isSupplierAgency($typeId)
    {
        return (AppointmentType::SUPPLIER_AGENCY == $typeId);
    }

    public const REQUIRED = 'required';

    public static function getRequiredForNewsPaper($typeId)
    {
        if(static::isNewspaper($typeId))
            return static::REQUIRED;

        return '';
    }

    public static function getRequiredForSupplierAgency($typeId)
    {
        if(static::isSupplierAgency($typeId))
            return static::REQUIRED;

        return '';
    }

    public static function findMonthName ($monthId)
    {
        switch ($monthId) {
            case "1":
                return "JULY";
                break;
            case "2":
                return "AUGUST";
                break;
            case "3":
                return "SEPTEMBER";
                break;
            case "4":
                return "OCTOBER";
                break;
            case "5":
                return "NOVEMBER";
                break;
            case "6":
                return "DECEMBER";
                break;
            case "7":
                return "JANUARY";
                break;
            case "8":
                return "FEBRUARY";
                break;
            case "9":
                return "MARCH";
                break;
            case "10":
                return "APRIL";
                break;
            case "11":
                return "MAY";
                break;
            case "12":
                return "JUNE";
                break;
        }
    }
}
