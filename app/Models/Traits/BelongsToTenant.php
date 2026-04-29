<?php

namespace App\Models\Traits;

use Illuminate\Database\Eloquent\Builder;

trait BelongsToTenant
{
    protected static function bootBelongsToTenant(): void
    {
        static::addGlobalScope('tenant', function (Builder $query) {
            if (auth()->check() && ! auth()->user()->isMaster()) {
                $query->where($query->getModel()->getTable() . '.company_id', auth()->user()->company_id);
            }
        });

        static::creating(function ($model) {
            if (auth()->check() && ! auth()->user()->isMaster()) {
                $model->company_id ??= auth()->user()->company_id;
                if (property_exists($model, 'branchScoped') && $model->branchScoped) {
                    $model->branch_id ??= auth()->user()->branch_id;
                }
            }
        });
    }
}
