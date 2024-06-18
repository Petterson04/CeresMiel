
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Document</title>
        </head>
        <body>
        <table>

                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Usuario</th>
                        <th>fecha</th>
                        <th>consulta</th>
                        <th>contraconsulta</th>
                    </tr>
                </thead>
                 <tbody>
                    <?php
                    include ("base.php");
                    $sql= mysqli_query($conect,"SELECT * FROM bitacora");

                    while($row = mysqli_fetch_array($sql)){?>
                    <tr>
                      <td><?php echo $row['Id'] ?></td>
                      <td><?php echo $row['Usuario'] ?></td>
                      <td><?php echo $row['fecha'] ?></td>
                      <td><?php echo $row['consulta'] ?></td>
                      <td><?php echo $row['contraconsulta'] ?></td>
                    </tr>
                    <?php }?>
                  </tbody>
            </table>
    
        </body>
        </html>
            