<?php
namespace App\Controllers;

use App\Models\User;

class HomeController extends Controller
{
    public function index($request, $response)
    {
        // User::create([
        //     'name' => 'Test01',
        //     'email' => 'test@ts.ts',
        //     'phone' => '0546432168',
        //     'role' => '2',
        // ]);
        $users = array('users' => User::all());
        var_dump($users);
        return $this->view->render($response, 'home.twig', $users);
    }
}
