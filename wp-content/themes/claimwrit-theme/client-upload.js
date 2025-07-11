document.addEventListener('DOMContentLoaded', function () {
    // Mobile menu toggle
    const mobileMenuToggle = document.querySelector('.mobile-menu-toggle');
    const navBar = document.querySelector('.nav-bar');

    if (mobileMenuToggle && navBar) {
        mobileMenuToggle.addEventListener('click', function () {
            navBar.classList.toggle('active');
            this.querySelector('i').classList.toggle('fa-bars');
            this.querySelector('i').classList.toggle('fa-times');
        });
    }

    // File upload preview
    const dropZone = document.getElementById('dropZone');
    const fileInput = document.getElementById('fileInput');
    const filePreview = document.getElementById('filePreview');

    if (dropZone && fileInput && filePreview) {
        dropZone.addEventListener('click', () => fileInput.click());

        dropZone.addEventListener('dragover', function (e) {
            e.preventDefault();
            this.style.backgroundColor = '#f0f0f0';
        });

        dropZone.addEventListener('dragleave', function () {
            this.style.backgroundColor = '';
        });

        dropZone.addEventListener('drop', function (e) {
            e.preventDefault();
            this.style.backgroundColor = '';
            if (e.dataTransfer.files.length) {
                fileInput.files = e.dataTransfer.files;
                updateFilePreview();
            }
        });

        fileInput.addEventListener('change', updateFilePreview);

        function updateFilePreview() {
            filePreview.innerHTML = '';
            if (fileInput.files.length > 0) {
                const fileList = document.createElement('div');
                fileList.className = 'file-preview-list';

                Array.from(fileInput.files).forEach(file => {
                    const listItem = document.createElement('div');
                    listItem.className = 'file-preview-item';

                    const ext = file.name.split('.').pop().toLowerCase();
                    const isImage = ['jpg', 'jpeg', 'png'].includes(ext);

                    if (isImage) {
                        const reader = new FileReader();
                        reader.onload = function (event) {
                            const img = document.createElement('img');
                            img.src = event.target.result;
                            img.classList.add('upload-preview-image');
                            listItem.appendChild(img);
                        };
                        reader.readAsDataURL(file);
                    }

                    const fileName = document.createElement('span');
                    fileName.textContent = file.name;

                    const fileSize = document.createElement('span');
                    fileSize.textContent = formatFileSize(file.size);
                    fileSize.style.marginLeft = 'auto';

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
            // Optional: hook this into a progress bar
        }
    }
});

