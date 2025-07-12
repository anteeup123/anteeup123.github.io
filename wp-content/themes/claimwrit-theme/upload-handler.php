<?php
require_once __DIR__ . '/config.php';

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if files were uploaded
    if (isset($_FILES['files']) && !empty($_FILES['files']['name'][0])) {
        $uploadDir = __DIR__ . '/../uploads/';
        
        // Create uploads directory if it doesn't exist
        if (!file_exists($uploadDir)) {
            mkdir($uploadDir, 0755, true);
        }
        
        $clientName = $_POST['client_name'] ?? 'unknown';
        $caseNumber = $_POST['case_number'] ?? '';
        $notes = $_POST['notes'] ?? '';
        
        // Create client directory
        $clientDir = $uploadDir . preg_replace('/[^a-z0-9]/', '-', strtolower($clientName)) . '/';
        if (!file_exists($clientDir)) {
            mkdir($clientDir, 0755);
        }
        
        // Process each uploaded file
        $uploadedFiles = [];
        $errors = [];
        
        foreach ($_FILES['files']['name'] as $key => $name) {
            $tmpName = $_FILES['files']['tmp_name'][$key];
            $error = $_FILES['files']['error'][$key];
            $size = $_FILES['files']['size'][$key];
            
            // Check for errors
            if ($error !== UPLOAD_ERR_OK) {
                $errors[] = "Error uploading $name: " . $error;
                continue;
            }
            
            // Validate file size (10MB max)
            if ($size > 10485760) {
                $errors[] = "File $name is too large (max 10MB)";
                continue;
            }
            
            // Sanitize filename
            $sanitizedName = preg_replace('/[^a-z0-9\.\-]/i', '_', $name);
            $destination = $clientDir . $sanitizedName;
            
            // Move uploaded file
            if (move_uploaded_file($tmpName, $destination)) {
                $uploadedFiles[] = $sanitizedName;
            } else {
                $errors[] = "Failed to move uploaded file $name";
            }
        }
        
        // Save metadata
        $metadata = [
            'client_name' => $clientName,
            'case_number' => $caseNumber,
            'notes' => $notes,
            'files' => $uploadedFiles,
            'upload_time' => date('Y-m-d H:i:s')
        ];
        
        file_put_contents($clientDir . 'metadata.json', json_encode($metadata));
        
        // Prepare response
        if (empty($errors)) {
            $response = [
                'success' => true,
                'message' => 'Files uploaded successfully!',
                'uploaded_files' => $uploadedFiles
            ];
        } else {
            $response = [
                'success' => false,
                'message' => 'Some files failed to upload',
                'uploaded_files' => $uploadedFiles,
                'errors' => $errors
            ];
        }
        
        header('Content-Type: application/json');
        echo json_encode($response);
        exit;
    } else {
        header('HTTP/1.1 400 Bad Request');
        echo json_encode(['success' => false, 'message' => 'No files were uploaded']);
        exit;
    }
}

header('HTTP/1.1 405 Method Not Allowed');
echo json_encode(['success' => false, 'message' => 'Invalid request method']);