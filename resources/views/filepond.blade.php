<script src="https://unpkg.com/filepond/dist/filepond.js"></script>
<script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>

<script>
    FilePond.registerPlugin(FilePondPluginImagePreview);

    const inputElement = document.querySelector('input[id="thumbnail"]');
    const pond = FilePond.create( inputElement );
    // FilePond.registerPlugin(
    //     FilePondPluginImagePreview,
    //     FilePondPluginImageExifOrientation,
    //     FilePondPluginFileValidateSize,
    //     FilePondPluginImageEdit
    //     );
    FilePond.setOptions({
            server: {
            url: 'http://127.0.0.1:8000',
            process: {
                url: '/upload/store',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            },
        }
    });
</script>
