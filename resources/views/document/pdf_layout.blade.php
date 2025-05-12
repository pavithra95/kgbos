<!DOCTYPE html>
<html>
<head>
    <style>
       @page {
            margin: 100px 50px 80px 50px; /* top, right, bottom, left */
        }
        header{
            position: fixed;
            top: -80px;
            left: 0px;
            right: 0px;
            height: 80px;
            text-align: center;
            font-size: 12pt;
            font-family: 'Times New Roman';
            /* border-bottom: 1px solid #000; */
        }

        body {
            font-family: "Times New Roman", serif;
            font-size: 12pt;
            line-height: 1.5;
            /* margin: 1cm; */
            /* margin-top: 1px; */
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
        }

        .sub-section {
            font-size: 12pt;
            text-align: center;
            font-weight: bold;
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



        .center-text {
            flex-grow: 1;
            text-align: center;
        }

        .justified {
            text-align: justify;
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
        .justified,.tdhead {
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
        header {
            position: fixed;
            top: -50px;
            left: 0px;
            right: 0px;
            height: 70px;
        }

    </style>
</head>
<body>

    <!-- Header -->
    

    <header>
    <table style="width: 100%; font-weight: bold; font-size: 12pt; margin: 0;">
        <tr>
            <td style="text-align: left; width: 80%;">
                KG College of Arts and Science (Autonomous)
            </td>
            <td style="text-align: right; width: 20%;">
                {{ $batch ?? '' }}
            </td>
        </tr>
    </table>
    <hr style="margin: 0; border: none; border-top: 2px solid #000;">
    </header>
    

    <!-- Footer -->
    <footer>
        Department of {{$footer_department}}
    </footer>


    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

</body>
</html>
