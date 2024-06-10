<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $command = $_POST['command'];
    $allowed_commands = [
        'pkg install git -y',
        'pkg install php -y',
        'pkg install curl -y',
        'git clone https://github.com/DomathID/spam-sms.git',
        'cd spam-sms',
        'php gas.php'
    ];

    if (in_array($command, $allowed_commands)) {
        $output = shell_exec($command . ' 2>&1');
        echo htmlentities($output, ENT_QUOTES, 'UTF-8');
    } else {
        echo 'Command not allowed.';
    }
} else {
    echo 'Invalid request method.';
}
?>
