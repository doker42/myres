<?php

namespace App\Http\Controllers;

use App\Events\NewEvent;
use App\Aboutme;
use App\Avatar;
use App\Http\Location;
use App\Image;
use App\Job;
use App\Letter;
use App\Project;
use App\Visitor;
use App\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MainController extends Controller
{

    public function main(Request $request)
    {
        $ip = $request->getClientIp();
        $visited_date = Date("Y-m-d:H:i:s");

        $location = Location::locationGet($ip);
        $location = ($location) ? $location['country_name'] . " : " . $location['city'] : "noname";
        $visitor = Visitor::updateOrCreate(['ip' => $ip, 'location' => $location], ['visited_date' => $visited_date]);
        $visitor->increment('hits');

        $jobs = Job::all();
        $avatar = Avatar::where('status', 1)->first();
        $aboutme = Aboutme::where('status', 1)->first();
        $image = Image::where('status', 1)->first();
        $letter = Letter::where('status', 1)->first();
        $projects = Project::where('status', 1)->get();
//        $sub = json_encode(env('SUB'));


//        return view('layouts.main', compact('jobs'), ['avatar' => $avatar, 'aboutme' => $aboutme, 'image' =>$image, 'letter' => $letter, 'projects' => $projects, 'sub' => $sub ]);
        return view('layouts.main', compact('jobs'), ['avatar' => $avatar, 'aboutme' => $aboutme, 'image' =>$image, 'letter' => $letter, 'projects' => $projects]);
    }

}
