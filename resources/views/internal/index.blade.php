<!DOCTYPE html>
<html>
<head>
    <title>Document Input</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: "Times New Roman", serif;
            /* font-size: 12pt; */
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
    <form id="TableForm" action="{{ route('internalPreview') }}" method="POST">
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

    <h3 style="text-align: center; margin-bottom: 20px;">
    Components for Internal Assessment and Distribution of Marks for CIA and ESE (Theory)
</h3>

<table id="theory" 
    style="width: 100%; border: 1px solid black; border-collapse: collapse; text-align: center; 
           font-family: 'Times New Roman', serif; font-size: 8pt; table-layout: fixed;">
    <thead>
        <tr style="font-size: 8pt;">
            <th rowspan="3" style="border: 1px solid black;">Max Marks</th>
            <th colspan="2" style="border: 1px solid black; padding: 4px;">Marks for</th>
            <th colspan="7" style="border: 1px solid black; padding: 4px;">Components for CIA</th>
        </tr>
        <tr style="font-size: 8pt;">
            <th rowspan="2" style="border: 1px solid black;">CIA</th>
            <th rowspan="2" style="border: 1px solid black;">ESE</th>
            <th colspan="2" style="border: 1px solid black; padding: 4px;">CIA</th>
            <th colspan="2" style="border: 1px solid black; padding: 4px;">Model</th>
            <th rowspan="2" style="border: 1px solid black; font-size: 8pt;">Attendance</th>
            <th rowspan="2" style="border: 1px solid black; font-size: 8pt;">Active Engagement</th>
            <th rowspan="2" style="border: 1px solid black; padding: 4px;">Total</th>
        </tr>
        <tr style="font-size: 8pt;">
            <!-- CIA I -->
            <th style="border: 1px solid black; padding: 4px;">Actual</th>
            <th style="border: 1px solid black; padding: 4px;">Weightage</th>
           
            <!-- Model -->
            <th style="border: 1px solid black; padding: 4px;">Actual</th>
            <th style="border: 1px solid black; padding: 4px;">Weightage</th>
            <!-- Attendance, Engagement, Total -> no subcolumns -->
        </tr>
    </thead>
    <tbody>
        <tr>
            <td style="border: 1px solid black; padding: 4px;" contenteditable="true"></td>
            <td style="border: 1px solid black; padding: 4px;" contenteditable="true"></td>
            <td style="border: 1px solid black; padding: 4px;" contenteditable="true"></td>
            <td style="border: 1px solid black; padding: 4px;" contenteditable="true"></td>
            <td style="border: 1px solid black; padding: 4px;font-weight:bold;" contenteditable="true"></td>
            <td style="border: 1px solid black; padding: 4px;" contenteditable="true"></td>
            <td style="border: 1px solid black; padding: 4px;font-weight:bold;" contenteditable="true"></td>
            <td style="border: 1px solid black; padding: 4px;font-weight:bold;" contenteditable="true"></td>
            <td style="border: 1px solid black; padding: 4px;" contenteditable="true"></td>
            <td style="border: 1px solid black; padding: 4px;font-weight:bold;" contenteditable="true"></td>
          </tr>
    </tbody>
