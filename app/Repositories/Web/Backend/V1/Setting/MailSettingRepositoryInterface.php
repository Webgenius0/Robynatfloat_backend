<?php

namespace App\Repositories\Web\Backend\V1\Setting;

interface MailSettingRepositoryInterface
{
    // Define the methods your repository should implement
    public function updateMailSettings(array $data);
}
