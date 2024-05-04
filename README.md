iframe-tabs core
=======
# laravel-admin iframe-tabs

## Installation

Run :

```
$ composer require tungnt/iframe-tabs "@dev"
```

Then run:

```
$ php artisan vendor:publish --tag=iframe-tabs

$ php artisan admin:import iframe-tabs
```

## Update it

```
php artisan vendor:publish --tag=iframe-tabs --force
```

This will override css and js files to `/public/vendor/laravel-admin-ext/iframe-tabs/`

## Config

Add a config in `config/admin.php`:

```php
    'extensions' => [
        'iframe-tabs' => [
           // Set to `false` if you want to disable this extension
            'enable' => true,
            // The controller and action of dashboard page `/admin/dashboard`
            'home_action' => App\Admin\Controllers\HomeController::class . '@index',
            // Default page tab-title
            'home_title' => 'Home',
            // Default page tab-title icon
            'home_icon' => 'fa-home',
            // Whether show icon befor titles for all tab
            'use_icon' => true,
            // dashboard css
            'tabs_css' =>'vendor/laravel-admin-ext/iframe-tabs/dashboard.css',
            // layer.js path
            'layer_path' => 'vendor/laravel-admin-ext/iframe-tabs/layer/layer.js',
            /**
             * href links do not open in tab .
             * selecter : .sidebar-menu li a,.navbar-nav>li a,.sidebar .user-panel a,.sidebar-form .dropdown-menu li a
             * if(href.indexOf(pass_urls[i]) > -1) //pass
             */
            'pass_urls' => ['/auth/logout', '/auth/lock'],
            // When login session state of a tab-page was expired , force top-level window goto login page .
            //Login timeout is whether to force the entire page to jump to the login page. If set to false, it will only jump to the page that triggers the timeout login, and the open page will be retained to the maximum extent.
            'force_login_in_top' => true,
            // tabs left offset
            'tabs_left'  => 42,
            // bind click event of table actions [edit / view / create]  
            'bind_urls' => 'popup', //[ popup / new_tab / none]
            //table actions dom selecter, [view / edit / create]buttons ,and any thing has class pupop : <a class="pupop" popw="400px" poph="200px" href="someurl">mylink</a>
            'bind_selecter' => 'a.grid-row-view,a.grid-row-edit,.column-__actions__ ul.dropdown-menu a,.box-header .pull-right .btn-success,.popup',
            //layer popup size
            'layer_size' => '1100px,98%',
            // if run web in `cli` mode ,for example `swoole` ,set it to true，如果是以命令行方式运行网站，如`swoole` 就设置为 true
            'web_in_cli' => false
        ]
    ],

```

 If `bind_urls` set to `popup` or `new_tab` , recommend `disableView` and `disableList` in form
    `/Admin/bootstrap.php`  :
```php
    Tungnt\Admin\Form::init(function ($form) {
        $form->tools(function ($tools) {
            $tools->disableDelete();
            $tools->disableView();
            $tools->disableList();
        });
    });
```


 
And `disableEdit` and `disableList` in show :
```php
   $show->panel()
   ->tools(function ($tools) {
       $tools->disableEdit();
       $tools->disableList();
       $tools->disableDelete();
   });;
```

## Lang


Add a lang config in `resources/lang/{zh-CN}/admin.php`

```php
'iframe_tabs' => [
    'oprations' => 'Tab operation',
    'refresh_current' => 'refresh current',
    'close_current' => 'Close current',
    'close_all' => 'Close all',
    'close_other' => 'Close other',
    'open_in_new' => 'open in a new window',
    'open_in_pop' => 'Pop-up window opens',
    'scroll_left' => 'Scroll to far left',
    'scroll_right' => 'Scroll to the right',
    'scroll_current' => 'scroll to current',
    'goto_login' => 'Login timeout, redirecting to login page...'
],
```

## Usage

Open `http://your-host/admin`

Thanks to https://github.com/bswsfhcw/AdminLTE-With-Iframe

License

---

