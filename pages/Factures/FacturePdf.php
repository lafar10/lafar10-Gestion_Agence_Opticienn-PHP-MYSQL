<?php

include('../../config/dbConnection.php');

require_once '../../vendor/autoload.php';

if (isset($_GET['id'])) {

    $pdf_id = ValidInput($con, $_GET['id']);

    $query_pdf = "SELECT * FROM factures WHERE id='$pdf_id' LIMIT 1";
    $query_pdf_run = mysqli_query($con, $query_pdf);

    if ($query_pdf_run->num_rows == 1) {

        $item = $query_pdf_run->fetch_assoc();

        /* foreach ($query_pdf_run as $item) {
            $id = $item['id'];
            $fullname = $item['fullname'];
            $email = $item['email'];
            $tele = $item['tele'];
            $le_status = $item['le_status'];
            $re_status = $item['fullname'];
            $choose_1 = $item['choose_1'];
            $choose_2 = $item['choose_2'];
            $total = $item['price_total'];
            $created_at = $item['created_at'];
        } */


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
                <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
            
            </head>
            <body>
           

            <div class="container">
                <div class="row text-center">
                    <div class="col-lg-12">
                        <img src="../../assets/img/logos/opt.png" alt="" style="width:140px;height:105px;" align="center" srcset="">
                        <h5 style="font-size: 30px; color: secondary;">OPT - <span style="color:orange;"> VISION</span></h5>
                        </div>       
                </div>

                
                        
                <div class="row text-center">
                <br>
                            <div class="col-xl-12">
                                <ul class="list-unstyled float-end">
                                    <li class="font-weight-bold">Nom Complet: ' . $item['fullname'] . '</li>
                                    <li>Téléphone : ' . $item['tele'] . '</li>
                                    <li>Email : ' . $item['email'] . '</li>
                                </ul>
                                <br>
                            <h5 align="center">Facture N° ' . $item['id'] . '&nbsp;&nbsp;&nbsp;Date : ' . $item['created_at'] . '</h5>
                    </div>
                </div>
                
                <div class="row">
                <br>
                <br>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Description</th>
                                <th scope="col">Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Left Eye Status</td>
                                <td><i class="fas fa-dollar-sign"></i> ' . $item['le_status'] . '</td>
                            </tr>
                            <tr>
                                <td>Right Eye Status</td>
                                <td><i class="fas fa-dollar-sign"></i> ' . $item['re_status'] . '</td>
                            </tr>
                            <tr>
                                <td>Choose 1</td>
                                <td><i class="fas fa-dollar-sign"></i> ' . $item['choose_1'] . '</td>
                            </tr>
                            <tr>
                            <td>Choose 2</td>
                            <td><i class="fas fa-dollar-sign"></i> ' . $item['choose_2'] . '</td>
                        </tr>
                        </tbody>
                    </table>
                    <br>
                    <br>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <ul class="list-unstyled float-end me-0">
                            <br>
                                 <li><span class="me-5 float-start">Total Amount : </span><i class="fas fa-dollar-sign"></i> ' . $item['price_total'] . ',00
                                </li><br>
                                <li> <span class="me-5">TVA 25 % : </span><i class="fas fa-dollar-sign"></i> ' . ($item['price_total'] * 25 / 100) . '</li><br>
                                <li> <h4 class="font-weight-bold">Total Net : <i class="fas fa-dollar-sign"></i> ' . (($item['price_total'] * 25) / 100 + $item['price_total']) . ',00</h4>
                            </ul>
                    </div>
                    <div class="col-lg-12">
                    <br>
                    <br>
                    <br>
                    
                        <h3 class="fw-bold float-end" align="right">Signature&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h3>
                    </div>
                </div>

            </div>
            <br>
            
            <hr>
            <br>
            <br>
            <div class="row">
                    <div class="col-lg-12 text-center">
                        <span ><img src="../../assets/img/gmail.png" style="width:30px;height:20px;">&nbsp; sssssmail@mail.com</span>&nbsp;&nbsp;&nbsp;<span > <img src="../../assets/img/telephone.png" style="width:30px;height:20px;">&nbsp; 123-456-789</span>&nbsp;&nbsp;&nbsp;<span ><img src="../../assets/img/navigation.png" style="width:30px;height:20px;">&nbsp; 123, Elm Street</span>
                    </div>
            </div>
                        
            </body>
            </html>', \Mpdf\HTMLParserMode::HTML_BODY);

            $mpdf->Output('');
        } else {
?>
            <h3>No Records Found</h3>
<?php
        }
    }
}
