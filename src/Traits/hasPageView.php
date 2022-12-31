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
     * Relation With
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
     * Set Page View
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
     * Check Page Views Exists
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
     * @param string $ip
     * @param string $session
     * @param string $userAgent
     * @return void
     * @throws Throwable
     */
    public function setPageViews(string $ip,string $session,string $userAgent): void
    {
        if (!$this->hasPageView($ip,$session)) {

            $attributes = [
                'ip' => $ip,
                'user_agent' => $userAgent,
                'session' => $session,
            ];
            $this->pageViews()->create($attributes);
            // Update Current Model Views
            $this->views++;
            $this->save();
        }
    }


    /**
     * @param bool $inFuture
     * @return void
     * @throws Throwable
     */
    public function fakePageViews(bool $inFuture=false): void
    {
        $ip = fake()->ipv4;
        $session = fake()->randomLetter;
        if (!$this->hasPageView($ip,$session)) {
            $attributes = [
                'ip' => $ip,
                'user_agent' => fake()->userAgent,
                'session' => $session,
            ];

            if ($inFuture)
            {
                $fakeDate = now()->addDays(fake()->numberBetween(1,30))->toDateTime();
            }else{
                $fakeDate = now()->subDays(fake()->numberBetween(1,30))->toDateTime();
            }

            $attributes = array_merge($attributes,['created_at' => $fakeDate, 'updated_at' => $fakeDate]);


            $this->pageViews()->create($attributes);
            // Update Current Model Views
            $this->views++;
            $this->save();
        }
    }






}
