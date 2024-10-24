<?php
namespace App\Adapter\Response;

use Exception;
use App\Adapter\Response\Model\ViewModel;

class ViewResponse
{


    public static function sendSuccessView(ViewModel $data) {
        if (view()->exists($data->getViewPath())) {
            return view($data->getViewPath())->with($data->getDataKey(), $data->getData());
        }
        throw new Exception('View not found',422);
    }

    public static function sendFiledView(ViewModel $data) {
        return redirect()->back()->with($data->getDataKey(), $data->getData());
    }

}
