<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    /**
     * Получить список доступных автомобилей для текущего пользователя.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getAvailableCars(Request $request)
    {
        $user = $request->user();

        if (!$user) {
            return response()->json(['status' => 'error', 'message' => 'User not authenticated'], 401);
        }

        $startTime = $request->query('start_time');
        $endTime = $request->query('end_time');
        $model = $request->query('model');
        $category = $request->query('category');

        $query = Car::query();

        if ($model) {
            $query->where('model', 'like', "%$model%");
        }

        if ($category) {
            $query->whereHas('category', function ($q) use ($category) {
                $q->where('name', 'like', "%$category%");
            });
        }

        if ($startTime && $endTime) {
            $query->whereDoesntHave('tripTimes', function ($q) use ($startTime, $endTime) {
                $q->where(function ($subQuery) use ($startTime, $endTime) {
                    $subQuery
                        ->where('start_time', '<', $endTime)
                        ->where('end_time', '>', $startTime);
                });
            });
        }

        $query->whereHas('category', function ($q) use ($user) {
            $q->whereIn('id', $user->allowed_categories->pluck('id'));
        });

        $availableCars = $query->with(['category'])->get();

        return response()->json([
            'status' => 'success',
            'data' => $availableCars,
        ]);
    }
}
