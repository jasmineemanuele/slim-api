<?php

namespace App\Controllers;


use Slim\Views\PhpRenderer;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;


class Order
{
    public function getOrder(Request $request, Response $response)
    {

        session_start();
        if($_SESSION['log']){
            $orders  = new \App\Models\Orders();
            $renderer = new PhpRenderer(__DIR__."\Views");

            $result = $orders->getOrders();
            //$response->getBody()->write(json_encode($result));
            //return $response;
            $args =  ["orders" => $result, "title" => "I Mie Ordini"];
            return $renderer->render($response, "ViewOrder.php", $args);
        }
        else
        {
           
            header('Location: http://localhost:8080/login');
            exit(); 
        }
    }

    //funzione aggiornamento record ;
    public function updateOrder(Request $request, Response $response, array $args)
    {
        $id = $args['id'];
        $orders = new \App\Models\Orders();
        $result = $orders->getOrdersbyId($id);
        $dd =  ["ordini" => $result, "title" => "ordini"];
        $renderer = new PhpRenderer(__DIR__ . "\Views");
        return $renderer->render($response, "ViewUpdateOrder.php" , $dd);
       
    }


    public function postupdateOrder(Request $request, Response $response)
    {

        $order_model = new \App\Models\Orders();
        $params = (array)$request->getParsedBody();
        $prodotto = $params['prodotto'];
        $id = $params['id'];
        $nome = $params['nome'];
        $result = $order_model->updateOrders($id,$nome,$prodotto);


        $response->getBody()->write("<script>location.replace('http://localhost:8080/ordini')</script>");
        return($response);
        //return $response->withHeader('Location', 'http://localhost:8080/update_citta');

        
    }




    //funzione inserimento redord

    public function getInsertOrder(Request $request, Response $response)
    {

        $orders = new \App\Models\Orders();
        $renderer = new PhpRenderer(__DIR__ . "\Views");
        return $renderer->render($response, "CreaOrdini.php");
    }

    public function postIinsertOrder(Request $request, Response $response)
    {
        $order_model = new \App\Models\Orders();
        $params = (array)$request->getParsedBody();
        $Prodotto = $params['Prodotto'];
        $nome = $params['nome'];
        $idPuntoVendita = $params['idPuntoVendita'];
        $result = $order_model->insertOrders($Prodotto, $nome ,$idPuntoVendita);
        
        
        // return $response->withHeader('Location', 'http://localhost:8080/crea_citta');
        $response->getBody()->write("<script>location.replace('http://localhost:8080/ordini')</script>");
        return($response);
    }


    //funzione DELETE redord

    public function getDeleteOrder(Request $request, Response $response, array $args)
    {
        $id = $args['id'];
        $order = new \App\Models\Orders();
        $order->deleteOrders($id);
        $response->getBody()->write("<script>location.replace('http://localhost:8080/ordini')</script>");
        return $response;

    }


    //funzione donwload tramite TCDPDF php ;

    public function downloadOrder(Request $request, Response $response)
    {
        require_once 'PDFOrdini.php';

        $order_model = new \App\Models\Orders();
        $result = $order_model->getOrders();


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
        $header = array('Prodotto', '  nome 56454');

        // data loading
        //$data = $pdf->LoadData('C:\Users\39327\Desktop\table_data_demo.txt');
        $data = $pdf->orderToarray($result);
        // print colored table 
        $pdf->ColoredTable($header, $data);

        // ---------------------------------------------------------

        // close and output PDF document
        $pdf->Output('ordini.pdf', 'I');




        //$response->getBody()->write('ok');
        //return $response;
    }

}      