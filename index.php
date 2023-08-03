<!DOCTYPE html>
<html>
<head>
    <title>Function Execution</title>
</head>
<body>
    <h1>Function Execution in New Windows and Tabs</h1>
    <?php
    // Function to be executed in the new windows or tabs.
    function yourFunctionName() {
        // Replace this with the actual function logic you want to execute.
        $message = "Function executed with same window/tab at: " . date("Y-m-d H:i:s") . PHP_EOL;

        // Write the message to a file named "log.txt".
        file_put_contents("log.txt", $message, FILE_APPEND);
    }

    // The number of times to repeat the function execution.
    $repeatTimes = 100;

    // Get the current execution count from the URL query parameter (if any).
    $executionCount = isset($_GET['count']) ? intval($_GET['count']) : 0;

    // Execute the function if the current execution count is less than the desired repeat times.
    if ($executionCount < $repeatTimes) {
        // Delay for 2 seconds using JavaScript before executing the function.
        echo '<script type="text/javascript">';
        echo 'setTimeout(function() {';
        echo 'window.location.href = "index.php?count=' . ($executionCount + 1) . '";';
        echo '}, 2000);';
        echo '</script>';

        yourFunctionName();
    }
    ?>
</body>
</html>
