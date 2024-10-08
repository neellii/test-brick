<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = Event::with('categories')->paginate(9);
        return view('welcome', compact('events'));
    }

    /**
     * Search the resource.
     */
    public function search(Request $request)
    {
        $events = Event::query()->with('categories')->when(
        $request->search,
        function(Builder $builder) use ($request){
            $builder->where('name', 'ilike', "%{$request->search}%");
        }
        )->orWhereHas('categories', function(Builder $builder) use($request) {
            $builder->where('category', 'ilike', "%{$request->search}%");
        })
        ->paginate(50);

        return view('welcome', compact('events'));
    }

    /**
     * Show User/Admin Dashboard
     */
    public function dashboard()
    {
        if(Auth::user()->role !== 'admin'){ 
            $user = Auth::user();
            return view('user.dashboard', compact('user'));
        } else {
            return view('admin.dashboard');
        }
    }
}
