<?php
return [
    'adminEmail' => 'admin@example.com',
    'supportEmail' => 'support@example.com',
    'senderEmail' => 'noreply@example.com',
    'senderName' => 'Example.com mailer',
    'user.passwordResetTokenExpire' => 3600,
    'ICP_CODE' => '蜀ICP备2020037144号',
    'qiniu_config' => [
        'domain' => 'cdn.yimuyuan.xin',
        'ak' => 'lcm9geiBRO7G9KePmiGRG8tDAqbEY7Aqzgb3Z4p6',
        'sk' => 'Z2dqvRExvtf_YfK8aP4yiqNMQjRopqfIRF_AQSwG',
        'bucket' => 'yimuyuan',
    ],
    'aliyun_config' => [
        'accessKeyId' => 'LTAI5t7FX1pfCkFcbk69vkbU',
        'accessKeySecret' => 'kka1LWrpMAwW6CTdDfmfb67DCIkTsU',
        'endpoint' => 'http://oss-cn-chengdu.aliyuncs.com',
        'ossUrl' => 'https://tools-gray-resource.oss-cn-chengdu.aliyuncs.com',
        'bucket' => 'tools-gray-resource',
    ],
    'baidu_cloud' => [
        'ip_address' => [
            'AccessKey' => '45430055c372416f8e9d66900c1d42e6',
            'AppCode' => '81077e6c597f4ae0ad60d3903d43e4c1',
            'requestUrl' => 'https://ipaddquery.api.bdymkt.com/ip/query',
        ],
        'phone_address' => [
            'AccessKey' => '45430055c372416f8e9d66900c1d42e6',
            'AppCode' => '81077e6c597f4ae0ad60d3903d43e4c1',
            'requestUrl' => 'https://hcapi02.api.bdymkt.com/mobile',
        ],
        'idcard_address' => [
            'AccessKey' => '45430055c372416f8e9d66900c1d42e6',
            'AppCode' => '81077e6c597f4ae0ad60d3903d43e4c1',
            'requestUrl' => 'https://qryidcard.api.bdymkt.com/lundear/qryidcard',
        ],
    ],
    'roll_tool_api' => [
        'app_id' => 'hicmmmoeqnrpgcuj',
        'app_secret' => 'WlBuMXFQK0RRRXYzei9SdUltTmxoUT09',
        'beian_url' => 'https://www.mxnzp.com/api/beian/search',
        'short_link' => 'https://www.mxnzp.com/api/shortlink/create',
        'idcard_address' => 'https://www.mxnzp.com/api/idcard/search',
        'oil_price' => 'https://www.mxnzp.com/api/oil/search',
    ],
];
