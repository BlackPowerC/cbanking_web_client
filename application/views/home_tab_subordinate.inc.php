<!--
 * Created by PhpStorm.
 * User: jordy
 * Date: 27/03/18
 * Time: 12:43
-->

<div id="subordinate-pan" class="tab-pane fade">
    <div class="card">
        <div class="card-body">
        <?php
            if(!is_null($subordinates['json']) and count($subordinates['json']) > 0)
            {
                foreach ($subordinates['json'] as $subordinate)
                {
                ?>
                    <ul>
                        <li>Numero: <?php echo $subordinate['id'] ;?></li>
                        <li>Nom: <?php echo $subordinate['name'] ;?></li>
                        <li>Email: <?php echo $subordinate['email'] ;?></li>
                    </ul>
                <?php
                }
            }
            else
            {?>
                <div class="alert alert-info">Vous n'avez aucun subordonné !</div>
            <?php
            }
        ?>
        </div>
    </div>
</div>