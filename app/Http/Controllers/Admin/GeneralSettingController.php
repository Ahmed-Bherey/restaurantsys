<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ActivitManagement;
use App\Models\Extra;
use App\Models\WorkHour;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GeneralSettingController extends Controller
{
    //
    public function create()
    {
        $activeManagement = ActivitManagement::first();
        $extra = Extra::first();
        $WorkHours = WorkHour::get();
        return view('admin.pages.generalSettings.create', compact('activeManagement', 'extra','WorkHours'));
    }

    public function activeManagement(Request $request)
    {
        $activeManagement = ActivitManagement::first();
        $logo = null;
        if (isset($request->logo)) {
            $logo = $request->logo->store('public/generalSetting/activeManagement');
        } elseif (isset($activeManagement->logo)) {
            $logo = $activeManagement->logo;
        }

        $background = null;
        if (isset($request->background)) {
            $background = $request->background->store('public/generalSetting/activeManagement');
        } elseif (isset($activeManagement->background)) {
            $background = $activeManagement->background;
        }

        $receipt_from_place = 0;
        if ($request->receipt_from_place == 1) {
            $receipt_from_place = 1;
        }

        $delivery = 0;
        if ($request->delivery == 1) {
            $delivery = 1;
        }

        $free_delivery = 0;
        if ($request->free_delivery == 1) {
            $free_delivery = 1;
        }

        $disable_request = 0;
        if ($request->disable_request == 1) {
            $disable_request = 1;
        }

        $disable_connection_to_waiter = 0;
        if ($request->disable_connection_to_waiter == 1) {
            $disable_connection_to_waiter = 1;
        }

        $disable_follow_order = 0;
        if ($request->disable_follow_order == 1) {
            $disable_follow_order = 1;
        }

        $eat_on_spot = 0;
        if ($request->eat_on_spot == 1) {
            $eat_on_spot = 1;
        }
        ActivitManagement::updateOrCreate([], [
            'user_id' => Auth::user()->id,
            'name' => $request->name,
            'desc' => $request->desc,
            'address' => $request->address,
            'tel' => $request->tel,
            'whatsapp' => $request->whatsapp,
            'minimum_order' => $request->minimum_order,
            'prepar_order_time' => $request->prepar_order_time,
            'order_time' => $request->order_time,
            'logo' => $logo,
            'background' => $background,
            'receipt_from_place' => $receipt_from_place,
            'delivery' => $delivery,
            'free_delivery' => $free_delivery,
            'disable_request' => $disable_request,
            'disable_connection_to_waiter' => $disable_connection_to_waiter,
            'disable_follow_order' => $disable_follow_order,
            'eat_on_spot' => $eat_on_spot,
        ]);
        return redirect()->back()->with(['success' => "تم الحفظ بنجاح"]);
    }

    public function extra(Request $request)
    {
        $hide_tax = 0;
        if ($request->hide_tax == 1) {
            $hide_tax = 1;
        }
        Extra::updateOrCreate([], [
            'user_id' => Auth::user()->id,
            'tax' => $request->tax,
            'hide_tax' => $hide_tax,
        ]);
        return redirect()->back()->with(['success' => "تم الحفظ بنجاح"]);
    }

    public function workHour(Request $request)
    {
        WorkHour::create([
            'user_id' => Auth::user()->id,
            'name' => $request->name,
            'from' => $request->from,
            'to' => $request->to,
        ]);
        return redirect()->back()->with(['success' => "تم الحفظ بنجاح"]);
    }
}
