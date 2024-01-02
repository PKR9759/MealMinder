<?php
// Start session and include necessary files
// session_start();
require_once('/Applications/XAMPP/xamppfiles/htdocs/food2/TCPDF-main/examples/tcpdf_include.php');


// Set order_placed flag initially to 0
$order_placed = 0;

// Create a new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// Set document information
$pdf->SetCreator('Your Name');
$pdf->SetAuthor('Your Name');
$pdf->SetTitle('Order Details');
$pdf->SetSubject('Order Details');
$pdf->SetKeywords('TCPDF, PDF, order, test');

// Set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// Set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// Set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// Add a page and set font
$pdf->AddPage();
$pdf->SetFont('helvetica', '', 12);

// Print the cart contents to the PDF
if (isset($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $item) {
        $pdf->Cell(0, 10, 'Item: ' . $item['name'], 0, 1);
        $pdf->Cell(0, 10, 'Quantity: ' . $item['quantity'], 0, 1);
        $pdf->Cell(0, 10, 'Price: ' . $item['price'], 0, 1);
        $pdf->Ln();
    }
}

// Output PDF as file or inline display
$pdf->Output('order.pdf', 'I'); // 'I' for inline display

// Now handle database operations after the PDF generation

// Check if the data has already been inserted
if (!$order_placed) {
    // Fetch values from the session cart and insert them into the table
    if (isset($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $item) {
            $nameItem = $item['name'];
            $email = $_SESSION['name'];
            $emailParts = explode("@", $email);
            $done = $emailParts[0];
            $nameUser = $done;
            $quantity = $item['quantity'];
            $imgPath = $item['path'];

            // Prepare the SQL statement without placeholders
            $sql = "INSERT INTO orders (name_item, name_user, quantity, img_path)
                    VALUES ('$nameItem', '$nameUser', '$quantity', '$imgPath')";

            // Perform the database insertion
            if ($conn->query($sql) === TRUE) {
                // Insertion successful
            } else {
                echo "Error inserting record: " . $conn->error;
            }
        }

        // Set order_placed flag to 1 and unset cart/session data
        $order_placed = 1;
        unset($_SESSION['totalItem']);
        unset($_SESSION['cart']);
    }
}

// Close the database connection
$conn->close();
?>
