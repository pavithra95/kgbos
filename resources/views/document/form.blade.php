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
    <form action="{{ route('preview') }}" method="POST" id="Test" onsubmit="prepareTable()">
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
            <td class="delete" style="border: none;"></td>
        </tr>
    </thead>
    <tbody>
    <tr>
    <td style="border: 1px solid black; text-align: center; vertical-align: middle;">
        <input type="checkbox" class="cell-select" data-row="0" data-col="0" />
        <input type="text" name="part[]" />
    </td>
    <td style="border: 1px solid black;text-align: left;text-transform:capitalize;">
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
    <!-- <td class="delete" style="border: none;"></td>     -->
</tr>
    


<button type="button"  onclick="addRow()" class="btn btn-success me-2">Add Row</button>
        <button onclick="mergeSelectedCells()" type="button" class="btn btn-warning me-2">Merge Selected</button>
        <button onclick="unmergeSelectedCells()" type="button" class="btn btn-danger">Unmerge</button>
        

        
    </tbody>
   
</table>


<input type="hidden" name="merged_html" id="merged_html">
<input type="hidden" name="merged_table_html" id="mergedTableInput">
<input type="hidden" name="consolidate_table_html" id="consolidateTableInput">


<br>

<h2 style="text-align: center; font-size: 14pt; font-weight: bold; line-height: 1.5; color: blue;">
    Consolidated Semester wise and<br>Component wise Hours and Credits Distribution
</h2>

<table id="consolidateTable"  style="width: 100%; border-collapse: collapse; text-align: center; font-size: 10pt;">
    <thead>
        <tr>
            <th rowspan="2" style="border: 1px solid black; padding: 4px; font-weight: bold;">Semester</th>
            <th colspan="2" style="border: 1px solid black; padding: 4px; font-weight: bold;">Part I</th>
            <th colspan="2" style="border: 1px solid black; padding: 4px; font-weight: bold;">Part II</th>
            <th colspan="2" style="border: 1px solid black; padding: 4px; font-weight: bold;">Part III</th>
            <th colspan="2" style="border: 1px solid black; padding: 4px; font-weight: bold;">Part IV</th>
            <th colspan="2" style="border: 1px solid black; padding: 4px; font-weight: bold;">Part V</th>
            <th colspan="2" style="border: 1px solid black; padding: 4px; font-weight: bold;">Total</th>
            <th style="border: none;" class="delete"></th>
        </tr>
        <tr>
            <th style="border: 1px solid black; padding: 4px;">Hrs.</th>
            <th style="border: 1px solid black; padding: 4px;">Credits</th>
            <th style="border: 1px solid black; padding: 4px;">Hrs.</th>
            <th style="border: 1px solid black; padding: 4px;">Credits</th>
            <th style="border: 1px solid black; padding: 4px;">Hrs.</th>
            <th style="border: 1px solid black; padding: 4px;">Credits</th>
            <th style="border: 1px solid black; padding: 4px;">Hrs.</th>
            <th style="border: 1px solid black; padding: 4px;">Credits</th>
            <th style="border: 1px solid black; padding: 4px;">Hrs.</th>
            <th style="border: 1px solid black; padding: 4px;">Credits</th>
            <th style="border: 1px solid black; padding: 4px;">Hrs.</th>
            <th style="border: 1px solid black; padding: 4px;">Credits</th>
            <td class="delete" style="border: none;"></td>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td style="border: 1px solid black; padding: 4px; font-weight: bold;"><input type="text" style="width: 40px;" name="semester"></td>
            <td style="border: 1px solid black; padding: 4px;"><input type="text" name="hrs_1[]" style="width: 40px;" oninput="calculateTotals()"></td>
            <td style="border: 1px solid black; padding: 4px;"><input type="text" style="width: 40px;" name="credits_1[]" oninput="calculateTotals()"></td>
            <td style="border: 1px solid black; padding: 4px;"><input type="text" style="width: 40px;" name="hrs_2[]" oninput="calculateTotals()"></td>
            <td style="border: 1px solid black; padding: 4px;"><input type="text" style="width: 40px;" name="credits_2[]" oninput="calculateTotals()"></td>
            <td style="border: 1px solid black; padding: 4px;"><input type="text" style="width: 40px;" name="hrs_3[]" oninput="calculateTotals()"></td>
            <td style="border: 1px solid black; padding: 4px;"><input type="text" style="width: 40px;" name="credits_3[]" oninput="calculateTotals()"></td>
            <td style="border: 1px solid black; padding: 4px;"><input type="text" style="width: 40px;" name="hrs_4[]" oninput="calculateTotals()"></td>
            <td style="border: 1px solid black; padding: 4px;"><input type="text" style="width: 40px;" name="credits_4[]" oninput="calculateTotals()"></td>
            <td style="border: 1px solid black; padding: 4px;"><input type="text" style="width: 40px;" name="hrs_5[]" oninput="calculateTotals()"></td>
            <td style="border: 1px solid black; padding: 4px;"><input type="text" style="width: 40px;" name="credits_5[]" oninput="calculateTotals()"></td>
            <td style="border: 1px solid black; padding: 4px;font-weight:bold;"><input type="text" style="width: 40px;" name="hrs_tot[]"></td>
            <td style="border: 1px solid black; padding: 4px;font-weight:bold;"><input type="text" style="width: 40px;" name="credits_tot[]"></td>
            <td class="delete"><button type="button" class="btn btn-danger" onclick="deleteThisRow(this)" style="padding: 2px 6px;">X</button></td>
            <td style="border: none;" class="delete"></td>
        </tr>


        
    </tbody>

    
