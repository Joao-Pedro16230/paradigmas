<?php

namespace App\Http\Services;

use App\Http\Repositories\UserRepository;

class UserService
{
    public function __construct(private UserRepository $userRepository)
    {}

    public function index(array $data)
    {
        return $this->userRepository->index($data);
    }

    public function store(array $data)
    {
        return $this->userRepository->store($data);
    }

    public function show(string $id)
    {
        return $this->userRepository->show($id);
    }

    public function update(array $data, string $id)
    {
        return $this->userRepository->update($data, $id);
    }

    public function destroy(string $id)
    {
        $this->userRepository->destroy($id);
    }
}