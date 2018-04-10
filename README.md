# frameduz-materialize-component

Library Frameduz untuk membuat komponen form versi materialize

## Usage
```php
<?php
    use Frameduz\Materialize;
    
    echo Materialize::inputText('username', 'text', 'class="form-control"', 'placehoder="Username"');
    echo Materialize::inputText('password', 'password', 'class="form-control"', 'placehoder="Password"');
    echo Materialize::inputSelect('user_level', array('admin' => 'Administrator', 'user' => 'User'), 'user', 'class="form-control"');
?>
```

# License
Read [MIT License](LICENSE)