<?php
namespace Iotronlab\LaravelPageView\Models;


use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\MassPrunable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

/**
 * @property $ip
 * @property $user_agent
 * @property $session
 */
class PageView extends Model
{
    use HasFactory,MassPrunable;

    protected $fillable = [
        'ip','user_agent','session'
    ];


    /**
     * @return MorphTo
     */
    public function viewable()
    {
        return $this->morphTo();
    }



    /**
     * Get the prunable model query.
     *
     * @return Builder
     */
    public function prunable()
    {
        return static::where('created_at', '<=', now()->subMonth());
    }




}
