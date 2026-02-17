<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LeadController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'name'   => 'required',
            'email'  => 'required|email',
            'phone'  => 'required',
            'source' => 'required'
        ]);

        DB::connection('mysql')->table('leads')->insert($data);
        DB::connection('db2')->table('leads')->insert($data);

        return response()->json([
            'status' => true,
            'message' => 'Lead saved in both databases'
        ]);
    }
}
