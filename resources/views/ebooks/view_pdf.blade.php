<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View PDF</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.9.359/pdf.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="text-center">
            <h1>{{ $fileName }}</h1>
            <div id="pdf-viewer"></div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.9.359/pdf.min.js"></script>
    <script>
        var pdfData = atob("{{ $pdfBase64 }}");
        var pdfDataLength = pdfData.length;
        var dataArray = new Uint8Array(pdfDataLength);
        for (var i = 0; i < pdfDataLength; i++) {
            dataArray[i] = pdfData.charCodeAt(i);
        }
        var pdfArray = dataArray.buffer;

        function loadPdf(pdfArray) {
            pdfjsLib.getDocument({ data: pdfArray }).promise.then(function(pdf) {
                for (var pageNum = 1; pageNum <= pdf.numPages; pageNum++) {
                    pdf.getPage(pageNum).then(function(page) {
                        var scale = 1.5;
                        var viewport = page.getViewport({ scale: scale });
                        var canvas = document.createElement('canvas');
                        var context = canvas.getContext('2d');
                        canvas.height = viewport.height;
                        canvas.width = viewport.width;
                        var renderContext = {
                            canvasContext: context,
                            viewport: viewport
                        };
                        page.render(renderContext);
                        document.getElementById('pdf-viewer').appendChild(canvas);
                    });
                }
            });
        }
        loadPdf(pdfArray);

        var pdfTab = window;

        window.onblur = function(event) {
            alert("Anda tidak diperbolehkan berpindah tab saat PDF sedang terbuka.");
            pdfTab.focus();
        };
    </script>
</body>
</html>