</table>
<br>
<h3 style="text-align: center; margin-bottom: 20px;">
Question Paper Pattern
</h3>
<table id="QuestionTable" style="width: 100%; border: 1px solid black; border-collapse: collapse; font-family: 'Times New Roman', serif; font-size: 8pt; text-align: center; table-layout: fixed;">
    <thead>
        <tr>
            <th rowspan="2" style="border: 1px solid black; padding: 6px;">Component</th>
            <th rowspan="2" style="border: 1px solid black; padding: 6px;">Duration<br>in Hrs.</th>
            <th colspan="3" style="border: 1px solid black; padding: 6px;">Section A</th>
            <th colspan="3" style="border: 1px solid black; padding: 6px;">Section B</th>
            <th colspan="3" style="border: 1px solid black; padding: 6px;">Section C</th>
            <th rowspan="2" style="border: 1px solid black; padding: 6px;">Total</th>
        </tr>
        <tr>
            <th style="border: 1px solid black; padding: 4px;">Type of<br>question</th>
            <th style="border: 1px solid black; padding: 4px;">No. of<br>questions</th>
            <th style="border: 1px solid black; padding: 4px;">Marks</th>
            <th style="border: 1px solid black; padding: 4px;">Type of<br>question</th>
            <th style="border: 1px solid black; padding: 4px;">No. of<br>questions</th>
            <th style="border: 1px solid black; padding: 4px;">Marks</th>
            <th style="border: 1px solid black; padding: 4px;">Type of<br>question</th>
            <th style="border: 1px solid black; padding: 4px;">No. of<br>questions</th>
            <th style="border: 1px solid black; padding: 4px;">Marks</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td style="border: 1px solid black; padding: 4px;" contenteditable="true"></td>
            <td style="border: 1px solid black; padding: 4px;" contenteditable="true"></td>
            <td style="border: 1px solid black; padding: 4px;" contenteditable="true"></td>
            <td style="border: 1px solid black; padding: 4px;" contenteditable="true"></td>
            <td style="border: 1px solid black; padding: 4px;" contenteditable="true"></td>
            <td style="border: 1px solid black; padding: 4px;" contenteditable="true"></td>
            <td style="border: 1px solid black; padding: 4px;" contenteditable="true"></td>
            <td style="border: 1px solid black; padding: 4px;" contenteditable="true"></td>
            <td style="border: 1px solid black; padding: 4px;" contenteditable="true"></td>
            <td style="border: 1px solid black; padding: 4px;" contenteditable="true"></td>
            <td style="border: 1px solid black; padding: 4px;" contenteditable="true"></td>
            <td style="border: 1px solid black; padding: 4px;" contenteditable="true"></td>
        </tr>
        <tr>
            <td style="border: 1px solid black; padding: 4px;" contenteditable="true"></td>
            <td style="border: 1px solid black; padding: 4px;" contenteditable="true"></td>
            <td style="border: 1px solid black; padding: 4px;" contenteditable="true"></td>
            <td style="border: 1px solid black; padding: 4px;" contenteditable="true"></td>
            <td style="border: 1px solid black; padding: 4px;" contenteditable="true"></td>
            <td style="border: 1px solid black; padding: 4px;" contenteditable="true"></td>
            <td style="border: 1px solid black; padding: 4px;" contenteditable="true"></td>
            <td style="border: 1px solid black; padding: 4px;" contenteditable="true"></td>
            <td style="border: 1px solid black; padding: 4px;" contenteditable="true"></td>
            <td style="border: 1px solid black; padding: 4px;" contenteditable="true"></td>
            <td style="border: 1px solid black; padding: 4px;" contenteditable="true"></td>
            <td style="border: 1px solid black; padding: 4px;" contenteditable="true"></td>
        </tr>
    </tbody>
</table>

<br>
<h3 style="text-align: center; margin-bottom: 20px;">
Components for Internal Assessment and Distribution of Marks for CIA and ESE (Lab)
</h3>
<table id="InternalTable" style="width: 100%; border: 1px solid black; border-collapse: collapse; font-family: 'Times New Roman', serif; font-size: 8pt; text-align: center; table-layout: fixed;">
    <thead>
        <tr>
            <th rowspan="3" style="border: 1px solid black; padding: 6px;">Max. Marks</th>
            <th colspan="2" rowspan="2" style="border: 1px solid black; padding: 6px;">Marks for</th>
            <th colspan="7" style="border: 1px solid black; padding: 6px;">Components for CIA</th>
        </tr>
        <tr>
            <th colspan="2" style="border: 1px solid black; padding: 4px;">Test</th>
            <th colspan="2" style="border: 1px solid black; padding: 4px;">Model</th>
            <th colspan="1" style="border: 1px solid black; padding: 4px;">Experiments/ Programs</th>
            <th rowspan="2" style="border: 1px solid black; padding: 4px;">Observation</th>
            <th rowspan="2" style="border: 1px solid black; padding: 4px;">Total</th>
        </tr>
        <tr>
            <th style="border: 1px solid black; padding: 4px;">CIA</th>
            <th style="border: 1px solid black; padding: 4px;">ESE</th>
            <th style="border: 1px solid black; padding: 4px;">Actual</th>
            <th style="border: 1px solid black; padding: 4px;">Weightage</th>
            <th style="border: 1px solid black; padding: 4px;">Actual</th>
            <th style="border: 1px solid black; padding: 4px;">Weightage</th>
            <th style="border: 1px solid black; padding: 4px;">Marks</th>
           
        </tr>
    </thead>
    <tbody>
        <tr>
            <td style="border: 1px solid black; padding: 4px;" contenteditable="true"></td>
            <td style="border: 1px solid black; padding: 4px;" contenteditable="true"></td>
            <td style="border: 1px solid black; padding: 4px;" contenteditable="true"></td>
            <td style="border: 1px solid black; padding: 4px;" contenteditable="true"></td>
            <td style="border: 1px solid black; padding: 4px; font-weight: bold;" contenteditable="true"></td>
            <td style="border: 1px solid black; padding: 4px;" contenteditable="true"></td>
            <td style="border: 1px solid black; padding: 4px; font-weight: bold;" contenteditable="true"></td>
            <td style="border: 1px solid black; padding: 4px;" contenteditable="true"></td>
            <td style="border: 1px solid black; padding: 4px; font-weight: bold;" contenteditable="true"></td>
            <td style="border: 1px solid black; padding: 4px;font-weight: bold;" contenteditable="true"></td>
            <!-- <td style="border: 1px solid black; padding: 4px;font-weight: bold;" contenteditable="true"></td> -->
        </tr>
    </tbody>
