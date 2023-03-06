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
            <input type="hidden" name="id" value="<?= $ordini[0]->id; ?>"> 

            <label for="lname" value="<?= $ordini[0]->Nome; ?>">Nome</label>
            <input type="text" id="lname" name="nome" value="<?= $ordini[0]->Nome; ?>">

            <label for="lname" value="<?= $ordini[0]->idPuntoVendita; ?>">Prodotto</label>
            <input type="text" id="lname" name="prodotto" value="<?= $ordini[0]->Prodotto; ?>">

            <input type="submit" value="Submit" name="submit_button">

        </form>
    </div>

</body>

</html>