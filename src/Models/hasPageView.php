<?php

namespace Iotronlab\LaravelPageView\Models;


trait hasPageView
{


    public function pageView()
    {
        return $this->morphOne(PageView::class, 'viewable');
    }



}
