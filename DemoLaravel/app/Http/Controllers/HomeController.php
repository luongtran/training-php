<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\User\UserRepositoryInterface;
use App\Http\Requests\CreateUserRequest;
use Auth;

class HomeController extends Controller
{
    private $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function listUser()
    {
      $users = $this->userRepository->getAll();
      return view('listUser',compact('users'));
    }

    public function getAdd()
    {
      return view('create');
    }

    public function saveUser(CreateUserRequest $request)
    {
      $data = $request->all();
      $data['password'] =  bcrypt($request['password']);
      $users = $this->userRepository->create($data);
      return redirect('/list/user');
    }

    public function editUser($id)
    {
      if(Auth::user()->role == 0)
      {
        $user = $this->userRepository->find($id);
        return view('editUser',compact('user'));
      }
      return redirect('/list/user');

    }

    public function updateUser(CreateUserRequest $request)
    {
      $data = $request->all();
      $data['password'] =  bcrypt($request['password']);
      $users = $this->userRepository->update($data['id'],$data);
      return redirect('/list/user');
    }

    public function delete($id)
    {
      if(Auth::user()->role == 0)
      {
        $this->userRepository->delete($id);
        return redirect('/list/user');
      }
      return redirect('/list/user');

    }

    public function Logout()
    {
      Auth::logout();
      return redirect('/');
    }
}
