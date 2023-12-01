let imageId;
let cropperInstance;

$('#cropper-modal').on('shown.bs.modal', () => {
    const imageElement = document.getElementById('cropperImage');

    if (cropperInstance) {
        cropperInstance.destroy();
    }

    cropperInstance = new Cropper(imageElement, {
        aspectRatio: 3 / 2,
        cropBoxResizable: false,
        viewMode: 1,
    });
});

$('#crop-button').on('click', () => {
    const croppedCanvas = cropperInstance.getCroppedCanvas({
        width: 300,
        height: 200,
    });

    const croppedImageDataURL = croppedCanvas.toDataURL('image/jpeg');

    document.getElementById(imageId).src = croppedImageDataURL;

    $('#cropper-modal').modal('hide');

    cropperInstance.destroy();
});

let previewImage = (event, id) => {
    imageId = id;
    const input = event.target;

    if (input.files && input.files[0]) {
        const reader = new FileReader();

        reader.onload = function (e) {
            document.getElementById('cropperImage').src = e.target.result;

            $('#cropper-modal').modal('show');
        };

        reader.readAsDataURL(input.files[0]);
    }
};
