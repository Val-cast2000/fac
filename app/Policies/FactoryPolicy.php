<?php

namespace App\Policies;

use App\Models\Factory;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class FactoryPolicy
{
    public function viewAny(User $user): bool
    {
        return true;
    }

    public function view(User $user, Factory $factory): bool
    {
        return true;
    }

    public function create(User $user): bool
    {
        return true;
    }

    public function update(User $user, Factory $factory): bool
    {
        return true;
    }

    public function delete(User $user, Factory $factory): bool
    {
        return true;
    }
}