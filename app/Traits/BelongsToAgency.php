<?php

namespace App\Traits;

use App\Models\Scopes\AgencyScope;
use Illuminate\Support\Facades\Auth;

trait BelongsToAgency
{
    protected static function bootBelongsToAgency(): void
    {
        static::addGlobalScope(new AgencyScope());

        static::creating(function ($model) {

        //dd(Auth::user());
            $user = Auth::user();

            if (
                $user &&
                $user->agency_id &&
                empty($model->agency_id)
            ) {
                $model->agency_id = $user->agency_id;
            }
        });
    }
}
