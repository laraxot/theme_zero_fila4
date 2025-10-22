<?php

/**
 * ---.
 */

declare(strict_types=1);

namespace Modules\User\Datas;

use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Spatie\LaravelData\Data;
use Webmozart\Assert\Assert;

/**
 * Undocumented class.
 */
class DeviceData extends Data
{
    /*
     * case ApplicationVersion = 'X-App-Version';
     * case Application = 'X-Application';
     * case DeviceId = 'X-Device-Id';
     * case NotificationCode = 'X-Notification-Code';
     * case OperatingSystem = 'X-Operating-System';
     * case SynchronizationId = 'X-Synchronization-Identifier';
     */
    public null|string $appVersion = null;

    // = 'X-App-Version';
    public null|string $application = null;

    // = 'X-Application';
    public null|string $deviceId = null;

    // = 'X-Device-Id';
    public null|string $notificationCode = null;

    // = 'X-Notification-Code';
    public null|string $operatingSystem = null;

    // = 'X-Operating-System';
    public null|string $synchronizationId = null; // = 'X-Synchronization-Identifier';

    public static function make(): self
    {
        $headers = collect(request()->header())->mapWithKeys(static function ($item, $key): array {
            if (Str::startsWith($key, 'X-')) {
                // $key = Str::afterFirst($key, 'X-');
                $key = Str::after($key, 'X-');
            }

            $key = Str::camel($key);

            return [$key => $item];
        })->all();

        return self::from($headers);
    }

    public function isValid(): bool
    {
        return true;
    }

    public function getSynchronizationId(string $apiName): string
    {
        if ($this->synchronizationId !== null) {
            return $this->synchronizationId;
        }

        $synchronizationClass = config('morph_map.synchronization');
        if ($synchronizationClass === null) {
            $synchronizationClass = '\Modules\Egea\Models\Synchronization';
        }

        // fare contract
        // Assert::isInstanceOf($synchronizationClass,Model::class,'['.__LINE__.']['.class_basename($this).']');
        // $synchronization = Synchronization::create([
        /**
         * @phpstan-ignore staticMethod.nonObject
         */
        $synchronization = $synchronizationClass::create([
            // $synchronization = Synchronization::create([
            'user_id' => auth()->id(),
            'mobile_device_id' => $this->deviceId,
            'application' => $this->application ?? 'No-Set',
            'application_version' => $this->appVersion ?? 'No-Set',
            'api_name' => $apiName,
            'called_at' => Carbon::now(),
            // fulfilled_at
        ]);
        Assert::string($synchronizationId = $synchronization->id, __FILE__ . ':' . __LINE__ . ' - ' . class_basename(__CLASS__));
        $this->synchronizationId = $synchronizationId;

        return $this->synchronizationId;
    }

    /*
     * public function getModel(){
     * MobileDevice::firstOrCreate();
     * }
     */
}
