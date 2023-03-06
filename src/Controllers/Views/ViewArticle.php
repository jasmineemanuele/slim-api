
<!DOCTYPE html>
<html>
<head>
    <style>
        /*Stile tabella*/
        #customers {
        font-family: Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
        }

        #customers td, #customers th {
        border: 1px solid #ddd;
        padding: 8px;
        }

        #customers tr:nth-child(even){background-color: #f2f2f2;}

        #customers tr:hover {background-color: #ddd;}

        #customers th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        background-color: #04AA6D;
        color: white;
        }

        /*STILE PULSANTE*/
        .button {
            background-color: #2196F3;
            border: none;
            color: white;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
        }
    </style>
</head>
<body>

    <h1><?= $title ?></h1>

<table id="customers">
    <tr>

        <th>ID</th>
        <th>DESCRIZIONE</th>
        <th>GIACENZA</th>
        <th>IDCategoria</th>
        <th>Operazioni</th>

        

    </tr>

    
    <?php foreach($articles as $article): ?>
        <tr>
            <td><?= $article->id; ?></td>
            <td><?= $article->descrizione; ?></td>
            <td><?= $article->giacenza; ?></td>
            <td><?= $article->idCategoria; ?></td>
            <td>
            <a href="http://localhost:8080/update_articoli/<?= $article->id; ?>" class="button">Aggiorna</a>
            <a href="http://localhost:8080/delete_articoli/<?= $article->id; ?>" class="button">Elimina</a>
            </td>
            
        </tr>
    <?php endforeach; ?>
</table>

    
<div >
    <a href="#" class="button">Inserisci</a>
    <a href="#" class="button">Scarica</a>
</div>
    

</body>
</html>