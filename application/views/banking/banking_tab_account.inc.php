<?php
/**
 * Created by PhpStorm.
 * User: jordy
 * Date: 27/03/18
 * Time: 22:37
 */
?>
<!-- Panneau de création d'un compte -->
<div id="account-pan" class="tab-pan fade">
    <div class="card">
        <div class="card-body">
            <?php
            echo form_open("banking/create");
            // Montant initial
            echo '<div class="form-group">';
            echo form_input([
                "name"=>"balance",
                "type"=>"number",
                "placeholder"=>"Montant initial",
                "class"=>"form-control"
            ]) ;
            echo '</div>' ;
            ?>
            <!-- Type de compte -->
            <div class="form-group">
            <select class="form-control" id="type" name="type">
                <option value="0" selected="selected">Compte courant</option>
                <option value="1">Compte d'épargne</option>
            </select>
            </div>
            <?php
            // Champ caché pour l'id du client
            echo form_hidden("id_customer", $id_customer);
            // Extra: découvert ou taux
            echo '<div class="form-group">';
            echo form_input([
                    "id"=>"extra",
                    "name"=>"extra",
                    "type"=>"number",
                    "placeholder"=>"Découvert",
                    "class"=>"form-control"
            ]) ;
            echo '</div>' ;
            ?>
            <script>
                var type = document.getElementById("type") ;
                var extra = document.getElementById("extra") ;
                type.addEventListener('change', function ()
                {
                    if(type.options[type.selectedIndex].getAttribute("value") == "0")
                    {
                        extra.setAttribute('placeholder', "Découvert")
                    }
                    else if(type.options[type.selectedIndex].getAttribute("value")== "1")
                    {
                        extra.setAttribute('placeholder', "Taux")
                    }
                    else
                    {
                        extra.setAttribute('placeholder', "")
                    }
                }) ;
            </script>
            <input style="width: 100%" id="btn-submit" class="btn btn-primary" type="submit" value="Envoyer" />
            </form>
        </div>
    </div>
</div>