</table>
<br>
<h3 style="text-align: center; margin-bottom: 20px;">
Examination Pattern
</h3>
<table id="ExamTable" style="width: 100%; border: 1px solid black; border-collapse: collapse; font-family: 'Times New Roman', serif; font-size: 8pt; text-align: center; table-layout: fixed;">
    <thead>
        <tr>
            <th rowspan="2" style="border: 1px solid black; padding: 6px;">Component</th>
            <th rowspan="2" style="border: 1px solid black; padding: 6px;">Duration in Hrs.</th>
            <th colspan="3" style="border: 1px solid black; padding: 6px;">Marks</th>
            <th rowspan="2" style="border: 1px solid black; padding: 6px;">Total Marks</th>
        </tr>
        <tr>
            <th style="border: 1px solid black; padding: 4px;">Practical</th>
            <th style="border: 1px solid black; padding: 4px;">Record</th>
            <th style="border: 1px solid black; padding: 4px;">Weightage</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td style="border: 1px solid black; padding: 4px;font-weight:bold;" contenteditable="true">Test</td>
            <td style="border: 1px solid black; padding: 4px;" contenteditable="true"></td>
            <td style="border: 1px solid black; padding: 4px;" contenteditable="true"></td>
            <td style="border: 1px solid black; padding: 4px;" contenteditable="true"></td>
            <td style="border: 1px solid black; padding: 4px;font-weight:bold;" contenteditable="true"></td>
            <td style="border: 1px solid black; padding: 4px;" contenteditable="true"></td>
        </tr>
        <tr>
            <td style="border: 1px solid black; padding: 4px;font-weight:bold;" contenteditable="true">Model</td>
          
            <td style="border: 1px solid black; padding: 4px;" contenteditable="true"></td>
            <td style="border: 1px solid black; padding: 4px;" contenteditable="true"></td>
            <td style="border: 1px solid black; padding: 4px;" contenteditable="true"></td>
            <td style="border: 1px solid black; padding: 4px;font-weight:bold;" contenteditable="true"></td>
            <td style="border: 1px solid black; padding: 4px;" contenteditable="true"></td>
        </tr>
        <tr>
            <td style="border: 1px solid black; padding: 4px;font-weight:bold;" contenteditable="true">Experiments</td>
           
            <td style="border: 1px solid black; padding: 4px;" contenteditable="true"></td>
            <td style="border: 1px solid black; padding: 4px;" contenteditable="true"></td>
            <td style="border: 1px solid black; padding: 4px;" contenteditable="true"></td>
            <td style="border: 1px solid black; padding: 4px;font-weight:bold;" contenteditable="true"></td>
            <td style="border: 1px solid black; padding: 4px;" contenteditable="true"></td>
        </tr>
        <tr>
            <td style="border: 1px solid black; padding: 4px;font-weight:bold;" contenteditable="true">Observation</td>
           
            <td style="border: 1px solid black; padding: 4px;" contenteditable="true"></td>
            <td style="border: 1px solid black; padding: 4px;" contenteditable="true"></td>
            <td style="border: 1px solid black; padding: 4px;" contenteditable="true"></td>
            <td style="border: 1px solid black; padding: 4px;font-weight:bold;" contenteditable="true"></td>
            <td style="border: 1px solid black; padding: 4px;" contenteditable="true"></td>
        </tr>
         <tr>
            <td colspan="4" style="border: 1px solid black; padding: 4px;font-weight:bold;text-align:right;" contenteditable="true">Total Marks - CIA</td>        
            <td style="border: 1px solid black; padding: 4px;font-weight:bold;" contenteditable="true"></td>
            <td style="border: 1px solid black; padding: 4px;font-weight:bold;" contenteditable="true"></td>
        </tr>
         <tr>
            <td style="border: 1px solid black; padding: 4px;font-weight:bold;" contenteditable="true">ESE</td>
           
            <td style="border: 1px solid black; padding: 4px;" contenteditable="true"></td>
            <td style="border: 1px solid black; padding: 4px;" contenteditable="true"></td>
            <td style="border: 1px solid black; padding: 4px;" contenteditable="true"></td>
            <td style="border: 1px solid black; padding: 4px;font-weight:bold;" contenteditable="true"></td>
            <td style="border: 1px solid black; padding: 4px;font-weight:bold;" contenteditable="true"></td>
        </tr>
    </tbody>
