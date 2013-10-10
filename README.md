#Phundament 3 - Widgets

P3WidgetsModule provides basic Content Management System (CMS) functionality
through a widget container for frontend-editing and a backend for managing
widget properties and content.

A widget container tags its contents (widgets) by its id, the current controller
and action and optionally also by a request parameter.

When you edit a widget you can specify its type (see config value
modules[p3widgets].params[widgets]), its attributes by editing them with a
built-in JSON editor and its content by editing it with a built-in ckeditor.

Database schema setup is done easily with yiic migrate.

##Resources

 * [Project page](https://github.com/schmunk42/p3widgets/)
 * [Download](https://github.com/schmunk42/phundament/archives/master)
 * [Join discussion](http://www.yiiframework.com/forum/index.php?/topic/20092-module-p3widgets/)
 * [Try out a demo](http://demo.phundament.com/3.0-dev) (register an account by e-mail)
 * [Report a bug](https://github.com/schmunk42/p3widgets/issues)
 * [Phundament on github](https://github.com/schmunk42/phundament/) 
 * [Website](http://phundament.com)

Addon: [In-depth thread about general module management and a Yii-based CMS](http://www.yiiframework.com/forum/index.php?/topic/17591-planning-yii-cms-a-different-approach/)

##Requirements

 * Yii 1.1.8
 * Database (tested with SQLite and MySQL)



##Installation

1) 
Extract into 'p3widgets'.


2)
Create a webapp by running

~~~
cd p3widgts
/path/to/yii/framework yiic webapp .
~~~


3)
Import database schema with yiic.
Note: This command will create an own migration table for this module, it will
not disturb your application migration table! Use your application yiic command.

~~~
> protected/yiic migrate \
    --migrationPath=application.modules.p3widgets.migrations \
    --migrationTable=migration_module_p3widgets
~~~

4) 
Add contents from 'p3widgets/config/main.php' to the corresponding part in your
application configuration.

~~~
return CMap::mergeArray(
    require(dirname(__FILE__).'/../modules/p3widgets/config/main.php'),
    ...
~~~

Available widgets from Yii, zii and yiiext:

~~~
	'modules' => array(
		'p3widgets' => array(
			'params' => array(
				'widgets' => array(
					'zii.widgets.CMenu' => 'Menu',
					'zii.widgets.CPortlet' => 'Portlet',
					'ext.yiiext.widgets.fancybox.EFancyboxWidget' => 'Fancy Box',
					'ext.yiiext.widgets.cycle.ECycleWidget' => 'Cycle',
					'CFlexWidget' => 'Flex Widget',
					'ext.yiiext.widgets.swfobject.ESwfobjectWidget' => 'SWF Object',
					'ext.yiiext.widgets.lipsum.ELipsum' => 'Lorem Ipsum Text',
				)
			)
		)
	),
~~~


5)
Open /p3widgets/default/test or add a P3WidgetContainer to a view.

~~~
[php]
    $this->widget(
        'p3widgets.components.P3WidgetContainer',
        array(
            'id'=>'main',
            'checkAccess'=>false // disable checkAccess feature for debugging, default 'P3widgets.Widget.*'
            )
    );
~~~
Note: You should only disable the 'checkAccess' feature for debugging or testing.
Make sure containers on the same page have different values for 'id'.



##Usage

When logged in as 'admin' you should see a grey box around the containers and
widgets with admin controls when you hover them.
You can drag and drop widgets between containers.
To move widgets across pages, edit their values for controller, action or
requestParam.



##Widget Examples

Widget class and content

###CWidget

~~~
[html]
<h1>Hello World!</h1>
~~~


###ECycleWidget

~~~
[html]
<p><img src="http://static.flickr.com/66/199481236_dc98b5abb3_s.jpg" width="75" height="75" alt="" /></p>
<p><img src="http://static.flickr.com/75/199481072_b4a0d09597_s.jpg" width="75" height="75" alt="" /></p>
<p><img src="http://static.flickr.com/57/199481087_33ae73a8de_s.jpg" width="75" height="75" alt="" /></p>
<p><img src="http://static.flickr.com/77/199481108_4359e6b971_s.jpg" width="75" height="75" alt="" /></p>
~~~


###EFancyBoxWidget

~~~
[html]
<a id="example1" href="http://farm5.static.flickr.com/4058/4252054277_f0fa91e026.jpg"><img alt="example1" src="http://farm5.static.flickr.com/4058/4252054277_f0fa91e026_m.jpg" /></a>
<a id="example2" href="http://farm3.static.flickr.com/2489/4234944202_0fe7930011.jpg"><img alt="example2" src="http://farm3.static.flickr.com/2489/4234944202_0fe7930011_m.jpg" /></a>
<a id="example3" href="http://farm3.static.flickr.com/2647/3867677191_04d8d52b1a.jpg"><img alt="example3" src="http://farm3.static.flickr.com/2647/3867677191_04d8d52b1a_m.jpg" /></a>
~~~

Widgets taken from http://code.google.com/p/yiiext/
Examples from jQuery demo pages.



##Known Issues

If you have widgets which have a custom `assetsUrl` property (eg. `FancyBoxWidget`), it is recommended to set this 
value to `NULL` with a skin file, to avoid conflicts with changing values in development and production environment.

> Note: If you're using themes, define the skin file in the theme which is active for `p3widgets/p3Widget/...`.


Error: `include(LoggableBehavior.php): failed to open stream: No such file or directory
Fix: import class in config `vendor.sammaye.auditrail2.behaviors.LoggableBehavior`

##Screenshots
![Backend](http://demo.phundament.com/pub/p3widgets/p3widgets-0.1-01.png "Backend")
![Frontend](http://demo.phundament.com/pub/p3widgets/p3widgets-0.1-02.png "Frontend")


##Developer

~~~
git clone --recursive git://github.com/schmunk42/p3widgets.git \
  protected/modules/p3widgets
git clone --recursive git://github.com/schmunk42/p3extensions.git \
  protected/extensions/p3extensions
git clone --recursive https://github.com/schmunk42/gii-template-collection \
  protected/extensions/gtc
~~~


##Contact
Tobias Munk  
phundament@usrbin.de  
http://phundament.com
