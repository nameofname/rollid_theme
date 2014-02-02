<?php

$description = get_option('seo_description');
$keywords = get_option('seo_keywords');

$form_action = $_SERVER['REQUEST_URI'];

?>

<br />
<form method='post' action="<?php echo $form_action ?>">

    <label for="description" class="col-sm-2 control-label">Description</label>
    <br />
    <textarea name="description" placeholder="Description"><?php echo $description ?></textarea>

    <br />
    <br />

    <label for="keywords" class="col-sm-2 control-label">Key Words</label>
    <br />
    <textarea name="keywords" placeholder="Key Words"><?php echo $keywords ?></textarea>

    <br />
    <br />

    <input type="submit" value="submit" />

</form>
