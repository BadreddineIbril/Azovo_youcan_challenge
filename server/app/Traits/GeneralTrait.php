<?php

namespace App\Traits;

trait GeneralTrait
{

    // ============ RETURN ERROR MESSASGE============
    public function returnError($msg)
    {
        return response()->json([
            'status' => false,
            'msg' => $msg
        ]);
    }

    // ============ RETURN SUCCESS MESSAGE ============
    public function returnSuccessMessage($msg = "")
    {
        return [
            'status' => true,
            'msg' => $msg
        ];
    }


    // ============ RETURN DATA ============
    public function returnData($msg = "", $data)
    {
        return response()->json([
            'status' => true,
            'msg' => $msg,
            'data' => $data
        ]);
    }
}
