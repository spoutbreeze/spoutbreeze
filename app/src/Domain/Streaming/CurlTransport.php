<?php

/*
 * SpoutBreeze open source platform - https://www.spoutbreeze.org/
 *
 * Copyright (c) 2021-2026 RIADVICE SUARL.
 *
 * This program is free software: you can redistribute it and/or modify it under the
 * terms of the GNU Affero General Public License as published by the Free Software
 * Foundation, either version 3 of the License, or (at your option) any later version.
 *
 * SpoutBreeze is distributed in the hope that it will be useful, but WITHOUT ANY
 * WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A
 * PARTICULAR PURPOSE. See the GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License along
 * with SpoutBreeze. If not, see <https://www.gnu.org/licenses/>.
 */

declare(strict_types=1);

namespace Domain\Streaming;

/**
 * cURL transport for live YouTube API calls.
 */
final class CurlTransport implements Transport
{
    public function send(string $method, string $url, array $headers = [], ?string $body = null): array
    {
        $handle = curl_init($url);
        if (false === $handle) {
            throw new \RuntimeException('Cannot initialise HTTP transport');
        }
        $headerLines = [];
        foreach ($headers as $name => $value) {
            $headerLines[] = $name . ': ' . $value;
        }
        curl_setopt_array($handle, [
            CURLOPT_CUSTOMREQUEST  => $method,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_TIMEOUT        => 20,
            CURLOPT_HTTPHEADER     => $headerLines,
            CURLOPT_POSTFIELDS     => $body,
        ]);
        $response = curl_exec($handle);
        $status   = (int) curl_getinfo($handle, CURLINFO_RESPONSE_CODE);
        $error    = curl_error($handle);
        curl_close($handle);
        if (false === $response) {
            throw new \RuntimeException('YouTube API request failed: ' . $error);
        }

        return ['status' => $status, 'body' => (string) $response];
    }
}
