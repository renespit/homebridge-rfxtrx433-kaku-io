# homebridge-rfxtrx433-kaku-io
This script makes the status of kaku-switches visible in homebridge (io)  

Requirements:

    HomeBridge
    Klik Aan Klik Uit Switches 
    Klik Aan Klik Uit ISC-1000
    PHP Installed on a Linux server
    RFXTRX433 on the same Linux server

Step 1:

Make a list of kaku-switches you have installed in your house. Each switch has an Id. You can find the Id by using the file rfxcmd.py ( http://www.rfxcom.com/epages/78165469.sf/nl_NL/?ObjectPath=/Shops/78165469/Categories/Downloads ).
On the commandline you can run:

    /usr/bin/python2.7 /home/rene/rfxcmd/rfxcmd_gc/rfxcmd.py  -l -v -d /dev/ttyUSB1

After pushing the button you get bellow output:

    ------------------------------------------------
    Received		= 0B 11 00 00 00 38 51 F7 02 01 0F 80
    Date/Time		= 2022-02-06 17:25:10
    Packet Length		= 0B
    Packettype		= Lighting2
    Subtype			= AC
    Seqnbr			= 00
    Id			= 003851F7
    Unitcode		= 2
    Command			= On
    Dim level		= 100%
    Signal level		= 8

Step 2:

Inside homebridge you gave every lamp a name. Put in the list which button turns on or off what lamp. One switch can operate more then one lamp.
In my case switch with id 003851F7 operates a lamp downstairs and one lamp upstairs.
Put that in the list **buttons_and_members.json**,

    "003851F7": {
            "members": [
                "Beneden overloop", 
                "Boven overloop"
            ]
        }

Step 3:

Start commandline-script start_read_write_clicks.sh with sudo rights:

    sudo ./start_read_write_clicks.sh

This command start 2 separate jobs on your server:

    nohup ./loop_sync.sh &
    nohup ./read_rfxtrx433.sh & 
        
The first job keeps reading the http://localhost/domotica/sync_button_homebridge.php webpage then next job keeps reading the /dev/ttyUSB0 or /dev/ttyUSB1 device and put the output in a log file. 

