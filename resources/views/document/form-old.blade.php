<!DOCTYPE html>
<html>
<head>
    <title>Document Input</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <style>
        body {
            font-family: "Times New Roman", serif;
            font-size: 12pt;
            line-height: 1.5;
            margin: 1cm;
        }

        .header-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 1cm;
            margin-bottom: 10px;
            font-weight: bold;
            font-size: 12pt;
        }

        .header-left {
            text-align: left;
            width: 33.33%;
        }

        .header-center {
            text-align: center;
            width: 33.33%;
        }

        .header-right {
            text-align: right;
            width: 33.33%;
        }


        .college-info {
            text-align: center;
            font-size: 14pt;
            font-weight: bold;
        }

        .title {
            font-size: 16pt;
            text-align: center;
            font-weight: bold;
            color: blue;
        }

        .section {
            font-size: 14pt;
            text-align: center;
            font-weight: bold;
            line-height: 1.0;
        }

        .sub-section {
            font-size: 12pt;
            text-align: center;
            font-weight: bold;
            line-height:1.0;
        }

        p {
            text-align: justify;
            font-size: 12pt;
        }

        hr {
            border: 1px solid black;
            margin-top: 10px;
            margin-bottom: 20px;
        }

        .logo-row {
            width: 100%;
            text-align: center;
            margin: 20px 0;
        }

        .logo {
            width: 100%;
            max-height: 120px;
            /* adjust height as needed */
            object-fit: contain;
            /* ensures the image scales proportionally */
        }

        .center-text {
            flex-grow: 1;
            text-align: center;
        }
        .section-title {
            font-weight: bold;
        }
        .justified-content {
            text-align: justify;
        }
        table {
        width: 100%;
        border-collapse: collapse;
        font-family: "Times New Roman", Times, serif;
        font-size: 12pt;
    }

    th, td {
        border: 1px solid black;
        padding: 4px;
        vertical-align: middle; /* Vertically center the text */
    }

    .justified {
        text-align: justify;
        line-height: 1.0; /* Single line spacing */
    }

    .section-title {
        font-weight: bold;
    }

    .table-caption {
        font-family: "Times New Roman", Times, serif;
        font-size: 12pt;
        margin-bottom: 10px;
    }
    .inputWidth{
        width: 100%;
    }
    .delete-row {
    background: #ff4444;
    color: white;
    border: none;
    border-radius: 50%;
    width: 25px;
    height: 25px;
    cursor: pointer;
    font-weight: bold;
}

.delete-row:hover {
    background: #cc0000;
}

/* Hide delete button in preview */
.preview-mode .delete-row {
    display: none !important;
}

/* Ensure the cell remains visible */
.preview-mode td {
    border: 1px solid black !important;
}
    </style>

