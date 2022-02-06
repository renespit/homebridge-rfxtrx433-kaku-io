# homebridge-rfxtrx433-kaku-io
This script makes the status of kaku-switches visible in homebridge (io)  

Step 1:

Make a list of kaku-switches you have installed in your house. Each switch has an Id. You can find the Id by using the file rfxcmd.py ( http://www.rfxcom.com/epages/78165469.sf/nl_NL/?ObjectPath=/Shops/78165469/Categories/Downloads ).
On the commandline you can run: **/usr/bin/python2.7 /home/rene/rfxcmd/rfxcmd_gc/rfxcmd.py  -l -v -d /dev/ttyUSB1**

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


