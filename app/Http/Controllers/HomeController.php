<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

namespace App\Http\Controllers;

use App\Events\CurrentLocationEvent;
use App\Events\TestEvent;
use App\Repositories\CentralUserRepositoryInterface;
use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Application;
use App\User;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class HomeController extends Controller
{
    /**
     * @var CentralUserRepositoryInterface
     */
    private $centralUserRepository;

    /**
     * Create a new controller instance.
     *
     * @param CentralUserRepositoryInterface $centralUserRepository
     */
    public function __construct(CentralUserRepositoryInterface $centralUserRepository)
    {
        $this->middleware('auth');
        $this->centralUserRepository = $centralUserRepository;
    }


    public function index()
    {

        return view('home');
    }

    public function userList()
    {
        $users = $this->centralUserRepository->desiredUserList();


        if ( $users )
        {
            $data['user_list_size'] = count($users);
            $data['data'] = $users;
        }
        else
        {
            $data['user_list_size'] = 0;
            $data['data'] = [];
        }

        $response = json_encode($data);

        //        echo "<pre>";
        return $response;
    }
}
