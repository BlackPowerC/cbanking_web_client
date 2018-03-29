<?php
/**
 * Created by PhpStorm.
 * User: jordy
 * Date: 27/03/18
 * Time: 22:37
 */
?>
<div id="info-pan" class="tab-pan fade">
    <div class="card">
        <div class="card-body">
            <?php
            if(array_key_exists('accounts', $customer))
            {
                foreach($customer['accounts'] as $account)
                {
                ?>
                    <ul>
                        <li>Numero de compte: <?php echo $account['id'] ;?></li>
                        <li>Date de création: <?php echo $account['creationDate'] ;?></li>
                        <li>Solde: <?php echo $account['balance'] ;?></li>
                    </ul>
                <?php
                }
            }
            else
            {

            }
            ?>
        </div>
    </div>
</div>