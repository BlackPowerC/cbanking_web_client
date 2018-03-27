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
        foreach ($subordinates as $subordinate)
        {
        ?>
            <ul>
                <li>Numero: <?php echo $subordinate['id'] ;?></li>
                <li>Nom: <?php echo $subordinate['name'] ;?></li>
                <li>Email: <?php echo $subordinate['email'] ;?></li>
            </ul>
        <?php
        }
        ?>
        </div>
    </div>
</div>