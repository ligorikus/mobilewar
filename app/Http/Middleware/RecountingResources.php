<?php

namespace App\Http\Middleware;

use App\Model\Build;
use App\Model\GameResource;
use App\Model\MapFieldResource;
use App\Services\ResourceService;
use Carbon\Carbon;
use Closure;

class RecountingResources
{
    /**
     * @var ResourceService
     */
    private $resourceService;

    /**
     * RecountingResources constructor.
     * @param ResourceService $resourceService
     */
    public function __construct(ResourceService $resourceService)
    {
        $this->resourceService = $resourceService;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $map_fields = \auth()->user()->map_fields()->with(['resources','productions'])->get();
        foreach ($map_fields as $map_field) {
            $this->resourceService->recount($map_field);
        }
        return $next($request);
    }
}
