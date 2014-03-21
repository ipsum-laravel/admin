<h2>Fichier de log</h2>
<?= Form::open(array('route' => 'admin.log', 'class' => "saisie")) ?>
    <fieldset >
        <legend>erreurs</legend>
        <p>
            <label for="log" >Fichier d'erreurs</label>
            <textarea style="display: block; width: 90%; height: 500px;"  name="log" id="log" ><?= $log ?></textarea>
        </p>
    </fieldset>

        <div class="bloc_left">
            <p>
                <label for="submit">&nbsp;</label>
                <input class="submit" name="enregistrer" type="submit" value="Enregistrer" />
            </p>
    </div>
</form>