</table>
<br>

 <h3 style="text-align: center; margin-bottom: 20px;">
    Components for Internal Assessment and Distribution of Marks for CIA (Foundation Course -Theory)
</h3>

<table id="FoundationTable" 
    style="width: 100%; border: 1px solid black; border-collapse: collapse; text-align: center; 
           font-family: 'Times New Roman', serif; font-size: 8pt; table-layout: fixed;">
    <thead>
        <tr style="font-size: 8pt;">
            <th rowspan="3" style="border: 1px solid black;">Max Marks</th>
            <th colspan="2" style="border: 1px solid black; padding: 4px;">Marks for</th>
            <th colspan="5" style="border: 1px solid black; padding: 4px;">Components for CIA</th>
        </tr>
        <tr style="font-size: 8pt;">
            <th rowspan="2" style="border: 1px solid black;">CIA</th>
            <th rowspan="2" style="border: 1px solid black;">ESE</th>
            <th colspan="2" style="border: 1px solid black; padding: 4px;">CIA</th>
            <th colspan="2" style="border: 1px solid black; padding: 4px;">Model</th>
            <th rowspan="2" style="border: 1px solid black; padding: 4px;">Total</th>
        </tr>
        <tr style="font-size: 8pt;">
            <!-- CIA I -->
            <th style="border: 1px solid black; padding: 4px;">Actual</th>
            <th style="border: 1px solid black; padding: 4px;">Weightage</th>
           
            <!-- Model -->
            <th style="border: 1px solid black; padding: 4px;">Actual</th>
            <th style="border: 1px solid black; padding: 4px;">Weightage</th>
            <!-- Attendance, Engagement, Total -> no subcolumns -->
        </tr>
    </thead>
    <tbody>
        <tr>
            <td style="border: 1px solid black; padding: 4px;" contenteditable="true"></td>
            <td style="border: 1px solid black; padding: 4px;" contenteditable="true"></td>
            <td style="border: 1px solid black; padding: 4px;font-weight:bold;" contenteditable="true"></td>
            <td style="border: 1px solid black; padding: 4px;" contenteditable="true"></td>
            <td style="border: 1px solid black; padding: 4px;font-weight:bold;" contenteditable="true"></td>
            <td style="border: 1px solid black; padding: 4px;font-weight:bold;" contenteditable="true"></td>
            <td style="border: 1px solid black; padding: 4px;" contenteditable="true"></td>
            <td style="border: 1px solid black; padding: 4px;font-weight:bold;" contenteditable="true"></td>
          </tr>
    </tbody>
</table>
<br>

