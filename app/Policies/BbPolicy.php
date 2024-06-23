<?php

namespace App\Policies;

use App\Models\Posts\Bb;
use App\Models\Users\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class BbPolicy
{
    use HandlesAuthorization;
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    public function update(User $user, Bb $bb): bool
    {
        return $bb->user->id === $user->id;
    }

    public function destroy(User $user, Bb $bb): bool
    {
        return $this->update($user, $bb);
    }
}
