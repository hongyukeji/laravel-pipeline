<?php

namespace Hongyukeji\LaravelPipeline\Pipelines;

class ProductDiscount
{
    public function handle($order, $next)
    {
        bcscale(2);
        $amount = '0';
        foreach ($order->products as $product) {
            // 这里的 discount 我们就当他是跟下面 VIP 一样的小数那样。
            // 这里似乎还应该考虑限时折，这里就不展开写了。
            $amount = bcadd($amount, bcmul($product->price, $product->discount));
        }
        $order->amount = $amount;
        return $next($order);
    }
}
