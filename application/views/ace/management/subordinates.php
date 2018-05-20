<div class="widget-box transparent">
    <div class="widget-header widget-header-small">
        <h4 class="widget-title blue smaller">
            <i class="ace-icon fa fa-rss orange"></i>
            Listes des subordonnés
            <?php $this->load->view("ace/print.inc.php") ; ?>
        </h4>
    </div>
    <?php
    if(!is_null($employees) && count($employees) > 0)
    {
        ?>
        <table class="table table-stripped">
            <thead>
            <tr>
                <td>Détails</td>
                <td>Nom</td>
                <td>Prénom</td>
                <td>Email</td>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach($employees as $employee)
            {?>
                <tr>
                    <td>
                        <a title="Détails de l'employé" href="<?php echo "subordinate/{$employee['id']}" ?>">
                            <i class="fa fa-eye fa-2x"></i>
                        </a>
                    </td>
                    <td><?php echo $employee['name']; ?></td>
                    <td><?php echo $employee['surname']; ?></td>
                    <td><?php echo $employee['email']; ?></td>
                    <td>
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
            <a href="<?php echo base_url()."index.php/management/subscription"; ?>">Inscrire un subordonné !</a>
        </div>
        <?php
    }
    ?>
