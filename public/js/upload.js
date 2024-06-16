const fileInput = document.getElementById('file-input');
const fileUpload = document.getElementById('file-upload');
const filePreview = document.getElementById('file-preview');
const title = document.getElementById('upload-title');

fileUpload.addEventListener('click', () => {
    fileInput.click();
    displayImagePreview(fileInput.files[0])
    title.style.display = 'none';
})

fileUpload.addEventListener('dragover', (e) => {
    e.preventDefault();
    fileUpload.style.backgroundColor = '#f8f8f8';
});

fileUpload.addEventListener('dragleave', () => {
    fileUpload.style.backgroundColor = '#fff';
});

fileUpload.addEventListener('drop', (e) => {{
    e.preventDefault();
    fileInput.files =  e.dataTransfer.files;
    fileUpload.style.backgroundColor = '#fff';
    displayImagePreview(fileInput.files[0]);
    title.style.display = 'none';
}});

fileInput.addEventListener('change', () => {
    if(fileInput.files && fileInput.files[0]){
        displayImagePreview(fileInput.files[0]);
        title.style.display = 'none';
    }
})


function displayImagePreview(file){
    if(fileInput.files && fileInput.files[0] && fileInput.files[0] instanceof Blob){
        const reader = new FileReader();
        reader.onload = function(e){
            filePreview.src = e.target.result;
            filePreview.style.display = 'block';
        }
        reader.readAsDataURL(file);
    }
}