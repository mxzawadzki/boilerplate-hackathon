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
        /** @var User $user */
        $user = auth()->user();

        $qr = Qr::where("string", "like", $request->string)->get()->first();

        $points = $qr ? $qr->points : -1;

        if ($points >= 0) {
            $user->score += $points;
            $user->save();
        }

        return response()->json([
            "valid" => $qr !== null,
            "points" => $points,
        ]);
    }

    public function generate(GenerateQRRequest $request)
    {
        $qr = Qr::create(["string" => Qr::generateString(), "points" => $request->points]);

        return response()->json(["string" => $qr->string]);
    }
}
