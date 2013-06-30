<?php

// uncomment the following to define a path alias
//Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'汤迪官网',
  'homeUrl'=>'http://www.tangdy.com',
	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
		'application.components.payment.*',
		'application.components.widgets.*',	
		'application.components.widgets.default.*',
		'application.extensions.*',
		'application.extensions.image.*',
		'application.extensions.phpmail.*',
		'application.extensions.ipconvert.*',
		'application.extensions.LinkListPager.*',
		'application.extensions.yiidebugtb.*',
		'application.extensions.excel.*',
		'application.extensions.excel.PHPExcel.*',
		'application.extensions.libchart.*',
		'application.helpers.*',
	),

	'language'=>'zh_cn',
	'theme'=>'default',
	'modules'=>array(
		// uncomment the following to enable the Gii tool
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'Wneddr!Gt@Vza9Iu1W2eer',
		 	// If removed, Gii defaults to localhost only. Edit carefully to taste.
			//'ipFilters'=>array('127.0.0.1','::1'),
		),
		"comment"=>array(
				'layout'=> 'application.modules.comment.views.layouts.main',
		),

	),

	// application components
	'components'=>array(
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
			'loginUrl'=>array('site/login'),
		),
	/*
        'cache'=>array(
            'class'=>'system.caching.CMemCache',
                'servers'=>array(
                   array('host'=>'192.168.1.100', 'port'=>12000, 'weight'=>60),
                   //array('host'=>'server2', 'port'=>11211, 'weight'=>40),
                ),
        ),
	
      */
		// uncomment the following to enable URLs in path-format

		'urlManager'=>array(
			'urlFormat'=>'path',
			'urlSuffix'=>'.shtml',
			'showScriptName'=>false,
			'rules'=>array(

			 ),
			),
			'request'=>array(
          'enableCookieValidation'=>true,
        	'enableCsrfValidation'=>false,
      ),
        
			'authManager'=>array(
         'class'=>'CDbAuthManager',//认证类名称
         'defaultRoles'=>array('guest'),//默认角色
         'itemTable' => 'tr_authitem',//认证项表名称
         'itemChildTable' => 'tr_authitemchild',//认证项父子关系
         'assignmentTable' => 'tr_authassignment',//认证项赋权关系
       ),
       
		

		// uncomment the following to use a MySQL database
		'db'=>array(
		  'class'=>'system.db.CDbConnection',
			'connectionString' => 'mysql:host=localhost;dbname=tdcms',
			'emulatePrepare'=> true,
			'username' => 'tdcms',
			'password' => 'tdcms@2013',
			'charset' => 'utf8',
			'tablePrefix'=>'tr_',
			'schemaCachingDuration'=>3600,
		),
		'errorHandler'=>array(
          'errorAction'=>'error/error404',
      ),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning,trace',
				),
				
                array( // configuration for the toolbar
                    'class'=>'XWebDebugRouter',
                    'config'=>'alignLeft, opaque, runInDebug, fixedPos, collapsed, yamlStyle', 
                    'levels'=>'error, warning, trace, profile, info',
                    'allowedIPs'=>array('127.0.0.1','::1','192.168.1.54','192\.168\.1[0-5]\.[0-9]{3}'),
                ),
                
                                
	/*
								 array(
                    'class'=>'CWebLogRoute',
                    'levels'=>'trace',     //级别为trace
                    'categories'=>'system.db.*' //只显示关于数据库信息,包括数据库连接,数据库执行语句
          
                 ),
                 
                 */
           
				// uncomment the following to show log messages on web pages
				/*
				array(
					'class'=>'CWebLogRoute',
				),
				*/
			),
		),
		/*
		'cache'=>array(
            'class'=>'system.caching.CMemCache',
            'servers'=>array(
                array('host'=>'server1', 'port'=>11211, 'weight'=>60),
                array('host'=>'server2', 'port'=>11211, 'weight'=>40),
            ),
        ),
   */
     'cache'=>array(
            'class'=>'system.caching.CFileCache',
     ),

    'request'=>array(
          'enableCookieValidation'=>true,
        	'enableCsrfValidation'=>false,
    ),
		'session'=>array(
			'class'=>'CDbHttpSession',
			'connectionID' => 'db',
      'sessionTableName' => 'dbsession',
		 ),

		'image'=>array(
            'class'=>'application.extensions.image.CImageComponent',
            'driver'=>'GD', 
        ),
	),

 'params'=>array(
	   'web_salt'=>'artEr#@119tA35vB&*',
	   'default_password'=>'admin_123456',
	   'web_domain'=>'.tangdy.com',
	),
	
/*
	'clientScript'=>array(
     'scriptMap'=>array(
      'global.css'=>'/assets/56c897c1/global.css',
     ),
   ),
*/


);
