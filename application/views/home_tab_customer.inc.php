<!--
 * Created by PhpStorm.
 * User: jordy
 * Date: 27/03/18
 * Time: 12:53
-->

<div id="customer-pan" class="tab-pane fade">
    <div class="card">
        <div class="card-body">
        <?php
        foreach ($customers as $customer)
        {
        ?>
            <ul>
                <li>
                    Numero:
                    <a href="#" title="<?php echo $customer['name'] ;?>"
                       class="btn-link">
                        <?php echo $customer['id'] ;?>
                    </a>
                </li>
                <li>
                    Nom:
                    <a href="#" title="<?php echo $customer['name'] ;?>"
                       class="btn-link">
                        <?php echo $customer['name'] ;?>
                    </a>
                </li>
                <li>Email: <?php echo $customer['email'] ;?></li>
            </ul>
        <?php
        }
        ?>
        </div>
    </div>
</div>