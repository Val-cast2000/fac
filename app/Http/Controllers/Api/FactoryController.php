<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreFactoryRequest;
use App\Models\Factory;
use Illuminate\Support\Facades\Gate;

class FactoryController extends Controller
{
    public function __construct()
    {
        // Middleware is automatically applied via routes
    }

    public function index()
    {
        Gate::authorize('viewAny', Factory::class);
        return Factory::paginate(10);
    }

    public function store(StoreFactoryRequest $request)
    {
        Gate::authorize('create', Factory::class);
        return Factory::create($request->validated());
    }

    public function show(Factory $factory)
    {
        Gate::authorize('view', $factory);
        return $factory;
    }

    public function update(StoreFactoryRequest $request, Factory $factory)
    {
        Gate::authorize('update', $factory);
        $factory->update($request->validated());
        return $factory;
    }

    public function destroy(Factory $factory)
    {
        Gate::authorize('delete', $factory);
        $factory->delete();
        return response()->noContent();
    }
}