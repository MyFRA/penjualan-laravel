const flashData = $('.flash-data').data('flashdata');

if( flashData ) {
	Swal.fire('Berhasil', flashData, 'success');
}

const flashDataGagal = $('.flash-data-gagal').data('flashdata');

if( flashDataGagal ) {
  Swal.fire({
    icon: 'error',
    title: 'Oops...',
    text: flashDataGagal,
});
}



function deleteRow(id, name)
{
    Swal.fire({
    title: 'Apakah anda yakin?',
    text: "Data " + name + " akan dihapus",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Hapus!'
  }).then((willDelete) => {
    if (willDelete.value) {
      $('#data-' + id).submit();
    }


  });
}


const inpFile = document.getElementById('inpFile');
const previewContainer = document.getElementById('imagePreview');
const previewImage = previewContainer.querySelector(".image-preview__image");
const previewDefaultText = previewContainer.querySelector(".image-preview__default-text");

inpFile.addEventListener("change", function() {
  const file = this.files[0];

  if (file) {
    const reader = new FileReader();

    previewDefaultText.style.display = 'none';
    previewImage.style.display = 'block';

    reader.addEventListener('load', function() {
      previewImage.setAttribute('src', this.result);
    });

    reader.readAsDataURL(file); 
  } else {
    previewDefaultText.style.display = null;
    previewImage.style.display = null;
    previewImage.setAttribute('src', '');

  }
});




// var cariKategori = document.getElementById('cariKategori');
// var kontenKategori = document.getElementById('konten-kategori');

// cariKategori.addEventListener('keyup', function() {
//   var xhr = new XMLHttpRequest()

//   xhr.onreadystatechange = function() {
//     if( xhr.readyState == 4 && xhr.status == 200 ) {
//          console.log('ajax ok!');
//     }
//   }

//   xhr.open('GET', 'sweetalert2.all.js', true);
//   xhr.send();
// })