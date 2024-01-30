<?php

namespace App\Policies;

use App\Models\Student;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class StudentPolicy
{
    use HandlesAuthorization;

    public function before(?User $user, $ability)
    {
        if ($user?->user_type == "dentist") {
            return true;
        }
        if ($user?->user_type == "assistant") {
            return true;
        }
        if ($user?->user_type == "admin") {
            return true;
        }
        if ($user?->user_type == "student" || $user?->user_type == "employee") {
            return false;
        }
    }

    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(?User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(?User $user, Student $student): bool
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(?User $user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(?User $user, Student $student): bool
    {

        return true;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(?User $user, Student $student): bool
    {
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(?User $user, Student $student): bool
    {
        return true;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(?User $user, Student $student): bool
    {
        return true;
    }
}