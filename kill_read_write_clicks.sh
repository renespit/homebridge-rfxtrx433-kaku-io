kill -9 `ps -ef | grep read_rfxtrx | grep -v grep | awk '{print $2}'`
kill -9 `ps -ef | grep loop_sync | grep -v grep | awk '{print $2}'`
