<?php

namespace App\Http\Controllers;

use App\Models\Data;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class DataController extends Controller
{
    public function sessions()
    {
        if (is_null(Data::allData())) { //Basic middleware
            return view('session');
        } else {
            return redirect('/ball');
        }
    }

    public function cancel()
    {

        $all = Session::get('bucket_game');
        unset($all["current_suggestion"]);
        Session::put('bucket_game', $all);
        return redirect("/ball");
    }

    public function validated()
    {
        $data = Data::allData();
        if (is_null($data)) { //Basic middleware
            return redirect('/');
        } else {
            dd($data);
            if ( array_key_exists("current_suggestion",$data) && !is_null($data["current_suggestion"])) {
                foreach($data["current_suggestion"]["results"] as $key => $dataInside){

                }
            }
        }
    }

    public function balls(Request $request)
    {
        if (is_null(Data::allData())) { //Basic middleware
            return redirect('/');
        } else {

            return view(
                'balls',
                [
                    "balls" => Data::getBalls(),
                    "buckets" => Data::getBuckets(),
                    "current_suggestion"=>Data::currentSuggestion(),
                ]
            );
        }

    }

    public function start_session(Request $request)
    {
        $this->validate($request, [
            'A' => 'required|numeric',
            'B' => 'required|numeric',
            'C' => 'required|numeric',
            'D' => 'required|numeric',
            'E' => 'required|numeric',
            'Pink' => 'required|numeric',
            'Red' => 'required|numeric',
            'Blue' => 'required|numeric',
            'Orange' => 'required|numeric',
            'Green' => 'required|numeric',
        ]);
        Data::store_data([
            "A" => [
                "max" => (int)$request->A,
                "empty" => (int)$request->A,
                "used" => 0,
            ],
            "B" => [
                "max" => (int)$request->B,
                "empty" => (int)$request->B,
                "used" => 0,
            ], "C" => [
                "max" => (int)$request->C,
                "empty" => (int)$request->C,
                "used" => 0,
            ], "D" => [
                "max" => (int)$request->D,
                "empty" => (int)$request->D,
                "used" => 0,
            ], "E" => [
                "max" => (int)$request->E,
                "empty" => (int)$request->E,
                "used" => 0,
            ],
        ], [
            "Pink" => (int)$request->Pink,
            "Red" => (int)$request->Red, "Blue" => (int)$request->Blue, "Orange" => (int)$request->Orange, "Green" => (int)$request->Green,
        ]);
        return redirect('/');
    }

    public function suggest(Request $request)
    {
        $this->validate($request, [
            'Pink' => 'required|numeric',
            'Red' => 'required|numeric',
            'Blue' => 'required|numeric',
            'Orange' => 'required|numeric',
            'Green' => 'required|numeric'
        ]);
        Data::make_suggestion([
            'Pink' => $request->Pink,
            'Red' => $request->Red,
            'Blue' => $request->Blue,
            'Orange' => $request->Orange,
            'Green' => $request->Green,
        ]);
        return redirect('/ball');
    }
}
