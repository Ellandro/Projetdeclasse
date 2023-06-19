<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Liste des utilisateurs</h1>
    <table>
        <thead>
            <tr>
                <th> Nom <span class="icon-arrow">&UpArrow;</span></th>
                <th> Prenom<span class="icon-arrow">&UpArrow;</span></th>
                <th> Type <span class="icon-arrow">&UpArrow;</span></th>
                <th> Order Date <span class="icon-arrow">&UpArrow;</span></th>
                <th> Status <span class="icon-arrow">&UpArrow;</span></th>
            </tr>
        </thead>
        <tbody>
            <?php 
                foreach ($les_utilisateurs as $user) {
                    echo("
                        <tr>
                            <td> $user[id_utilisateur] </td>
                            <td> $user[login] </td>
                            <td> $user[pwd] </td>
                            <td> <strong>$user[role]</strong></td>
                            <td> $user[email] </td>
                        </tr>
                    ");
                }
            ?>

            
    </tbody>
    </table>

</body>
</html>