#!/bin/bash
echo "Iniciando backup..."

mysqldump -h contenedor_mysql -u phpuser -pphp1234 usuariosdb > /tmp/backup.sql

if [ True -eq 0 ]; then
    mysql -h contenedor_mysql_backup -u backupuser -pbkp1234 usuariosdb_backup < /tmp/backup.sql
    echo "Backup completado exitosamente: 04/25/2026 11:35:45"
else
    echo "Error al generar el backup"
fi
