<!DOCTYPE html>
<html>
<head>
    <style>
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
        <th>Descrizione</th>
        <th>Nome</th> 
        <th>Operazioni</th> 
    </tr>

    <?php foreach($categorys as $category): ?>
    <tr>
        <td><?= $category->id; ?></td>
        <td><?= $category->descrizione; ?></td>
        <td><?= $category->nome; ?></td>
        <td>
            <a href="http://localhost:8080/update_categorie/<?= $category->id; ?>" class="button">Aggiorna</a>
            <a href="http://localhost:8080/delete_categorie/<?= $category->id; ?>" class="button">Elimina</a>
        </td>
    </tr>
    <?php endforeach; ?>
  
</table>

<div >
    <a href="http://localhost:8080/categorie" class="button">Visualizza</a>
    <a href="http://localhost:8080/crea_categorie" class="button">Inserisci</a>
    <a href="http://localhost:8080/scarica_categorie" class="button">Scarica</a>
    <a href="http://localhost:8080/logout" class="button">LogOut</a>
</div>

</body>
</html>