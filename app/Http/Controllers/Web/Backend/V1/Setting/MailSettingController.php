<?php

namespace App\Http\Controllers\Web\Backend\V1\Setting;

use App\Http\Controllers\Controller;
use App\Services\Web\Backend\V1\Setting\MailSettingService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class MailSettingController extends Controller
{
    protected MailSettingService $mailSettingService;

    public function __construct(MailSettingService $mailSettingService)
    {
        $this->mailSettingService = $mailSettingService;
    }

    public function index()
    {
        try {

        $settings = [
            'mail_mailer'       => env('MAIL_MAILER', ''),
            'mail_host'         => env('MAIL_HOST', ''),
            'mail_port'         => env('MAIL_PORT', ''),
            'mail_username'     => env('MAIL_USERNAME', ''),
            'mail_password'     => env('MAIL_PASSWORD', ''),
            'mail_encryption'   => env('MAIL_ENCRYPTION', ''),
            'mail_from_address' => env('MAIL_FROM_ADDRESS', ''),
        ];

        } catch (\Exception $e) {
            Log::error('App\Http\Controllers\Web\Backend\V1\Setting\MailSettingController::index', ['error' => $e->getMessage()]);
            throw $e;
        }
        return view('backend.layouts.settings.mailSetting.index',compact('settings'));
    }
    public function update(Request $request): JsonResponse
    {
        try {
        $request->validate([
            'mail_mailer'       => 'nullable|string',
            'mail_host'         => 'nullable|string',
            'mail_port'         => 'nullable|string',
            'mail_username'     => 'nullable|string',
            'mail_password'     => 'nullable|string',
            'mail_encryption'   => 'nullable|string',
            'mail_from_address' => 'nullable|string',
        ]);
       

        } catch (\Exception $e) {
            Log::error('App\Http\Controllers\Web\Backend\V1\Setting\MailSettingController::update', ['error' => $e->getMessage()]);
            throw $e;
        }

        $updated = $this->mailSettingService->updateMailSettings($request->all());

        if ($updated) {
            return response()->json(['message' => 'Mail settings updated successfully'], 200);
        } else {
            return response()->json(['message' => 'Failed to update mail settings'], 500);
        }
    }
}
