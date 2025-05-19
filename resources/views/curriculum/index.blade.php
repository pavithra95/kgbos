<!DOCTYPE html>
<html>
<head>
    <title>Document Input</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
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
        .header-left, .header-center, .header-right {
            width: 33.33%;
        }
        .college-info, .title, .section, .sub-section {
            text-align: center;
            font-weight: bold;
        }
        .title { font-size: 16pt; color: blue; }
        .section { font-size: 14pt; }
        .sub-section { font-size: 12pt; }
        p { text-align: justify; }
        hr { border: 1px solid black; margin-top: 10px; margin-bottom: 20px; }
        .logo-row { width: 100%; text-align: center; margin: 20px 0; }
        .logo { max-height: 120px; object-fit: contain; }
        .section-title { font-weight: bold; }
        .justified-content { text-align: justify; }
        table {
            width: 100%;
            border-collapse: collapse;
            font-family: "Times New Roman";
            font-size: 12pt;
            margin-bottom: 30px;
        }
        th, td {
            border: 1px solid black;
            padding: 4px;
            vertical-align: middle;
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
        .delete-row:hover { background: #cc0000; }
    </style>
</head>
<body>
    <h2>Enter Document Content</h2>
    <form id="TableForm" action="{{ route('curriculumPreview') }}" method="POST" onsubmit="prepareTable()">
    @csrf

    <div class="header-row">
        <div class="header-left">KG College of Arts and Science (Autonomous)</div>
        <div class="header-right">
            Batch <input type="text" name="batch">
        </div>
    </div>

    <hr>
    <div class="logo-row">
        <img src="{{ asset('images/kglogo.jpeg') }}" class="logo">
    </div>

    <p class="title">
        Curriculum<br>
        <input type="text" name="department" placeholder="Enter Department Name">
    </p>

    <!-- <button type="button" class="btn btn-success float-right mb-5" onclick="duplicateTable()">Duplicate Table</button> -->


    <div id="tablesWrapper">
        <div class="curriculum-table">
            <button type="button" class="btn btn-success button" onclick="addRow(this)">Add Row</button>
            <button type="button" class="btn btn-primary button" onclick="mergeSelectedCells()">Merge Selected</button>
            <button type="button" class="btn btn-warning button" onclick="unmergeSelectedCells()">Unmerge Selected</button>

            <table class="courseTable">
                <thead>
                    <tr style="background-color:lightgray; text-align:center;font-weight:bold;border:1px solid black">
                    <td colspan="10" style="font-size: 14pt; font-weight:bold;border:1px solid black">
                    Semester -<input type="text" name="semester" placeholder="1" required>
                    </td>
                    </tr>
                    <tr style="text-align:center;">
                        <th rowspan="3">Part</th>
                        <th rowspan="3">Course Code</th>
                        <th rowspan="3">Course Category</th>
                        <th rowspan="3">Course Name</th>
                        <th rowspan="3">Hrs./week</th>
                        <th colspan="4">Examination</th>
                        <th rowspan="3">Credits</th>
                        <th rowspan="3" class="delete" style="border: none;"></th>
                    </tr>
                    <tr style="text-align:center;">
                        <th rowspan="2">Duration in hrs.</th>
                        <th colspan="3">Max. Marks</th>
                    </tr>
                    <tr style="text-align:center;">
                        <th>CIA</th>
                        <th>ESE</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="totalRow" style="font-weight:bold;text-align: center;">
                        <td colspan="4" style="text-align: center; font-weight: bold;border: 1px solid black">Total:</td>
                        <td style="text-align: center; font-weight: bold;border: 1px solid black"><input type="text" class="totalHrs" readonly></td>
                        <td colspan="3" style="text-align: center; font-weight: bold;border: 1px solid black"></td>
                        <td style="text-align: center; font-weight: bold;border: 1px solid black"><input type="text" class="totalMarks" readonly></td>
                        <td style="text-align: center; font-weight: bold;border: 1px solid black"><input type="text" class="totalCredits" readonly></td>
                        <td class="delete" style="border: none;"></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <br>
        <br>
    </div>

    <input type="hidden" name="sem_table_html" id="semTableInput">

    <footer>
    <h4>Footer</h4>
         Department of <input type="text" name="footer_department" placeholder="Department Name for Footer">
    </footer>

    
    <button type="submit" id="submitBtn" class="btn btn-primary">Preview</button>
    </form>

    <script>
            document.addEventListener('DOMContentLoaded', async () => {
            document.querySelectorAll('.curriculum-table').forEach(block => {
                addRow(block.querySelector('button.btn-success'));
            });
        });

        async function addRow(button) {
            const table = button.closest('.curriculum-table').querySelector('.courseTable');
            const tbody = table.querySelector('tbody');
            const totalRow = tbody.querySelector('.totalRow');
            
            // Fetch course categories from server
           

            const row = document.createElement('tr');
            row.innerHTML = `
            <td style="border: 1px solid black; text-align: center;">
                <input type="checkbox" class="cell-select"/><input type="text" name="part[]">
            </td>
                <td style="border: 1px solid black; text-align: center;text-transform:uppercase;">
                    <input type="checkbox" class="cell-select"/><input type="text" name="courseCode[]">
                </td>
                <td style="border: 1px solid black; text-align: center;text-transform:capitalize;">
                    <input type="checkbox" class="cell-select"/>
                    <input type="text" name="courseCategory[]">
                   
                </td>
                <td style="border: 1px solid black; text-align: center;text-transform:capitalize;">
                    <input type="checkbox" class="cell-select"/><input type="text" name="courseName[]">
                </td>
                <td style="border: 1px solid black; text-align: center;">
                    <input type="checkbox" class="cell-select"/><input type="number" name="hrsPerWeek[]">
                </td>
                <td style="border: 1px solid black; text-align: center;">
                    <input type="checkbox" class="cell-select"/><input type="number" name="duration[]">
                </td>
                <td style="border: 1px solid black; text-align: center;">
                    <input type="checkbox" class="cell-select"/><input type="number" name="cia[]" class="cia-input">
                </td>
                <td style="border: 1px solid black; text-align: center;">
                    <input type="checkbox" class="cell-select"/><input type="number" name="ese[]" class="ese-input">
                </td>
                <td style="border: 1px solid black; text-align: center;">
                    <input type="checkbox" class="cell-select"/><input type="number" name="total[]" class="total-input" readonly>
                </td>
                <td style="border: 1px solid black; text-align: center;">
                    <input type="checkbox" class="cell-select"/><input type="number" name="credits[]">
                </td>
                <td style="border: none">
                    <button type="button" class="delete-row delete" onclick="deleteRow(this)">X</button>
                </td>
            `;
            
            tbody.insertBefore(row, totalRow);

            // Add event listener for category selection
            // const categorySelect = row.querySelector('.course-category-select');
            const ciaInput = row.querySelector('.cia-input');
const eseInput = row.querySelector('.ese-input');
const totalInput = row.querySelector('.total-input');

// Function to update total
function updateTotal() {
  const cia = parseInt(ciaInput.value) || 0;
  const ese = parseInt(eseInput.value) || 0;
  totalInput.value = cia + ese;
  calculateTotals(table); // Optional: your custom total calculation across all rows
}

// Add input event listeners to CIA and ESE
ciaInput.addEventListener('input', updateTotal);
eseInput.addEventListener('input', updateTotal);

            // Add input event listeners
            row.querySelectorAll('input[type="text"]').forEach(input => {
                input.addEventListener('input', () => calculateTotals(table));
            });
            
            row.querySelectorAll('input[type="number"]').forEach(input => {
                if (!input.classList.contains('total-input')) { // Skip readonly total field
                    input.addEventListener('input', () => calculateTotals(table));
                }
            });
        }
        
        function calculateTotals(table) {
    let totalHrs = 0, totalCredits = 0, totalMarks = 0;

    const rows = Array.from(table.querySelectorAll('tbody tr:not(.totalRow)'));

    for (const row of rows) {
        // Use optional chaining to avoid errors if a cell doesn't exist
        const hrsInput = row.querySelector('[name="hrsPerWeek[]"]');
        const creditsInput = row.querySelector('[name="credits[]"]');
        const ciaInput = row.querySelector('[name="cia[]"]');
        const eseInput = row.querySelector('[name="ese[]"]');
        const totalInput = row.querySelector('[name="total[]"]');

        const hrs = parseFloat(hrsInput?.value) || 0;
        const credits = parseFloat(creditsInput?.value) || 0;
        const cia = parseFloat(ciaInput?.value) || 0;
        const ese = parseFloat(eseInput?.value) || 0;
        const total = cia + ese;

        if (totalInput) {
            totalInput.value = total;
        }

        // Only count values from rows that contain inputs
        if (hrsInput) totalHrs += hrs;
        if (creditsInput) totalCredits += credits;
        if (ciaInput || eseInput) totalMarks += total;
    }

   

    // Update footer or total row inputs
    table.querySelector('.totalHrs')?.setAttribute('value', totalHrs);
    table.querySelector('.totalCredits')?.setAttribute('value', totalCredits);
    table.querySelector('.totalMarks')?.setAttribute('value', totalMarks);
    // validateTotalHours();
}


        

        function deleteRow(button) {
            const row = button.closest('tr');
            const table = row.closest('table');
            row.remove();
            calculateTotals(table);
        }

        function attachInputListeners(table) {
            const rows = table.querySelectorAll('tbody tr:not(.totalRow)');
            
            rows.forEach(row => {
                // Skip rows that are spanned by merged cells above them
                if (row.cells[0] && row.cells[0].hasAttribute('rowspan') && row.cells[0].rowSpan > 1) {
                    return;
                }

                // Attach listeners to all inputs in this row
                row.querySelectorAll('input[type="text"], input[type="number"]').forEach(input => {
                    // Remove any existing listeners to prevent duplicates
                    input.removeEventListener('input', calculateTotals);
                    // Add new listener
                    input.addEventListener('input', () => calculateTotals(table));
                });
            });
        }

       

        function duplicateTable() {
            const wrapper = document.getElementById('tablesWrapper');
            const original = wrapper.querySelector('.curriculum-table');
            const clone = original.cloneNode(true);

            // Reset input values
            clone.querySelectorAll('input').forEach(input => {
                if (input.type === 'text' || input.type === 'number') input.value = '';
            });

            // Remove all rows except thead and totalRow
            const tbody = clone.querySelector('table tbody');
            const rows = clone.querySelectorAll('table tbody tr');
            rows.forEach(row => {
                if (!row.classList.contains('totalRow')) row.remove();
            });

            // Add new row to the cloned table
            addRow(clone.querySelector('button.btn-success'));

            // Add Delete Table button (only for cloned tables)
            const deleteBtn = document.createElement('button');
            deleteBtn.type = 'button';
            deleteBtn.className = 'btn btn-danger mb-2 button';
            deleteBtn.textContent = 'Delete Table';
            deleteBtn.onclick = () => deleteTable(deleteBtn);

            // Add delete button at the top of the table block
            clone.insertBefore(deleteBtn, clone.firstChild);

            wrapper.appendChild(clone);
        }

        function deleteTable(button) {
            const tableBlock = button.closest('.curriculum-table');
            tableBlock.remove();
        }


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

document.getElementById('TableForm').addEventListener('submit', function (e) {
   
    prepareTable(); // only call if valid
});

function prepareTable() {
    document.querySelectorAll('select').forEach(select => {
        select.querySelectorAll('option').forEach(option => {
            if (option.value === select.value) {
                option.setAttribute('selected', 'selected');
            } else {
                option.removeAttribute('selected');
            }
        });
    });
    const table = document.querySelector("#tablesWrapper").cloneNode(true);

   

    const rows = table.querySelectorAll("tr");
    rows.forEach(row => {
        if (row.style.backgroundColor === 'lightgray' && 
            row.querySelector('input[name="semester"]')) {
            // Keep the semester text and add the value
            const input = row.querySelector('input[name="semester"]');
            row.innerHTML = `
                <td colspan="10" style="font-size: 14pt; background-color: lightgray; text-align: center;">
                    Semester - ${input.value || input.placeholder}
                </td>
            `;
            return;
        }

        const cells = row.querySelectorAll("td");

        cells.forEach(td => {
            const textInput = td.querySelector('input[type="text"]');
            if (textInput) {
                td.innerHTML = textInput.value || '';
            }

            const numInput = td.querySelector('input[type="number"]');
            if (numInput) {
                td.innerHTML = numInput.value || '';
            }

            td.querySelectorAll('select').forEach(select => {
            const selectedText = select.options[select.selectedIndex].text;
            const span = document.createElement('span');
            span.textContent = selectedText;
            select.parentNode.replaceChild(span, select);
        });

            td.querySelectorAll('input[type="checkbox"], .cell-select, .delete-row, .button, button').forEach(el => el.remove());
        });

        const lastCell = row.lastElementChild;
        if (lastCell && lastCell.querySelector(".delete-row")) {
            lastCell.style.border = "none";
            row.removeChild(lastCell);
        }
    });

    
   

    document.getElementById("semTableInput").value = table.outerHTML;

    return table;
}
function validateTotalHours() {
    const totalHrsInput = document.querySelector('.totalHrs');
    const total = parseFloat(totalHrsInput?.value) || 0;

    if (total !== 30) {
        alert("Please check Hrs/Week. It should be exactly 30");
        return false;
    }

    return true;
}



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
    
    calculateTotals(table);
   
}




    </script>
</body>
</html>
