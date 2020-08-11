<?php

namespace Hongyukeji\LaravelPipeline\Pipelines;

class CouponUsing
{
    public function handle($order, $next)
    {
        return $next($order);
    }
}
