<!DOCTYPE html>
<html>
<head>
    <title>Generate QR Code</title>
    <script src="https://cdn.jsdelivr.net/npm/qrious@4.0.2/qrious.min.js"></script>
</head>
<body>
    <h2>Generate QR Code</h2>
    <input type="file" id="pdfFile" accept=".pdf">
    <input type="submit" value="Generate QR Code" onclick="generateQRCode()">
    <div id="qrcode"></div>
    <p>Scan the QR code below:</p>

    <script>
        // Generate the QR code
        function generateQRCode() {
            var fileInput = document.getElementById("pdfFile");
            var file = fileInput.files[0];

            if (file) {
                var reader = new FileReader();

                reader.onload = function (event) {
                    var arrayBuffer = event.target.result;
                    var uintArray = new Uint8Array(arrayBuffer);
                    var binaryString = uintArray.reduce(function (data, byte) {
                        return data + String.fromCharCode(byte);
                    }, '');

                    var dataURL = btoa(binaryString);

                    generateQRCodeFromDataURL(dataURL);
                };

                reader.readAsArrayBuffer(file);
            }
        }

        // Generate QR code from data URL
        function generateQRCodeFromDataURL(dataURL) {
            var qr = new QRious({
                element: document.getElementById("qrcode"),
                value: dataURL,
                size: 128
            });
        }
    </script>
</body>
</html>
