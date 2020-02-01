<?php
include 'init.php';
?>
<table style="background-color: #0c0c0c; color: #fff;">
    <thead>
      <tr >
        <th class="text-center">Redni broj</th>
        <th class="text-center">Naziv tima</th>
        <th class="text-center">Meceva ukupno</th>
        <th class="text-center">Poena</th>
      </tr>
    </thead>
    <tbody>
      <?php
          $timovi = $db->rawQuery("select *,(m.golovaDatih - m.golovaPrimljenih) as golRazlika from tabela m join tim t on m.timID=t.timID join grad g on t.gradID=g.id order by m.brojPoena desc");
          $brojac = 0;
          foreach ($timovi as $tim) {
            $brojac++;
            ?>
                <tr>
                    <td><?php echo($brojac); ?></td>
                    <td><?php echo($tim["nazivTima"]); ?></td>
                    <td><?php echo($tim["ukupnoUtakmica"]); ?></td>
                    <td><?php echo($tim["brojPoena"]); ?></td>
                </tr>
            <?php
          }
       ?>
    </tbody>
</table>


<br><br>
<button class="btn btn-danger" onclick="generisiPitanja()">Postavi jos neko pitanje</button>