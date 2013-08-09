<nav id="side">
    <ul>
        <li id="menu">~ menu </li>
        <?php 
            foreach($sections as $section){
                echo '<li><a href="' . $fullpath . '/menu/' . $section['name'] . '">' . $section['name' ] . '</a></li>';   
            }
        ?>
    </ul>
</nav>
