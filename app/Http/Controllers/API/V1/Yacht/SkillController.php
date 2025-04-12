<?php

namespace App\Http\Controllers\API\V1\Yacht;

use App\Http\Controllers\Controller;
use App\Models\Skill;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class SkillController extends Controller {
    public function index(Request $request): JsonResponse {
        $query = $request->input('query');

        $skills = Skill::when($query, function ($q) use ($query) {
            $q->where('name', 'LIKE', '%' . $query . '%');
        })
            ->orderBy('name')
            ->limit(10)
            ->get(['id', 'name']);

        return response()->json($skills);
    }
}
