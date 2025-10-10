<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\JsonResponse;
use App\Models\SecprogUser;
use App\Enums\AccountStatus;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    protected function checkSuspended(?SecprogUser $user): ?JsonResponse
    {
        if (!$user || $user->account_status === AccountStatus::Suspended) {
            return response()->json([
                'status'  => 'error',
                'message' => 'account suspended, contact admin.',
            ], 403);
        }
        return null;
    }
}