<h3 style="text-align: center; margin-bottom: 20px;">
Question Paper Pattern
</h3>
<table id="QueTable" style="width: 100%; border: 1px solid black; border-collapse: collapse; font-family: 'Times New Roman', serif; font-size: 8pt; text-align: center; table-layout: fixed;">
    <thead>
        <tr>
            <th  style="border: 1px solid black; padding: 6px;">Duration in Hours</th>
            <th  style="border: 1px solid black; padding: 6px;">Mode of Exam</th>
            <th  style="border: 1px solid black; padding: 6px;">Type of Questions</th>
            <th  style="border: 1px solid black; padding: 6px;">No. of Questions</th>
            <th  style="border: 1px solid black; padding: 6px;">Marks</th>
        </tr>
    </thead>
     <tbody>
        <tr>
            <td style="border: 1px solid black; padding: 4px;" contenteditable="true"></td>
            <td style="border: 1px solid black; padding: 4px;" contenteditable="true"></td>
            <td style="border: 1px solid black; padding: 4px;font-weight:bold;" contenteditable="true"></td>
            <td style="border: 1px solid black; padding: 4px;" contenteditable="true"></td>
            <td style="border: 1px solid black; padding: 4px;font-weight:bold;" contenteditable="true"></td>
        </tr>
    </tbody>
</table>

<br>
<h3 style="text-align: center; margin-bottom: 20px;">
Components for and Distribution of Marks for ESE (Theory) Ability Enhancement Compulsory Courses (AECC)
& Question Paper Pattern
</h3>
<table id="AeccTable" style="width: 100%; border: 1px solid black; border-collapse: collapse; font-family: 'Times New Roman', serif; font-size: 8pt; text-align: center; table-layout: fixed;">
    <thead>
        <tr>
            <th  style="border: 1px solid black; padding: 6px;">Duration in Hours</th>
            <th  style="border: 1px solid black; padding: 6px;">Mode of Exam</th>
            <th  style="border: 1px solid black; padding: 6px;">Type of Questions</th>
            <th  style="border: 1px solid black; padding: 6px;">No. of Questions</th>
            <th  style="border: 1px solid black; padding: 6px;">Marks</th>
        </tr>
    </thead>
     <tbody>
        <tr>
            <td style="border: 1px solid black; padding: 4px;" contenteditable="true"></td>
            <td style="border: 1px solid black; padding: 4px;" contenteditable="true"></td>
            <td style="border: 1px solid black; padding: 4px;font-weight:bold;" contenteditable="true"></td>
            <td style="border: 1px solid black; padding: 4px;" contenteditable="true"></td>
            <td style="border: 1px solid black; padding: 4px;font-weight:bold;" contenteditable="true"></td>
        </tr>
    </tbody>
</table>

<br>
    <footer>
    <h4>Footer</h4>
         Department of <input type="text" name="footer_department" placeholder="Department Name for Footer">
    </footer>

    <input type="hidden" name="QuestionTable" id="question">
    <input type="hidden" name="theoryTable" id="theoryTable">
    <input type="hidden" name="internal_table" id="internal_table">
    <input type="hidden" name="exam_table" id="exam_table">
    <input type="hidden" name="foundation_table" id="foundation_table">
    <input type="hidden" name="que_table" id="que_table">
    <input type="hidden" name="aecc_table" id="aecc_table">
    <button type="submit" class="btn btn-primary">Preview</button>
    </form>



<script>
    
document.getElementById('TableForm').addEventListener('submit', function(e) {


// Clone the table to remove buttons
const tableClone = document.getElementById('theory').cloneNode(true);
const tableQue = document.getElementById('QuestionTable').cloneNode(true);
const internal = document.getElementById('InternalTable').cloneNode(true);
const exam = document.getElementById('ExamTable').cloneNode(true);
const foundation = document.getElementById('FoundationTable').cloneNode(true);
const que = document.getElementById('QueTable').cloneNode(true);
const aecc = document.getElementById('AeccTable').cloneNode(true);


// const cleanTables = [tableClone, tableRef];

tableClone.querySelectorAll('button').forEach(btn => btn.remove());



// Set the hidden input value
document.getElementById('theoryTable').value = tableClone.outerHTML;
document.getElementById('question').value = tableQue.outerHTML;
document.getElementById('internal_table').value = internal.outerHTML;
document.getElementById('exam_table').value = exam.outerHTML;
document.getElementById('foundation_table').value = foundation.outerHTML;
document.getElementById('que_table').value = que.outerHTML;
document.getElementById('aecc_table').value = aecc.outerHTML;


});
</script>

</body>
</html>