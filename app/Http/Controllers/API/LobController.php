<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Helpers\JsonApiResponse;
use App\Models\Lob;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class LobController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'type' => 'required|string',
            'client' => 'required|string',
            'reason' => 'required|string',
            'burden' => 'required|string',
            'date' => 'required|date',
        ]);

        if ($validator->fails()) {
            return JsonApiResponse::error($validator->errors(), Response::HTTP_BAD_REQUEST);
        }

        $lob = new Lob([
            'type' => $request->type,
            'client' => $request->client,
            'reason' => $request->reason,
            'burden' => $request->burden,
            'date' => $request->date,
        ]);

        $lob->save();

        return JsonApiResponse::success($lob, Response::HTTP_CREATED);
    }
}
