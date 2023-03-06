<?php

namespace App\Controllers;

use Slim\Views\PhpRenderer;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;


class Category
{

    public function ok(Request $request, Response $response){

        $category = new  \App\Models\Categorys();
        $renderer = new PhpRenderer(__DIR__ . "\Views");
        $result = $category->getCategorys();
        
        $args =  ["categorys" => $result, "title" => "Le categorie"];
        return $renderer->render($response, "ViewCategorie.php", $args);

    }




 //funzione inserimento redord

 public function getInsertCategory(Request $request, Response $response)
 {

     $category = new \App\Models\Categorys();
     $renderer = new PhpRenderer(__DIR__ . "\Views");
     return $renderer->render($response, "CreaCategoria.php");
 }

 

 public function postIinsertCategory(Request $request, Response $response)
 {
     $category_model = new \App\Models\Categorys();
     $params = (array)$request->getParsedBody();
     $category_name = $params['nome'];
     $descrizone = $params['descrizone'];
     $result = $category_model->insertCategorys($category_name, $descrizone);
     
     
     // return $response->withHeader('Location', 'http://localhost:8080/crea_citta');
     $response->getBody()->write("<script>location.replace('http://localhost:8080/categorie')</script>");
     return($response);
 }










    //funzione aggiornamento record ;
    public function updateCategory(Request $request, Response $response, array $args)
    {
        $id = $args['id'];
        $category = new \App\Models\Categorys();
        $result = $category->getCategorysbyId($id);
        $dd =  ["categorie" => $result, "title" => "Le categorie"];
        $renderer = new PhpRenderer(__DIR__ . "\Views");
        return $renderer->render($response, "ViewUpdateCategory.php" , $dd);
       
    }


    public function postupdateCategory(Request $request, Response $response)
    {

        $category_model = new \App\Models\Categorys();
        $params = (array)$request->getParsedBody();
        $category_name = $params['nome'];
        $descrizione = $params['descrizione'];
        $id = $params['id'];


        $result = $category_model->updateCategorys($category_name, $descrizione , $id);
        
        $response->getBody()->write("<script>location.replace('http://localhost:8080/categorie')</script>");
        return($response);
        //return $response->withHeader('Location', 'http://localhost:8080/update_citta');

        
    }


    public function getDeleteCategory(Request $request, Response $response, array $args)
    {
        $id = $args['id'];
        $category = new \App\Models\Categorys();
        $category->deleteCategorys($id);
        $response->getBody()->write("<script>location.replace('http://localhost:8080/categorie')</script>");
        return $response;

        /*
        

        $result = $city->getCitys();
        $args =  ["citys" => $result, "title" => "Le Città"];
        $renderer = new PhpRenderer(__DIR__ . "\Views");
        return $renderer->render($response, "ViewCity.php", $args);
        */

    }

    public function downloadCategory(Request $request, Response $response)
    {
        require_once 'pfdCatagory.php';

        $category_model = new \App\Models\Categorys();
        $result = $category_model->getCategorys();


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
        $header = array('descrizione', 'nome');

        // data loading
        //$data = $pdf->LoadData('C:\Users\39327\Desktop\table_data_demo.txt');
        $data = $pdf->categoryToarray($result);
        // print colored table
        $pdf->ColoredTable($header, $data);

        // ---------------------------------------------------------

        // close and output PDF document
        $pdf->Output('categorie.pdf', 'I');




        //$response->getBody()->write('ok');
        //return $response;
    }

}
