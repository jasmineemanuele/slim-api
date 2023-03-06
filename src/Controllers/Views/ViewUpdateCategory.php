<!DOCTYPE html>
<html>
<style>
    input[type=text],
    select {
        width: 100%;
        padding: 12px 20px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }

    input[type=submit] {
        width: 100%;
        background-color: #4CAF50;
        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    input[type=submit]:hover {
        background-color: #45a049;
    }

    div {
        border-radius: 5px;
        background-color: #f2f2f2;
        padding: 20px;
    }
</style>

<body>

    <h1>I record aggirnati</h1>

    <div>
        <form action="" method="post">

            <label for="fname">Nome</label>
            <input type="hidden" name="id" value="<?= $categorie[0]->id; ?>"> 
            <input type="text" id="fname" name="citta" value="<?= $categorie[0]->nome; ?>">

            <label for="lname" value="<?= $citta->nome; ?>">Descrizione</label>
            <input type="text" id="lname" name="paese" value="<?= $categorie[0]->descrizione; ?>">
            <input type="submit" value="Submit" name="submit_button">

        </form>
    </div>

</body>

</html>