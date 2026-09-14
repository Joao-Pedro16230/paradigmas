<?php

namespace App\Http\Services;

use App\Models\User;

class UserService
{
    public function index(array $data)
    {
        return User::query()->where(function ($query) use($data) {
            if (data_get($data, 'name')) {
                $query->where('name', 'like', '%' . $data['name'] . '%');
            }

            if (data_get($data, 'email')) {
                $query->where('email', 'like', '%' . $data['email'] . '%');
            }
        })->get();
    }

    public function store(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => $data['password']
        ]);
    }

    public function show(string $id)
    {
        return User::findOrFail($id);
    }

    public function update(array $data, string $id)
    {
        $user = $this->show($id);

        $user->update($data);

        return $user->fresh();
    }

    public function destroy(string $id)
    {
        $user = $this->show($id);

        $user->delete();
    }
}