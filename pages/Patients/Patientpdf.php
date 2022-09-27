<?php

include('../../config/dbConnection.php');

require_once '../../vendor/autoload.php';

if (isset($_GET['id'])) {

    $pt_id = ValidInput($con, $_GET['id']);

    $query_pt_pdf = "SELECT * FROM patients WHERE id='$pt_id' LIMIT 1";

    $query_pt_pdf_run = mysqli_query($con, $query_pt_pdf);

    if ($query_pt_pdf_run->num_rows == 1) {
        $item = $query_pt_pdf_run->fetch_assoc();

        if ($item) {
            $mpdf = new \Mpdf\Mpdf();

            $mpdf->AddPage("");

            $stylesheet = file_get_contents('../../assets/css/bootstrap.min.css');
            $mpdf->WriteHTML($stylesheet, \Mpdf\HTMLParserMode::HEADER_CSS);

            $mpdf->WriteHTML('<!DOCTYPE html>
            <html lang="en">
            
            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title></title>
            
                <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
            
                <link href="../../assets/css/bootstrap.min.css" rel="stylesheet" />
            
            </head>
            
            <body>
            
            
                <div class="container">
                    <div class="row" align="center">
                    <br>
                        <div class="col-lg-12 text-center">
                            <img src="../../assets/img/logos/opt.png" alt="" style="width:140px;height:105px;" align="center" srcset="">
                            <h5 style="font-size: 30px; color: secondary;">OPT - <span style="color:orange;"> VISION</span></h5>
                        </div>
                        <div class="col-lg-12 text-center">
                            <br>
                            
                        </div>
                    </div>
                </div>
                    <h5 class="text-center" style="font-size: 22px; color: secondary;">Patient ID<span style="color:orange;"> ' . $item['id'] . '</span></h5>
                    <br>
                    <h5 class="text-center" style="font-size: 17px; color: secondary;">Date : ' . $item['created_at'] . '</h5>

                    <br>
                    <hr style="width:37%;">
                    <br>
                    <br>
                    <br>
                    <br>
                    <table class="table table-borderless ">
                    <tbody class="text-center">
                        <tr >
                            <th></th>
                            <th>&nbsp;&nbsp;&nbsp;&nbsp;Nom & Prénom &nbsp;&nbsp;&nbsp; : &nbsp;&nbsp;&nbsp; ' . $item['fullname'] . '</th>                    
                        </tr>
                        
                        <tr>
                            <th></th>
                            <th>&nbsp;&nbsp;&nbsp;&nbsp;Email &nbsp;&nbsp;&nbsp; : &nbsp;&nbsp;&nbsp; ' . $item['email'] . '</th>
                        </tr>
                        <tr>
                            <th></th>
                            <th>&nbsp;&nbsp;&nbsp;&nbsp;Téléphone &nbsp;&nbsp;&nbsp; : &nbsp;&nbsp;&nbsp; ' . $item['tele'] . '</th>
                        </tr>
                        <tr>
                            <th></th>
                            <th>&nbsp;&nbsp;&nbsp;&nbsp;Adresse &nbsp;&nbsp;&nbsp; : &nbsp;&nbsp;&nbsp; ' . $item['adress'] . '</th>
                        </tr>
                        <tr>
                            <th></th>
                            <th>&nbsp;&nbsp;&nbsp;&nbsp;Left Eye &nbsp;&nbsp;&nbsp; : &nbsp;&nbsp;&nbsp; ' . $item['le_status'] . '</th>
                        </tr>
                        <tr>
                            <th></th>
                            <th>&nbsp;&nbsp;&nbsp;&nbsp;Right Eye &nbsp;&nbsp;&nbsp; : &nbsp;&nbsp;&nbsp; ' . $item['re_status'] . '</th>
                        </tr>
                        <tr>
                            <th></th>
                            <th >&nbsp;&nbsp;&nbsp;&nbsp;Extra &nbsp;&nbsp;&nbsp; : &nbsp;&nbsp;&nbsp; ' . $item['extra'] . '</th>
                        </tr>
                    </tbody>
                </table>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <h4 align="right">Signature&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h4>
                <br>
                <br>
                <hr style="height:3px;">
                <br>
                <br>
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <span><img src="../../assets/img/gmail.png" style="width:30px;height:20px;">&nbsp; sssssmail@mail.com</span>&nbsp;&nbsp;&nbsp;<span> <img src="../../assets/img/telephone.png" style="width:30px;height:20px;">&nbsp; 123-456-789</span>&nbsp;&nbsp;&nbsp;<span><img src="../../assets/img/navigation.png" style="width:30px;height:20px;">&nbsp; 123, Elm Street</span>
                    </div>
                </div>
            
            </body>
            
            </html>', \Mpdf\HTMLParserMode::HTML_BODY);

            $mpdf->Output('');
        }
    } else {
?>
        <div class="container">
            <h2>No Rocords Found ^=^</h2>
        </div>
<?php
    }
}

?>