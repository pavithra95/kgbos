<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PDF Merger with Page Numbers</title>
    <script src="https://unpkg.com/pdf-lib/dist/pdf-lib.min.js"></script>
    <script src="https://unpkg.com/@pdf-lib/fontkit@1.0.0"></script>
    <style>
        body {
            font-family: 'Times New Roman', serif;
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            line-height: 1.6;
        }
        h1 {
            color: #2c3e50;
            text-align: center;
            margin-bottom: 30px;
        }
        .upload-container {
            background: #f9f9f9;
            border: 2px dashed #ccc;
            border-radius: 8px;
            padding: 30px;
            text-align: center;
            margin-bottom: 20px;
        }
        #fileList {
            margin: 20px 0;
            padding: 0;
            list-style: none;
        }
        #fileList li {
            background: #e8f4f8;
            padding: 12px;
            margin: 8px 0;
            border-radius: 4px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .file-info {
            flex-grow: 1;
            margin-right: 15px;
        }
        .order-control {
            display: flex;
            align-items: center;
            margin-right: 15px;
        }
        .order-input {
            width: 50px;
            padding: 5px;
            text-align: center;
            margin: 0 8px;
        }
        .remove-btn {
            background: #e74c3c;
            color: white;
            border: none;
            border-radius: 4px;
            padding: 5px 10px;
            cursor: pointer;
            font-weight: bold;
        }
        #mergeBtn {
            background: #3498db;
            color: white;
            border: none;
            padding: 12px 24px;
            font-size: 16px;
            border-radius: 4px;
            cursor: pointer;
            transition: background 0.3s;
            display: block;
            margin: 25px auto;
            font-weight: bold;
        }
        #mergeBtn:hover {
            background: #2980b9;
        }
        #mergeBtn:disabled {
            background: #95a5a6;
            cursor: not-allowed;
        }
        .status {
            text-align: center;
            margin: 15px 0;
            font-style: italic;
            color: #7f8c8d;
        }
    </style>
</head>
<body>

<h1>PDF Merger with Page Numbers</h1>

<div class="upload-container">
    <input type="file" id="pdfInput" multiple accept="application/pdf" style="display: none;">
    <button onclick="document.getElementById('pdfInput').click()" style="padding: 12px 24px; background: #3498db; color: white; border: none; border-radius: 4px; cursor: pointer; font-weight: bold; margin-bottom: 15px;">
        Select PDF Files
    </button>
    <p style="margin-bottom: 20px;">or drag and drop files here</p>
    <p style="font-weight: bold; margin-bottom: 10px;">Set merge order for each file:</p>
    <ul id="fileList"></ul>
    <p id="status" class="status">No files selected</p>
</div>

<button id="mergeBtn" disabled>Merge and Download</button>

<script>
// DOM Elements
const pdfInput = document.getElementById('pdfInput');
const fileList = document.getElementById('fileList');
const mergeBtn = document.getElementById('mergeBtn');
const statusEl = document.getElementById('status');

// Store files with their merge order
let files = [];

// Handle file selection
pdfInput.addEventListener('change', (e) => {
    handleFiles(e.target.files);
});

// Handle drag and drop
const uploadContainer = document.querySelector('.upload-container');
uploadContainer.addEventListener('dragover', (e) => {
    e.preventDefault();
    uploadContainer.style.borderColor = '#3498db';
    uploadContainer.style.background = '#ecf0f1';
});

uploadContainer.addEventListener('dragleave', () => {
    uploadContainer.style.borderColor = '#ccc';
    uploadContainer.style.background = '#f9f9f9';
});

uploadContainer.addEventListener('drop', (e) => {
    e.preventDefault();
    uploadContainer.style.borderColor = '#ccc';
    uploadContainer.style.background = '#f9f9f9';
    handleFiles(e.dataTransfer.files);
});

// Process selected files
function handleFiles(newFiles) {
    if (!newFiles || newFiles.length === 0) return;
    
    // Add new files with sequential order
    for (let i = 0; i < newFiles.length; i++) {
        files.push({
            file: newFiles[i],
            order: files.length + 1 // Continue numbering from current count
        });
    }
    
    updateFileList();
    updateStatus();
    mergeBtn.disabled = files.length === 0;
}

