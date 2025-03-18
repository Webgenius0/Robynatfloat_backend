<?php

namespace App\Services\Web\Backend\V1\Setting;

use App\Repositories\Web\Backend\V1\Setting\MailSettingRepository;

class MailSettingService
{
    protected MailSettingRepository $mailSettingRepository;

    public function __construct(MailSettingRepository $mailSettingRepository)
    {
        $this->mailSettingRepository = $mailSettingRepository;
    }
    public function updateMailSettings(array $data): bool
    {
        return $this->mailSettingRepository->updateMailSettings($data);
    }
}