</head>
<body>
    <h2>Enter Document Content</h2>
    <form action="{{ route('preview') }}" method="POST" onsubmit="prepareTable()">
    @csrf
    <div class="header-row">
        <div class="header-left">KG College of Arts and Science (Autonomous)</div>
        <!-- <div class="header-center">2<sup>nd</sup> Board of Studies</div> -->
        <div class="header-right">
            Batch <input type="text" name="batch">
        </div>
    </div>

    <hr>
    <div class="logo-row">
        <img src="{{ asset('images/kglogo.jpeg') }}" class="logo">
    </div>

    <div class="title">Regulations 2025 -26 for <select name="graduate" id="" required>
    <option value="Under">Under</option>
    <option value="Post">Post</option>
    </select> Graduate Programme</div>
    <br>
    <div class="sub-section">
        Learning Outcomes Based Curriculum Framework (LOCF) model with<br>
        Choice Based Credit System (CBCS)
    </div>
    <br>
    <div class="section">
        Programme: <input type="text" name="department" placeholder="Department"><br><br>
        Programme Code: <input type="text" name="programme_code" placeholder="">
    </div>
        <br>
    <div class="sub-section" style="color: red;">
        (Applicable for the Students admitted during the academic year onwards)
    </div>
    <br>
    <p class="section-title">Eligibility</p>

    <p class="justified-content">
        <textarea name="eligibility" id="" class="forn-control" cols="200px" rows="5px"></textarea>
    </p>
    <br>
    <p class="section-title">Program Learning Outcomes (PLOs)</p>
    <p class="table-caption">
        The successful completion of <input type="text" name="prgm_department" placeholder="Department"> Programme shall enable the students to:
    </p>
    <br>
    <table>
    <tr>
        <td class="tdhead">PLO1</td>
        <td class="justified"><input type="text" name="plo1" class="inputWidth"></td>
    </tr>
    <tr>
        <td class="tdhead">PLO2</td>
        <td class="justified"><input type="text" name="plo2" class="inputWidth"></td>
    </tr>
    <tr>
        <td class="tdhead">PLO3</td>
        <td class="justified"><input type="text" name="plo3" class="inputWidth"></td>
    </tr>
    <tr>
        <td class="tdhead">PLO4</td>
        <td class="justified"><input type="text" name="plo4" class="inputWidth"></td>
    </tr>
    <tr>
        <td class="tdhead">PLO5</td>
        <td class="justified"><input type="text" name="plo5" class="inputWidth"></td>
    </tr>
</table>

<br>

<p style="font-family: 'Times New Roman'; font-size: 14pt; font-weight: bold; text-align: center; line-height: 1.5; color: blue;">
    Display Department Name
</p>
<p style="font-family: 'Times New Roman'; font-size: 14pt; font-weight: bold; text-align: center; line-height: 1.5; color: blue;">
    Distribution of Credits and Hours for all the Semesters
</p>


<table id="creditTable" style="border-collapse: collapse; font-family: 'Times New Roman'; font-size: 12pt;">
    <thead>
        <tr style="background-color: #f2f2f2; font-weight: bold; text-align: center;">
            
            <th style="border: 1px solid black; vertical-align: middle;">Part</th>
            <th style="border: 1px solid black; vertical-align: middle;">Course Category</th>
            <th style="border: 1px solid black; vertical-align: middle;width:10px">No. of Courses</th>
            <th style="border: 1px solid black; vertical-align: middle;" colspan="2">Hours</th>
           
            <th style="border: 1px solid black; vertical-align: middle;" colspan="2">Credits</th>
            <th style="border: 1px solid black; vertical-align: middle;width:10px">Total Credits</th>
            <th style="border: 1px solid black; vertical-align: middle;">Semester</th>
        </tr>
    </thead>
    <tbody>
    <tr>
    <td style="border: 1px solid black; text-align: center; vertical-align: middle;">
        <input type="checkbox" class="cell-select" data-row="0" data-col="0" />
        <input type="text" name="part[]" />
    </td>
    <td style="border: 1px solid black;text-align: left;">
        <input type="checkbox" class="cell-select" data-row="0" data-col="1" />
        <input type="text" name="course_category[]" />
    </td>
    <td style="border: 1px solid black; text-align: center;">
        <input type="checkbox" class="cell-select" data-row="0" data-col="2" />
        <input type="text" name="no_of_course[]" />
    </td>
    <td style="border: 1px solid black; text-align: center;">
        <input type="checkbox" class="cell-select" data-row="0" data-col="3" />
        <input type="text" name="hours[]" />
    </td> 
    <td style="border: 1px solid black; text-align: center;">
        <input type="checkbox" class="cell-select" data-row="0" data-col="4" />
        <input type="text" name="total_hours[]" readonly/>
    </td>
    <td style="border: 1px solid black; text-align: center;">
        <input type="checkbox" class="cell-select" data-row="0" data-col="5" />
        <input type="text" name="credits[]" />
    </td>
    <td style="border: 1px solid black; text-align: center;">
        <input type="checkbox" class="cell-select" data-row="0" data-col="6" />
        <input type="text" name="total_credits[]" readonly />
    </td> 
    <td style="border: 1px solid black; text-align: center;">
        <input type="checkbox" class="cell-select" data-row="0" data-col="7" />
        <input type="text" name="total[]" />
    </td>
    <td style="border: 1px solid black; text-align: center;">
        <input type="checkbox" class="cell-select" data-row="0" data-col="8" />
        <input type="text" name="sem[]" />
    </td>
    <td class="delete"><button type="button" class="delete-row" onclick="deleteRow(this)">×</button></td>
    </tr>
    


