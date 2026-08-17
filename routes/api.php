<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request as FacadesRequest;
use Illuminate\Support\Facades\Route;

Route::get('/health', function() {
    return response()->json('Minha API está online!');
});

Route::post('/users', function() {
    $data = FacadesRequest::validate([
        'name' => ['required', 'string', 'max:100', 'min:3'],
        'email' => ['required', 'email'],
        'password' => ['required', 'min:4', 'max:20']
    ]);

    User::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'password' => $data['password']
    ]);

    return response()->json('Usuário criado com sucesso!');
});