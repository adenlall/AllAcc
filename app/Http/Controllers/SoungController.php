<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class SoungController extends Controller
{
    //
    public function __invoke(Request $request)
    {
        $validated = $request->validate([
            'track' => ['required'],
            'artist' => ['required'],
        ]);

        if ($validated) {

            $deezURL = "https://api.deezer.com/search?q=artist:'{$request->artist}'track:'{$request->track}'";
            $resop = Http::get($deezURL)->json();
            if (count($resop["data"]) === 0) {
                return redirect('/dashboard')->with([
                    'type' => 'error',
                    'message' => 'Opps... Track selected not found please select other one and make sure that is original one!'
                ]);
            } else {
                User::where('username', Auth::user()->username)->update([
                    'track' => $request['track'],
                    'artist' => $request['artist'],
                ]);
                return redirect('/dashboard')->with([
                    'type' => 'success',
                    'message' => "{$request['artist']}'s track has beent set!"
                ]);
            }
        }
    }
}