<button type="button"  onclick="addRow()" class="btn btn-success me-2">Add Row</button>
        <button onclick="mergeSelectedCells()" type="button" class="btn btn-warning me-2">Merge Selected</button>
        <button onclick="unmergeSelectedCells()" type="button" class="btn btn-danger">Unmerge</button>
        

        
    </tbody>
   
</table>


<input type="hidden" name="merged_html" id="merged_html">
<input type="hidden" name="merged_table_html" id="mergedTableInput">






<footer>
    <h4>Footer</h4>
         Department of <input type="text" name="footer_department" placeholder="Department Name for Footer">
    </footer>

    <!-- <textarea name="content" rows="20" cols="100" placeholder="Paste content here...">{{ old('content') }}</textarea><br><br> -->
    <button type="submit" >Preview</button>
</form>




<script>
  function addRow() {
    const table = document.getElementById("creditTable").getElementsByTagName('tbody')[0];
    
    // Check and remove Total row if it exists
    let totalRow;
    if (table.lastElementChild && table.lastElementChild.classList.contains('total-row')) {
        totalRow = table.removeChild(table.lastElementChild);
    }

    const rowCount = table.rows.length;
    const fieldNames = ["part[]", "course_category[]", "no_of_course[]", "hours[]","total_hours[]" ,"credits[]", "total_credits[]","total[]","sem[]"];
    const newRow = table.insertRow();

    for (let i = 0; i < fieldNames.length; i++) {
        const newCell = newRow.insertCell(i);
        newCell.style.border = "1px solid black";
        newCell.style.textAlign = (fieldNames[i] === "course_category[]") ? "left" : "center";
        newCell.style.verticalAlign = "middle";

        const isTotalHours = fieldNames[i] === "total_hours[]";
        const isTotalCredits = fieldNames[i] === "total_credits[]";
        newCell.innerHTML = `
            <input type="checkbox" class="cell-select" data-row="${rowCount}" data-col="${i}" />
            <input type="text" name="${fieldNames[i]}" 
                ${isTotalHours ? 'readonly' : ''}
                ${isTotalHours ? 'class="readonly-field"' : ''}
                ${isTotalCredits ? 'readonly' : ''}
                ${isTotalCredits ? 'class="readonly-field"' : ''}
            />
        `;
    }

      // Add delete button cell
      const deleteCell = newRow.insertCell(-1);
// deleteCell.style.border = "1px solid red";
deleteCell.style.textAlign = "center";
deleteCell.className="delete";

// Create button element properly
const deleteBtn = document.createElement('button');
deleteBtn.type = 'button';
deleteBtn.className = 'delete-row delete';  // Multiple classes
deleteBtn.textContent = '×';
deleteBtn.onclick = function() { deleteRow(this); };

// Append to cell
deleteCell.appendChild(deleteBtn);
    // Re-append the total row
    if (totalRow) {
        table.appendChild(totalRow);
    }

    updateAllTotals();

   
}

