<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\User;
use App\Models\Blog;
use App\Models\Announcement;
use App\Models\About;

class HomeController extends Controller
{
    public function index()
    {
        $events = Event::all();
        $users = User::with('alumniProfile')->get();
        $blogs = Blog::all();
        $announcements = Announcement::all();
        $about = About::first();

        return view('welcome', compact('events', 'users', 'blogs', 'announcements', 'about'));
    }
}
