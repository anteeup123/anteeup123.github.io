<?php
require_once __DIR__ . '/config.php';

// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ensure at least one file was uploaded
    if (!empty($_FILES['files']['name'][0])) {
        // Corrected uploads directory path
        $uploadDir = __DIR__ . '/uploads/';
        
        // Create the uploads directory if it doesn't exist
        if (!file_exists($uploadDir)) {
            mkdir($uploadDir, 0755, true);
        }
        
        $clientName = $_POST['client_name'] ?? 'unknown';
        $caseNumber = $_POST['case_number'] ?? '';
        $notes      = $_POST['notes'] ?? '';
        
        // Sanitize and create client-specific folder
        $sanitizedFolder = preg_replace('/[^a-z0-9]/', '-', strtolower($clientName));
        $clientDir       = $uploadDir . $sanitizedFolder . '/';
        if (!file_exists($clientDir)) {
            mkdir($clientDir, 0755, true);
        }
        
        $uploadedFiles = [];
        $errors        = [];
        
        // Process each uploaded file
        foreach ($_FILES['files']['name'] as $key => $originalName) {
            $tmpName = $_FILES['files']['tmp_name'][$key];
            $error   = $_FILES['files']['error'][$key];
            $size    = $_FILES['files']['size'][$key];
            
            // Check for upload errors
            if ($error !== UPLOAD_ERR_OK) {
                $errors[] = "Error uploading {$originalName}: {$error}";
                continue;
            }
            
            // Enforce 10MB max size
            if ($size > 10 * 1024 * 1024) {
                $errors[] = "File {$originalName} is too large (max 10MB)";
                continue;
            }
            
            // Sanitize filename
            $safeName    = preg_replace('/[^a-z0-9\.\-]/i', '_', $originalName);
            $destination = $clientDir . $safeName;
            
            if (move_uploaded_file($tmpName, $destination)) {
                $uploadedFiles[] = $safeName;
            } else {
                $errors[] = "Failed to move uploaded file {$originalName}";
            }
        }
        
        // Save upload metadata
        $metadata = [
            'client_name'  => $clientName,
            'case_number'  => $caseNumber,
            'notes'        => $notes,
            'files'        => $uploadedFiles,
            'upload_time'  => date('Y-m-d H:i:s'),
        ];
        file_put_contents($clientDir . 'metadata.json', json_encode($metadata));
        
        // Return JSON response
        header('Content-Type: application/json');
        if (empty($errors)) {
            echo json_encode([
                'success'        => true,
                'message'        => 'Files uploaded successfully!',
                'uploaded_files' => $uploadedFiles,
            ]);
        } else {
            echo json_encode([
                'success'        => false,
                'message'        => 'Some files failed to upload',
                'uploaded_files' => $uploadedFiles,
                'errors'         => $errors,
            ]);
        }
        exit;
    }
    
    // No files provided
    header('HTTP/1.1 400 Bad Request');
    echo json_encode([
        'success' => false,
        'message' => 'No files were uploaded',
    ]);
    exit;
}

// Invalid request method
header('HTTP/1.1 405 Method Not Allowed');
echo json_encode([
    'success' => false,
    'message' => 'Invalid request method',
]);
