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
    <form id="TableForm" action="{{ route('theoryPreview') }}" method="POST">
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

    <!-- Semester Title -->
<table style="width: 100%; border-collapse: collapse; margin-bottom: 20px;border:none">
    <tr style="border:none">
        <td colspan="10" style="font-family: 'Times New Roman', serif; font-size: 14pt; text-align: center; font-weight: bold; line-height: 1.5;border:none">
            Semester – <input type="text" name="sem_count" placeholder="1">
        </td>
    </tr>
</table>

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

<!-- Course Objectives -->
<p style="font-family: 'Times New Roman', serif; font-size: 12pt; font-weight: bold; color: #0072BC; margin-top: 20px; margin-bottom: 5px;">
    Course Objectives
</p>
<p style="font-family: 'Times New Roman', serif; font-size: 12pt; margin: 0; line-height: 1;">
    The course intends to cover:
</p>
<textarea id="courseObjectivesInput" name="course_objectives"  placeholder="Enter Course Objectives, one per line..." rows="5" style="width: 100%; font-family: 'Times New Roman', serif; font-size: 12pt; margin-top: 10px;"></textarea>

<!-- Preview the list -->
<div id="courseObjectivesList" style="margin-top: 10px;"></div>

<!-- Course Learning Outcomes -->
<p style="font-family: 'Times New Roman', serif; font-size: 12pt; font-weight: bold; color: #0072BC; margin-top: 20px; margin-bottom: 5px;">
    Course Learning Outcomes
</p>
<p style="font-family: 'Times New Roman', serif; font-size: 12pt; margin: 0; line-height: 1;">
    On the successful completion of the course, students will be able to:
</p>

