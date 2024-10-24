<?php

use App\Const\Options\LangOptions ;



function checkLangAndSendMessage($message){


    if (in_array(request()->header('localization'),LangOptions::$lang)) {
        return __($message,[],request()->header('localization'));
    }

    return __($message,[],"ar");

}
