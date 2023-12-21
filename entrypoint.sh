#!/bin/bash

service memcached start >/dev/null 2>&1

# Проверить код возврата ('$?' содержит код возврата последней выполненной команды)
if [ $? -eq 0 ]; then
    echo "Memcached started successfully!"
else
    echo "Failed to start Memcached. Check logs for details."
fi

/usr/sbin/apache2ctl -D FOREGROUND