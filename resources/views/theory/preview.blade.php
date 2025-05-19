<!DOCTYPE html>
<html>

<head>
    <title>Document Preview</title>
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
            line-height: 1.0;
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
            margin-left: 2em;
            margin-top: 0.5em;
            /* text-indent: 2em; */
        }

        table {
            width: 100%;
            border-collapse: collapse;
            font-family: "Times New Roman", Times, serif;
            font-size: 12pt;
        }

        th,
        td {
            border: 1px solid black;
            padding: 8px;
            vertical-align: middle;
            /* font-weight: bold; */
            /* Vertically center the text */
        }
        .tdhead{
            /* font-weight: bold; */
            text-align: center;
        }

        .justified {
            text-align: justify;
            line-height: 1.0;
            /* Single line spacing */
        }

        .section-title {
            font-weight: bold;
        }

        .table-caption {
            font-family: "Times New Roman", Times, serif;
            font-size: 12pt;
            margin-bottom: 10px;
        }
        footer {
            position: fixed;
            bottom: -30px;
            left: 0;
            right: 0;
            height: 30px;
            text-align: left;
            font-size: 10pt;
            border-top: 1px solid #000;
            font-weight: bold;
        }
        /* .delete-row {
            visibility: hidden !important;
            width: 0 !important;
            height: 0 !important;
            padding: 0 !important;
            margin: 0 !important;
            border: none !important;
        } */

        /* Ensures the cell remains visible */
        /* button:has(.delete-row) {
            border: 1px solid black !important;
        } */
         .delete{
            border:none;
         }
    </style>
</head>

<body>

    <div class="header-row">
        <div class="header-left">KG College of Arts and Science (Autonomous)</div>
        <div class="header-right">{{$batch}}</div>
    </div>

    <hr>

     <!-- Semester Title -->
     <table style="width: 100%; border-collapse: collapse; margin-bottom: 20px;border:none">
        <tr style="border:none">
            <td colspan="10" style="font-family: 'Times New Roman', serif; font-size: 14pt; text-align: center; font-weight: bold; line-height: 1.5;border:none">
                Semester – {{$sem_count}}
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
               {{$course_code}}
            </td>
            <td style="border: 1px solid black; padding: 8px;text-transform:capitalize;">
                {{$course_name}}
            </td>
            <td style="border: 1px solid black; padding: 8px;">
                {{$category}}
            </td>
            <td style="border: 1px solid black; padding: 8px;">
                {{$hrs}}
            </td>
            <td style="border: 1px solid black; padding: 8px;">
                {{$credits}}
            </td>
        </tr>
    </tbody>
</table>

<br>

<!-- Course Objectives -->
<p style="font-family: 'Times New Roman', serif; font-size: 12pt; font-weight: bold; color: #0072BC; margin-top: 20px; margin-bottom: 5px;">
    Course Objectives
</p>
<p style="font-family: 'Times New Roman', serif; font-size: 12pt; margin: 0; line-height: 1;">
    The course intends to cover:
</p>
<ul style="font-family: 'Times New Roman', serif; font-size: 12pt; margin-top: 5px; line-height: 1;">
    @foreach(explode("\n", $course_objectives) as $objective)
            @if(trim($objective) != '')
                <li>{{ trim($objective) }}</li>
            @endif
    @endforeach
</ul>

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
               {{$clo1}}       
        </td>
            <td style="border: 1px solid black; text-align: center; padding: 8px;">
            {{$k1}}  
            </td>
        </tr>
        <tr>
            <td style="border: 1px solid black; text-align: center; padding: 8px;">CLO2</td>
            <td style="border: 1px solid black; text-align: justify; padding: 8px;">
            {{$clo2}}  
            </td>
            <td style="border: 1px solid black; text-align: center; padding: 8px;">
            {{$k2}}    
            </td>
        </tr>
        <tr>
            <td style="border: 1px solid black; text-align: center; padding: 8px;">CLO3</td>
            <td style="border: 1px solid black; text-align: justify; padding: 8px;">
            {{$clo3}}           
        </td>
            <td style="border: 1px solid black; text-align: center; padding: 8px;">
            {{$k3}}   
            </td>
        </tr>
        <tr>
            <td style="border: 1px solid black; text-align: center; padding: 8px;">CLO4</td>
            <td style="border: 1px solid black; text-align: justify; padding: 8px;">
            {{$clo4}}   
            </td>
            <td style="border: 1px solid black; text-align: center; padding: 8px;">
            {{$k4}}  
            </td>
        </tr>
        <tr>
            <td style="border: 1px solid black; text-align: center; padding: 8px;">CLO5</td>
            <td style="border: 1px solid black; text-align: justify; padding: 8px;">
            {{$clo5}}    
            </td>
            <td style="border: 1px solid black; text-align: center; padding: 8px;">
            {{$k5}}  
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
       {{$clo01}}
      </td>
      <td style="border: 1px solid black;">
      {{$clo02}}
      </td>
      <td style="border: 1px solid black;">
      {{$clo03}}
      </td>
      <td style="border: 1px solid black;">
      {{$clo04}}
      </td>
      <td style="border: 1px solid black;">
      {{$clo05}}
      </td>
    </tr>
    <tr>
      <td style="border: 1px solid black;">CLO2</td>
      <td style="border: 1px solid black;">
       {{$clo11}}
      </td>
      <td style="border: 1px solid black;">
      {{$clo12}}
      </td>
      <td style="border: 1px solid black;">
      {{$clo13}}
      </td>
      <td style="border: 1px solid black;">
      {{$clo14}}
      </td>
      <td style="border: 1px solid black;">
      {{$clo15}}
      </td>
    </tr>
    <tr>
      <td style="border: 1px solid black;">CLO3</td>
      <td style="border: 1px solid black;">
       {{$clo21}}
      </td>
      <td style="border: 1px solid black;">
      {{$clo22}}
      </td>
      <td style="border: 1px solid black;">
      {{$clo23}}
      </td>
      <td style="border: 1px solid black;">
      {{$clo24}}
      </td>
      <td style="border: 1px solid black;">
      {{$clo25}}
      </td>
    </tr>
    <tr>
      <td style="border: 1px solid black;">CLO4</td>
      <td style="border: 1px solid black;">
       {{$clo31}}
      </td>
      <td style="border: 1px solid black;">
      {{$clo32}}
      </td>
      <td style="border: 1px solid black;">
      {{$clo33}}
      </td>
      <td style="border: 1px solid black;">
      {{$clo34}}
      </td>
      <td style="border: 1px solid black;">
      {{$clo35}}
      </td>
    </tr>
    <tr>
      <td style="border: 1px solid black;">CLO5</td>
      <td style="border: 1px solid black;">
       {{$clo41}}
      </td>
      <td style="border: 1px solid black;">
      {{$clo42}}
      </td>
      <td style="border: 1px solid black;">
      {{$clo43}}
      </td>
      <td style="border: 1px solid black;">
      {{$clo44}}
      </td>
      <td style="border: 1px solid black;">
      {{$clo45}}
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
<div>

    <h2 style="text-align: center; color: #0066cc;text-transform:capitalize;">
       {{$core_title}}
    </h2>

    {!! $tableHtml !!}
