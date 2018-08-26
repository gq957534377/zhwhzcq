<?php

namespace App\Listeners\Backend;

use App\Events\Backend\Article\ArticleDeleted;
use App\Events\Backend\Article\ArticleUpdated;

/**
 * Class UserEventListener.
 */
class ArticleEventListener
{
    /**
     * @param $event
     */
    public function onUpdated($event)
    {
        \Log::info('Article Updated');
    }

    /**
     * @param $event
     */
    public function onDeleted($event)
    {
        \Log::info('Article Deleted');
    }

    /**
     * Register the listeners for the subscriber.
     *
     * @param \Illuminate\Events\Dispatcher $events
     */
    public function subscribe($events)
    {
        $events->listen(
            ArticleUpdated::class,
            'App\Listeners\Backend\ArticleEventListener@onUpdated'
        );

        $events->listen(
            ArticleDeleted::class,
            'App\Listeners\Backend\ArticleEventListener@onDeleted'
        );
    }
}
