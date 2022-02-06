<html>
    <head>        
        <link rel="stylesheet" href="/domotica/desktop.css">
        <link rel="apple-touch-icon" href="images/apple-touch-icon.png">
        <meta name="apple-mobile-web-app-capable" content="yes" />
        <meta name="apple-mobile-web-app-status-bar-style" content="black" />
    </head>
    <body>
        <?php
        require_once("./config.php");
        require_once("./functions.php");
        require_once("./classes/button.php");
        require_once("./buttons_and_members.php");

        $button = new button();
        $lines = load_variables_from_rfxcmd_log($rfxcmd_log);
        foreach ($lines as $line) {
            eval($line);            
        }

        $accessoiries = hb_get_accessoiries();

        if (isset($buttons[$button->getId()])) {
            $mybutton = $buttons[$button->getId()];
            $members = $mybutton["members"];
            foreach ($members as $member) {
                foreach ($accessoiries as $accesoirie) {
                    if (trim($accesoirie->serviceName) == trim($member)) {
                        $uniqueId = $accesoirie->uniqueId;
                        hb_put_accessoiries($uniqueId, $button->getCommand());
                    }
                }
            }
        }
        ?>
    </body>
</html>