<div class="widget-box transparent">
    <div class="widget-header widget-header-small">
        <h4 class="widget-title blue smaller">
            <i class="ace-icon fa fa-rss orange"></i>
            Listes des Clients
        </h4>
    </div>
    <?php
    if($customers['json'] != NULL)
    {
        ?>
        <table class="table table-stripped">
            <thead>
            <tr>
                <td>Détails</td>
                <td>Nom</td>
                <td>Prénom</td>
                <td>Email</td>
                <td>Action</td>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach($customers['json'] as $customer)
            {?>
                <tr>
                    <td>
                        <a title="Détails du client" href="<?php echo "customer/{$customer['id']}" ?>">
                            <i class="fa fa-eye fa-2x"></i>
                        </a>
                    </td>
                    <td><?php echo $customer['name']; ?></td>
                    <td><?php echo $customer['surname']; ?></td>
                    <td><?php echo $customer['email']; ?></td>
                    <td>
                        <a title="Créer un compte" href="<?php echo "../banking/create/{$customer['id']}" ?>">
                            <i class="fa fa-plus fa-2x"></i>
                        </a>
                    </td>
                </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
        <?php
    }
    else
    {?>
        <div class="alert alert-info">
            Aucun client n'est inscrit dans la banque.
        </div>
        <?php
    }
    ?>
