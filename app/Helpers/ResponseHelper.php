<?php

function failure_response($errors, $data = null, $message = null)
{
    return response()->json([
        'code' => 404,
        'errors' => $errors,
        'data' => $data,
        'message' => $message
    ]);
}
function success_response($data = null, $message = null)
{
    return response()->json([
        'code' => 200,
        'errors' => null,
        'data' => $data,
        'message' => $message
    ]);
}

function code_response($errors, $data = null, $message = null,$code=200)
{
    return response()->json([
        'code' => $code,
        'errors' => $errors,
        'data' => $data,
        'message' => $message
    ]);
}


function api_success_response($message='',$data=[])
{
    return response()->json(['code'=>200,'data'=>$data,'message'=>$message]);
}
function api_error_response($message='')
{
    return response()->json(['code'=>404,'data'=>[],'message'=>$message]);
}
