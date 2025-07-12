document.addEventListener('DOMContentLoaded', function() {
    // Mobile menu toggle
    const mobileMenuToggle = document.querySelector('.mobile-menu-toggle');
    const navBar = document.querySelector('.nav-bar');
    
    if (mobileMenuToggle && navBar) {
        mobileMenuToggle.addEventListener('click', function() {
            navBar.classList.toggle('active');
            this.querySelector('i').classList.toggle('fa-bars');
            this.querySelector('i').classList.toggle('fa-times');
        });
    }
    
    // File upload functionality
    const dropZone = document.getElementById('dropZone');
    const fileInput = document.getElementById('fileInput');
    const filePreview = document.getElementById('filePreview');
    
    if (dropZone && fileInput && filePreview) {
        // Handle click on drop zone
        dropZone.addEventListener('click', function() {
            fileInput.click();
        });
        
        // Handle drag over
        dropZone.addEventListener('dragover', function(e) {
            e.preventDefault();
            this.style.backgroundColor = '#f0f0f0';
        });
        
        // Handle drag leave
        dropZone.addEventListener('dragleave', function() {
            this.style.backgroundColor = '';
        });
        
        // Handle drop
        dropZone.addEventListener('drop', function(e) {
            e.preventDefault();
            this.style.backgroundColor = '';
            
            if (e.dataTransfer.files.length) {
                fileInput.files = e.dataTransfer.files;
                updateFilePreview();
            }
        });
        
        // Handle file input change
        fileInput.addEventListener('change', updateFilePreview);
        
        function updateFilePreview() {
            filePreview.innerHTML = '';
            
            if (fileInput.files.length > 0) {
                const fileList = document.createElement('ul');
                
                Array.from(fileInput.files).forEach(file => {
                    const listItem = document.createElement('li');
                    listItem.className = 'file-preview-item';
                    
                    const fileName = document.createElement('span');
                    fileName.textContent = file.name;
                    
                    const fileSize = document.createElement('span');
                    fileSize.textContent = formatFileSize(file.size);
                    
                    listItem.appendChild(fileName);
                    listItem.appendChild(fileSize);
                    fileList.appendChild(listItem);
                });
                
                filePreview.appendChild(fileList);
            }
        }
        
        function formatFileSize(bytes) {
            if (bytes === 0) return '0 Bytes';
            const k = 1024;
            const sizes = ['Bytes', 'KB', 'MB', 'GB'];
            const i = Math.floor(Math.log(bytes) / Math.log(k));
            return parseFloat((bytes / Math.pow(k, i)).toFixed(1)) + ' ' + sizes[i];
        }
    }
    
    // Checklist progress tracking
    const checkboxes = document.querySelectorAll('.checklist-items input[type="checkbox"]');
    
    if (checkboxes.length > 0) {
        checkboxes.forEach(checkbox => {
            checkbox.addEventListener('change', updateChecklistProgress);
        });
    }
    
    function updateChecklistProgress() {
        const total = document.querySelectorAll('.checklist-items input[type="checkbox"]').length;
        const checked = document.querySelectorAll('.checklist-items input[type="checkbox"]:checked').length;
        
        if (total > 0) {
            const progress = Math.round((checked / total) * 100);
            console.log(`Checklist progress: ${progress}%`);
            // You could add a progress bar here if desired
        }
    }
});