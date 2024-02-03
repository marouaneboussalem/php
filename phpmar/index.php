<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="page.php" method="POST">
    <h1> AJOUTER UN COMPTE</h1>
    <input type="text" name="proprietaire" placeholder="proprietaire"><br><br>
    <label for="">type de compte:</label><br><br>

    <input type="radio" name ="type" id="c1" value="Compte courant" checked>
    <label for="c1"> compte courant</label>

    <input type="radio" name="type" id="c2" value="Compte epargne" >
    <label for="c2"> compte epargne</label>
    
    <input type="radio" name="type" id="c3">
    <label for="c3"> compte a terme</label value="Compte a terme"><br><br>

    <input type="text" name="solde" placeholder="solde"><br><br>
    <button>AJOUTER</button>
    
    
    <h1> LIste de comptes</h1>
        <table border="1" width="100%">
            <tr>
                <th>proprietaire</th>
                <th>type</th>
                <th>solde</th>
            </tr>
            <?php
            require 'conn.php';
            $requete="SELECT * FROM compte";
            $query=mysqli_query($con,$requete);
            while($rows=mysqli_fetch_assoc($query)){
               $id=$rows['idcompte'];
                echo"<tr>";
                echo "<td>".$rows['proprietaire']."</td>";
                echo "<td>".$rows['type']."</td>";
                echo "<td>".$rows['solde']."</td>";
                echo "<td><a href='delet.php?id=".$id."'>Suprimer</a></td>";
                echo"</tr>";
            }

            ?>
        </table>

        <h1>Opérations</h1>
        <label for="html">ID:</label>
        <select name="id" id="id">
        <?php 
        $requetee = "SELECT idcompte FROM compte";
        $requetee = mysqli_query($con,$requetee);
        while($ros= mysqli_fetch_assoc($requetee)){
           
            echo '<option value ="'.$ros["idcompte"].'">'. $ros["idcompte"] . '</option>';
        }
       
        
        
        ?>
         </select> <br> <br>
         
    </form>
</body>
</body>
</html>
</fieldset>
    <br>
    <fieldset style="background-color:#ff780017;">
    <h1>Opérations</h1>

        
         <label for="html">ID:</label>
            <select id="id" name="id">
            
            <?php
                        $sql3 = "SELECT idcompte FROM compte";
                        $result=$connection->query($sql3);
                        if($result->num_rows>0){ 
                                while($ligne = $result->fetch_assoc()){
                                print_r($ligne);
                              echo '<option value='. $ligne['idcompte'].'>'.$ligne['idcompte'].'</option>';
                                 }
                        }
                        

                        ?>
            </select><br><br>
        
           
            <label>Type d'opération: </label><br>     
        <input type="radio"  name="opr" id="op1" value="Verser" checked>
        <label for="op1">Verser</label>
        <input type="radio" name="opr" id="op2"  value="Retirer" >
        <label for="op2">Retirer</label><br><br>
        <input type="text" name="montant" placeholder="Montant"><br><br>
    <input type="submit" value="Ajouter opération" name="submitOpr"><br>
    <?php
    if(isset($_POST['submitOpr']))
       {
            $num=$_POST['id'];
            $optype=$_POST['opr'];
            $mt=$_POST['montant'];

            $sql4 = "SELECT solde FROM compte WHERE idcompte=$num";
            $result=$connection->query($sql4);
                if($result->num_rows>0){ 
                    while($ligne = $result->fetch_assoc()){
                        if ($optype=="Verser"){
                            $ligne['solde']=$ligne['solde']+$mt;
                        }else if($optype=="Retirer")
                                $ligne['solde']=$ligne['solde']-$mt;
                                $new= $ligne['solde'];
                        
             
                    }
            $sql5 = "UPDATE compte SET solde=$new WHERE idcompte=$num";
             $result=$connection->query($sql5);
             echo "<script> alert('Compte mis à jour');</script>";
                }

                                       

       }
                        ?>
    <p style="text-align:right; color:red;text-decoration:underline">Groupe A: Prénom Nom </p>
    </fieldset>
    </form>