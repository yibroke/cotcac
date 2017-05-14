
<div class="container">
    <h1>HMCV - Test mudules first function... is running.</h1>
    <p>
        Welcome to Codeigniter framework. This is the already set up framework. With include. 
    </p>


    <h3>Bootstrap</h3>

    <h3>Jquery</h3>

    <h3>Libraries</h3>
    <p>
        - MY_Form_validation<br>
        - Reuse_model_function will call models/Reuse_model<br>
        - Time_ago<br>
    </p>
    <h3>Helper</h3>
    <p>
        - tags_helper<br>
        - url_sel_helper<br>
    </p>
    <h3>Pagination</h3>
    <p>
        - Pagination in config file.
    </p>
    <h3>Config</h3>
    <p>
        - Autoload<br>
    <pre>$autoload['libraries'] = array('database','session','Time_ago','Reuse_model_function');</pre>
    <pre>$autoload['helper'] = array('form','url','html');</pre>
    - Config<br>
    <pre>$config['base_url'] = 'http://localhost/funenglish/';
   //$config['base_url'] = 'real host';</pre>
    <pre>$config['index_page'] = '';</pre>
    - Email
    <pre>
        $config['protocol'] = 'smtp';
        $config['smtp_host'] = 'ssl://smtp.mail.yahoo.com';
        $config['smtp_port'] = 465;
        $config['smtp_user'] = 'servernoreply@yahoo.com';
        $config['smtp_pass'] = 'admin1234@';
        $config['mailtype'] = 'html';
        $config['charset'] = 'iso-8859-1';
        $config['newline'] = "\r\n";
    </pre>
    - Pagination
    - Routes
    <pre>$route['default_controller'] = 'test/test/first';</pre>

</p>

<h3>Htaccass</h3>
<p>
<pre>RewriteEngine On
RewriteCond %{REQUEST_URI} ^system.*
RewriteCond $1 !^(index\.php|images|js|uploads|css|robots\.txt)
RewriteRule ^(.*)$ /index.php/$1 [L]
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule ^(.*)$ index.php?/$1 [L]
</pre>

</p>
<h3>Modules</h3>
<p>
    - COPYTHIS<BR>
    - user<br>
    - test<br>
    - contror<br>
    - site_security<br>
    - template<br>
    - dashboard<br>
    - comment<br>
    - page<br>
    - category<br>
    - about<br>
</p>
<h3>Editor</h3>
<p>
    - CKeditor<br>
    - tinymce (with upload image extentions) <br>
    + include 3 folder(filemanager,source,thumbs)
</p>

</div>