# FACS/Markup 2.0 (formerly UQMarkup)

This is the initial release of the Markup / FACS server source code.  Please note that this is an initial release of a codebase which was built to support a research project and thus the codebase is at a very immature stage of development.  

This guide is intended as a process for installing the UQMarkup server software in a university
environment.

## Requirements

The UQMarkup server has been designed to work on a CentOS platform. Any linux platform may b!e appropriate, but has not been tested.
CentOS

*	Apache 2
*	PHP 5.3
*	MySQL

## Installation Process

Install CentOS (recommended space 150GB)

	The UQMarkup server has been designed to work on a CentOS platform. Any linux platform may b!e appropriate, but has not been tested.

Install Services:

*	Apache2 (httpd)
*	PHP (httpd bridge)
*	MySQL
*	Sendmail (or other apache compatible mail client)
*	SSHD
*	Webdav (via httpd)

You will also need to install some Unix tools for doing audio conversion (see /www/webdav/convert.sh):

*	faad
*	lame

Configure Server:

*	The server requires a public hostname (eg: uqmarkup.ceit.uq.edu.au)
*	SSH is highly recommended to be configured with apache (https)

Open ports (only http (80) and https (443) should be accessible globally):
*	22/tcp open ssh
*	25/tcp open smtp
*	80/tcp open http
*	111/tcp open rpcbind
*	443/tcp open https
*	631/tcp open ipp
*	3306/tcp open mysql
*	8080/tcp open http-proxy

Configure directories (see the source code):

*	root:root /var/www - This should be the apache working directory (htdocs)
*	root:root /var/www/html/index.php - This should perform a redirect to the UQMarkup installation directory
*	root:root /var/www/html/{uqmarkup directory} - This is where the UQMarkup files should be stored
*	root:root /var/www/webdav - This is where the UQMarkup assignments are stored

Configure Apache:

*	Webdav must be enabled
*	Mod_Rewrite must be enabled
*	SSL.conf must be setup (with webdav)! Webdav configuration (ssl.conf)

WEBDAV FOR UPLOADS

	Alias /uploads /var/www/webdav/uploads!
	<Location /uploads>
		DAV On
		Options Indexes MultiViews
		AuthType Basic
		AuthName "Please authenticate with your university credentials"
		AuthBasicProvider ldap
		AuthLDAPURL "ldap://..." NONE
		AuthLDAPGroupAttributeIsDN on
		Require valid-user
	</Location>
	RewriteEngine On
	RewriteLog /var/log/httpd/rewrite.log
	RewriteLogLevel 2
	RewriteRule ^/webdav$ /webdav/ [R=301]
	RewriteCond %{LA-U:REMOTE_USER} (.*)
	RewriteRule ^/uploads(.*) /var/www/webdav/uploads/%{LA-U:REMOTE_USER}$1
	
Import SQL into MySQL

*	Create uqmarkup database
*	Import tables from uqmarkup_schema.sql
*	Configure UQMarkup

Configure /app/Config/database.php for MySQL settings 

	(rename from database.default.php)

Configure /app/Controllers/Component/LdapComponent.php for LDAP settings 
	
	(rename from LdapComponent.default.php)
	
Contact uqadekke@uq.edu.au to add the FACS installation address to be added to the UQMarkup/FACS iPad application.