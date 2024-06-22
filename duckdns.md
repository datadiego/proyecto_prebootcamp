# DuckDNS

Inicia sesión en duckDNS, esto te dará acceso a tu token de identificación.
Añade un dominio de duckDNS, deberia detectar automaticamente la ip actual si tienes un servidor corriendo, en caso contrario, ingresa tu ip actual.

DuckDNS utiliza crontab para actualizar la ip de nuestro servidor, tambien necesitarás curl, en caso de no tenerlos:

Crea una carpeta, crea un archivo `duck.sh` en su interior:

```
echo url="https://www.duckdns.org/update?domains=<DOMINIO>&token=<TOKEN>&ip=" | curl -k -o ~/duckdns/duck.log -K -
```

Sustituye dominio y token por los que tengas en duckDNS.

Otorga permisos de ejecucion con `chmod 700 duck.sh`.

Vamos a usar crontab para ejecutar el script cada 5 minutos, usa `crontab -e` para ejecutar crontab, elige un editor de texto y pega la siguiente configuracion:

```
*/5 * * * * ~/duckdns/duck.sh >/dev/null 2>&1
```

Puedes guardar el cron, y comprobar que el script funciona con `./duck.sh`, devuelve OK en caso positivo, y KO en caso negativo.