function addTotalRow() {
    const table = document.getElementById("creditTable").getElementsByTagName('tbody')[0];
    const totalRow = table.insertRow();
    totalRow.classList.add("total-row");

    // Create cells matching your table structure
    const cells = [
        // { content: '', colspan: 2 },                          // Part (empty)
        { content: '<strong>Total</strong>', colspan: 2 },   // "Total" label
        { content: '<input type="text" name="total_course" readonly>', colspan: 1 },  // No. of courses total
        { content: '', colspan: 1 },                         // Hrs. calculation (empty)
        { content: '<input type="text" name="total_hrs" readonly>', colspan: 1 },    // Hrs. total
        { content: '', colspan: 1 },                         // Credits calculation (empty)
        { content: '<input type="text" name="total_crd" readonly>', colspan: 1 },    // Credits total
        { content: '<input type="text" name="total_tot" readonly>', colspan: 1 },    // Grand total
        { content: '', colspan: 1 }                           // Semester (empty)
    ];

    cells.forEach((cell, index) => {
        const td = document.createElement('td');
        td.style.border = '1px solid black';
        td.style.textAlign = 'center';
        td.style.fontWeight = 'bold';
        td.style.verticalAlign = 'middle';
        if (cell.colspan) td.colSpan = cell.colspan;
        td.innerHTML = cell.content;
        totalRow.appendChild(td);
    });

   
   

  
}

window.onload = function () {
       
        addTotalRow();    // Add the total row to the end
    };

// Merge selected cells while preserving original field names
function mergeSelectedCells() {
    const selected = Array.from(document.querySelectorAll('.cell-select:checked'));
    if (selected.length < 2) return;

    // Get merge boundaries
    const {minRow, maxRow, minCol, maxCol} = getMergeBoundaries(selected);
    const targetCell = document.querySelector(`[data-row="${minRow}"][data-col="${minCol}"]`).closest('td');
    
    // Get original field name and combined value
    const originalName = targetCell.querySelector('input[type="text"]')?.name || 'merged_value[]';
    const combinedValue = getCombinedValue(selected);

    // Create merged cell
    targetCell.rowSpan = maxRow - minRow + 1;
    targetCell.colSpan = maxCol - minCol + 1;
    targetCell.classList.add('merged-cell');
    targetCell.setAttribute('data-start-row', minRow);
    targetCell.setAttribute('data-start-col', minCol);
    targetCell.setAttribute('data-rows', maxRow - minRow + 1);
    targetCell.setAttribute('data-cols', maxCol - minCol + 1);

    targetCell.innerHTML = `
        <input type="checkbox" class="cell-select" data-row="${minRow}" data-col="${minCol}" />
        <input type="text" name="${originalName}" value="${combinedValue}" style="width: 100%;" />
    `;

    removeCoveredCells(minRow, maxRow, minCol, maxCol);
}

// Unmerge selected cells
function unmergeSelectedCells() {
    const selected = Array.from(document.querySelectorAll('.cell-select:checked'));
    selected.forEach(input => {
        const td = input.closest('td');
        if (!td.classList.contains('merged-cell')) return;

        const table = document.getElementById("creditTable");
        const startRow = parseInt(td.getAttribute('data-start-row'));
        const startCol = parseInt(td.getAttribute('data-start-col'));
        const rowSpan = parseInt(td.getAttribute('rowspan')) || 1;
        const colSpan = parseInt(td.getAttribute('colspan')) || 1;
        const originalName = td.querySelector('input[type="text"]')?.name;
        const value = td.querySelector('input[type="text"]')?.value || '';

        // Reset merged cell
        td.removeAttribute('rowspan');
        td.removeAttribute('colspan');
        td.classList.remove('merged-cell');
        td.removeAttribute('data-start-row');
        td.removeAttribute('data-start-col');
        td.removeAttribute('data-rows');
        td.removeAttribute('data-cols');

        // Restore original cells
        for (let r = 0; r < rowSpan; r++) {
            const row = table.rows[startRow + r];
            for (let c = 0; c < colSpan; c++) {
                if (r === 0 && c === 0) continue; // Skip the original cell

                const newTd = document.createElement('td');
                newTd.style.border = "1px solid black";
                newTd.style.textAlign = "center";
                newTd.style.verticalAlign = "middle";
                
                newTd.innerHTML = `
                    <input type="checkbox" class="cell-select" data-row="${startRow + r}" data-col="${startCol + c}" />
                    <input type="text" name="${originalName}" value="${r === 0 && c === 0 ? value : ''}" />
                `;

                // Find correct position to insert
                let insertAt = 0;
                let colCount = 0;
                while (insertAt < row.cells.length && colCount < startCol + c) {
                    colCount += row.cells[insertAt].colSpan || 1;
                    if (colCount <= startCol + c) insertAt++;
                }
                
                if (insertAt >= row.cells.length) {
                    row.appendChild(newTd);
                } else {
                    row.insertBefore(newTd, row.cells[insertAt]);
                }
            }
        }
    });
}

