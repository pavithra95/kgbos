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
    <form id="TableForm" action="{{ route('labPreview') }}" method="POST">
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

    
<!-- Course Table -->
<table style="width: 100%; border: 1px solid black; border-collapse: collapse; text-align: center; font-family: 'Times New Roman', serif; font-size: 12pt;">
    <thead>
        <tr style="font-weight: bold;">
            <th style="border: 1px solid black; padding: 8px;">Course Code</th>
            <th style="border: 1px solid black; padding: 8px;">Course Name</th>
            <th style="border: 1px solid black; padding: 8px;">Category</th>
            <th style="border: 1px solid black; padding: 8px;">Hours / Week</th>
            <th style="border: 1px solid black; padding: 8px;">Credits</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td style="border: 1px solid black; padding: 8px;text-transform:uppercase;">
                <input type="text" name="course_code">
            </td>
            <td style="border: 1px solid black; padding: 8px;text-transform:capitalize;">
            <input type="text" name="course_name">
            </td>
            <td style="border: 1px solid black; padding: 8px;">
            <input type="text" name="category">
            </td>
            <td style="border: 1px solid black; padding: 8px;">
            <input type="text" name="hrs">
            </td>
            <td style="border: 1px solid black; padding: 8px;">
            <input type="text" name="credits">
            </td>
        </tr>
    </tbody>
</table>


<table id="unitTable" style="width: 100%; border-collapse: collapse; text-align: center;">
<button onclick="addRow()" type="button" class="btn btn-success" style="margin-top: 10px; font-family: 'Times New Roman', serif; font-size: 12pt;">Add Row</button>

  <thead>
    <tr>
      <th style="border: 1px solid black; font-weight: bold;">SNO</th>
      <th style="border: 1px solid black; font-weight: bold;">List of Programs</th>
      <th style="border: 1px solid black; font-weight: bold;">No. of Hours</th>
      <th style="border: none;"></th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td style="border: 1px solid black; vertical-align: top;" contentEditable=true></td>
      <td style="border: 1px solid black; text-align: justify; padding: 5px;" contentEditable=true>
        
      </td>
      <td style="border: 1px solid black; vertical-align: top;" class="hours-cell" contentEditable=true></td>
      <td style="border: none">
        <button onclick="deleteRow(this)">X</button>
      </td>
    </tr>
     <!-- Total Row -->
     <tr class="total-row" style="font-weight: bold;">
                <td colspan="2" style="border: 1px solid black; text-align: right;">Total Hours:</td>
                <td style="border: 1px solid black;" id="totalHours">0</td>
                <td style="border: none;"></td>
            </tr>
  </tbody>
</table>

<br>

<h3>Reference</h3>

<div id="table-container">
    <table id="textBooksTable" style="width: 100%; border-collapse: collapse; margin-bottom: 20px;">
       
    
    <thead>
        <tr>
            <th colspan="2" style="text-align: left;">
            <select name="ref" id="select">
                <option value="Text Books">Text Books</option>
                <option value="Reference Books">Reference Books</option>
                <option value="Web Resources (Swayam/NPTEL)">Web Resources (Swayam/NPTEL)</option>
            </select>
            </th>
            <th style="border: none;"></th>
        </tr>
            <tr>
                <th style="border: 1px solid black; padding: 8px; text-align: justify;">SNo</th>
                <th style="border: 1px solid black; padding: 8px; text-align: justify;">Details</th>
                <th style="border: none;"></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td style="border: 1px solid black; padding: 8px; text-align: justify;" contentEditable="true"></td>
                <td style="border: 1px solid black; padding: 8px; text-align: justify;"contentEditable="true">
                   
                </td>
                <td style="padding-left: -80px;border:none">
                    <button onclick="deleteThisRow(this)" type="button" class="btn btn-danger" style="padding: 4px 8px; font-size: 12px;">X</button>
                </td>
            </tr>
        </tbody>
        
    </table>
    <button onclick="addRowText(this)" type="button" class="btn btn-success" style="padding: 8px 12px; font-size: 14px;">Add Row</button>
    <!-- <button onclick="deleteRowText(this)" type="button" style="padding: 6px 10px; font-size: 14px;">Delete Row</button> -->
    <button onclick="deleteTable(this)" class="btn btn-secondary" type="button" style="padding: 6px 10px; font-size: 14px;">Delete Table</button>
  
    
    <button onclick="duplicateTable()" class="btn btn-warning" type="button" style="padding: 8px 12px; font-size: 14px;">Duplicate Table</button>
