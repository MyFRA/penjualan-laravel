function updateRole(nama, status, role, url) {
	Swal.fire({
	  title: 'KONFIRMASI',
	  text: status + " " + nama + ', menjadi ' + role + '?',
	  icon: 'warning',
	  showCancelButton: true,
	  confirmButtonColor: '#3085d6',
	  cancelButtonColor: '#d33',
	  confirmButtonText: 'Ya, ' + status + '!'
	}).then((result) => {
	  if (result.value) {
	    let form = document.getElementById('updateRole_form')
	    form.setAttribute('action', url)

	    event.preventDefault()
	    form.submit()
	  }
	})
}

function onDestroy (url, pesan) {
	Swal.fire({
	  title: 'KONFIRMASI',
	  text: pesan,
	  icon: 'warning',
	  showCancelButton: true,
	  confirmButtonColor: '#3085d6',
	  cancelButtonColor: '#d33',
	  confirmButtonText: 'Hapus!'
	}).then((result) => {
	  if (result.value) {
	    let form = document.getElementById('destroy_form')
	    form.setAttribute('action', url)

	    event.preventDefault()
	    form.submit()
	  }
	})
}

function logout(link)
{
	event.preventDefault()
	Swal.fire({
	  title: 'Yakin?',
	  text: "Apakah kamu ingin logout?",
	  icon: 'warning',
	  showCancelButton: true,
	  confirmButtonColor: '#3085d6',
	  cancelButtonColor: '#d33',
	  confirmButtonText: 'Logout'
	}).then((result) => {
	  if (result.value) {
	   	window.location = link
	  }
	})
}