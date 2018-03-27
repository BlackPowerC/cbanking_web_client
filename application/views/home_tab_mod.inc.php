<!--
 * Created by PhpStorm.
 * User: jordy
 * Date: 27/03/18
 * Time: 12:43
-->

<div id="mod-pan" class="tab-pan fade">
    <div class="card">
        <div class="card-body">
        <?php
        echo validation_errors('<div class="alert alert-warning">', '</div>') ;
        echo form_open("") ;
        ?>
            <fieldset>
                <!-- Pseudo -->
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Saisir pseudo" name="pseudo" required="" />
                </div>
                <!-- Email -->
                <div class="form-group">
                    <input type="e-mail" class="form-control" placeholder="Saisir adresse électonique" name="email" required="" />
                </div>
            </fieldset>
            <input style="width: 100%" id="btn-submit" class="btn btn-primary" type="submit" value="Envoyer" />
        </form>
        </div>
    </div>
</div>