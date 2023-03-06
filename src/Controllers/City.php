<?php

namespace App\Controllers;

use Slim\Views\PhpRenderer;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;


class City
{

    //Funzione per perdere tutti i dati dalla tabella CITTA
    public function getCity(Request $request, Response $response)
    {
        session_start();
        if($_SESSION['log']){

            $city = new \App\Models\Citys();
            $renderer = new PhpRenderer(__DIR__ . "\Views");
            $result = $city->getCitys();
            $args =  ["citys" => $result, "title" => "Le Città"];
            return $renderer->render($response, "ViewCity.php", $args);
        }
        else {
            header('Location: http://localhost:8080/login');
            exit();               
        }
    }



//funzione aggiornamento record ;
    public function updateCity(Request $request, Response $response, array $args)
    {
        $id = $args['id'];
        $city = new \App\Models\Citys();
        $result = $city->getCitybyId($id);
        $dd =  ["citta" => $result, "title" => "Citta"];
        $renderer = new PhpRenderer(__DIR__ . "\Views");
        return $renderer->render($response, "Viewupdate.php" , $dd);
       
    }


    public function postupdateCity(Request $request, Response $response)
    {

        $city_model = new \App\Models\Citys();
        $params = (array)$request->getParsedBody();
        $city_name = $params['citta'];
        $country = $params['paese'];
        $id = $params['id'];


        $result = $city_model->updateCitys($city_name, $country , $id);
        
        $response->getBody()->write("<script>location.replace('http://localhost:8080/citta')</script>");
        return($response);
        //return $response->withHeader('Location', 'http://localhost:8080/update_citta');

        
    }




    //funzione inserimento redord

    public function getInsertCity(Request $request, Response $response)
    {

        $city = new \App\Models\Citys();
        $renderer = new PhpRenderer(__DIR__ . "\Views");
        return $renderer->render($response, "Crea.php");
    }

    public function postIinsertCity(Request $request, Response $response)
    {
        $city_model = new \App\Models\Citys();
        $params = (array)$request->getParsedBody();
        $city_name = $params['nome'];
        $country = $params['country'];
        $result = $city_model->insertCitys($city_name, $country);
        
        
        // return $response->withHeader('Location', 'http://localhost:8080/crea_citta');
        $response->getBody()->write("<script>location.replace('http://localhost:8080/citta')</script>");
        return($response);
    }


    //funzione DELETE redord

    public function getDeleteCity(Request $request, Response $response, array $args)
    {
        $id = $args['id'];
        $city = new \App\Models\Citys();
        $city->deleteCitys($id);
        $response->getBody()->write("<script>location.replace('http://localhost:8080/citta')</script>");
        return $response;

        /*
        

        $result = $city->getCitys();
        $args =  ["citys" => $result, "title" => "Le Città"];
        $renderer = new PhpRenderer(__DIR__ . "\Views");
        return $renderer->render($response, "ViewCity.php", $args);
        */

    }


    //funzione donwload tramite TCDPDF php ;

    public function downloadCity(Request $request, Response $response)
    {
        require_once 'MYPDF.php';

        $city_model = new \App\Models\Citys();
        $result = $city_model->getCitys();


        // create new PDF document
        $pdf = new \MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        // set document information
        $pdf->setCreator(PDF_CREATOR);
        $pdf->setAuthor('Nicola Asuni');
        $pdf->setTitle('TCPDF Example 011');
        $pdf->setSubject('TCPDF Tutorial');
        $pdf->setKeywords('TCPDF, PDF, example, test, guide');

        // set default header data
        $pdf->setHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE . ' 011', PDF_HEADER_STRING);

        // set header and footer fonts
        $pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
        $pdf->setFooterFont(array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

        // set default monospaced font
        $pdf->setDefaultMonospacedFont(PDF_FONT_MONOSPACED);

        // set margins
        $pdf->setMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        $pdf->setHeaderMargin(PDF_MARGIN_HEADER);
        $pdf->setFooterMargin(PDF_MARGIN_FOOTER);

        // set auto page breaks
        $pdf->setAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

        // set image scale factor
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);


        // ---------------------------------------------------------

        // set font
        $pdf->setFont('helvetica', '', 12);

        // add a page
        $pdf->AddPage();

        // column titles
        $header = array('Paese', 'Citta');

        // data loading
        //$data = $pdf->LoadData('C:\Users\39327\Desktop\table_data_demo.txt');
        $data = $pdf->cityToarray($result);
        // print colored table
        $pdf->ColoredTable($header, $data);

        // ---------------------------------------------------------

        // close and output PDF document
        $pdf->Output('citta.pdf', 'I');




        //$response->getBody()->write('ok');
        //return $response;
    }
}