<!-- CLO Table -->
<table style="width: 100%; border: 1px solid black; border-collapse: collapse; font-family: 'Times New Roman', serif; font-size: 12pt; margin-top: 10px;">
    <thead>
        <tr style="font-weight: bold; text-align: center;">
            <th style="border: 1px solid black; padding: 8px;">CLO</th>
            <th style="border: 1px solid black; padding: 8px;">CLO Statements</th>
            <th style="border: 1px solid black; padding: 8px;">Knowledge Level</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td style="border: 1px solid black; text-align: center; padding: 8px;">CLO1</td>
            <td style="border: 1px solid black; text-align: justify; padding: 8px;">
                <input type="text" name="clo1" class="form-control">        
        </td>
            <td style="border: 1px solid black; text-align: center; padding: 8px;">
                <!-- <input type="text" name="k1"> -->
                <select name="k1" id="" class="form-control">
                    <option value=""></option>
                    <option value="K1">K1</option>
                    <option value="K2">K2</option>
                    <option value="K3">K3</option>
                    <option value="K4">K4</option>
                    <option value="K5">K5</option>
                    <option value="K6">K6</option>
                </select>
            </td>
        </tr>
        <tr>
            <td style="border: 1px solid black; text-align: center; padding: 8px;">CLO2</td>
            <td style="border: 1px solid black; text-align: justify; padding: 8px;">
            <input type="text" name="clo2" class="form-control">   
            </td>
            <td style="border: 1px solid black; text-align: center; padding: 8px;">
            <select name="k2" id="" class="form-control">
                    <option value=""></option>
                    <option value="K1">K1</option>
                    <option value="K2">K2</option>
                    <option value="K3">K3</option>
                    <option value="K4">K4</option>
                    <option value="K5">K5</option>
                    <option value="K6">K6</option>
                </select>  
            </td>
        </tr>
        <tr>
            <td style="border: 1px solid black; text-align: center; padding: 8px;">CLO3</td>
            <td style="border: 1px solid black; text-align: justify; padding: 8px;">
            <input type="text" name="clo3" class="form-control">           
        </td>
            <td style="border: 1px solid black; text-align: center; padding: 8px;">
            <select name="k3" id="" class="form-control">
                    <option value=""></option>
                    <option value="K1">K1</option>
                    <option value="K2">K2</option>
                    <option value="K3">K3</option>
                    <option value="K4">K4</option>
                    <option value="K5">K5</option>
                    <option value="K6">K6</option>
                </select>   
            </td>
        </tr>
        <tr>
            <td style="border: 1px solid black; text-align: center; padding: 8px;">CLO4</td>
            <td style="border: 1px solid black; text-align: justify; padding: 8px;">
            <input type="text" name="clo4" class="form-control">   
            </td>
            <td style="border: 1px solid black; text-align: center; padding: 8px;">
            <select name="k4" id="" class="form-control">
                    <option value=""></option>
                    <option value="K1">K1</option>
                    <option value="K2">K2</option>
                    <option value="K3">K3</option>
                    <option value="K4">K4</option>
                    <option value="K5">K5</option>
                    <option value="K6">K6</option>
                </select>   
            </td>
        </tr>
        <tr>
            <td style="border: 1px solid black; text-align: center; padding: 8px;">CLO5</td>
            <td style="border: 1px solid black; text-align: justify; padding: 8px;">
            <input type="text" name="clo5" class="form-control">   
            </td>
            <td style="border: 1px solid black; text-align: center; padding: 8px;">
            <select name="k5" id="" class="form-control">
                    <option value=""></option>
                    <option value="K1">K1</option>
                    <option value="K2">K2</option>
                    <option value="K3">K3</option>
                    <option value="K4">K4</option>
                    <option value="K5">K5</option>
                    <option value="K6">K6</option>
                </select>
            </td>
        </tr>
        <tr>
            <td style="border: 1px solid black; text-align: center; padding: 8px;" colspan="3">
            <span style="font-weight: bold;">K1</span> - Remember; 
            <span style="font-weight: bold;">K2</span> - Understand; 
            <span style="font-weight: bold;">K3</span> - Apply;
            <span style="font-weight: bold;">K4</span> - Analyze;
            <span style="font-weight: bold;">K5</span> - Evalute;
            <span style="font-weight: bold;">K6</span> - Create
            </td>
        </tr>
        </tbody>
    </table>

   

    <br>

    <table style="width: 100%; border-collapse: collapse; font-family: 'Times New Roman', serif; font-size: 12pt; text-align: center;">
  <thead>
    <tr>
      <th style="border: 1px solid black; font-weight: bold;">CLOs/PLOs</th>
      <th style="border: 1px solid black; font-weight: bold;">PLO1</th>
      <th style="border: 1px solid black; font-weight: bold;">PLO2</th>
      <th style="border: 1px solid black; font-weight: bold;">PLO3</th>
      <th style="border: 1px solid black; font-weight: bold;">PLO4</th>
      <th style="border: 1px solid black; font-weight: bold;">PLO5</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td style="border: 1px solid black;">CLO1</td>
      <td style="border: 1px solid black;">
        <!-- <input type="text" name="clo01"> -->
        <select name="clo01" id="" class="form-control">
            <option value=""></option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>        
        </select>
      </td>
      <td style="border: 1px solid black;">
      <!-- <input type="text" name="clo02"> -->
      <select name="clo02" id="" class="form-control">
            <option value=""></option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>        
        </select>
      </td>
      <td style="border: 1px solid black;">
      <!-- <input type="text" name="clo03"> -->
      <select name="clo03" id="" class="form-control">
            <option value=""></option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>        
        </select>
      </td>
      <td style="border: 1px solid black;">
      <!-- <input type="text" name="clo04"> -->
      <select name="clo04" id="" class="form-control">
            <option value=""></option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>        
        </select>
      </td>
      <td style="border: 1px solid black;">
      <!-- <input type="text" name="clo05"> -->
      <select name="clo05" id="" class="form-control">
            <option value=""></option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>        
        </select>
      </td>
    </tr>
    <tr>
      <td style="border: 1px solid black;">CLO2</td>
      <td style="border: 1px solid black;">
      <!-- <input type="text" name="clo11"> -->
      <select name="clo11" id="" class="form-control">
            <option value=""></option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>        
        </select>
      </td>
      <td style="border: 1px solid black;">
      <!-- <input type="text" name="clo12"> -->
      <select name="clo12" id="" class="form-control">
            <option value=""></option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>        
        </select>
      </td>
      <td style="border: 1px solid black;">
      <!-- <input type="text" name="clo13"> -->
      <select name="clo13" id="" class="form-control">
            <option value=""></option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>        
        </select>
      </td>
      <td style="border: 1px solid black;">
      <!-- <input type="text" name="clo14"> -->
      <select name="clo14" id="" class="form-control">
            <option value=""></option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>        
        </select>
      </td>
      <td style="border: 1px solid black;">
      <!-- <input type="text" name="clo15"> -->
      <select name="clo15" id="" class="form-control">
            <option value=""></option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>        
        </select>
      </td>
    </tr>
    <tr>
      <td style="border: 1px solid black;">CLO3</td>
      <td style="border: 1px solid black;">
      <!-- <input type="text" name="clo21"> -->
      <select name="clo21" id="" class="form-control">
            <option value=""></option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>        
        </select>
      </td>
      <td style="border: 1px solid black;">
      <!-- <input type="text" name="clo22"> -->
      <select name="clo22" id="" class="form-control">
            <option value=""></option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>        
        </select>
      </td>
      <td style="border: 1px solid black;">
      <!-- <input type="text" name="clo23"> -->
      <select name="clo23" id="" class="form-control">
            <option value=""></option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>        
        </select>
      </td>
      <td style="border: 1px solid black;">
      <!-- <input type="text" name="clo24"> -->
      <select name="clo24" id="" class="form-control">
            <option value=""></option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>        
        </select>
      </td>
      <td style="border: 1px solid black;">
      <!-- <input type="text" name="clo25"> -->
      <select name="clo25" id="" class="form-control">
            <option value=""></option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>        
        </select>
      </td>
    </tr>
    <tr>
      <td style="border: 1px solid black;">CLO4</td>
      <td style="border: 1px solid black;">
      <!-- <input type="text" name="clo31"> -->
      <select name="clo31" id="" class="form-control">
            <option value=""></option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>        
        </select>
      </td>
      <td style="border: 1px solid black;">
      <!-- <input type="text" name="clo32"> -->
      <select name="clo32" id="" class="form-control">
            <option value=""></option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>        
        </select>
      </td>
      <td style="border: 1px solid black;">
      <!-- <input type="text" name="clo33"> -->
      <select name="clo33" id="" class="form-control">
            <option value=""></option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>        
        </select>
      </td>
      <td style="border: 1px solid black;">
      <!-- <input type="text" name="clo34"> -->
      <select name="clo34" id="" class="form-control">
            <option value=""></option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>        
        </select>
      </td>
      <td style="border: 1px solid black;">
      <!-- <input type="text" name="clo35"> -->
      <select name="clo35" id="" class="form-control">
            <option value=""></option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>        
        </select>
      </td>
    </tr>
    <tr>
      <td style="border: 1px solid black;">CLO5</td>
      <td style="border: 1px solid black;">
      <!-- <input type="text" name="clo41"> -->
      <select name="clo41" id="" class="form-control">
            <option value=""></option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>        
        </select>
      </td>
      <td style="border: 1px solid black;">
      <!-- <input type="text" name="clo42"> -->
      <select name="clo42" id="" class="form-control">
            <option value=""></option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>        
        </select>
      </td>
      <td style="border: 1px solid black;">
      <!-- <input type="text" name="clo43"> -->
      <select name="clo43" id="" class="form-control">
            <option value=""></option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>        
        </select>
      </td>
      <td style="border: 1px solid black;">
      <!-- <input type="text" name="clo44"> -->
      <select name="clo44" id="" class="form-control">
            <option value=""></option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>        
        </select>
      </td>
      <td style="border: 1px solid black;">
      <!-- <input type="text" name="clo45"> -->
      <select name="clo45" id="" class="form-control">
            <option value=""></option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>        
        </select>
      </td>
    </tr>
    <tr>
        <td style="font-family: 'Times New Roman', serif; font-size: 12pt; margin-top: 5px;" colspan="6">
        <b>3</b> - Substantial (high) &nbsp;&nbsp; <b>2</b> - Moderate (medium) &nbsp;&nbsp; <b>1</b> - Slight (low)

        </td>
    </tr>
  </tbody>
