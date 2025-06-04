function create_sc_editor(textarea)
{
    sceditor.create(textarea, {
        format: 'xhtml',
        //style: 'https://cdn.jsdelivr.net/npm/sceditor@3/minified/themes/content/default.min.css',
        style: "{{ asset('/') }}public/assets/vendor/libs/sceditor-3.2.0/minified/themes/default.min.css",
        dragdrop: {
        // Array of allowed mime types or null to allow all
        allowedTypes: ['image/jpeg', 'image/png'],
        // Function to return if a file is allowed or not,
        // defaults to always returning true
        isAllowed: function(file) {
            return true;
        },
        // If to extract pasted files like images pasted as
        // base64 encoded URI's. Defaults to true
        handlePaste: true,
        // Method that handles the files / uploading etc.
        handleFile: function (file, createPlaceholder) {
            // createPlaceholder function will insert a
            // loading placeholder into the editor and
            // return an object with inert(html) and
            // cancel() methods
        // For example:
        var placeholder = createPlaceholder();
        asyncUpload(file).then(function (url) {
            // Replace the placeholder with the image HTML
            placeholder.insert('<img src=\'' + url + '\' />');
        }).catch(function () {
            // Error so remove the placeholder
            placeholder.cancel();
        });
    }
}
});
}
