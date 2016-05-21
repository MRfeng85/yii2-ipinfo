Yii2 Ip 归属地查询

现整合了淘宝,腾讯,新浪三个查询API接口，后期会增加其他接口

安装步骤：

1、下载安装
<pre>
	$ php composer.phar require mrfeng/ipinfo "*"
</pre>
或者在composer.json中添加一下配置
<pre>
	mrfeng/ipinfo "*"
</pre>
然后运行 
<pre>
composer update
</pre>

2、配置
<pre>
return [
    'components' => [
            'ipinfo' => [            
                // 淘宝API
                'class' => 'mrfeng\ipinfo\TaoBaoIpInfo',
        ]
    ],
];
</pre>
或
<pre>
return [
    'components' => [
            'ipinfo' => [            
                // 腾讯API
                'class' => 'mrfeng\ipinfo\QQIpInfo',
        ]
    ],
];
</pre>
或
<pre>
return [
    'components' => [
            'ipinfo' => [            
                // SINA API
                'class' => 'mrfeng\ipinfo\SinaIpInfo',
        ]
    ],
];
</pre>
3、应用
<pre>
	Yii::$app->ipinfo->getinfo('127.0.0.1');//查询指定的IP地址
</pre>
会返回一个IP归属地的字符串
