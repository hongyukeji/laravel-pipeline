<?php

namespace Hongyukeji\LaravelPipeline\Pipelines;

class PipelineExample
{
    public function handle($data, $next)
    {
        // 处理 $data 数据
        if (isset($data['password'])) {
            $data['password'] = bcrypt($data['password']);
        }
        return $next($data);
    }
}
