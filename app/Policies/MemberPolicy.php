<?php

namespace App\Policies;

use App\User;
use App\Member;
use Illuminate\Auth\Access\HandlesAuthorization;

class MemberPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user is his Colleague.
     *
     * @param  \App\User $user
     * @param  \App\Member $member
     * @return mixed
     */
    public function colleagues(User $user, Member $member)
    {
        return $user->member->company_id == $member->company_id;
    }

    /**
     * Determine whether the user is PDG.
     *
     * @param  \App\User $user
     * @return mixed
     */
    public function pdg(User $user)
    {
        $category = $user->member->premium->category->category;
        return ( $category == 'pdg' || $category == 'manager');
    }

    /**
     * Determine whether the user is PDG.
     *
     * @param  \App\User $user
     * @return mixed
     */
    public function isPdg(User $user)
    {
        return $user->member->premium->category->category == 'pdg';
    }

    /**
     * Determine whether the user is Manager if this company has manager Member.
     *
     * @param  \App\User $user
     * @return mixed
     */
    public function manager(User $user)
    {
        $category = $user->member->premium->category->category;
        if ($category == 'manager') {
            return true;
        }
        $company = $user->member->company;
        foreach ($company->members as $member) {
            if ($member->premium->category->category == 'manager') {
                return false;
            }
        }
        if($category == 'pdg'){
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user is Manager.
     *
     * @param  \App\User $user
     * @return mixed
     */
    public function isManager(User $user)
    {
        return $user->member->premium->category->category == 'manager';
    }

    /**
     * Determine whether the user is accounting if this company has accounting Member.
     *
     * @param  \App\User $user
     * @return mixed
     */
    public function accounting(User $user)
    {
        $category = $user->member->premium->category->category;
        if ($category == 'accounting') {
            return true;
        }
        $company = $user->member->company;
        foreach ($company->members as $member) {
            if ($member->premium->category->category == 'accounting') {
                return false;
            }
        }
        if($category == 'manager' || $category == 'pdg'){
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user is Accounting.
     *
     * @param  \App\User $user
     * @return mixed
     */
    public function isAccounting(User $user)
    {
        return $user->member->premium->category->category == 'accounting';
    }

    /**
     * Determine whether the user is Commercial if this company has Commercial Member.
     *
     * @param  \App\User $user
     * @return mixed
     */
    public function commercial(User $user)
    {
        $category = $user->member->premium->category->category;
        if ($category == 'commercial') {
            return true;
        }
        $company = $user->member->company;
        foreach ($company->members as $member) {
            if ($member->premium->category->category == 'commercial') {
                return false;
            }
        }
        if($category == 'manager' || $category == 'pdg'){
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user is Commercial.
     *
     * @param  \App\User $user
     * @return mixed
     */
    public function isCommercial(User $user)
    {
        return $user->member->premium->category->category == 'commercial';
    }

    /**
     * Determine whether the user is Delivery if this company has Delivery Member.
     *
     * @param  \App\User $user
     * @return mixed
     */
    public function delivery(User $user)
    {
        $category = $user->member->premium->category->category;
        if ($category == 'delivery') {
            return true;
        }
        $company = $user->member->company;
        foreach ($company->members as $member) {
            if ($member->premium->category->category == 'delivery') {
                return false;
            }
        }
        if($category == 'manager' || $category == 'pdg' || $category == 'commercial' || $category == 'storekeeper'){
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user is Delivery.
     *
     * @param  \App\User $user
     * @return mixed
     */
    public function isDelivery(User $user)
    {
        return $user->member->premium->category->category == 'delivery';
    }

    /**
     * Determine whether the user is Storekeeper if this company has Storekeeper Member.
     *
     * @param  \App\User $user
     * @return mixed
     */
    public function storekeeper(User $user)
    {
        $category = $user->member->premium->category->category;
        if ($category == 'storekeeper') {
            return true;
        }
        $company = $user->member->company;
        foreach ($company->members as $member) {
            if ($member->premium->category->category == 'storekeeper') {
                return false;
            }
        }
        if($category == 'manager' || $category == 'pdg' || $category == 'commercial' || $category == 'delivery'){
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user is Storekeeper.
     *
     * @param  \App\User $user
     * @return mixed
     */
    public function isStorekeeper(User $user)
    {
        return $user->member->premium->category->category == 'storekeeper';
    }
}
