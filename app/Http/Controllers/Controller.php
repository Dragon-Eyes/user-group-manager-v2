<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function testread() {
//        return 'testread controller';

        $results = DB::select('select * from registrations_v1 where event = ?', ['Stammtisch 2021-01']);
        foreach($results as $result) {
            echo $result->participant_name . '<br>';
        }

    }
}
