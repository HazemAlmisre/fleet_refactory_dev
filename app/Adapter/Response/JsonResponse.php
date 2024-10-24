<?php
namespace App\Adapter\Response;

use App\Adapter\Response\Model\JsonModel;


class JsonResponse {
    public static function sendSuccessResponse(JsonModel $data) {
        return response()->json([
            'statusCode' => 200,
            'message' => checkLangAndSendMessage($data->getMessage()),
            'data' => $data->getData(),
        ], 200);
    }

    public static function sendFiledResponse(JsonModel $data) {
        return response()->json([
            'statusCode' => $data->getStatus(),
            'message' => checkLangAndSendMessage($data->getMessage()),
            'data' => $data->getData(),
        ], 500);
    }

}
