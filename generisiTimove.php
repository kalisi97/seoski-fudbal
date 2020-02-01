<?php
include 'init.php';
?>
<ul style="background-color: #0c0c0c; color: #fff;">
      <?php
          $timovi = $db->get("tim");
          $brojac = 0;
          foreach ($timovi as $tim) {
            $brojac++;
            ?>
                <li><?php echo($brojac); ?> : <?php echo($tim["nazivTima"]); ?></li>
            <?php
          }
       ?>
</ul>

<br><br>
<button class="btn btn-danger" onclick="generisiPitanja()">Postavi jos neko pitanje</button>