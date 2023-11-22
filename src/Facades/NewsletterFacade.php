<?php

namespace Adminetic\Newsletter\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Adminetic\Newsletter\Skeleton\SkeletonClass
 */
class NewsletterFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'newsletter';
    }
}
