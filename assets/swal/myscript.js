// tombol-keluar
$('.tombol-keluar').on('click',function (e){

    e.preventDefault();
    const href = $(this).attr('href');

    Swal.fire({
        title: 'Apakah anda yakin ingin keluar??',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'iya'
      }).then((result) => {
        if (result.isConfirmed) {
          document.location.href = href;
        }
    });
}); 

// hapus
$('.tombol-hapus').on('click',function (e){

  e.preventDefault();
  const href = $(this).attr('href');

  Swal.fire({
      title: 'Apakah anda yakin ingin menghapus data ini?',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'iya, hapus'
    }).then((result) => {
      if (result.isConfirmed) {
        document.location.href = href;
      }
  });
}); 

const dataFlash = $('.flashData').data('flashdata');
if(dataFlash){
  Swal.fire(
    'Sukses',
    dataFlash,
    'success'
  );
}

const flashData = $('.dataFlash').data('flashdata');
if(flashData){
  Swal.fire(
    'Maaf',
    flashData,
    'error'
  );
}

