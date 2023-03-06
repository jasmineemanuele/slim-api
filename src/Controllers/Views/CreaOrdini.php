<!DOCTYPE html>
<html>
<style>
input[type=text], select {
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

<h1>Inserisci i dati per il nuovo record</h1>

<div>
  <form action=""  method="post">

        <label for="fname">Prodotto</label>
        <input type="text" id="fname" name="Prodotto" placeholder="Inserisci il nome del prodotto">

        <label for="lname">nome</label>
        <input type="hidden" name="id" value="<?= $ordini[0]->idPuntoVendita; ?>"> 
        <input type="text" id="lname" name="nome" placeholder="Inserisci il punto vendita">

        
  
    <input type="submit" value="Submit" name="submit_button">
  </form>
</div>

</body>
</html>



