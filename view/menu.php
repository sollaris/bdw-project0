<section>
<?php 
    foreach($items as $item)
	{
        echo "<h5>$item[title]</h5>";
        if (!empty($item['description'])) echo "<h6>( $item[description] )</h6>";
        echo "<form action='$fullpath/add2cart' method='post'>";
        echo '<select name="order">';
        $options = $item->option;
        if (count($options) == 1)
		{
			echo "<option value='($sectionname) $item[title]::$options[price]' selected='selected'>$"."$options[price]</option>";
        }
        else
		{
            echo "<option value='' selected='selected'>-----------</option>";
            foreach($options as $option)
			{
				echo "<option value='($sectionname) $item[title]:$option[type]:$option[price]'>$option[type] $"."$option[price]</option>";
            }
        }
        echo '</select> &nbsp;&nbsp;';
        echo '<select name="qty"><option value="" selected="selected">qty</option>'; 
        for($i=1;$i<11;$i++)
		{
			echo "<option value='$i'>$i</option>";
        }
        echo '</select> &nbsp;&nbsp;';
        echo '<input name="action" type="submit" value="order"></form>';
    }    
?>
</section>
