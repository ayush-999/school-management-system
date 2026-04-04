<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Services\UserService;
use Illuminate\Http\JsonResponse;

class UserController extends Controller
{
    /**
     * Create a new UserController instance.
     */
    public function __construct(protected UserService $userService) {}

    /**
     * Create a new user and send welcome email.
     *
     * @param StoreUserRequest $request
     * @return JsonResponse
     */
    public function add(StoreUserRequest $request): JsonResponse
    {
        $result = $this->userService->createUserWithNotification($request->validated());

        if ($result['success']) {
            return response()->json($result, 201);
        }

        return response()->json($result, 500);
    }
}
