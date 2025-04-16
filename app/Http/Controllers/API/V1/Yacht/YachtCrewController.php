<?php

namespace App\Http\Controllers\API\V1\Yacht;

use App\Http\Controllers\Controller;
use App\Services\API\V1\Yacht\YachtCrewService;
use Illuminate\Http\Request;

class YachtCrewController extends Controller
{
   protected YachtCrewService $yachtCrewService;
   public function __construct(YachtCrewService $yachtCrewService)
   {
       $this->yachtCrewService = $yachtCrewService;
   }
   public function getAllCrew()
   {
       try {
           $crews = $this->yachtCrewService->getAllCrew();
           if ($crews->isEmpty()) {
               return response()->json(['message' => 'No crew members found.'], 404);
           }
           return response()->json($crews, 200);
       } catch (\Exception $e) {
           // Handle the exception
           return response()->json(['error' => 'An error occurred while fetching crew data.'], 500);
       }
   }
    public function getCrewById($id)
    {
         try {
              $crew = $this->yachtCrewService->getCrewById($id);
              if (!$crew) {
                return response()->json(['message' => 'Crew member not found.'], 404);
              }
              return response()->json($crew, 200);
         } catch (\Exception $e) {
              // Handle the exception
              return response()->json(['error' => 'An error occurred while fetching crew data.'], 500);
         }
    }
}
