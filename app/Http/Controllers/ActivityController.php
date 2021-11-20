<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Repositories\ActivityRepositoryInterface;
use App\Repositories\CentralUserRepositoryInterface;


class ActivityController extends Controller
{
    /**
     * @var ActivityRepositoryInterface
     */
    private $activityRepository;
    private $like;
    private $dislike;
    /**
     * @var CentralUserRepositoryInterface
     */
    private $centralUserRepository;

    public function __construct(ActivityRepositoryInterface $activityRepository, CentralUserRepositoryInterface $centralUserRepository)
    {

        $this->activityRepository = $activityRepository;
        $this->like = 'like';
        $this->dislike = 'dislike';
        $this->centralUserRepository = $centralUserRepository;
    }

    public function like( Request $request )
    {
        $response =  $this->activityRepository->updateAction($this->like, $request->userId);

        return json_encode($response);
    }


    public function dislike( Request $request )
    {
        $response =  $this->activityRepository->updateAction($this->dislike, $request->userId);

        return json_encode($response);
    }

    public function map( Request $request )
    {
        $users =  $this->centralUserRepository->desiredUserList('map');

        return view('map', [
            'users' => $users,

        ]);

    }
}
