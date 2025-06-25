<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Meja;

class MejaApiController extends Controller
{
    public function show($id)
    {
        $meja = Meja::findOrFail($id);
        $meja->status_label = Meja::$statusOptions[$meja->status] ?? $meja->status;
        return response()->json($meja);
    }


}