</div>




    
    <footer>
    <h4>Footer</h4>
         Department of <input type="text" name="footer_department" placeholder="Department Name for Footer">
    </footer>

    <input type="hidden" name="tableData" id="tableData">
    <input type="hidden" name="tableDataRef" id="tableDataRef">
    <input type="hidden" name="refHeadingData" id="refHeadingData">
    
    <button type="submit" class="btn btn-primary">Preview</button>
    </form>

<script>
    
function addRowText(button) {
  var table = button.parentElement.querySelector('table');
  var tbody = table.querySelector('tbody');
  var newRow = tbody.insertRow();

  var cell1 = newRow.insertCell(0);
  var cell2 = newRow.insertCell(1);
  var cell3 = newRow.insertCell(2);

  cell1.setAttribute('style', 'border: 1px solid black; padding: 8px; text-align: justify;');
  cell1.setAttribute('contentEditable', 'true');
  cell2.setAttribute('style', 'border: 1px solid black; padding: 8px; text-align: justify;');
  cell2.setAttribute('contentEditable', 'true');
  cell3.setAttribute('style', 'border: none; padding-left: -80px;');

  var deleteButton = document.createElement('button');
  deleteButton.innerText = "X";
  deleteButton.setAttribute('onclick', 'deleteThisRow(this)');
  deleteButton.setAttribute('class', 'btn btn-danger');
  deleteButton.setAttribute('style', 'padding: 4px 8px; font-size: 12px;');

  cell3.appendChild(deleteButton);
}
// Delete specific row
function deleteThisRow(button) {
  var row = button.parentElement.parentElement;
  row.remove();
}

function deleteTable(button) {
  var tableDiv = button.parentElement;
  tableDiv.remove();
}


function duplicateTable() {
  var container = document.getElementById('table-container');
  var newDiv = document.createElement('div');
  newDiv.setAttribute('style', 'margin-bottom: 20px;');

  var originalTable = container.querySelector('table');
  
  var newTable = document.createElement('table');
  newTable.setAttribute('style', 'width: 100%; border-collapse: collapse; margin-bottom: 10px;');

  var theadClone = originalTable.querySelector('thead').cloneNode(true);
  newTable.appendChild(theadClone);

  var tbody = document.createElement('tbody');
  var newRow = tbody.insertRow();

  var cell1 = newRow.insertCell(0);
  var cell2 = newRow.insertCell(1);
  var cell3 = newRow.insertCell(2);

  cell1.setAttribute('style', 'border: 1px solid black; padding: 8px; text-align: justify;');
  cell1.setAttribute('contentEditable', 'true');
  cell2.setAttribute('style', 'border: 1px solid black; padding: 8px; text-align: justify;');
  cell2.setAttribute('contentEditable', 'true');
  cell3.setAttribute('style', 'border: none; padding-left: -80px;');

  var deleteButton = document.createElement('button');
  deleteButton.innerText = "X";
  deleteButton.setAttribute('onclick', 'deleteThisRow(this)');
  deleteButton.setAttribute('class', 'btn btn-danger');
  deleteButton.setAttribute('style', 'font-size: 12px;border:none');

  cell3.appendChild(deleteButton);

  newTable.appendChild(tbody);

  newDiv.appendChild(newTable);

  var newAddBtn = document.createElement('button');
  newAddBtn.innerText = "Add Row";
  newAddBtn.setAttribute('onclick', 'addRowText(this)');
  newAddBtn.setAttribute('type', 'button');
  newAddBtn.setAttribute('class', 'btn btn-success');
  newAddBtn.setAttribute('style', 'padding: 6px 10px; font-size: 14px; margin-right: 5px;');
  newDiv.appendChild(newAddBtn);

  var newDelTableBtn = document.createElement('button');
  newDelTableBtn.innerText = "Delete Table";
  newDelTableBtn.setAttribute('onclick', 'deleteTable(this)');
  newDelTableBtn.setAttribute('type', 'button');
  newDelTableBtn.setAttribute('class', 'btn btn-secondary');
  newDelTableBtn.setAttribute('style', 'padding: 6px 10px; font-size: 14px;');
  newDiv.appendChild(newDelTableBtn);

  container.appendChild(newDiv);
}
   

