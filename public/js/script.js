document.addEventListener('DOMContentLoaded', function() {
  // Event listener untuk tombol tambah data
  document.querySelectorAll('.tombolTambahdata').forEach(function(element) {
      element.addEventListener('click', function() {
          document.getElementById('judulmodalLabel').innerHTML = 'Tambah Data';
          const submitButton = document.querySelector('#exampleModal .modal-footer button[type=submit]');
          if (submitButton) {
              submitButton.innerHTML = 'Tambah Data';
          }

          // Set form action untuk tambah data
          var form = document.querySelector('#formMahasiswa');
          if (form) {
              form.action = 'http://phpmvc.dicoding/public/mahasiswa/tambah'; // Ganti ke URL untuk menambah data
          }

          // Kosongkan field form
          $('#nama').val('');
          $('#nis').val('');
          $('#email').val('');
          $('#jurusan').val('');
          $('#id').val(''); // Pastikan ID kosong untuk tambah data
      });
  });

  // Event listener untuk tombol ubah data
  document.querySelectorAll('.tampilModalUbah').forEach(function(element) {
      element.addEventListener('click', function() {
          document.getElementById('judulmodalLabel').innerHTML = 'Ubah Data';
          const submitButton = document.querySelector('.modal-footer button[type=submit]');
          if (submitButton) {
              submitButton.innerHTML = 'Ubah Data';
          }

          const id = this.getAttribute('data-id');

          $.ajax({
              url: 'http://phpmvc.dicoding/public/mahasiswa/getubah',
              data: { id: id },
              method: 'post',
              dataType: 'json',
              success: function(data) {
                  console.log('Data received from server:', data);
                  // Isi form dengan data yang diterima
                  $('#nama').val(data.nama);
                  $('#nis').val(data.nis);
                  $('#email').val(data.email);
                  $('#jurusan').val(data.jurusan);
                  $('#id').val(data.id); // ID harus diisi untuk proses update

                  // Set form action untuk ubah data
                  var form = document.querySelector('#formMahasiswa');
                  if (form) {
                      form.action = 'http://phpmvc.dicoding/public/mahasiswa/ubah'; // Ganti ke URL untuk ubah data
                      console.log('Form action updated to:', form.action);
                  }
              }
          });
      });
  });
});
