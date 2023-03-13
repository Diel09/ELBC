<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\YP;
use Inertia\Inertia;
use Carbon\Carbon;

class YpController extends Controller
{
    public function add()
    {
        return Inertia::render('YP/Add');
    }
    public function store(Request $request)
    {
        $yp = new YP;
        $request->validate([
            'fullName' => 'required',
            'address' => 'required',
            'gender' => 'required',
            'birthDate' => 'required',
            'spiritBirth' => 'required',
        ]);
        
        $yp->name = $request->fullName;
        $yp->address = $request->address;
        $yp->gender = $request->gender;
        $yp->age = Carbon::parse($request->birthDate)->age;
        $yp->birthdate = $request->birthDate;
        $yp->spiritbirth = $request->spiritBirth;

        if($yp->save()){
            return true;
        } else {
            return false;
        }
    }
    public function list()
    {
        return Inertia::render('YP/List', [
            'yp' => YP::all()
        ]);
    }

    public function addPoints(Request $request)
    {
        $yp = YP::findOrFail($request->id);
        $yp->points += $request->pt;
        $yp->update();
    }

    public function leaderboards()
    {
        // dd(YP::orderBy('points', 'desc')->get());
        return Inertia::render('YP/Leaderboards', [
            'yp' => YP::orderBy('points', 'desc')->get()
        ]);
    }
}
