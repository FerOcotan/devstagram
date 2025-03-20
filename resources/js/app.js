import Dropzone from "dropzone";

Dropzone.autoDiscover = false;
const dropzone = new Dropzone("#dropzone", {

    dictDefaultMessage:'sube aqui tu imagen',
    acceptedFiles: ".jpeg,.jpg,.png,.gif",
    addRemoveLinks: true,
    dictRemoveFile: "Eliminar",
    maxFiles: 1,
    uploadMultiple: false,
})

dropzone.on('sending', function(file, xhr, formData) {
  console.log('sending')
 })

 dropzone.on('success', function(file, response) {
     console.log(response);
 });

 dropzone.on('error', function(file, message) {
    console.log(response);
});

dropzone.on('removedfile', function() {
    console.log('removedfile');
});