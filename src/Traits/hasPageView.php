<?php

namespace Iotronlab\LaravelPageView\Traits;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Http\Request;
use Iotronlab\LaravelPageView\Models\PageView;
use Illuminate\Support\Facades\Schema;
use Throwable;

trait hasPageView
{

    /**
     * @return mixed
     * @throws Throwable
     */
    public function pageViews(): MorphMany
    {
       throw_unless(Schema::hasTable('page_views'),'Did you forget to run:- php artisan vendor:publish --tag="page-view-migrations"
            and then run:- php artisan migrate');
        return $this->morphMany(PageView::class, 'viewable');
    }

    /**
     * @param Request $request
     * @return void
     * @throws \Throwable
     */
    public function hasPageViews(Request $request): void
    {
        $ip = $request->getClientIp();
        $session = $request->session()->token();
        $userAgent = $request->userAgent();


        throw_unless(Schema::hasTable('page_views'),'Did you forget to run:- php artisan vendor:publish --tag="page-view-migrations"
            and then run:- php artisan migrate');

        // Update Model View Counter
        //throw_unless(isset($this->views),'views column not found in'.get_class($this));

        $hasViewed = $this->pageViews()->where(function ($query) use($ip,$session){
            $query->where('ip',$ip)->orWhere('session',$session);
        })->count();

        if ($hasViewed == 0) {
            $this->pageViews()->create([
                'ip' => $ip,
                'user_agent' => $userAgent,
                'session' => $session,
            ]);
            // Update Current Model Views
            $this->views++;
            $this->save();
        }
    }




}
