<?php

namespace App\Models\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Support\Facades\Auth;

class AgencyScope implements Scope
{
    public function apply(Builder $builder, Model $model): void
    {
        if (! Auth::check()) {
            return;
        }

        $user = Auth::user();

        // System administrator sees everything
        if ($user->role === 'admin') {
            return;
        }

        // Agency users only see their agency
        if ($user->agency_id) {
            $builder->where(
                $model->getTable() . '.agency_id',
                $user->agency_id
            );
        }
    }
}