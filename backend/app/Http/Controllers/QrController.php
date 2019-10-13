<?php

namespace App\Http\Controllers;

use App\Http\Requests\GenerateQrRequest;
use App\Http\Requests\VerifyQrRequest;
use App\Qr;
use App\User;

class QrController extends Controller
{
    public function verify(VerifyQRRequest $request)
    {
        $user = auth()->user();

        $qr = Qr::where("string", "like", $request->string)->get();

        $QR = $qr->first();

        $points = $QR ? $QR->points : -1;
        dd($user);
        if($user){
            if ($points>=0){
                $user->score+=$points;
                $user->save();
            }
        }

        return response()->json([
            "valid" => $QR !== null,
            "points" => $points,
        ]);
    }

    public function generate(GenerateQRRequest $request)
    {
        $qr = Qr::create(["string" => Qr::generateString(), "points" => $request->points]);

        return response()->json(["string" => $qr->string]);
    }
}
