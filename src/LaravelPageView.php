<?php

namespace Iotronlab\LaravelPageView;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;


class LaravelPageView
{

    public static LaravelPageView $pageView;

    public function __construct()
    {
        self::$pageView = $this;
    }

    public function attempt(Request $request,Model $model)
    {

        $user = $request->user();
        $ip = $request->getClientIp();
        $session = $request->session()->token();


//        $model->pageview();



    }




}