</table>
<button type="button" class="btn btn-success" onclick="addRowConsolidate()" style="margin-top: 10px; padding: 5px 10px;">Add Row</button>



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
        { content: '', colspan: 1 }, 
                          // Semester (empty)
        // { content: '<td class="delete" style="border:none;"></td>', colspan: 1 }                           // Semester (empty)
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

function addTotalConsolidateRow() {
    const table = document.getElementById("consolidateTable");
    const tbody = table.getElementsByTagName('tbody')[0];
    
    // Create total row with ID
    const totalRow = document.createElement('tr');
    totalRow.id = "totalRowCons";
    
    // Cells configuration - matches your HTML structure
    const cells = [
        { 
            content: '<strong style="color: red;">Total</strong>', 
            style: 'border: 1px solid black; padding: 4px; font-weight: bold;' 
        },
        // Part I
        { 
            content: '<input type="text" id="tot_hrs_1" style="width: 40px;" readonly>', 
            style: 'border: 1px solid black; padding: 4px; font-weight: bold;' 
        },
        { 
            content: '<input type="text" id="tot_credits_1" style="width: 40px;" readonly>', 
            style: 'border: 1px solid black; padding: 4px; font-weight: bold;' 
        },
        // Part II
        { 
            content: '<input type="text" id="tot_hrs_2" style="width: 40px;" readonly>', 
            style: 'border: 1px solid black; padding: 4px; font-weight: bold;' 
        },
        { 
            content: '<input type="text" id="tot_credits_2" style="width: 40px;" readonly>', 
            style: 'border: 1px solid black; padding: 4px; font-weight: bold;' 
        },
        // Part III
        { 
            content: '<input type="text" id="tot_hrs_3" style="width: 40px;" readonly>', 
            style: 'border: 1px solid black; padding: 4px; font-weight: bold;' 
        },
        { 
            content: '<input type="text" id="tot_credits_3" style="width: 40px;" readonly>', 
            style: 'border: 1px solid black; padding: 4px; font-weight: bold;' 
        },
        // Part IV
        { 
            content: '<input type="text" id="tot_hrs_4" style="width: 40px;" readonly>', 
            style: 'border: 1px solid black; padding: 4px; font-weight: bold;' 
        },
        { 
            content: '<input type="text" id="tot_credits_4" style="width: 40px;" readonly>', 
            style: 'border: 1px solid black; padding: 4px; font-weight: bold;' 
        },
        // Part V
        { 
            content: '<input type="text" id="tot_hrs_5" style="width: 40px;" readonly>', 
            style: 'border: 1px solid black; padding: 4px; font-weight: bold;' 
        },
        { 
            content: '<input type="text" id="tot_credits_5" style="width: 40px;" readonly>', 
            style: 'border: 1px solid black; padding: 4px; font-weight: bold;' 
        },
        // Grand Totals
        { 
            content: '<input type="text" id="tot_hrs_tot" style="width: 40px;" readonly>', 
            style: 'border: 1px solid black; padding: 4px; font-weight: bold;' 
        },
        { 
            content: '<input type="text" id="tot_credits_tot" style="width: 40px;" readonly>', 
            style: 'border: 1px solid black; padding: 4px; font-weight: bold;' 
        },
        // Empty cell for delete column
        { 
            content: '', 
            style: 'border: none;', 
            class: 'delete' 
        }
    ];

    // Create and append cells
    cells.forEach(cellConfig => {
        const td = document.createElement('td');
        
        // Apply styles
        td.style.cssText = cellConfig.style;
        
        // Add class if specified
        if (cellConfig.class) {
            td.className = cellConfig.class;
        }
        
        // Set content
        td.innerHTML = cellConfig.content;
        
        // Append to row
        totalRow.appendChild(td);
    });

    // Add row to table (at the end)
    tbody.appendChild(totalRow);
    
    // Initialize all total fields to 0
    for (let i = 1; i <= 5; i++) {
        document.getElementById(`tot_hrs_${i}`).value = '0';
        document.getElementById(`tot_credits_${i}`).value = '0';
    }
    document.getElementById('tot_hrs_tot').value = '0';
    document.getElementById('tot_credits_tot').value = '0';
}

