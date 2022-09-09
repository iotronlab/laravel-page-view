<?php

namespace Iotronlab\LaravelPageView\Traits;
use Illuminate\Http\Request;
use Iotronlab\LaravelPageView\Models\PageView;

trait hasPageView
{

    /**
     * @return mixed
     */
    public function pageViews()
    {
        return $this->morphMany(PageView::class, 'viewable');
    }

    /**
     * @param Request $request
     * @return void
     */
    public function hasPageViews(Request $request)
    {

        $ip = $request->getClientIp();
        $session = $request->session()->token();
        $userAgent = $request->userAgent();

        $hasViewed = $this->pageViews()->where(function ($query) use($ip,$session){
            $query->where('ip',$ip)->orWhere('session',$session);
        })->count();


        if ($hasViewed == 0) {
            // Create Record
//            $newPageView = new PageView();
//            $newPageView->ip = $ip;
//            $newPageView->user_agent = $userAgent;
//            $newPageView->session = $session;
//            $this->pageViews()->save($newPageView);

            $this->pageViews()->create([
                'ip' => $ip,
                'user_agent' => $userAgent,
                'session' => $session,
            ]);


            // Update Model View Counter
            $this->views++;
            $this->save();
        }
    }





}
