const showFile = (e) => {
    const input = e.target;
    const reader = new FileReader();
    reader.onload = () => {
        const dataUrl = reader.result;
        const output = document.getElementById('file-preview');
        output.src = dataUrl;
    }
    reader.readAsDataURL(input.files[0]);
}