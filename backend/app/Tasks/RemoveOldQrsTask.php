<?php

namespace App\Tasks;

use App\Qr;
use Carbon\Carbon;

class RemoveOldQrsTask{

    static public function remove($minutes){
        $time = Carbon::now()->subMinutes($minutes);
        Qr::whereTime('created_at','<=',$time)->delete();
    }
}
