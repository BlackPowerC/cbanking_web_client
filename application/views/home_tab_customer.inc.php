<!--
 * Created by PhpStorm.
 * User: jordy
 * Date: 27/03/18
 * Time: 12:53
-->

<div id="customer-pan" class="tab-pane fade">
    <form>
        <div class="form-group">
            <input id="search-form" type="text" class="form-control" name="search" placeholder="rechercher" />
        </div>
    </form>
    <div class="card">
        <div class="card-body">
            <?php
            if(!is_null($customers['json']))
            {
                foreach ($customers['json'] as $customer)
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
                        <a href="banking?id_customer=<?php echo $customer['id'] ;?>" title="<?php echo $customer['name'] ;?>"
                            class="btn-link">
                            <?php echo $customer['name'] ;?>
                        </a>
                    </li>
                    <li>Email: <?php echo $customer['email'] ;?></li>
                </ul>
                <?php
                }
            }
            else
            {?>
                <div class="alert alert-info">Aucun client n'est inscrit dans la banque !</div>
            <?php
            }
            ?>
        </div>
    </div>
</div>