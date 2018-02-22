<!DOCTYPE html>
<?php
require 'includes/helpers.php';
require 'includes/index-logic.php';
?>
<html lang='en'>
<head>
    <title>Bill Splitter</title>
    <meta charset="utf-8"/>
    <link rel="stylesheet"
          href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
          crossorigin="anonymous">

    <link href='css/styles.css' rel='stylesheet'>

</head>
<body>
<div class='container'>
    <div class='row'>
        <h1>Bill Splitter</h1>
        <div class='panel panel-default'>
            <form method='GET'>
                <div class='panel-body form-horizontal payment-form'>
                    <div class='form-group required'>
                        <label class='col-sm-6 control-label'>Split how many ways?</label>
                        <div class='col-sm-3'>
                            <input type='number'
                                   class='form-control' name='noOfPeople'
                                   required
                                   min='1'
                                   value='<?php if ($noOfPeople) echo $noOfPeople ?>'/>
                        </div>
                        <label class='col-sm-6 control-label'>How much was the tab?</label>
                        <div class='col-sm-3'>
                            <input type='number'
                                   class='form-control' name='amount'
                                   required
                                   step='0.01'
                                   min='1'
                                   value='<?php if ($amount) echo $amount ?>'/>
                        </div>
                    </div>
                    <label class='col-sm-6 control-label'>How was the service?</label>
                    <div class='col-sm-3'>
                        <select class='form-control' name='service'>
                            <option value='0' <?php if ($service == '0') echo 'selected' ?>>No Tip Required</option>
                            <option value='10' <?php if ($service == '10') echo 'selected' ?>>Bad 10%</option>
                            <option value='15' <?php if ($service == '15') echo 'selected' ?>>Average 15%</option>
                            <option value='18' <?php if ($service == '18') echo 'selected' ?>>Good 18%</option>
                            <option value='20' <?php if ($service == '20') echo 'selected' ?>>Great 20%</option>
                            <option value='25' <?php if ($service == '25') echo 'selected' ?>>Super 25%</option>
                        </select>
                    </div>
                    <label class='col-sm-6 control-label'>Round up?</label>
                    <div class='col-sm-1'>
                        <input type='checkbox'
                               class='form-control'
                               name='roundUp' <?php if ($roundUp) echo 'checked' ?>/><br/>
                    </div>
                    <div class='col-sm-12'>
                        <p class='warning'>* required fields</p>
                    </div>
                    <div class='col-sm-4'></div> <!-- dirty way to center the button until I figure it out better way -->
                    <div class='col-sm-4'>
                    <input type='submit' value='Calculate' class='btn btn-primary brn-lg submitButton'/><br/>
                    </div>
                    <div class='col-sm-12 result'>
                        <?php if (isset($results)) : ?>
                            <?php if ($noOfPeople > 1) : ?>
                                <p>Everyone owes $<?= $results ?> each.</p>
                            <?php else : ?>
                                <p>You owe $<?= $results ?>.</p>
                            <?php endif ?>
                        <?php else : ?>
                            <p>Please enter the total amount and how many ways to split!</p>
                        <?php endif ?>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>