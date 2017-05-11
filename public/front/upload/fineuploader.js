var galleryUploader = new qq.FineUploader({
    debug: true, //enable/disable debug mode
    element: document.getElementById("fine-uploader-gallery"),
    template: 'qq-template-gallery',
    request: {
        endpoint: '/server/uploads'
    },
    thumbnails: {
        placeholders: {
            waitingPath: '/source/placeholders/waiting-generic.png',
            notAvailablePath: '/source/placeholders/not_available-generic.png'
        }
    },
    validation: {
        allowedExtensions: ['jpeg', 'jpg', 'gif', 'png']
    },
    retry: {
        enableAuto: true, //Networks can be unreliable, and if your upload fails, Fine Uploader offers the ability to retry. The retry option can be set to enable this:
    },

    //If a user has uploaded a file, but realized it was a mistake before aborting, then FineUploder can also help them delete files. Fine Uploader supports deleting files via POST, DELETE, and across origins/domains.
    deleteFile: {
        enabled: true, // defaults to false
        endpoint: '/my/delete/endpoint'
    }
});