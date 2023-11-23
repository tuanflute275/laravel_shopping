<?php

namespace App\Http\CommonFunction;

use App\Position;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Toastr;

class CommonFunction
{
    function handleNotifyAndRedirect($alertType,$message,$redirectRoute){
        Toastr::$alertType($alertType, $message);
        return redirect()->route($redirectRoute);
    }
    function handleNotifyAndBack($alertType,$message){
        Toastr::$alertType($alertType, $message);
        return redirect()->back();
    }
}
