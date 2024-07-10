    const fileInputEdit = document.getElementById('file-input-edit-u');
    const fileUploadEdit = document.getElementById('file-update-edit-u');
    const imagePreviewEdit = document.getElementById('image-preview-edit-u');

    fileUploadEdit.addEventListener('click', () => {
        fileInputEdit.click();
    });

    function displayFileUpdate(file) {
        if (file instanceof Blob) {
            const reader = new FileReader();
            reader.onload = (e) => {
                imagePreviewEdit.src = e.target.result;
                imagePreviewEdit.style.display = 'block';
            }
            reader.readAsDataURL(file); // This line was missing
        }
    }

    fileInputEdit.addEventListener('change', () => {
        if (fileInputEdit.files && fileInputEdit.files[0]) {
            displayFileUpdate(fileInputEdit.files[0]);
        }
    });