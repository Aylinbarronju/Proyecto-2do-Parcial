<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Project;



class ProjectPolicy
{
    /**
     * Determine if the user can view any projects.
     */
    public function viewAny(User $user)
    {
        return $user->role === 'admin';
    }

    /**
     * Determine if the user can create a project.
     */
    public function create(User $user)
    {
        return $user->role === 'admin';
    }

    /**
     * Determine if the user can update the project.
     */
    public function update(User $user, Project $project)
    {
        return $user->id === $project->user_id;
    }
    
    // Otros métodos para diferentes acciones...
}
