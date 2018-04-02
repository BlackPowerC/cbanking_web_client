<?php
/**
 * Created by PhpStorm.
 * User: jordy
 * Date: 27/03/18
 * Time: 22:37
 */
?>
<div id="operation-pan" class="tab-pan fade">
    <div class="card">
        <div class="card-body">
            <?php
            echo form_open("banking/operation");
            ?>
                <!-- Type de transaction -->
                <div class="form-group">
                    <select name="type" title="Type d'opération" class="form-control">
                        <option value="0">Dépot</option>
                        <option value="1">Retrait</option>
                    </select>
                </div
                <!-- Numero de compte -->
                <div class="form-group">
                <select title="Numero de compte" class="form-control" name="id_account">
                    <?php
                    if(array_key_exists('accounts', $customer))
                    {
                        foreach($customer['accounts'] as $account)
                        {?>
                            <option value="<?php echo $account['id'] ;?>"><?php echo $account['id'] ;?></option>
                        <?php
                        }
                    }
                    ?>
                </select>
                </div>
                <!-- Montant de la transaction -->
                <div class="form-group">
                    <?php
                    echo form_input([
                            "name"=>"balance",
                            "type"=>"number",
                            "placeholder"=>"Montant",
                            "class"=>"form-control",
                            "title"=>"Montant de la transaction"
                    ]) ;
                    // Champ caché pour l'id du client
                    echo form_hidden("id_customer", $customer['id']);
                ?>
                </div>
                <input style="width: 100%" id="btn-submit" class="btn btn-primary" type="submit" value="Envoyer" />
            </form>
        </div>
    </div>
</div>
