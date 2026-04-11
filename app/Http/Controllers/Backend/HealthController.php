<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Spatie\Health\Models\HealthCheckResultHistoryItem;

class HealthController extends Controller
{
    /**
     * Show the health check status page
     */
    public function index()
    {
        // Get the latest batch of health check results
        $latestBatch = HealthCheckResultHistoryItem::latest('created_at')
            ->value('batch');

        $checks = [];
        $status = 'ok';
        $lastChecked = null;

        if ($latestBatch) {
            // Get all checks for the latest batch
            $baseChecks = HealthCheckResultHistoryItem::where('batch', $latestBatch)
                ->get();

            $checks = $baseChecks->map(function ($check) {
                return [
                    'check' => $check->check_label ?? $check->check_name,
                    'status' => $check->status,
                    'notificationMessage' => $check->notification_message,
                    'shortSummary' => $check->short_summary,
                    'created_at' => $check->created_at,
                ];
            })->toArray();

            // Determine overall status
            foreach ($baseChecks as $check) {
                if ($check->status === 'failed') {
                    $status = 'failed';
                    break;
                } elseif ($check->status === 'warning' && $status !== 'failed') {
                    $status = 'warning';
                }
            }

            $lastChecked = $baseChecks->first()?->created_at;
        }

        return view('backend.health.index', [
            'checks' => $checks,
            'status' => $status,
            'lastChecked' => $lastChecked,
        ]);
    }
}