</div>
<br>
<div>
    {!! $tableDataRef !!}

</div>



    



   

 

<br>

    <form action="{{ route('theorydownload.pdf') }}" method="POST">
        @csrf
        <input type="hidden" name="batch" value="{{ $batch }}">
        <input type="hidden" name="footer_department" value="{{ $footer_department }}">
        <input type="hidden" name="course_code" value="{{ $course_code }}">
        <input type="hidden" name="course_name" value="{{ $course_name }}">
        <input type="hidden" name="category" value="{{ $category }}">
        <input type="hidden" name="hrs" value="{{ $hrs }}">
        <input type="hidden" name="credits" value="{{ $credits }}">
        <input type="hidden" name="clo1" value="{{ $clo1 }}">
        <input type="hidden" name="clo2" value="{{ $clo2 }}">
        <input type="hidden" name="clo3" value="{{ $clo3 }}">
        <input type="hidden" name="clo4" value="{{ $clo4 }}">
        <input type="hidden" name="clo5" value="{{ $clo5 }}">
        <input type="hidden" name="k1" value="{{ $k1 }}">
        <input type="hidden" name="k2" value="{{ $k2 }}">
        <input type="hidden" name="k3" value="{{ $k3 }}">
        <input type="hidden" name="k4" value="{{ $k4 }}">
        <input type="hidden" name="k5" value="{{ $k5 }}">
        <input type="hidden" name="sem_count" value="{{ $sem_count }}">
        <input type="hidden" name="clo01" value="{{ $clo01 }}">
        <input type="hidden" name="clo02" value="{{ $clo02 }}">
        <input type="hidden" name="clo03" value="{{ $clo03 }}">
        <input type="hidden" name="clo04" value="{{ $clo04 }}">
        <input type="hidden" name="clo05" value="{{ $clo05 }}">
        <input type="hidden" name="clo11" value="{{ $clo11 }}">
        <input type="hidden" name="clo12" value="{{ $clo12 }}">
        <input type="hidden" name="clo13" value="{{ $clo13 }}">
        <input type="hidden" name="clo14" value="{{ $clo14 }}">
        <input type="hidden" name="clo15" value="{{ $clo15 }}">
        <input type="hidden" name="clo21" value="{{ $clo21 }}">
        <input type="hidden" name="clo22" value="{{ $clo22 }}">
        <input type="hidden" name="clo23" value="{{ $clo23 }}">
        <input type="hidden" name="clo24" value="{{ $clo24 }}">
        <input type="hidden" name="clo25" value="{{ $clo25 }}">
        <input type="hidden" name="clo31" value="{{ $clo31 }}">
        <input type="hidden" name="clo32" value="{{ $clo32 }}">
        <input type="hidden" name="clo33" value="{{ $clo33 }}">
        <input type="hidden" name="clo34" value="{{ $clo34 }}">
        <input type="hidden" name="clo35" value="{{ $clo35 }}">
        <input type="hidden" name="clo41" value="{{ $clo41 }}">
        <input type="hidden" name="clo42" value="{{ $clo42 }}">
        <input type="hidden" name="clo43" value="{{ $clo43 }}">
        <input type="hidden" name="clo44" value="{{ $clo44 }}">
        <input type="hidden" name="clo45" value="{{ $clo45 }}">
        <input type="hidden" name="tableData" value="{{ $tableHtml }}">
        <input type="hidden" name="core_title" value="{{ $core_title }}">
        <input type="hidden" name="tableDataRef" value="{{ $tableDataRef }}">
        <input type="hidden" name="course_objectives" value="{{ $course_objectives }}">

    
   
        
        <button type="submit">Download PDF</button>
    </form>



</body>

</html>