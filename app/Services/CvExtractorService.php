<?php

namespace App\Services;

use Smalot\PdfParser\Parser;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Log;

class CvExtractorService
{
    private Parser $parser;

    public function __construct()
    {
        $this->parser = new Parser();
    }

    /**
     * Traite plusieurs fichiers PDF et retourne les infos extraites.
     *
     * @param  UploadedFile[]  $files
     */
    public function processMultiple(array $files): array
    {
        $results = [];
        foreach ($files as $index => $file) {
            $results[] = $this->processSingle($file, $index);
        }
        return $results;
    }

    public function processSingle(UploadedFile $file, int $id = 0): array
    {
        try {
            $text = $this->extractText($file);

            if (empty($text)) {
                return [
                    'id' => $id,
                    'error' => 'Aucun texte extrait du PDF',
                ];
            }

            return [
                'id' => $id,
                'text' => $text,
            ];

        } catch (\Exception $e) {
            Log::error('CvExtractorService error', [
                'file' => $file->getClientOriginalName(),
                'message' => $e->getMessage(),
            ]);

            return [
                'id' => $id,
                'error' => $e->getMessage(),
            ];
        }
    }

    private function extractText(UploadedFile $file): string
    {
        $pdf = $this->parser->parseFile($file->getRealPath());
        return trim($pdf->getText());
    }
}
