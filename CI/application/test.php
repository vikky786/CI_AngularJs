<IfModule mod_rewrite.c>
  RewriteEngine On
  
	RewriteCond %{REQUEST_FILENAME} !-f
	RewriteCond %{REQUEST_FILENAME} !-d
	RewriteRule ^(.*)$ index.php/$1 [L]
</IfModule>

<IfModule !mod_rewrite.c>
  # If we don't have mod_rewrite installed, all 404's
  # can be sent to index.php, and everything works as normal.
  # Submitted by: ElliotHaughin
  ErrorDocument 404 /index.php
</IfModule>