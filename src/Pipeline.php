<?php

namespace Hongyukeji\LaravelPipeline;

use Illuminate\Pipeline\Pipeline as LaravelPipeline;

class Pipeline
{
    protected $config;

    public function __construct(array $config = [])
    {
        $this->config = $config;
    }

    public function pipeline($pipe, $data)
    {
        $pipeline = resolve(LaravelPipeline::class);
        if (!isset($this->config[$pipe])) {
            throw new \Exception("管道 {$pipe} 不存在");
        }
        $handlers = $this->config[$pipe];
        return $pipeline->through($handlers)->send($data)->thenReturn();
    }
}
