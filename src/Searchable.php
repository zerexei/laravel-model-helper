<?php

namespace Zerexei\LaravelModelHelper;

/**
 * 
 */
trait Searchable
{
    /**
     * 
     */
    public function scopeSearch(\Illuminate\Database\Eloquent\Builder $query, string|array $keys, string $value): void
    {
        if (!$value) return;

        // 
        $query->where(function ($query) use ($keys, $value) {

            //
            \Illuminate\Support\Str::of($value)
                //
                ->explode(" ")

                //
                ->each(function ($term) use ($query, $keys) {

                    //
                    foreach ((array) $keys as $key) {
                        $query->orWhere($key, 'LIKE', $term . '%');
                    }
                });
        });
    }
}
