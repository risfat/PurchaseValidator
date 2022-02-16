Dropzone.options.myAwesomeDropzone = {
    paramName: "file", // Las imágenes se van a usar bajo este nombre de parámetro
    autoProcessQueue:true,
    required:true,
    acceptedFiles: ".png,.jpg,.gif,.bmp,.jpeg",
    resizeWidth: 400,
    resizeHeight: 400,
    resizeMethod: "contain",
    addRemoveLinks: true,
    maxFiles:8,
    parallelUploads : 100,
    maxFilesize:5,
    init: function() {
        this.on("success", function(file, response) {
            $('.dz-preview');

                var name = document.querySelector('input[name=product_image]');
                name.value = response;

        })
    }
};
