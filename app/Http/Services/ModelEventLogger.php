<?php

namespace App\Services;

use Illuminate\Support\Facades\Log;

class ModelEventLogger
{
    public static function log(string $event, $model)
    {
        Log::info("Model event: {$event}", [
            'model' => get_class($model),
            'attributes' => $model->getAttributes(),
        ]);
        
        $changes = [];
        if ($event === 'updated') {
            $changes['old'] = $model->getOriginal();
            $changes['new'] = $model->getChanges();
        }

        Log::info('Model Event Logged', [
            'event' => $event,
            'model' => get_class($model),
            'record_id' => $model->id,
            'changes' => $changes,
            'user_id' => auth()->id(),
        ]);
    }
}