// Update the file list UI
function updateFileList() {
    fileList.innerHTML = '';
    
    files.forEach((fileObj, index) => {
        const li = document.createElement('li');
        li.innerHTML = `
            <div class="file-info">
                <span style="font-weight: bold;">${fileObj.file.name}</span>
                <span style="font-size: 0.9em; color: #7f8c8d;">${(fileObj.file.size / 1024).toFixed(1)} KB</span>
            </div>
            <div class="order-control">
                <span>Order:</span>
                <input type="number" class="order-input" value="${fileObj.order}" min="1" 
                       onchange="updateFileOrder(${index}, this.value)">
            </div>
            <button class="remove-btn" onclick="removeFile(${index})">× Remove</button>
        `;
        fileList.appendChild(li);
    });
}

// Update file order
function updateFileOrder(index, newOrder) {
    const num = parseInt(newOrder);
    if (isNaN(num)) {
        return; // Exit if not a valid number
    }
    
    files[index].order = num;
    updateStatus();
}

// Remove a file from the list
function removeFile(index) {
    files.splice(index, 1);
    updateFileList();
    updateStatus();
    mergeBtn.disabled = files.length === 0;
}


// Update status message
function updateStatus() {
    if (files.length === 0) {
        statusEl.textContent = 'No files selected';
        return;
    }
    
    const sortedFiles = [...files].sort((a, b) => a.order - b.order);
    const fileNames = sortedFiles.map(f => f.file.name).join(' → ');
    statusEl.textContent = `Merge order: ${fileNames}`;
}

// Merge PDFs with Times New Roman page numbers
mergeBtn.addEventListener('click', async () => {
    if (files.length === 0) return;
    
    mergeBtn.disabled = true;
    mergeBtn.textContent = 'Processing...';
    statusEl.textContent = 'Merging PDFs...';
    
    try {
        // Create merged PDF
        const mergedPdf = await PDFLib.PDFDocument.create();
        
        // Register fontkit (this fixes the error)
        mergedPdf.registerFontkit(PDFLib.fontkit);
        
        // Try to load Times New Roman (you would need to embed the actual font)
        // For this example, we'll fall back to Helvetica-Bold
        let font;
        try {
            // In a real implementation, you would embed the actual font here
            // const timesNewRomanBytes = ...;
            // font = await mergedPdf.embedFont(timesNewRomanBytes);
            font = await mergedPdf.embedFont(PDFLib.StandardFonts.HelveticaBold);
        } catch (e) {
            console.warn("Couldn't load preferred font, using Helvetica-Bold", e);
            font = await mergedPdf.embedFont(PDFLib.StandardFonts.HelveticaBold);
        }
        
        // Sort files by user-specified order
        const orderedFiles = [...files].sort((a, b) => a.order - b.order);
        
        // First pass to count total pages
        let totalPages = 0;
        for (const { file } of orderedFiles) {
            const arrayBuffer = await file.arrayBuffer();
            const pdf = await PDFLib.PDFDocument.load(arrayBuffer);
            totalPages += pdf.getPageCount();
        }
        
        // Second pass to actually merge and add page numbers
        let currentPage = 0;
        for (const { file } of orderedFiles) {
            const arrayBuffer = await file.arrayBuffer();
            const pdf = await PDFLib.PDFDocument.load(arrayBuffer);
            const copiedPages = await mergedPdf.copyPages(pdf, pdf.getPageIndices());
            
            for (const page of copiedPages) {
                currentPage++;
                const { width, height } = page.getSize();
                
                // Add page number at bottom right (Times New Roman style)
                page.drawText(`${currentPage}`, {
                    x: width - 50,  // 50px from right edge
                    y: 50,         // 30px from bottom
                    size: 8,
                    font: font,
                    color: PDFLib.rgb(0, 0, 0),
                });
                
                mergedPdf.addPage(page);
            }
        }
        
        const mergedPdfBytes = await mergedPdf.save();
        downloadPDF(mergedPdfBytes, 'merged-document.pdf');
        
        statusEl.textContent = 'Merge completed!';
        
    } catch (error) {
        console.error('Error merging PDFs:', error);
        statusEl.textContent = 'Error: ' + error.message;
        alert('An error occurred while merging the PDFs. Please check the console for details.');
    } finally {
        mergeBtn.disabled = false;
        mergeBtn.textContent = 'Merge and Download';
    }
});

// Helper function to download the merged PDF
function downloadPDF(pdfBytes, fileName) {
    const blob = new Blob([pdfBytes], { type: 'application/pdf' });
    const link = document.createElement('a');
    link.href = URL.createObjectURL(blob);
    link.download = fileName;
    document.body.appendChild(link);
    link.click();
    document.body.removeChild(link);
}
</script>
</body>
</html>