while [ 1 -eq 1 ]
do
	wget -O /dev/null -o /dev/null http://localhost/domotica/sync_button_homebridge.php > /dev/null
	sleep .2
done

