; <?php /*
; WARNING: Do not change the line above
; $Id: 682df2d916b6c1bf460bd853774cca045ab715db $ 
;
; +-------------------------------------+
; |   LiteCommerce configuration file   |
; +-------------------------------------+
;
; -----------------
;  About this file
; -----------------
;

;
; ----------------------
;  SQL Database details
; ----------------------
;
[database_details]
hostspec = "@db_host@"
socket   = "@db_socket@"
port     = "@db_port@"
database = "@db_database@"
username = "@db_username@"
password = "@db_password@"
persistent = @db_persistent@
table_prefix = "@db_table_prefix@"

;
; ----------------------
;  Cache settings
; ----------------------
;
[cache]
; Type of cache used. Can take auto, memcache, apc, xcache, file values.
type=file
; Cache namespace
namespace=XLite
; List of memcache servers. Semicolon is used as a delimiter.
; Each server is specified with a host name and port number, divided
; by a colon. If the port is not specified, the default
; port 112211 is used.
servers=

;
; -----------------------------------------------------------------------
;  LiteCommerce HTTP & HTTPS host and web directory where cart installed
; -----------------------------------------------------------------------
;
; NOTE:
; You should put here hostname ONLY without http:// or https:// prefixes
; Do not put slashes after the hostname
; Web dir is the directory in the URL, not the filesystem path
; Web dir must start with slash and have no slash at the end
; The only exception is when you configure for the root of the site,
; in which case you write single slash in it
;
; WARNING: Do not set the "$" sign before the parameter names!
;
; EXAMPLE 1:
;
;   http_host = "www.yourhost.com"
;   https_host = "www.securedirectories.com/yourhost.com"
;   web_dir = "/shop"
;
; will result in the following URLs:
;
;   http://www.yourhost.com/shop
;   https://www.securedirectories.com/yourhost.com/shop
;
;
; EXAMPLE 2:
;
;   http_host = "www.yourhost.com"
;   https_host = "www.yourhost.com"
;   web_dir = "/"
;
; will result in the following URLs:
;
;   http://www.yourhost.com/
;   https://www.yourhost.com/
;
[host_details]
http_host = "@host_http@"
https_host = "@host_https@"
web_dir = "@host_webdir@"


;
; -----------------
;  Logging details
; -----------------
;
[log_details]
type = file
name = "var/log/xlite.log.php"
level = PEAR_LOG_WARNING
ident = "XLite"
suppress_errors = On
suppress_log_errors = Off

;
; Skin details
;
[skin_details]
skin = drupal
inifile = "layout.ini"
locale = en

;
; Profiler settings
;
[profiler_details]
enabled = Off
process_widgets = On
xdebug_log_trace = Off
eta = On

[recorder]
record_queries = off

[debug]
mark_templates = off

[images]
default_image = "images/no_image.png"
default_image_width = 140
default_image_height = 140
unsharp_mask_filter_on_resize = off

;
; ----------------------
;  PHP settings
; ----------------------
;
[php_settings]
memory_limit = "32M"

;
; Installer authcode.
; A person who do not know the auth code can not access the installation script.
; Installation authcode is created authomatically and stored in this section.
;
[installer_details]
auth_code = ""

;
; Some options to optimize the store
;
[performance]
developer_mode = Off

[marketplace]
url = '@marketplace_url@'

;
; Other options
;
[other]
; Translation drive code - auto / gettext / db
translation_driver = auto
; Use checkout throught SSL connection or not
ssl_checkout = on

; WARNING: Do not change the line below
; */ ?>
