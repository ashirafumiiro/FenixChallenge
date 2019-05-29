<h1>Fill in the Required information below</h1>
<p>Balance: <?php echo ($user['points_accrued']-$user['points_used']);?></p>
<form class="form-horizontal" method="post">
    <div class="form-group">
        <label class="control-label col-sm-2" for="points">Points to Request: </label>
        <div class="col-sm-10">
            <input type="text" class="form-control"
                   name="points"
                   value="<?php echo $points;?>" id="points" placeholder="Enter points below your balance">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" for="reason">Reason:</label>
        <div class="col-sm-10">
            <input type="text" class="form-control"
                   name="reason" id="reason" placeholder="Enter Reason"
                   value="<?php echo $res;?>" required>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" for="password">Confirm Password:</label>
        <div class="col-sm-10">
            <input type="password" class="form-control"
                   name="password" id="password" placeholder="Enter Password"
                    required>
        </div>
    </div>
    <div style="color: red;" ><?php echo validation_errors()?></div>
    <div style="color: red;" ><?php echo $error_message;?></div>

    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>

</form>