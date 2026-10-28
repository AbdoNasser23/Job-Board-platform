<?php

namespace App\Services;

use App\Models\JobVacancy;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use Spatie\PdfToText\Pdf;

class ResumeAnalysisServices
{
    public function extractResumeInformation(string $file_uri)
    {
        // extract text form the resume pdf file (read pdf file , get the text)
        $text     = $this->extractTextFromPdf($file_uri);
        $response = $this->groqAi($text);

        return $response;
    }

    private function groqAi(string $text): array
    {
        $prompt = "
    Analyze the following resume and extract its information.

    Return a valid JSON object with exactly these keys:
    - skills
    - summary
    - experience
    - education

    IMPORTANT:
    - Every value must be a plain string.
    - Do not return arrays or nested objects.
    - For skills, list the skills as a comma-separated string.
    - For experience, write the job title, company, dates,
        and responsibilities as readable text.
    - For education, write the degree, institution, and dates
        as readable text.
    - For summary, return a normal paragraph.
    - Use only information found in the resume.
    - Do not invent missing information.
    - If a field is unavailable, return an empty string.

    Resume text:
    {$text}
";
        try {

            $response = Http::withToken(config('services.groq.key'))->timeout(60)
                ->post('https://api.groq.com/openai/v1/chat/completions', [
                    'model'           => 'openai/gpt-oss-120b',
                    'messages'        => [
                        [
                            'role'    => 'system',
                            'content' => 'You are a resume analysis assistant. Extract accurate information from resumes and return a valid JSON object with exactly these keys: skills, summary, experience, education. Do not invent information that is not present in the resume.',
                        ],
                        [
                            'role'    => 'user',
                            'content' => $prompt,
                        ],
                    ],
                    'response_format' => [
                        'type' => 'json_object',
                    ],
                ]);

            $response->throw();

            $result = $response->json('choices.0.message.content');

            $data = json_decode($result, true);
            if (json_last_error() !== JSON_ERROR_NONE) {
                throw new \RuntimeException('Invalid JSON returned by Groq.');
            }

            return $data;
        } catch (\Throwable $e) {
            throw new \RuntimeException("Error Processing Request", 1, $e);
        }
    }

    private function extractTextFromPdf(string $file_uri): string
    {
        $response = Http::timeout(30)->get($file_uri);
        $response->throw();

        $tempPath = storage_path('app/temp/' . Str::uuid() . '.pdf');

        File::ensureDirectoryExists(dirname($tempPath));

        try {

            $isSuccess = File::put($tempPath, $response->body());
            if ($isSuccess === false) {
                throw new \RuntimeException('Failed to write temporary PDF file.');
            }

            return Pdf::getText($tempPath);
        } finally {
            File::delete($tempPath);
        }
    }


//     public function generateScoreAndFeedback($data, JobVacancy $vacancy): array {
//     // Get resume information.
//     // Get job requirements.
//     // Send both to Groq.
//     // Return score and feedback.
// }

}
