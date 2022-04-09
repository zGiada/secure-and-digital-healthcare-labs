<?php include("fetch_backend.php"); ?>
<!DOCTYPE html>
<html>

<head>
    <title>Admin - Lab 4 - SDH</title>
    <meta charset="UTF-8">
    <meta name="author" content="Giada Zuccolo, matr. 2055702">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="administrator page with access log">
    <meta name="keywords" content="spotify,admin,access,log">
    <link rel="stylesheet" href="/css/style.css" type="text/css">
    <link rel="icon" type="image/x-icon" href="/img/icon.png">
</head>

<body>
    <div class="header">
        <h1>BACKEND</h1>
        <h3>CHECK USERS LOGS</h3>
    </div>
    <div class="index_get">
        <h2>LOGS GET LOGIN</h2>
        <table>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>MD5 Password</th>
                <th>Last Access</th>
            </tr>
            <?php
            if (is_array($fetchData)) {
                $sn = 1;
                foreach ($fetchData as $data) {
                    if ($data['type_log'] == "GET") {
            ?>
                        <tr>
                            <td><?php echo $sn; ?></td>
                            <td><?php echo $data['username'] ?? ''; ?></td>
                            <td><?php echo $data['md5_pwd'] ?? ''; ?></td>
                            <td><?php echo $data['last_access'] ?? ''; ?></td>
                        </tr>
                <?php
                        $sn++;
                    }
                }
            } else { ?>
                <tr>
                    <td colspan="8">
                        <?php echo $fetchData; ?>
                    </td>
                <tr>
                <?php
            } ?>
        </table>
    </div>
    <div class="index_post">
        <h2>LOGS POST LOGIN</h2>
        <table>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>MD5 Password</th>
                <th>Last Access</th>
            </tr>
            <?php
            if (is_array($fetchData)) {
                $sn = 1;
                foreach ($fetchData as $data) {
                    if ($data['type_log'] == "POST") {
            ?>
                        <tr>
                            <td><?php echo $sn; ?></td>
                            <td><?php echo $data['username'] ?? ''; ?></td>
                            <td><?php echo $data['md5_pwd'] ?? ''; ?></td>
                            <td><?php echo $data['last_access'] ?? ''; ?></td>
                        </tr>
                <?php
                        $sn++;
                    }
                }
            } else { ?>
                <tr>
                    <td colspan="8">
                        <?php echo $fetchData; ?>
                    </td>
                <tr>
                <?php
            } ?>
        </table>
    </div>
    <div class="footer">
        <p>SPOTIFY LOGIN © Zuccolo Giada, matr. 2055702 - LAB 4<br><a href="/index.html">Go to HOME</a></p>
    </div>
</body>

</html>