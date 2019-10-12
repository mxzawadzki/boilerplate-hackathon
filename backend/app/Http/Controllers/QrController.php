<?php

namespace App\Http\Controllers;

use App\Http\Requests\GenerateQrRequest;
use App\Http\Requests\VerifyQrRequest;
use App\Qr;

class QrController extends Controller
{
    public function verify(VerifyQRRequest $request)
    {
        $qr = Qr::where("string", "like", $request->string)->get();

        $QR = $qr->first();

        $string = $QR ? $QR->string : "";

        return response()->json([
            "valid" => $QR === null,
            "string" => $string,
        ]);
    }

    public function generate(GenerateQRRequest $request)
    {
        $qr = Qr::create(["string" => Qr::generateString(), "points" => $request->points]);

        return response()->json(["string" => $qr->string]);
    }
}
