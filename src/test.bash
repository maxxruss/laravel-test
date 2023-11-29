php artisan -q migrate
if [ $? -eq 0 ]; then
    echo "Команда выполнена успешно"
else
    echo "Ошибка выполнения команды"
fi