// Helper functions
function getMergeBoundaries(selected) {
    const rows = selected.map(input => parseInt(input.dataset.row));
    const cols = selected.map(input => parseInt(input.dataset.col));
    return {
        minRow: Math.min(...rows),
        maxRow: Math.max(...rows),
        minCol: Math.min(...cols),
        maxCol: Math.max(...cols)
    };
}

function getCombinedValue(selected) {
    // Customize this based on how you want to combine values
    return selected.map(input => {
        const textInput = input.closest('td').querySelector('input[type="text"]');
        return textInput ? textInput.value : '';
    }).filter(Boolean).join(', '); // Example: combine with commas
}

function removeCoveredCells(minRow, maxRow, minCol, maxCol) {
    const table = document.getElementById("creditTable");
    for (let r = minRow; r <= maxRow; r++) {
        for (let c = minCol; c <= maxCol; c++) {
            if (r === minRow && c === minCol) continue; // Skip target cell
            const cell = document.querySelector(`[data-row="${r}"][data-col="${c}"]`);
            if (cell) {
                cell.closest('td').remove();
            }
        }
    }
}
// function mergeSelectedCells() {
//     const selected = Array.from(document.querySelectorAll('.cell-select:checked'));
//     if (selected.length < 2) {
//         alert("Select at least two cells to merge.");
//         return;
//     }

//     const cells = selected.map(input => {
//         const td = input.closest('td');
//         const row = parseInt(input.dataset.row);
//         const col = parseInt(input.dataset.col);
//         const textInput = td.querySelector('input[type="text"]');
//         const value = textInput ? textInput.value.trim() : '';
//         return { td, row, col, value };
//     });

//     const minRow = Math.min(...cells.map(c => c.row));
//     const maxRow = Math.max(...cells.map(c => c.row));
//     const minCol = Math.min(...cells.map(c => c.col));
//     const maxCol = Math.max(...cells.map(c => c.col));

//     const rowSpan = maxRow - minRow + 1;
//     const colSpan = maxCol - minCol + 1;

//     const targetCell = cells.find(c => c.row === minRow && c.col === minCol);
//     if (!targetCell) return;

//     const combinedValue = cells.map(c => c.value).join(' ').trim();

//     targetCell.td.rowSpan = rowSpan;
//     targetCell.td.colSpan = colSpan;
//     targetCell.td.classList.add("merged-cell");
//     targetCell.td.setAttribute('data-start-row', minRow);
//     targetCell.td.setAttribute('data-start-col', minCol);
//     targetCell.td.setAttribute('data-rows', rowSpan);
//     targetCell.td.setAttribute('data-cols', colSpan);

//     targetCell.td.innerHTML = `
//     <input type="checkbox" class="cell-select" data-row="${minRow}" data-col="${minCol}" />
//         <input type="text" name="merged_value[]" value="${combinedValue}" style="width: 100%; background: transparent;" />
//     `;

//     // Remove all other cells (except the target)
//     cells.forEach(c => {
//         if (c !== targetCell) {
//             c.td.remove();
//         }
//     });
// }



