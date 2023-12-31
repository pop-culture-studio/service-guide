<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\FacilityResource;
use App\Models\Area;
use App\Models\Facility;
use App\Models\Pref;
use App\Models\Service;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class FacilityController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $service = Service::where('name', 'LIKE', '%'.$request->input('service').'%')->first();
        $pref = Pref::where('name', 'LIKE', '%'.$request->input('pref').'%')->first();
        $area = Area::where('name', 'LIKE', '%'.$request->input('area').'%')->first();

        $facilities = Facility::when(filled($service), function (Builder $query) use ($service) {
            $query->where('service_id', $service->id);
        })->when(filled($pref), function (Builder $query) use ($pref) {
            $query->where('pref_id', $pref->id);
        })->when(filled($area), function (Builder $query) use ($area) {
            $query->where('area_id', $area->id);
        })
            ->latest()
            ->simplePaginate()
            ->withQueryString();

        return FacilityResource::collection($facilities);
    }
}
