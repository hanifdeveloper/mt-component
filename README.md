# frameduz-bootstrap-component

Library Frameduz untuk membuat komponen form versi bootstrap

## Usage
```php
<?php
    use Frameduz\Bootstrap;
    
    echo Bootstrap::inputText('username', 'text', 'class="form-control"', 'placehoder="Username"');
    echo Bootstrap::inputText('password', 'password', 'class="form-control"', 'placehoder="Password"');
    echo Bootstrap::inputSelect('user_level', array('admin' => 'Administrator', 'user' => 'User'), 'user', 'class="form-control"');
?>
```

# License
Read [MIT License](LICENSE)