function addRow() {
    const tbody = document.querySelector('#unitTable tbody');
    const totalRow = document.querySelector('.total-row');
    const newRow = document.createElement('tr');
    newRow.innerHTML = `
        <td style="border: 1px solid black; vertical-align: top;" contenteditable="true"></td>
        <td style="border: 1px solid black; text-align: justify; padding: 5px;" contenteditable="true"></td>
        <td style="border: 1px solid black; vertical-align: top;" class="hours-cell" contenteditable="true"></td>
        <td style="border: none">
            <button type="button" onclick="deleteRow(this)">X</button>
        </td>
    `;
    tbody.insertBefore(newRow, totalRow);
    
    // Add event listener to new hours cell
    newRow.querySelector('.hours-cell').addEventListener('input', calculateTotal);
}
function deleteRow(button) {
    const row = button.closest('tr');
    row.remove();
    calculateTotal();
}

function calculateTotal() {
    let total = 0;
    const hoursCells = document.querySelectorAll('.hours-cell:not(.total-row .hours-cell)');
    
    hoursCells.forEach(cell => {
        const value = parseFloat(cell.textContent) || 0;
        total += value;
    });
    
    document.getElementById('totalHours').textContent = total;
    
    // Also update the hidden input for form submission
    updateTableData();
}

function updateTableData() {
    const table = document.getElementById('unitTable');
    const rows = table.querySelectorAll('tbody tr:not(.total-row)');
    const tableData = [];
    
    rows.forEach(row => {
        const cells = row.querySelectorAll('td');
        if (cells.length >= 3) {
            tableData.push({
                unit: cells[0].innerText.trim(),
                content: cells[1].innerText.trim(),
                hours: cells[2].innerText.trim()
            });
        }
    });
    
    // Add total to the data
    tableData.push({
        isTotal: true,
        totalHours: document.getElementById('totalHours').textContent
    });
    
    document.getElementById('tableData').value = JSON.stringify(tableData);
}

// Initialize event listeners for existing hours cells
document.querySelectorAll('.hours-cell').forEach(cell => {
    cell.addEventListener('input', calculateTotal);
});

// Initial calculation
calculateTotal();

document.getElementById('TableForm').addEventListener('submit', function(e) {
    // e.preventDefault(); // Uncomment if you want to prevent real submission for testing

    document.querySelectorAll('select').forEach(select => {
        select.querySelectorAll('option').forEach(option => {
            if (option.value === select.value) {
                option.setAttribute('selected', 'selected');
            } else {
                option.removeAttribute('selected');
            }
        });
    });

    // Clone the tables
    const tableClone = document.getElementById('unitTable').cloneNode(true);
    const tableRef = document.getElementById('table-container').cloneNode(true);

    const cleanTables = [tableClone, tableRef];

    cleanTables.forEach(table => {
        // Now correctly replace selects
        table.querySelectorAll('select').forEach(select => {
            const selectedText = select.options[select.selectedIndex].text;
            const span = document.createElement('span');
            span.textContent = selectedText;
            select.parentNode.replaceChild(span, select);
        });

        // Now correctly remove buttons
        table.querySelectorAll('button').forEach(btn => btn.remove());
    });

    // Set the hidden input values correctly
    document.getElementById('tableData').value = tableClone.outerHTML;
    document.getElementById('tableDataRef').value = tableRef.innerHTML;

    // this.submit(); // Uncomment this if you want to auto-submit after processing
});

</script>

</body>
</html>