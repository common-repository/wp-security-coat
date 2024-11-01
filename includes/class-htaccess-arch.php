<?php

class htaccessarch {

    
    private $block_fake_bots;
    
    private $cross_site_protection;
        
    private $iframing_protection;
        
    private $content_sniffing_protection;
        
    private $disallow_indexing_files;
        
    private $disable_xml_rpc_file;
        
    private $protect_system_files;
        
    private $protect_sql_injection;
        
    private $block_suspicious_http_methods;
    
    
    	public static function block_fake_bots(){
	
            $block_fake_bots = "\n#Block fake robots and human scans - Wp Security Coat\n";
            $block_fake_bots .= "<IfModule mod_rewrite.c>
    RewriteEngine On
    RewriteCond %{QUERY_STRING} http\:\/\/www\.google\.com\/humans\.txt\? [NC]
    RewriteRule .* - [F,L]
</IfModule>\n";
            
            
            return $block_fake_bots;
            
	}
	
		// disallow indexing of files functionality
	public static function disallow_indexing_files(){
	
            $disallow_indexing_files = "\n#Block Indexing of Server Files - Wp Security Coat\n";
            $disallow_indexing_files .= "Options -Indexes \n";
            
            
            return $disallow_indexing_files;
            
	}
	
        public static function cross_site_protection(){
	
            $cross_site_protection = "\n#cross site protection - Wp Security Coat\n";
            $cross_site_protection .= "<IfModule mod_headers.c>
Header set X-XSS-Protection \"1; mode=block\"
</IfModule>\n";
            
            
            return $cross_site_protection;
            
	}
	
        public static function content_sniffing_protection(){
	
            $content_sniffing_protection = "\n#Block Content sniffing - Wp Security Coat\n";
            $content_sniffing_protection .= "<IfModule mod_headers.c>
Header set X-Content-Type-Options nosniff
</IfModule>\n";
            
            
            return $content_sniffing_protection;
            
	}
	
	public static function iframing_protection(){
	
            $iframing_protection = "\n#Click jacking protection, iframing - Wp Security Coat\n";
            $iframing_protection .= "<IfModule mod_headers.c>
Header always append X-Frame-Options SAMEORIGIN
</IfModule>\n";
            
            
            return $iframing_protection;
            
	}
	
		public static function block_suspicious_http_methods(){
	
            $block_suspicious_http_methods = "\n#Block unsafe and suspicious http methods - Wp Security Coat\n";
            $block_suspicious_http_methods .= "<IfModule mod_rewrite.c>
    RewriteEngine On
    # Filter Request Methods - Wp Security Coat 
    RewriteCond %{REQUEST_METHOD} ^(TRACE|DELETE|TRACK) [NC]
    RewriteRule ^.* - [F]
    
    #deny POST request using HTTP 0.9 / 1.0 - Wp Security Coat
    RewriteCond %{THE_REQUEST} ^POST(.*)HTTP/(0\.9|1\.0)$ [NC]
    RewriteRule .* - [F,L]
</IfModule>\n";
            
            
            return $block_suspicious_http_methods;
            
	}
	
	
        public static function protect_sql_injection(){
	
            $protect_sql_injection = "\n#Protect From Sql Injection - Wp Security Coat\n";
            $protect_sql_injection .= "<IfModule mod_rewrite.c>
    RewriteEngine On
    # Filter Non-English Characters - Wp Security Coat
    RewriteCond %{QUERY_STRING} %[A-F][0-9A-F] [NC]
    RewriteRule ^.* - [F]

    # Filter Suspicious Query Strings in the URL - Wp Security Coat
    RewriteCond %{QUERY_STRING} \.\.\/ [OR]
    RewriteCond %{QUERY_STRING} \.(bash|git|hg|log|svn|swp|cvs) [NC,OR]
    RewriteCond %{QUERY_STRING} etc/passwd [NC,OR]
    RewriteCond %{QUERY_STRING} boot\.ini [NC,OR]
    RewriteCond %{QUERY_STRING} ftp: [NC,OR]
    RewriteCond %{QUERY_STRING} https?: [NC,OR]
    RewriteCond %{QUERY_STRING} (<|%3C)script(>|%3E) [NC,OR]
    RewriteCond %{QUERY_STRING} mosConfig_[a-zA-Z_]{1,21}(=|%3D) [NC,OR]
    RewriteCond %{QUERY_STRING} base64_decode\( [NC,OR]
    RewriteCond %{QUERY_STRING} %24&x [NC,OR]
    RewriteCond %{QUERY_STRING} 127\.0 [NC,OR]
    RewriteCond %{QUERY_STRING} (globals|encode|localhost|loopback) [NC,OR]
    RewriteCond %{QUERY_STRING} (request|concat|insert|union|declare) [NC,OR]
    RewriteCond %{QUERY_STRING} %[01][0-9A-F] [NC]
    RewriteCond %{QUERY_STRING} !^loggedout=true
    RewriteCond %{QUERY_STRING} !^action=jetpack-sso
    RewriteCond %{QUERY_STRING} !^action=rp
    RewriteCond %{HTTP_COOKIE} !wordpress_logged_in_
    RewriteCond %{HTTP_REFERER} !^http://maps\.googleapis\.com
    RewriteRule ^.* - [F]   
    
</IfModule>\n";
            
            
            return $protect_sql_injection;
            
	}
	
	public static function protect_system_files(){
	
            $protect_system_files = "\n#protect system Files - Wp Security Coat\n";
            $protect_system_files .= "\n#protect wordpress core files
<IfModule mod_rewrite.c>
    RewriteEngine On
    RewriteRule ^wp-admin/install\.php$ - [F]
    RewriteRule ^wp-admin/includes/ - [F]
    RewriteRule !^wp-includes/ - [S=3]
    RewriteRule ^wp-includes/[^/]+\.php$ - [F]
    RewriteRule ^wp-includes/js/tinymce/langs/.+\.php - [F]
    RewriteRule ^wp-includes/theme-compat/ - [F]
</IfModule>

#protect files inside root directory
<files .htaccess>
    <IfModule mod_authz_core.c>
        Require all denied
    </IfModule>
    <IfModule !mod_authz_core.c>
        Order allow,deny
        Deny from all
    </IfModule>
</files>
<files readme.html>
    <IfModule mod_authz_core.c>
        Require all denied
    </IfModule>
    <IfModule !mod_authz_core.c>
        Order allow,deny
        Deny from all
    </IfModule>
</files>
<files wp-config.php>
    <IfModule mod_authz_core.c>
        Require all denied
    </IfModule>
    <IfModule !mod_authz_core.c>
        Order allow,deny
        Deny from all
    </IfModule>
</files>
<files readme.txt>
    <IfModule mod_authz_core.c>
        Require all denied
    </IfModule>
    <IfModule !mod_authz_core.c>
        Order allow,deny
        Deny from all
    </IfModule>
</files>\n";
            
            
            return $protect_system_files;
            
	}
	
	public static function disable_xml_rpc_file(){
	
	
	$disable_xml_rpc_file = "\n#Disable XML-RPC File - Wp Security Coat\n";
	$disable_xml_rpc_file  .= "<files xmlrpc.php>
    <IfModule mod_authz_core.c>
        Require all denied
    </IfModule>
    <IfModule !mod_authz_core.c>
        Order allow,deny
        Deny from all
    </IfModule>
</files>\n";
	
	return $disable_xml_rpc_file;
	
	
	}


}
?>