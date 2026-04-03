<?php

namespace App\Console\Commands\Global;

use App\Models\Advertiser;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class FetchAndStoreLogoCommand extends Command
{
    protected $signature = 'app:fetch-and-store-logo';
    protected $description = 'Fetch and store logo for an advertiser';

    public function handle()
    {
        $advertisers = Advertiser::where('is_fetchable_logo', 0)
            ->whereNotNull('fetch_logo_url')
            ->orderByDesc('created_at')
            ->take(100)
            ->get();

        foreach ($advertisers as $advertiser) {
            $logoUrl = $advertiser->fetch_logo_url;

            try {
                // Sanitize the file name based on advertiser's name and URL
                $sanitizedFileName = $this->sanitizeFileName($advertiser->name.$advertiser->advertiser_id, $advertiser->url);
                $fileExists = false;
                $existingExtension = '';

                // Check for existing file with possible extensions
                $extensions = ['jpg', 'jpeg', 'png', 'gif', 'svg', 'webp', 'bmp', 'tiff'];
                foreach ($extensions as $extension) {
                    if (Storage::disk('public')->exists("{$sanitizedFileName}.{$extension}")) {
                        $fileExists = true;
                        $existingExtension = $extension;
                        break;
                    }
                }

                if ($fileExists) {
                    // File already exists, update the advertiser and skip the download
                    $this->info("Logo already exists for advertiser ID {$advertiser->id}, skipped fetching.");
                    $advertiser->update([
                        'is_fetchable_logo' => 1,
                        'logo' => "storage/{$sanitizedFileName}.{$existingExtension}",
                        'fetch_logo_error' => null,
                    ]);
                    continue;
                }

                // If file doesn't exist, fetch the logo
                $response = Http::timeout(10)->get($logoUrl);

                if ($response->successful()) {
                    $imageData = $response->body();
                    $extension = $this->getExtensionFromImageData($imageData);

                    if (!$extension) {
                        throw new \Exception("Unsupported image type.");
                    }

                    $fileName = "{$sanitizedFileName}.{$extension}";
                    Storage::disk('public')->put($fileName, $imageData);

                    $fileName = "storage/{$sanitizedFileName}.{$extension}";

                    $advertiser->update([
                        'is_fetchable_logo' => 1,
                        'logo' => $fileName,
                        'fetch_logo_error' => null,
                    ]);

                    $this->info("Logo stored successfully for advertiser ID {$advertiser->id}.");
                } else {
                    throw new \Exception("Failed to fetch logo from URL.");
                }
            } catch (\Exception $e) {
                if (str_contains($e->getMessage(), "timed out")) {
                    $this->error("Connection timed out while fetching logo for advertiser ID {$advertiser->id}");
                } else {
                    $advertiser->update([
                        'is_fetchable_logo' => 3,
                        'fetch_logo_error' => $e->getMessage(),
                    ]);
                }

                $this->error("Error fetching logo for advertiser ID {$advertiser->id}: " . $e->getMessage());
            }
        }

        return 0;
    }

    private function getExtensionFromImageData($imageData)
    {
        $finfo = new \finfo(FILEINFO_MIME_TYPE);
        $mimeType = $finfo->buffer($imageData);

        switch ($mimeType) {
            case 'image/jpeg':
                return 'jpg';
            case 'image/png':
                return 'png';
            case 'image/gif':
                return 'gif';
            case 'image/svg+xml':
                return 'svg';
            case 'image/webp':
                return 'webp';
            case 'image/bmp':
                return 'bmp';
            case 'image/tiff':
                return 'tiff';
            default:
                return null;
        }
    }

    private function sanitizeFileName($name, $url)
    {
        $sanitized = preg_replace('/[^a-zA-Z0-9]/', '', $name);

        if (empty($sanitized)) {
            $url = trim($url);
            $url = filter_var($url, FILTER_SANITIZE_URL);

            if (!preg_match('/^http[s]?:\/\//', $url)) {
                $url = 'http://' . $url;
            }

            $parsedUrl = parse_url($url);
            $domain = $parsedUrl['host'] ?? null;

            $domain = preg_replace('/^www\./', '', $domain);
            $sanitized = preg_replace('/[^a-zA-Z0-9]/', '', $domain);
        }

        return strtolower($sanitized);
    }
}

