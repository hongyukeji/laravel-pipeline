<?php

namespace Hongyukeji\LaravelPipeline\Pipelines;

class UserVipDiscount
{
    public function handle($order, $next)
    {
        $vipLevel = (int)Auth::user()->vipLevel();
        $vipMappings = [
            0 => 1,
            1 => 0.95,
            2 => 0.9,
            3 => 0.85,
        ];
        // 是的 这为了保险起见，当取值出现问题时，默认为 1 ，即为不打折。
        $order->amount = bcmul($order->amount, $vipMappings[$vipLevel] ?? 1);
        return $next($order);
    }
}
