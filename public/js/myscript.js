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

const deleteConfirm = (e) => {
    e.preventDefault();
    const form = e.target.form;
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
      }).then((result) => {
        if (result.isConfirmed) {
          form.submit();
        }
      })
}