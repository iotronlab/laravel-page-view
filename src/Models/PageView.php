<?php
namespace Iotronlab\LaravelPageView\Models;


class PageView extends Model
{
    use HasFactory;

    protected $fillable = [
        'ip','user_agent','session'
    ];


    public function viewable()
    {
        return $this->morphTo();
    }



}
