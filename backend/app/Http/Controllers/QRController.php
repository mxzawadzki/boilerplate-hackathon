<?php

namespace App\Http\Controllers;

use App\Http\Requests\GenerateQRRequest;
use App\Http\Requests\VerifyQRRequest;
use App\QR;

class QRController extends Controller
{
    public function verify(VerifyQRRequest $request)
    {
        $qr = QR::where("string", "like", $request->string)->get();

        $QR = $qr->first();

        $string = $QR ? $QR->string : "";

        return response()->json([
            "valid" => $QR === null,
            "string" => $string,
        ]);
    }

    public function generate(GenerateQRRequest $request)
    {
        $qr = QR::create(["string" => QR::generateString(), "points" => $request->points]);

        return response()->json(["string" => $qr->string]);
    }
}