</table>

<br>
<h2 style="text-align: center;color: #0066cc;text-transform:capitalize;">
    <input type="text" name="core_title" placeholder="Core - I: Python Programming">
</h2>

<table id="unitTable" style="width: 100%; border-collapse: collapse; text-align: center;">
<button onclick="addRow()" type="button" class="btn btn-success" style="margin-top: 10px; font-family: 'Times New Roman', serif; font-size: 12pt;">Add Row</button>

  <thead>
    <tr>
      <th style="border: 1px solid black; font-weight: bold;">Unit</th>
      <th style="border: 1px solid black; font-weight: bold;">Content</th>
      <th style="border: 1px solid black; font-weight: bold;">No. of Hours</th>
      <th style="border: none;"></th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td style="border: 1px solid black; vertical-align: center;" contentEditable=true></td>
      <td style="border: 1px solid black; text-align: justify; padding: 5px;" contentEditable=true>
        
      </td>
      <td style="border: 1px solid black; vertical-align: center;" class="hours-cell" contentEditable=true></td>
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

<div id="table-container" >
    <table id="textBooksTable" style="width: 100%;border-collapse: collapse; margin-bottom: 20px;table-layout:fixed;">
       
    
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
                <th style="border: 1px solid black; padding: 8px; text-align: justify;">Sno</th>
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

   
</body>
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
  newTable.setAttribute('style', 'width: 100%; border-collapse: collapse; margin-bottom: 10px; table-layout: fixed;');

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
    
document.getElementById('courseObjectivesInput').addEventListener('input', function() {
    const lines = this.value.split('\n').filter(line => line.trim() !== '');

    if (lines.length > 0) {
        let ul = '<ul style="font-family: \'Times New Roman\', serif; font-size: 12pt; margin-top: 5px; line-height: 1;">';
        lines.forEach(line => {
            ul += '<li>' + line.trim() + '</li>';
        });
        ul += '</ul>';
        document.getElementById('courseObjectivesList').innerHTML = ul;
    } else {
        document.getElementById('courseObjectivesList').innerHTML = '';
    }
});

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

    document.querySelectorAll('select').forEach(select => {
        select.querySelectorAll('option').forEach(option => {
            if (option.value === select.value) {
                option.setAttribute('selected', 'selected');
            } else {
                option.removeAttribute('selected');
            }
        });
    });

    // Clone the table to remove buttons
    const tableClone = document.getElementById('unitTable').cloneNode(true);
    const tableRef = document.getElementById('table-container').cloneNode(true);
    
    // Remove all buttons from the clone
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

    
    // Set the hidden input value
    document.getElementById('tableData').value = tableClone.outerHTML;
    document.getElementById('tableDataRef').value = tableRef.outerHTML;

 
});
</script>


</html>