window.onload = function () {
       
        addTotalRow();    // Add the total row to the end
        addTotalConsolidateRow();
    };

// Merge selected cells while preserving original field names
// function mergeSelectedCells() {
//     const selected = Array.from(document.querySelectorAll('.cell-select:checked'));
//     if (selected.length < 2) return;

//     // Get merge boundaries
//     const {minRow, maxRow, minCol, maxCol} = getMergeBoundaries(selected);
//     const targetCell = document.querySelector(`[data-row="${minRow}"][data-col="${minCol}"]`).closest('td');
    
//     // Get original field name and combined value
//     const originalName = targetCell.querySelector('input[type="text"]')?.name || 'merged_value[]';
//     const combinedValue = getCombinedValue(selected);

//     // Create merged cell
//     targetCell.rowSpan = maxRow - minRow + 1;
//     targetCell.colSpan = maxCol - minCol + 1;
//     targetCell.classList.add('merged-cell');
//     targetCell.setAttribute('data-start-row', minRow);
//     targetCell.setAttribute('data-start-col', minCol);
//     targetCell.setAttribute('data-rows', maxRow - minRow + 1);
//     targetCell.setAttribute('data-cols', maxCol - minCol + 1);

//     targetCell.innerHTML = `
//         <input type="checkbox" class="cell-select" data-row="${minRow}" data-col="${minCol}" />
//         <input type="text" name="${originalName}" value="${combinedValue}" style="width: 100%;" />
//     `;

//     removeCoveredCells(minRow, maxRow, minCol, maxCol);
// }

function mergeSelectedCells() {
    const checkboxes = Array.from(document.querySelectorAll('.cell-select:checked'))
        .filter(cb => cb.closest('td').rowSpan <= 1);
    
    if (checkboxes.length < 2) {
        alert('Please select at least 2 adjacent cells in the same column to merge');
        return;
    }

    const cells = checkboxes.map(cb => cb.closest('td'));
    const firstCell = cells[0];
    const table = firstCell.closest('table');
    
    // Sort cells by their row position
    cells.sort((a, b) => a.parentElement.rowIndex - b.parentElement.rowIndex);

    // Verify cells are consecutive vertically
    for (let i = 1; i < cells.length; i++) {
        if (cells[i].parentElement.rowIndex !== cells[i-1].parentElement.rowIndex + 1) {
            alert('You can only merge adjacent cells vertically');
            return;
        }
    }

    // Get the input element from the first cell
    const input = firstCell.querySelector('input[type="text"], input[type="number"]');
    const inputType = input ? input.type : 'text';
    const inputName = input ? input.name : '';
    const inputValue = input ? input.value : '';

    // Set up first cell with rowspan
    firstCell.rowSpan = cells.length;
    firstCell.innerHTML = `
        <input type="checkbox" class="cell-select">
        <input type="${inputType}" name="${inputName}" value="${inputValue}">
    `;

    // Add event listener to the new input
    const newInput = firstCell.querySelector('input[type="text"], input[type="number"]');
    if (newInput) {
        newInput.addEventListener('input', () => calculateTotals(table));
    }

    // Remove other cells (skip first cell)
    for (let i = 1; i < cells.length; i++) {
        cells[i].parentElement.removeChild(cells[i]);
    }

    // Uncheck all checkboxes after merge
    document.querySelectorAll('.cell-select:checked').forEach(cb => {
        cb.checked = false;
    });
    
  
}

// Unmerge selected cells

