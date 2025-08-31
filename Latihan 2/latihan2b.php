<!DOCTYPE html>
<html>
    <body>
        <table border="1" cellpadding="5" cellspacing="0">
            <tr>
                <th>NIM</th>
                <th>Nama</th>
                <th>Umur</th>
            </tr>
            <?php
            $i = 1;
            while ($i<=5):
            ?>
            <tr>
                <td>2415111</td>
                <td>Ihsan</td>
                <td>18</td>
            </tr>
            <?php
                $i=$i+1;
            endwhile;
            ?>
        </table>
    </body>
</html>