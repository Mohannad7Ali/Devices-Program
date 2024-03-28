<?php

namespace App\Traits;

trait APIResponseTrait
{


    public function returnError($errNum= "error!!!", $msg ="some thing went wrong")
    {
        return response()->json([
            'status' => false,
            'errNum' => $errNum,
            'msg' => $msg
        ]);
    }


    public function returnSuccessMessage($msg = "The proccess completed successfuly", $errNum = "success!!!")
    {
        return [
            'status' => true,
            'errNum' => $errNum,
            'msg' => $msg
        ];
    }

    public function returnData($key, $value, $msg = "The proccess completed successfuly")
    {
        return response()->json([
            'status' => true,
            'errNum' => "success!!!",
            'msg' => $msg,
            $key => $value
        ]);
    }


}
