## Nagios

### Instalación

Instalamos los paquetes necesarios:
`sudo apt install -y build-essential libgd-dev libssl-dev apache2 php libapache2-mod-php libperl-dev libpq-dev libmysqlclient-dev`

Creamos un usuario y grupo "nagios", añade un usuario adicional "nagcmd" para comandos externos:

```bash
sudo useradd nagios
sudo groupadd nagcmd
sudo usermod -a -G nagcmd nagios
sudo usermod -a -G nagcmd www-data
```

Descarga nagios core:

```bash
cd /tmp
wget https://github.com/NagiosEnterprises/nagioscore/releases/download/nagios-4.4.9/nagios-4.4.9.tar.gz
tar -xzf nagios-4.4.9.tar.gz
cd nagios-4.4.9
```

Compila e instala:

```bash
./configure --with-command-group=nagcmd
make all
sudo make install
sudo make install-commandmode
sudo make install-init
sudo make install-config
sudo make install-webconf
```

Configura tu correo electronico para las notificaciones:

```bash
sudo nano /usr/local/nagios/etc/objects/contacts.cfg
```

Añade tu email en la linea del usuario "nagiosadmin".

## Configuración en apache

Ve a tu maquina con apache, reinicia el servicio:

```bash
sudo a2enmod rewrite
sudo a2enmod cgi
sudo systemctl restart apache2
```
Instala los plugins de nagios:

```bash
cd /tmp
wget https://nagios-plugins.org/download/nagios-plugins-2.3.3.tar.gz
tar -xzf nagios-plugins-2.3.3.tar.gz
cd nagios-plugins-2.3.3
./configure --with-nagios-user=nagios --with-nagios-group=nagios
make
sudo make install
```

Inicia el sistema y configuralo para arrancarlo automaticamente con la maquina:

```bash
sudo systemctl enable nagios
sudo systemctl start nagios
```

## Acceso a nagios

En tu navegador, entra en `http://<ip_servidor>/nagios`

## Configurar autenticación

```bash
sudo htpasswd -c /usr/local/nagios/etc/htpasswd.users nagiosadmin
```
