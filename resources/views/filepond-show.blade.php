<script src="https://unpkg.com/filepond/dist/filepond.js"></script>
<script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>

<script>
    FilePond.registerPlugin(FilePondPluginImagePreview);
    const inputElement = document.querySelector('input[id="thumbnail"]');
    const pond = FilePond.create( inputElement );

    FilePond.setOptions({
        server: {
            url: 'http://127.0.0.1:8000',
            process: {
                url: '/upload/store',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            },
		},
        load: (source, load, error, progress, abort, headers) => {
				console.log('attempting to load', source);
				// implement logic to load file from server here
				// https://pqina.nl/filepond/docs/patterns/api/server/#load-1
                error(console.log('errorr'));
                progress(true, 0, 1024);
                load(file);
                return {
                abort: () => {
                    // User tapped cancel, abort our ongoing actions here

                    // Let FilePond know the request has been cancelled
                    abort();
                },
            };
		},
		// files array
		files: [
			{
				source: '{{ $article->thumbnail }}',
				options: {
					type: 'local'
				}
			}
		]
    });

</script>
