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
     * @throws Throwable
     */
    public function hasPageViews(Request $request): void
    {
        $ip = $request->getClientIp();
        $session = $request->session()->token();
        $userAgent = $request->userAgent();
        throw_unless(Schema::hasTable('page_views'),'Did you forget to run:- php artisan vendor:publish --tag="page-view-migrations"
            and then run:- php artisan migrate');
        $this->setPageViews($ip,$session,$userAgent);
    }


    /**
     * @param string $ip
     * @param string $session
     * @return bool
     * @throws Throwable
     */
    public function hasPageView(string $ip,string $session): bool
    {
        $hasViewed =  $this->pageViews()->where(function ($query) use($ip,$session){
            $query->where('ip',$ip)->orWhere('session',$session);
        })->count();
        return $hasViewed == 1;
    }

    /**
     * Update Model View Counter
     * @throws Throwable
     */
    public function setPageViews(string $ip,string $session,string $userAgent,bool $random_dates=false): void
    {
        if (!$this->hasPageView($ip,$session)) {
            $attributes = [
                'ip' => $ip,
                'user_agent' => $userAgent,
                'session' => $session,
            ];

            if($random_dates)
            {
                $fakeDate = now()->addDays(fake()->randomDigit())->toDateTime()
                $attributes = array_merge($attributes,['created_at' => $fakeDate, 'updated_at' => $fakeDate]);
            }


            $this->pageViews()->create($attributes);
            // Update Current Model Views
            $this->views++;
            $this->save();
        }
    }






}
