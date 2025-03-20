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



 dropzone.on('success', function(file, response) {

     document.querySelector('[name="imagen"]').value = response.imagen;
 });


dropzone.on('removedfile', function() {
    console.log('removedfile');
});