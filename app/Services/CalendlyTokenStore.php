<?php

namespace App\Services;

use Carbon\CarbonImmutable;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;

class CalendlyTokenStore
{
    private const PATH = 'calendly/token.json';

    public function put(array $payload): void
    {
        $data = [
            'access_token' => $payload['access_token'] ?? null,
            'refresh_token' => $payload['refresh_token'] ?? null,
            'expires_at' => isset($payload['expires_in'])
                ? CarbonImmutable::now()->addSeconds((int) $payload['expires_in'])->toIso8601String()
                : null,
        ];

        Storage::disk('local')->put(self::PATH, Crypt::encryptString(json_encode($data)));
    }

    public function get(): ?array
    {
        if (! Storage::disk('local')->exists(self::PATH)) {
            return null;
        }

        $contents = Storage::disk('local')->get(self::PATH);

        return json_decode(Crypt::decryptString($contents), true);
    }
}
