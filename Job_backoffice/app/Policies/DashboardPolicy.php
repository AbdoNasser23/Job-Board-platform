<?php

namespace App\Policies;

use App\Models\User;

class DashboardPolicy
{
    /**
     * Create a new policy instance.
     */
    public function viewAny(User $user)
    {
        return in_array($user->role , ['admin','company_owner']);
    }
}
