<!DOCTYPE html>
<html>
<head>
    <title>Screenshot to PDF</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.min.js"></script>
</head>
<body>
    <h1>Screenshot to PDF</h1>
    <button onclick="takeScreenshot()">Take Screenshot</button>
    <script>
        function takeScreenshot() {
            html2canvas(document.body).then(function(canvas) {
                var imgData = canvas.toDataURL('image/png');
                var pdf = new jsPDF('p', 'pt', [canvas.width, canvas.height]);
                pdf.addImage(imgData, 'PNG', 0, 0, canvas.width, canvas.height);
                pdf.save("screenshot.pdf");
            });
        }


        
    </script>
    <script>
document.getElementById('generate-screenshot').addEventListener('click', function() {
  // Replace "screenshot.php" with the actual path to the PHP file on your web server.
  window.open('screenshot.php', '_blank');
});
</script>

</body>
</html>
