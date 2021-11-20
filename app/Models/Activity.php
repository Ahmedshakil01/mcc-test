<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $table = 'activities';

    protected $fillable = ['name', 'acted_on', 'acted_by'];

    public function alreadyOccurred($action, $userId)
    {
        $loggedUserId = Auth::user()->id;


        return Activity::where([
            'name' => $action,
            'acted_on' => $userId,
            'acted_by' => $loggedUserId
        ])->get()->count();
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
