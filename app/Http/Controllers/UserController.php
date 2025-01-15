<?php

namespace App\Http\Controllers;

use App\Repositories\UserRepository;

class UserController extends Controller
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function getAllAdmins() {
        $admins = $this->userRepository->getByRole('admin');
        return view('users.all-admins', compact('admins'));
    }

    public function getAllUsers() {
        $users = $this->userRepository->getByRole('user');
        return view('users.all-users', compact('users'));
    }
}
