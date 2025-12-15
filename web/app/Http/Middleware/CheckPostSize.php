<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckPostSize
{
    /**
     * Handle an incoming request.
     * Check if the POST request size exceeds PHP's post_max_size limit.
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Only check POST requests
        if ($request->method() === 'POST') {
            // Get the max allowed POST size from PHP configuration (in bytes)
            $maxPostSize = $this->getPostMaxSize();
            
            // Get the actual content length from the request
            $contentLength = $request->server('CONTENT_LENGTH');
            
            // If content length exceeds the max post size, redirect with error
            if ($contentLength && $contentLength > $maxPostSize) {
                $maxSizeMB = round($maxPostSize / 1024 / 1024, 2);
                
                return back()
                    ->withInput()
                    ->withErrors([
                        'file_upload' => "The uploaded file is too large. Maximum allowed size is {$maxSizeMB}MB. Please upload a smaller file."
                    ]);
            }
        }
        
        return $next($request);
    }
    
    /**
     * Get the POST max size from PHP configuration in bytes
     */
    protected function getPostMaxSize(): int
    {
        $postMaxSize = ini_get('post_max_size');
        
        // Convert the value to bytes
        return $this->convertToBytes($postMaxSize);
    }
    
    /**
     * Convert PHP size shorthand notation to bytes
     * Handles K, M, G suffixes (case-insensitive)
     */
    protected function convertToBytes(string $value): int
    {
        $value = trim($value);
        $last = strtolower($value[strlen($value) - 1]);
        $value = (int) $value;
        
        switch ($last) {
            case 'g':
                $value *= 1024;
                // fall through
            case 'm':
                $value *= 1024;
                // fall through
            case 'k':
                $value *= 1024;
        }
        
        return $value;
    }
}