function unmergeSelectedCells() {
    const selected = Array.from(document.querySelectorAll('.cell-select:checked'));

    selected.forEach(input => {
        const td = input.closest('td');
        if (!td.classList.contains('merged-cell')) return;

        const table = document.getElementById("creditTable").getElementsByTagName('tbody')[0];
        const startRow = parseInt(td.getAttribute('data-start-row'));
        const startCol = parseInt(td.getAttribute('data-start-col'));
        const rowSpan = parseInt(td.getAttribute('rowspan')) || 1;
        const colSpan = parseInt(td.getAttribute('colspan')) || 1;
        const value = td.querySelector('input[type="text"]')?.value || '';

        // Reset the merged cell
        td.removeAttribute('rowspan');
        td.removeAttribute('colspan');
        td.classList.remove('merged-cell');
        td.removeAttribute('data-start-row');
        td.removeAttribute('data-start-col');
        td.removeAttribute('data-rows');
        td.removeAttribute('data-cols');

        // Restore all cells that were covered by the merged cell
        for (let r = 0; r < rowSpan; r++) {
            const currentRow = table.rows[startRow + r];
            
            for (let c = 0; c < colSpan; c++) {
                // Skip the original cell (top-left of the merged area)
                if (r === 0 && c === 0) continue;

                // Calculate the actual position to insert
                let insertPosition = 0;
                let colCount = 0;
                
                // Find the correct position to insert the new cell
                while (insertPosition < currentRow.cells.length && colCount < startCol + c) {
                    const cell = currentRow.cells[insertPosition];
                    const cellColSpan = parseInt(cell.getAttribute('colspan')) || 1;
                    colCount += cellColSpan;
                    if (colCount <= startCol + c) {
                        insertPosition++;
                    }
                }

                // Create new cell
                const newCell = document.createElement('td');
                newCell.style.border = '1px solid black';
                newCell.style.textAlign = 'center';
                newCell.style.verticalAlign = 'middle';
                newCell.innerHTML = `
                <input type="checkbox" class="cell-select" data-row="${startRow + r}" data-col="${colCount}" />
                <input type="text" value="${r === 0 && c === 0 ? value : ''}" />
                `;

                // Insert the new cell
                if (insertPosition >= currentRow.cells.length) {
                    currentRow.appendChild(newCell);
                } else {
                    currentRow.insertBefore(newCell, currentRow.cells[insertPosition]);
                }
            }
        }
    });
}

function prepareTable() {
    // Clone the original table
    const table = document.querySelector("#creditTable").cloneNode(true);

    // Process all rows
    const rows = table.querySelectorAll("tr");
    rows.forEach(row => {
        const cells = row.querySelectorAll("td");

        // Remove interactive elements from each cell
        cells.forEach(td => {
            // Replace inputs with their values
            const textInput = td.querySelector('input[type="text"]');
            if (textInput) {
                td.innerHTML = textInput.value || '';
            }

            // Remove checkboxes and other dynamic UI
            td.querySelectorAll('input[type="checkbox"], .cell-select, .delete-row').forEach(el => el.remove());
        });

        // Remove the last cell if it's a delete button column
        const lastCell = row.lastElementChild;
        if (lastCell && lastCell.querySelector(".delete-row")) {
            lastCell.style.border = "none";
            row.removeChild(lastCell);
        }
    });

    // Store the cleaned HTML in hidden input
    document.getElementById("mergedTableInput").value = table.outerHTML;

    return table;
}

