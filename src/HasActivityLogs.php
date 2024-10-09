<?php

namespace Zerexei\LaravelModelHelper;

use Spatie\Activitylog\Traits\LogsActivity as SpatieLogsActivity;
use Spatie\Activitylog\Contracts\Activity;
use Spatie\Activitylog\LogOptions;

trait HasActivityLogs
{
    use SpatieLogsActivity;

    public function tapActivity(Activity $activity)
    {
        $request = request();
        $activity->ip_address = $request->ip();
        $activity->navigation = "Model";
    }

    public function getActivitylogOptions(): LogOptions
    {
        //
        $modelName = str(class_basename($this::class))->headline()->value;

        //
        $getDescription = function (string $eventName) use ($modelName) {
            //
            $eventName = str($eventName)->headline()->value;

            //
            return "$modelName has been $eventName";
        };

        return LogOptions::defaults()
            ->logAll()
            ->logExcept(['created_at', 'updated_at', 'password', 'remember_token'])
            ->setDescriptionForEvent($getDescription)
            ->dontLogIfAttributesChangedOnly(['remember_token'])
            ->dontSubmitEmptyLogs()
            ->useLogName($modelName);
    }
}
