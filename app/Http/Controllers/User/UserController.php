<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Question;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * To show counsellor list, can see all counsellors for admin, can see only recommend counsellors for normal users
     */
    public function counsellor_list()
    {
        if (auth()->user()->role === 2) {
            $counsellors = User::where('role', '1')->get();
            return $counsellors;
        } else {
            $user = DB::table('questions')
                ->leftJoin('users', 'users.id', '=', 'questions.user_id')
                ->orderBy('questions.id')
                ->where('users.id', '=', auth()->user()->id)
                ->where('users.deleted_at', '=', NULL)
                ->get();
            foreach ($user as $info) {
                $userPersonality1 = $info->personality1;
                $userPersonality2 = $info->personality2;
                $userHobby1 = $info->hobby1;
                $userHobby2 = $info->hobby2;
                $userMindSet1 = $info->mindset1;
                $userMindSet2 = $info->mindset2;
            }
            $counsellors = DB::table('questions')
                ->leftJoin('users', 'users.id', '=', 'questions.user_id')
                ->orderBy('users.id')
                ->where('questions.personality1', '=', $userPersonality1)
                ->where('questions.personality2', '=', $userPersonality2)
                ->where('questions.hobby1', '=', $userHobby1)
                ->where('questions.hobby2', '=', $userHobby2)
                ->where('questions.mindset1', '=', $userMindSet1)
                ->where('questions.mindset2', '=', $userMindSet2)
                ->where('users.deleted_at', '=', NULL)
                ->get();
            return view('counsellor.index')->with('counsellors', $counsellors);
        }
    }

    /**
     * To see login user's profile, to see counsellor's detail for user
     * @param $id
     */
    public function profile($id)
    {
        $users = User::where('id', $id)->get();
        //return view('counsellor.profile')->with('user', $user);
        foreach($users as $user) {
            return view('counsellor.profile')->with('user', $user);
        }
    }
}