function unmergeSelectedCells() {
    const selected = document.querySelectorAll('.cell-select:checked');
    const tablesAffected = new Set();

    selected.forEach(cb => {
        const cell = cb.closest('td');
        const table = cell.closest('table');
        tablesAffected.add(table);
        
        const rowspan = parseInt(cell.getAttribute('rowspan') || '1');

        if (rowspan > 1) {
            const tr = cell.parentElement;
            const rowIndex = Array.from(table.rows).indexOf(tr);
            const colIndex = Array.from(tr.cells).indexOf(cell);

            // Get the inner value from input
            const input = cell.querySelector('input[type="text"], input[type="number"]');
            const value = input ? input.value : '';
            const inputType = input ? input.type : 'text';
            const inputName = input ? input.name : '';

            // Reset the merged cell
            cell.removeAttribute('rowspan');
            cell.innerHTML = `
                <input type="checkbox" class="cell-select" />
                <input type="${inputType}" name="${inputName}" value="${value}">
            `;
            
            // Add event listener to the new input
            cell.querySelector('input').addEventListener('input', () => calculateTotals(table));

            // Insert new cells in the following rows
            for (let i = 1; i < rowspan; i++) {
                const nextRow = table.rows[rowIndex + i];
                if (nextRow) {
                    const newCell = document.createElement('td');
                    newCell.innerHTML = `
                        <input type="checkbox" class="cell-select" />
                        <input type="${inputType}" name="${inputName}" value="${value}">
                    `;
                    // Add event listener to the new input
                    newCell.querySelector('input').addEventListener('input', () => calculateTotals(table));
                    
                    // Insert at the correct column index
                    nextRow.insertBefore(newCell, nextRow.cells[colIndex] || null);
                }
            }
        }
    });

    // Recalculate totals for all affected tables
    tablesAffected.forEach(table => calculateTotals(table));
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



// function prepareTable() {
//     // Clone the original table
//     const table = document.querySelector("#creditTable").cloneNode(true);

//     // Process all rows
//     const rows = table.querySelectorAll("tr");
//     rows.forEach(row => {
//         const cells = row.querySelectorAll("td");

//         // Remove interactive elements from each cell
//         cells.forEach(td => {
//             // Replace inputs with their values
//             const textInput = td.querySelector('input[type="text"]');
//             if (textInput) {
//                 td.innerHTML = textInput.value || '';
//             }

//             // Remove checkboxes and other dynamic UI
//             td.querySelectorAll('input[type="checkbox"], .cell-select, .delete-row').forEach(el => el.remove());
//         });

//         // Remove the last cell if it's a delete button column
//         const lastCell = row.lastElementChild;
//         if (lastCell && lastCell.querySelector(".delete-row")) {
//             lastCell.style.border = "none";
//             row.removeChild(lastCell);
//         }
//     });

//     // Store the cleaned HTML in hidden input
//     document.getElementById("mergedTableInput").value = table.outerHTML;

//     return table;
// }


function prepareTable() {
    // Clone the original table
    const table = document.querySelector("#creditTable").cloneNode(true);
    
    // Process all rows
    const rows = table.querySelectorAll("tr");
    rows.forEach(row => {
        const cells = row.querySelectorAll("td");
        
        // Process each cell
        cells.forEach(td => {
            // Replace text inputs with their values
            const textInput = td.querySelector('input[type="text"]');
            if (textInput) {
                td.innerHTML = textInput.value || '';
            }
            
            // Replace checkboxes with their state
            const checkbox = td.querySelector('input[type="checkbox"]');
            if (checkbox) {
                td.innerHTML = checkbox.checked ? '✓' : '✗';
            }
            
            // Remove other interactive elements
            td.querySelectorAll('.cell-select, .delete-row, button').forEach(el => el.remove());
        });
        
        // Remove the last cell if it's a delete button column
        const lastCell = row.lastElementChild;
        if (lastCell && lastCell.querySelector(".delete-row")) {
            row.removeChild(lastCell);
        }
    });
    
    // Store the cleaned HTML in hidden input
    document.getElementById("mergedTableInput").value = table.outerHTML;
    
    // Also consolidate table data for backend processing
    consolidateTable();
    
    return true; // Allow form submission
}

document.getElementById('Test').addEventListener('submit', function (e) {
    if (!validateTotalHours()) {
        e.preventDefault(); // ✅ stop submission and stay on the page
        return;
    }

    prepareTable(); // only call if valid
});

function consolidateTable() {
    // const table = document.getElementById("consolidateTable");
    const table = document.querySelector("#consolidateTable").cloneNode(true);
    const rows = table.querySelectorAll("tr");
    rows.forEach(row => {
        const cells = row.querySelectorAll("td");
        
        // Process each cell
        cells.forEach(td => {
            // Replace text inputs with their values
            const textInput = td.querySelector('input[type="text"]');
            if (textInput) {
                td.innerHTML = textInput.value || '';
            }
            
          
            
            // Remove other interactive elements
            td.querySelectorAll('.delete, button').forEach(el => el.remove());
        });
        
        // Remove the last cell if it's a delete button column
        const lastCell = row.lastElementChild;
        if (lastCell && lastCell.querySelector(".delete-row")) {
            row.removeChild(lastCell);
        }
    });
    
    // Store the cleaned HTML in hidden input
    document.getElementById("consolidateTableInput").value = table.outerHTML;
   
   
   
   
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

function addRowConsolidate() {
    var tbody = document.getElementById("consolidateTable").getElementsByTagName('tbody')[0];

    var row = document.createElement("tr");
    var totalRowC = document.getElementById("totalRowCons");
    // const totalRow = document.getElementById("totalRowCons");

    console.log(totalRowC);
    

    const fields = ["semester", "hrs_1[]", "credits_1[]", "hrs_2[]", "credits_2[]", "hrs_3[]", "credits_3[]", "hrs_4[]", "credits_4[]", "hrs_5[]", "credits_5[]", "hrs_tot[]", "credits_tot[]"];
    
    fields.forEach((name, index) => {
        var cell = document.createElement("td");
        cell.innerHTML = `<input type="text" style="width: 40px;" name="${name}" oninput="calculateTotals()">`;
        cell.style.border = "1px solid black";
        cell.style.padding = "4px";
        if ([0, 11, 12].includes(index)) {
            cell.style.fontWeight = "bold";
        }
        row.appendChild(cell);
    });

    // Add delete button
    var actionCell = document.createElement("td");
    actionCell.innerHTML = `<button type="button" onclick="deleteThisRow(this)" class="btn btn-danger" style="padding: 2px 6px;">X</button>`;
    // actionCell.style.border = "1px solid black";
    actionCell.style.padding = "4px";
    actionCell.style.textAlign = "center";
    actionCell.className="delete";
    row.appendChild(actionCell);

    // Insert BEFORE total row
    
    if (totalRowC && totalRowC.parentNode === tbody) {
        tbody.insertBefore(row, totalRowC); // ✅ Safe insert
    } else {
        tbody.appendChild(row); // fallback
    }
    calculateTotals();
}

function deleteThisRow(btn) {
    var row = btn.closest("tr");
    row.remove();
    calculateTotals();
}
function calculateTotals() {
    let rowCount = document.getElementsByName('hrs_1[]').length;

    // Clear all totals
    let columnTotals = {
        hrs: [0, 0, 0, 0, 0],
        credits: [0, 0, 0, 0, 0]
    };
    let grandTotals = {
        hrs: 0,
        credits: 0
    };

    for (let i = 0; i < rowCount; i++) {
        let hrsRowTotal = 0;
        let creditsRowTotal = 0;

        // Calculate column totals and row totals
        for (let j = 1; j <= 5; j++) {
            let hrsInput = document.getElementsByName(`hrs_${j}[]`)[i];
            let creditInput = document.getElementsByName(`credits_${j}[]`)[i];

            let hrsVal = parseFloat(hrsInput.value) || 0;
            let creditVal = parseFloat(creditInput.value) || 0;

            hrsRowTotal += hrsVal;
            creditsRowTotal += creditVal;
            
            columnTotals.hrs[j - 1] += hrsVal;
            columnTotals.credits[j - 1] += creditVal;
        }

        // Update row totals
        document.getElementsByName('hrs_tot[]')[i].value = hrsRowTotal;
        document.getElementsByName('credits_tot[]')[i].value = creditsRowTotal;
        
        // Add to grand totals
        grandTotals.hrs += hrsRowTotal;
        grandTotals.credits += creditsRowTotal;
    }

    // Update column totals
    for (let j = 1; j <= 5; j++) {
        document.getElementById(`tot_hrs_${j}`).value = columnTotals.hrs[j - 1];
        document.getElementById(`tot_credits_${j}`).value = columnTotals.credits[j - 1];
    }

    // Update grand totals
    document.getElementById('tot_hrs_tot').value = grandTotals.hrs;
    document.getElementById('tot_credits_tot').value = grandTotals.credits;
}

function validateTotalHours() {
    const totalHrsInput = document.querySelector('#tot_hrs_tot');
    const totalCreditsInput = document.querySelector('#tot_credits_tot');
    const totalHR = parseFloat(totalHrsInput?.value) || 0;
    const totalCR = parseFloat(totalCreditsInput?.value) || 0;
    //  console.log(totalHR)
    if (totalHR !== 180) {
        alert("Please check Total Hrs. It should be exactly 180");
        return false;
    }
    if(totalCR !== 140){
        alert("Please check Total Credits. It should be exactly 140");
        return false;
    }

    return true;
}

// window.onload = addRowConsolidate;


</script>

</body>
</html>
