<?php

namespace Zerexei\LaravelModelHelper;

/**
 * 
 */
trait Cacheable
{
    /**
     * 
     */
    public function getCacheKey(): string
    {
        return sprintf('%s-%s-%s', get_class($this), $this->getKey(), $this->updated_at->timestamp);
    }

    // public function hasCache(): string
    // {
    //     return \Illuminate\Support\Facades\Cache::has($this->getCacheKey());
    // }

    // public function getCache(?callable $default): mixed
    // {
    //     return \Illuminate\Support\Facades\Cache::get($this->getCacheKey(), $default);
    // }

    // public function putCache(mixed $value, $seconds = 10): mixed
    // {
    //     return \Illuminate\Support\Facades\Cache::put($this->getCacheKey(), $value, $seconds);
    // }

    // public function rememberCache($seconds, callable $callable): mixed
    // {
    //     return \Illuminate\Support\Facades\Cache::remember($this->getCacheKey(), $seconds, $callable);
    // }

    // public function rememberForeverCache(callable $callable): mixed
    // {
    //     return \Illuminate\Support\Facades\Cache::rememberForever($this->getCacheKey(), $callable);
    // }
}