function updateAllTotals() {
    // Sum all no_of_course values
    let totalCourses = 0;
    document.querySelectorAll('[name="no_of_course[]"]').forEach(input => {
        totalCourses += parseFloat(input.value) || 0;
    });
    document.querySelector('[name="total_course"]').value = totalCourses;
    
    // Sum all total_hours values
    let totalHours = 0;
    document.querySelectorAll('[name="total_hours[]"]').forEach(input => {
        totalHours += parseFloat(input.value) || 0;
    });
    document.querySelector('[name="total_hrs"]').value = totalHours;
    
    // Sum all total_credits values
    let totalCredits = 0;
    document.querySelectorAll('[name="total_credits[]"]').forEach(input => {
        totalCredits += parseFloat(input.value) || 0;
    });
    document.querySelector('[name="total_crd"]').value = totalCredits;

     // 4. Calculate GRAND TOTAL (sum of all total[] fields)
    let grandTotal = 0;
    document.querySelectorAll('[name="total[]"]').forEach(input => {
        grandTotal += parseFloat(input.value) || 0;
    });
    document.querySelector('[name="total_tot"]').value = grandTotal;
}
// Event listeners
document.addEventListener('input', function(e) {
    const input = e.target;
    const row = input.closest('tr');
    
    // 1. Handle no_of_course changes
    if (input.name === 'no_of_course[]') {
        updateAllTotals();
        
        // Also update credits calculation for this row
        const credits = parseFloat(row.querySelector('[name="credits[]"]').value) || 0;
        const totalCreditsInput = row.querySelector('[name="total_credits[]"]');
        totalCreditsInput.value = (parseFloat(input.value) || 0) * credits;
    }
    
    // 2. Handle hours calculation
    if (input.name === 'hours[]') {
        const totalHoursInput = row.querySelector('[name="total_hours[]"]');
        const cleanValue = input.value.replace(/[xX]/g, '×').replace(/\s+/g, '');
        
        if (cleanValue.includes('×')) {
            const [num1, num2] = cleanValue.split('×').map(n => parseFloat(n));
            if (!isNaN(num1) && !isNaN(num2)) {
                totalHoursInput.value = num1 * num2;
            }
        } else {
            totalHoursInput.value = '';
        }
        updateAllTotals();
    }
    
    // 3. Handle credits changes
   if (input.name === 'credits[]') {
        const noOfCourses = parseFloat(row.querySelector('[name="no_of_course[]"]').value) || 0;
        const totalCreditsInput = row.querySelector('[name="total_credits[]"]');
        totalCreditsInput.value = noOfCourses * (parseFloat(input.value) || 0);
        
        updateAllTotals();
    }
    updateAllTotals();
});

// Initialize on page load and after row changes
document.addEventListener('DOMContentLoaded', updateAllTotals);


function deleteRow(button) {
    button.closest('tr').remove();
    updateAllTotals();
}

// function updateTotalCourses() {
//     const courseInputs = document.querySelectorAll('input[name="no_of_course[]"]');
//     let total = 0;
    
//     courseInputs.forEach(input => {
//         const value = parseFloat(input.value) || 0;
//         total += value;
//     });
    
//     // Update the total_course field (assuming it's outside the table)
//     document.querySelector('input[name="total_course"]').value = total;
// }

// // Event listener for all no_of_course inputs
// document.addEventListener('input', function(e) {
//     if (e.target.name === 'no_of_course[]') {
//         updateTotalCourses();
//     }
// });

// document.addEventListener('input', function(e) {
//     const input = e.target;
//     const row = input.closest('tr');
//     if (input.name === 'hours[]') {
//         const totalHoursInput = row.querySelector('[name="total_hours[]"]');
        
//         // Format display (replace x/X with ×)
//         input.value = input.value.replace(/[xX]/g, ' × ');
        
//         // Calculate if valid format
//         const cleanValue = input.value.replace(/\s+/g, '');
//         if (cleanValue.includes('×')) {
//             const [num1, num2] = cleanValue.split('×').map(n => parseFloat(n));
//             if (!isNaN(num1) && !isNaN(num2)) {
//                 totalHoursInput.value = num1 * num2;
//             }
//         } else {
//             totalHoursInput.value = '';
//         }
//     }
//     if (input.name === 'no_of_course[]' || input.name === 'credits[]') {
//         const noOfCourses = parseFloat(row.querySelector('[name="no_of_course[]"]').value) || 0;
//         const credits = parseFloat(row.querySelector('[name="credits[]"]').value) || 0;
//         const totalCreditsInput = row.querySelector('[name="total_credits[]"]');
        
//         totalCreditsInput.value = noOfCourses * credits;
//     }
// });
</script>

</body>
</html>
