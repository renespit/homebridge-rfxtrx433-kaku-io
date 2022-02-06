while [ 1 -eq 1 ]
do
	wget -O /dev/null -o /dev/null http://unifi.oplan.nl/domotica/sync_button_homebridge.php > /dev/null
	sleep .2
done

