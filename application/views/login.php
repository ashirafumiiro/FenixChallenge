<div style="color: #990000">
    <?php echo validation_errors(); ?>
</div>

<?php echo form_open('welcome/login'); ?>

<label for="id">Employee ID</label>
<input type="text" name="id" /><br />

<label for="password">PassWord</label>
<input name="password" type="password" /><br />
<p style="color: red;" ><?php echo $error_info?></p>
<input type="submit" name="submit" value="Login" />

</form>
