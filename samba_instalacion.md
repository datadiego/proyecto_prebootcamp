# Instalar samba

sudo apt update
sudo apt install samba

sudo nano /etc/samba/smb.conf

Añade tu recurso a compartir:
[shared]
   path = /var/www/html
   available = yes
   valid users = usuario
   read only = no
   browsable = yes
   public = yes
   writable = yes

Asigna permisos:
sudo chown -R usuario:usuario /home/usuario/shared

Crea tu usuario, te preguntará que contraseña quieres usar:
sudo smbpasswd -a usuario

Permisos firewall:
sudo ufw allow samba
sudo ufw reload

Reinicia samba:
sudo systemctl restart smbd
sudo systemctl restart nmbd

Check:
testparm

Para acceder desde windows:
En el explorador de archivos aparecerá en la sección "Red", si no sale, puedes hacer click en la barra superior y acceder a \\<IP>\nombre_carpeta_compartida

Para acceder desde Ubuntu:
Abre Nautilus, tu explorador de archivos.
Ve a "Otras ubicaciones"
En la barra inferior, entra en smb://<IP>/recurso_compartido

En ambos te pediran el nombre de usuario y contraseña para acceder.



