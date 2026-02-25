<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Services\CvExtractorService;
use Illuminate\Http\UploadedFile;
use Maravel\Http\Controllers\APIController;
use App\Models\Cv;

class CvExtractorController extends APIController
{
    private const CV_PATH = 'spontaneous_applications/cv';

    public function __construct(private CvExtractorService $cvService)
    {
    }

    /**
     * Extraire le texte de tous les CVs d'un dossier
     */
    public function extract(): JsonResponse
    {
        $fullPath = Storage::disk('public')->path(self::CV_PATH);
        $files = glob($fullPath . '/*.pdf');

        if (empty($files)) {
            return response()->json(['error' => 'Aucun PDF trouvé dans le dossier'], 404);
        }

        $uploadedFiles = array_map(
            fn($path) => new UploadedFile($path, basename($path), 'application/pdf', null, true),
            $files
        );

        $results = $this->cvService->processMultiple($uploadedFiles);

        return response()->json($results);
    }

    /**
     * Extraire le texte d'un CV spécifique par ID
     */
    public function extractById(Request $request, $cvId): JsonResponse
    {
        try {
            $cv = Cv::find($cvId);

            if (!$cv) {
                return response()->json(['error' => 'CV non trouvé'], 404);
            }

            $fullPath = storage_path('app/public/' . $cv->cv_path);

            if (!file_exists($fullPath)) {
                return response()->json(['error' => 'Fichier CV non trouvé'], 404);
            }

            $uploadedFile = new UploadedFile(
                $fullPath,
                basename($fullPath),
                'application/pdf',
                null,
                true
            );

            $result = $this->cvService->processSingle($uploadedFile, $cv->id);

            return response()->json($result);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Erreur lors de l\'extraction',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Extraire le texte d'un CV uploadé directement
     */
    public function extractFromUpload(Request $request): JsonResponse
    {
        $request->validate([
            'cv' => 'required|file|mimes:pdf|max:5120'
        ]);

        try {
            $uploadedFile = $request->file('cv');
            $result = $this->cvService->processSingle($uploadedFile, 0);

            return response()->json($result);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Erreur lors de l\'extraction',
                'message' => $e->getMessage()
            ], 500);
        }
    }
}
