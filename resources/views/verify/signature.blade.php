<!DOCTYPE html>
<html>
<head>
    <title>Merge Document with HTML</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.js"></script>
</head>
<body>
    <h2 style="text-align:center;">Document Approval</h2>
    <p>Employee Name: {{ $document->name }}</p>
    <p>Employee ID: {{ $document->emp_id }}</p>
    <p>Department: {{ $document->department }}</p>
    
    <div class="footer">
        <div>
            <strong>HOD Sign:</strong>
            <p>Verified by HOD</p>
        </div>
        <div>
            <strong>Dean Sign:</strong>
            <p>Approved by Dean</p>
        </div>
    </div>

    <!-- Hidden input to hold the file name -->
    <input type="hidden" id="uploaded_pdf" value="{{ $document->file_name }}" />

    <!-- Merge Button -->
    <button id="mergeBtn">Merge and Send</button>

    <script>
        document.getElementById('mergeBtn').addEventListener('click', function() {
            const { jsPDF } = window.jspdf;

            // Get the uploaded PDF file name from the hidden input
            const fileName = document.getElementById('uploaded_pdf').value;

            if (!fileName) {
                alert('No PDF file specified!');
                return;
            }

            // Assuming the file is stored in the "public/uploads" directory or appropriate path
            const fileUrl = `{{ asset('storage') }}/${fileName}`;

            // Fetch the uploaded PDF file
            fetch(fileUrl)
                .then(response => response.arrayBuffer())
                .then(pdfData => {
                    // Create a new jsPDF instance for the HTML content
                    const doc = new jsPDF();
                    
                    // Add the HTML content as a new page in the PDF
                    doc.html(document.body, {
                        callback: function (doc) {
                            // Now merge the uploaded PDF with this new content
                            doc.addPage(); // Add a new page to insert the uploaded PDF
                            doc.addImage(pdfData, 'PDF', 0, 0, 210, 297); // Assuming A4 size (210mm x 297mm)

                            // Send the merged PDF back to the Laravel controller for further processing
                            const mergedPdf = doc.output('blob');
                            const formData = new FormData();
                            formData.append('merged_pdf', mergedPdf, 'merged_document.pdf');
                            
                            // Use fetch API to send the merged PDF to the controller
                            fetch('{{ route('mergeDocument') }}', {
                                method: 'POST',
                                headers: {
                                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                },
                                body: formData
                            })
                            .then(response => response.json())
                            .then(data => {
                                console.log('Merge Successful:', data);
                                alert('Document merged and sent successfully!');
                            })
                            .catch(error => {
                                console.error('Error:', error);
                                alert('Error while sending the document.');
                            });
                        }
                    });
                })
                .catch(error => {
                    console.error('Error fetching the uploaded PDF:', error);
                    alert('Error fetching the uploaded PDF.');
                });
        });
    </script>
</body>
</html>
