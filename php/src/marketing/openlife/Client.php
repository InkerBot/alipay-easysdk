<?php

// This file is auto-generated, don't edit it. Thanks.

namespace Alipay\EasySDK\Marketing\OpenLife;

use AlibabaCloud\Tea\Tea;
use AlibabaCloud\Tea\Request;
use AlibabaCloud\Tea\Exception\TeaError;
use AlibabaCloud\Tea\Exception\TeaUnableRetryError;
use Alipay\EasySDK\Kernel\BaseClient;

use Alipay\EasySDK\Marketing\OpenLife\Models\method;
use Alipay\EasySDK\Marketing\OpenLife\Models\Template;
use Alipay\EasySDK\Marketing\OpenLife\Models\Text;

class Client extends BaseClient{
    protected $_name = [];

    private $_getConfig;

    private $_isCertMode;

    private $_getTimestamp;

    private $_sign;

    private $_getMerchantCertSN;

    private $_getAlipayRootCertSN;

    private $_toUrlEncodedRequestBody;

    private $_readAsJson;

    private $_getAlipayCertSN;

    private $_extractAlipayPublicKey;

    private $_verify;

    private $_toRespModel;

    private $_getSdkVersion;


    public function createImageTextContent($title, $cover, $content, $contentComment, $ctype, $benefit, $extTags, $loginIds){
        $_runtime = [
            "connectTimeout" => 15000,
            "readTimeout" => 15000,
            "retry" => [
                "maxAttempts" => 0
            ]
        ];
        $_lastRequest = null;
        $_now = time();
        $_retryTimes = 0;
        while (Tea::allowRetry($_runtime["retry"], $_retryTimes, $_now)) {
            if ($_retryTimes > 0) {
                $_backoffTime = Tea::getBackoffTime($_runtime["backoff"], $_retryTimes);
                if ($_backoffTime > 0) {
                    Tea::sleep($_backoffTime);
                }
            }
            $_retryTimes = $_retryTimes + 1;
            try {
                $_request = new Request();
                $systemParams = [
                    "method" => "alipay.open.public.message.content.create",
                    "app_id" => $this->_getConfig("appId"),
                    "timestamp" => $this->_getTimestamp(),
                    "format" => "json",
                    "version" => "1.0",
                    "alipay_sdk" => $this->_getSdkVersion(),
                    "charset" => "UTF-8",
                    "sign_type" => $this->_getConfig("signType"),
                    "app_cert_sn" => $this->_getMerchantCertSN(),
                    "alipay_root_cert_sn" => $this->_getAlipayRootCertSN()
                ];
                $bizParams = [
                    "title" => $title,
                    "cover" => $cover,
                    "content" => $content,
                    "could_comment" => $contentComment,
                    "ctype" => $ctype,
                    "benefit" => $benefit,
                    "ext_tags" => $extTags,
                    "login_ids" => $loginIds
                ];
                $textParams = [];
                $_request->protocol = $this->_getConfig("protocol");
                $_request->method = "POST";
                $_request->pathname = "/gateway.do";
                $_request->headers = [
                    "host" => $this->_getConfig("gatewayHost"),
                    "content-type" => "application/x-www-form-urlencoded;charset=utf-8"
                ];
                $_request->query = array_merge([
                    "sign" => $this->_sign($systemParams, $bizParams, $textParams, $this->_getConfig("merchantPrivateKey"))],
                    $systemParams);
                $_request->body = $this->_toUrlEncodedRequestBody($bizParams, $textParams);
                $_lastRequest = $_request;
                $_response= Tea::send($_request, $_runtime);
                $respMap = $this->_readAsJson($_response, "alipay.open.public.message.content.create");
                if ($this->_isCertMode()) {
                    if ($this->_verify($respMap, $this->_extractAlipayPublicKey($this->_getAlipayCertSN($respMap)))) {
                        return $this->_toRespModel($respMap);
                    }
                }
                else {
                    if ($this->_verify($respMap, $this->_getConfig("alipayPublicKey"))) {
                        return $this->_toRespModel($respMap);
                    }
                }
                throw new TeaError([
                    "message" => "验签失败，请检查支付宝公钥设置是否正确。"
                ]);
            }
            catch (\Exception $e) {
                if (Tea::isRetryable($e)) {
                    continue;
                }
                throw $e;
            }
        }
        throw new TeaUnableRetryError($_lastRequest);
    }

    public function modifyImageTextContent($contentId, $title, $cover, $content, $couldComment, $ctype, $benefit, $extTags, $loginIds){
        $_runtime = [
            "connectTimeout" => 15000,
            "readTimeout" => 15000,
            "retry" => [
                "maxAttempts" => 0
            ]
        ];
        $_lastRequest = null;
        $_now = time();
        $_retryTimes = 0;
        while (Tea::allowRetry($_runtime["retry"], $_retryTimes, $_now)) {
            if ($_retryTimes > 0) {
                $_backoffTime = Tea::getBackoffTime($_runtime["backoff"], $_retryTimes);
                if ($_backoffTime > 0) {
                    Tea::sleep($_backoffTime);
                }
            }
            $_retryTimes = $_retryTimes + 1;
            try {
                $_request = new Request();
                $systemParams = [
                    "method" => "alipay.open.public.message.content.modify",
                    "app_id" => $this->_getConfig("appId"),
                    "timestamp" => $this->_getTimestamp(),
                    "format" => "json",
                    "version" => "1.0",
                    "alipay_sdk" => $this->_getSdkVersion(),
                    "charset" => "UTF-8",
                    "sign_type" => $this->_getConfig("signType"),
                    "app_cert_sn" => $this->_getMerchantCertSN(),
                    "alipay_root_cert_sn" => $this->_getAlipayRootCertSN()
                ];
                $bizParams = [
                    "content_id" => $contentId,
                    "title" => $title,
                    "cover" => $cover,
                    "content" => $content,
                    "could_comment" => $couldComment,
                    "ctype" => $ctype,
                    "benefit" => $benefit,
                    "ext_tags" => $extTags,
                    "login_ids" => $loginIds
                ];
                $textParams = [];
                $_request->protocol = $this->_getConfig("protocol");
                $_request->method = "POST";
                $_request->pathname = "/gateway.do";
                $_request->headers = [
                    "host" => $this->_getConfig("gatewayHost"),
                    "content-type" => "application/x-www-form-urlencoded;charset=utf-8"
                ];
                $_request->query = array_merge([
                    "sign" => $this->_sign($systemParams, $bizParams, $textParams, $this->_getConfig("merchantPrivateKey"))],
                    $systemParams);
                $_request->body = $this->_toUrlEncodedRequestBody($bizParams, $textParams);
                $_lastRequest = $_request;
                $_response= Tea::send($_request, $_runtime);
                $respMap = $this->_readAsJson($_response, "alipay.open.public.message.content.modify");
                if ($this->_isCertMode()) {
                    if ($this->_verify($respMap, $this->_extractAlipayPublicKey($this->_getAlipayCertSN($respMap)))) {
                        return $this->_toRespModel($respMap);
                    }
                }
                else {
                    if ($this->_verify($respMap, $this->_getConfig("alipayPublicKey"))) {
                        return $this->_toRespModel($respMap);
                    }
                }
                throw new TeaError([
                    "message" => "验签失败，请检查支付宝公钥设置是否正确。"
                ]);
            }
            catch (\Exception $e) {
                if (Tea::isRetryable($e)) {
                    continue;
                }
                throw $e;
            }
        }
        throw new TeaUnableRetryError($_lastRequest);
    }

    public function sendText($text){
        $_runtime = [
            "connectTimeout" => 15000,
            "readTimeout" => 15000,
            "retry" => [
                "maxAttempts" => 0
            ]
        ];
        $_lastRequest = null;
        $_now = time();
        $_retryTimes = 0;
        while (Tea::allowRetry($_runtime["retry"], $_retryTimes, $_now)) {
            if ($_retryTimes > 0) {
                $_backoffTime = Tea::getBackoffTime($_runtime["backoff"], $_retryTimes);
                if ($_backoffTime > 0) {
                    Tea::sleep($_backoffTime);
                }
            }
            $_retryTimes = $_retryTimes + 1;
            try {
                $_request = new Request();
                $systemParams = [
                    "method" => "alipay.open.public.message.total.send",
                    "app_id" => $this->_getConfig("appId"),
                    "timestamp" => $this->_getTimestamp(),
                    "format" => "json",
                    "version" => "1.0",
                    "alipay_sdk" => $this->_getSdkVersion(),
                    "charset" => "UTF-8",
                    "sign_type" => $this->_getConfig("signType"),
                    "app_cert_sn" => $this->_getMerchantCertSN(),
                    "alipay_root_cert_sn" => $this->_getAlipayRootCertSN()
                ];
                $textObj = new Text();
                $textObj->content = $text;
                $bizParams = [
                    "msg_type" => "text",
                    "text" => $textObj
                ];
                $textParams = [];
                $_request->protocol = $this->_getConfig("protocol");
                $_request->method = "POST";
                $_request->pathname = "/gateway.do";
                $_request->headers = [
                    "host" => $this->_getConfig("gatewayHost"),
                    "content-type" => "application/x-www-form-urlencoded;charset=utf-8"
                ];
                $_request->query = array_merge([
                    "sign" => $this->_sign($systemParams, $bizParams, $textParams, $this->_getConfig("merchantPrivateKey"))],
                    $systemParams);
                $_request->body = $this->_toUrlEncodedRequestBody($bizParams, $textParams);
                $_lastRequest = $_request;
                $_response= Tea::send($_request, $_runtime);
                $respMap = $this->_readAsJson($_response, "alipay.open.public.message.total.send");
                if ($this->_isCertMode()) {
                    if ($this->_verify($respMap, $this->_extractAlipayPublicKey($this->_getAlipayCertSN($respMap)))) {
                        return $this->_toRespModel($respMap);
                    }
                }
                else {
                    if ($this->_verify($respMap, $this->_getConfig("alipayPublicKey"))) {
                        return $this->_toRespModel($respMap);
                    }
                }
                throw new TeaError([
                    "message" => "验签失败，请检查支付宝公钥设置是否正确。"
                ]);
            }
            catch (\Exception $e) {
                if (Tea::isRetryable($e)) {
                    continue;
                }
                throw $e;
            }
        }
        throw new TeaUnableRetryError($_lastRequest);
    }

    public function sendImageText(array $articles){
        $_runtime = [
            "connectTimeout" => 15000,
            "readTimeout" => 15000,
            "retry" => [
                "maxAttempts" => 0
            ]
        ];
        $_lastRequest = null;
        $_now = time();
        $_retryTimes = 0;
        while (Tea::allowRetry($_runtime["retry"], $_retryTimes, $_now)) {
            if ($_retryTimes > 0) {
                $_backoffTime = Tea::getBackoffTime($_runtime["backoff"], $_retryTimes);
                if ($_backoffTime > 0) {
                    Tea::sleep($_backoffTime);
                }
            }
            $_retryTimes = $_retryTimes + 1;
            try {
                $_request = new Request();
                $systemParams = [
                    "method" => "alipay.open.public.message.total.send",
                    "app_id" => $this->_getConfig("appId"),
                    "timestamp" => $this->_getTimestamp(),
                    "format" => "json",
                    "version" => "1.0",
                    "alipay_sdk" => $this->_getSdkVersion(),
                    "charset" => "UTF-8",
                    "sign_type" => $this->_getConfig("signType"),
                    "app_cert_sn" => $this->_getMerchantCertSN(),
                    "alipay_root_cert_sn" => $this->_getAlipayRootCertSN()
                ];
                $bizParams = [
                    "msg_type" => "image-text",
                    "articles" => $articles
                ];
                $textParams = [];
                $_request->protocol = $this->_getConfig("protocol");
                $_request->method = "POST";
                $_request->pathname = "/gateway.do";
                $_request->headers = [
                    "host" => $this->_getConfig("gatewayHost"),
                    "content-type" => "application/x-www-form-urlencoded;charset=utf-8"
                ];
                $_request->query = array_merge([
                    "sign" => $this->_sign($systemParams, $bizParams, $textParams, $this->_getConfig("merchantPrivateKey"))],
                    $systemParams);
                $_request->body = $this->_toUrlEncodedRequestBody($bizParams, $textParams);
                $_lastRequest = $_request;
                $_response= Tea::send($_request, $_runtime);
                $respMap = $this->_readAsJson($_response, "alipay.open.public.message.total.send");
                if ($this->_isCertMode()) {
                    if ($this->_verify($respMap, $this->_extractAlipayPublicKey($this->_getAlipayCertSN($respMap)))) {
                        return $this->_toRespModel($respMap);
                    }
                }
                else {
                    if ($this->_verify($respMap, $this->_getConfig("alipayPublicKey"))) {
                        return $this->_toRespModel($respMap);
                    }
                }
                throw new TeaError([
                    "message" => "验签失败，请检查支付宝公钥设置是否正确。"
                ]);
            }
            catch (\Exception $e) {
                if (Tea::isRetryable($e)) {
                    continue;
                }
                throw $e;
            }
        }
        throw new TeaUnableRetryError($_lastRequest);
    }

    public function sendSingleMessage($toUserId, Template $template){
        $template->validate();
        $_runtime = [
            "connectTimeout" => 15000,
            "readTimeout" => 15000,
            "retry" => [
                "maxAttempts" => 0
            ]
        ];
        $_lastRequest = null;
        $_now = time();
        $_retryTimes = 0;
        while (Tea::allowRetry($_runtime["retry"], $_retryTimes, $_now)) {
            if ($_retryTimes > 0) {
                $_backoffTime = Tea::getBackoffTime($_runtime["backoff"], $_retryTimes);
                if ($_backoffTime > 0) {
                    Tea::sleep($_backoffTime);
                }
            }
            $_retryTimes = $_retryTimes + 1;
            try {
                $_request = new Request();
                $systemParams = [
                    "method" => "alipay.open.public.message.single.send",
                    "app_id" => $this->_getConfig("appId"),
                    "timestamp" => $this->_getTimestamp(),
                    "format" => "json",
                    "version" => "1.0",
                    "alipay_sdk" => $this->_getSdkVersion(),
                    "charset" => "UTF-8",
                    "sign_type" => $this->_getConfig("signType"),
                    "app_cert_sn" => $this->_getMerchantCertSN(),
                    "alipay_root_cert_sn" => $this->_getAlipayRootCertSN()
                ];
                $bizParams = [
                    "to_user_id" => $toUserId,
                    "template" => $template
                ];
                $textParams = [];
                $_request->protocol = $this->_getConfig("protocol");
                $_request->method = "POST";
                $_request->pathname = "/gateway.do";
                $_request->headers = [
                    "host" => $this->_getConfig("gatewayHost"),
                    "content-type" => "application/x-www-form-urlencoded;charset=utf-8"
                ];
                $_request->query = array_merge([
                    "sign" => $this->_sign($systemParams, $bizParams, $textParams, $this->_getConfig("merchantPrivateKey"))],
                    $systemParams);
                $_request->body = $this->_toUrlEncodedRequestBody($bizParams, $textParams);
                $_lastRequest = $_request;
                $_response= Tea::send($_request, $_runtime);
                $respMap = $this->_readAsJson($_response, "alipay.open.public.message.single.send");
                if ($this->_isCertMode()) {
                    if ($this->_verify($respMap, $this->_extractAlipayPublicKey($this->_getAlipayCertSN($respMap)))) {
                        return $this->_toRespModel($respMap);
                    }
                }
                else {
                    if ($this->_verify($respMap, $this->_getConfig("alipayPublicKey"))) {
                        return $this->_toRespModel($respMap);
                    }
                }
                throw new TeaError([
                    "message" => "验签失败，请检查支付宝公钥设置是否正确。"
                ]);
            }
            catch (\Exception $e) {
                if (Tea::isRetryable($e)) {
                    continue;
                }
                throw $e;
            }
        }
        throw new TeaUnableRetryError($_lastRequest);
    }

    public function recallMessage($messageId){
        $_runtime = [
            "connectTimeout" => 15000,
            "readTimeout" => 15000,
            "retry" => [
                "maxAttempts" => 0
            ]
        ];
        $_lastRequest = null;
        $_now = time();
        $_retryTimes = 0;
        while (Tea::allowRetry($_runtime["retry"], $_retryTimes, $_now)) {
            if ($_retryTimes > 0) {
                $_backoffTime = Tea::getBackoffTime($_runtime["backoff"], $_retryTimes);
                if ($_backoffTime > 0) {
                    Tea::sleep($_backoffTime);
                }
            }
            $_retryTimes = $_retryTimes + 1;
            try {
                $_request = new Request();
                $systemParams = [
                    "method" => "alipay.open.public.life.msg.recall",
                    "app_id" => $this->_getConfig("appId"),
                    "timestamp" => $this->_getTimestamp(),
                    "format" => "json",
                    "version" => "1.0",
                    "alipay_sdk" => $this->_getSdkVersion(),
                    "charset" => "UTF-8",
                    "sign_type" => $this->_getConfig("signType"),
                    "app_cert_sn" => $this->_getMerchantCertSN(),
                    "alipay_root_cert_sn" => $this->_getAlipayRootCertSN()
                ];
                $bizParams = [
                    "message_id" => $messageId
                ];
                $textParams = [];
                $_request->protocol = $this->_getConfig("protocol");
                $_request->method = "POST";
                $_request->pathname = "/gateway.do";
                $_request->headers = [
                    "host" => $this->_getConfig("gatewayHost"),
                    "content-type" => "application/x-www-form-urlencoded;charset=utf-8"
                ];
                $_request->query = array_merge([
                    "sign" => $this->_sign($systemParams, $bizParams, $textParams, $this->_getConfig("merchantPrivateKey"))],
                    $systemParams);
                $_request->body = $this->_toUrlEncodedRequestBody($bizParams, $textParams);
                $_lastRequest = $_request;
                $_response= Tea::send($_request, $_runtime);
                $respMap = $this->_readAsJson($_response, "alipay.open.public.life.msg.recall");
                if ($this->_isCertMode()) {
                    if ($this->_verify($respMap, $this->_extractAlipayPublicKey($this->_getAlipayCertSN($respMap)))) {
                        return $this->_toRespModel($respMap);
                    }
                }
                else {
                    if ($this->_verify($respMap, $this->_getConfig("alipayPublicKey"))) {
                        return $this->_toRespModel($respMap);
                    }
                }
                throw new TeaError([
                    "message" => "验签失败，请检查支付宝公钥设置是否正确。"
                ]);
            }
            catch (\Exception $e) {
                if (Tea::isRetryable($e)) {
                    continue;
                }
                throw $e;
            }
        }
        throw new TeaUnableRetryError($_lastRequest);
    }

    public function setIndustry($primaryIndustryCode, $primaryIndustryName, $secondaryIndustryCode, $secondaryIndustryName){
        $_runtime = [
            "connectTimeout" => 15000,
            "readTimeout" => 15000,
            "retry" => [
                "maxAttempts" => 0
            ]
        ];
        $_lastRequest = null;
        $_now = time();
        $_retryTimes = 0;
        while (Tea::allowRetry($_runtime["retry"], $_retryTimes, $_now)) {
            if ($_retryTimes > 0) {
                $_backoffTime = Tea::getBackoffTime($_runtime["backoff"], $_retryTimes);
                if ($_backoffTime > 0) {
                    Tea::sleep($_backoffTime);
                }
            }
            $_retryTimes = $_retryTimes + 1;
            try {
                $_request = new Request();
                $systemParams = [
                    "method" => "alipay.open.public.template.message.industry.modify",
                    "app_id" => $this->_getConfig("appId"),
                    "timestamp" => $this->_getTimestamp(),
                    "format" => "json",
                    "version" => "1.0",
                    "alipay_sdk" => $this->_getSdkVersion(),
                    "charset" => "UTF-8",
                    "sign_type" => $this->_getConfig("signType"),
                    "app_cert_sn" => $this->_getMerchantCertSN(),
                    "alipay_root_cert_sn" => $this->_getAlipayRootCertSN()
                ];
                $bizParams = [
                    "primary_industry_code" => $primaryIndustryCode,
                    "primary_industry_name" => $primaryIndustryName,
                    "secondary_industry_code" => $secondaryIndustryCode,
                    "secondary_industry_name" => $secondaryIndustryName
                ];
                $textParams = [];
                $_request->protocol = $this->_getConfig("protocol");
                $_request->method = "POST";
                $_request->pathname = "/gateway.do";
                $_request->headers = [
                    "host" => $this->_getConfig("gatewayHost"),
                    "content-type" => "application/x-www-form-urlencoded;charset=utf-8"
                ];
                $_request->query = array_merge([
                    "sign" => $this->_sign($systemParams, $bizParams, $textParams, $this->_getConfig("merchantPrivateKey"))],
                    $systemParams);
                $_request->body = $this->_toUrlEncodedRequestBody($bizParams, $textParams);
                $_lastRequest = $_request;
                $_response= Tea::send($_request, $_runtime);
                $respMap = $this->_readAsJson($_response, "alipay.open.public.template.message.industry.modify");
                if ($this->_isCertMode()) {
                    if ($this->_verify($respMap, $this->_extractAlipayPublicKey($this->_getAlipayCertSN($respMap)))) {
                        return $this->_toRespModel($respMap);
                    }
                }
                else {
                    if ($this->_verify($respMap, $this->_getConfig("alipayPublicKey"))) {
                        return $this->_toRespModel($respMap);
                    }
                }
                throw new TeaError([
                    "message" => "验签失败，请检查支付宝公钥设置是否正确。"
                ]);
            }
            catch (\Exception $e) {
                if (Tea::isRetryable($e)) {
                    continue;
                }
                throw $e;
            }
        }
        throw new TeaUnableRetryError($_lastRequest);
    }

    public function getIndustry(){
        $_runtime = [
            "connectTimeout" => 15000,
            "readTimeout" => 15000,
            "retry" => [
                "maxAttempts" => 0
            ]
        ];
        $_lastRequest = null;
        $_now = time();
        $_retryTimes = 0;
        while (Tea::allowRetry($_runtime["retry"], $_retryTimes, $_now)) {
            if ($_retryTimes > 0) {
                $_backoffTime = Tea::getBackoffTime($_runtime["backoff"], $_retryTimes);
                if ($_backoffTime > 0) {
                    Tea::sleep($_backoffTime);
                }
            }
            $_retryTimes = $_retryTimes + 1;
            try {
                $_request = new Request();
                $systemParams = [
                    "method" => "alipay.open.public.setting.category.query",
                    "app_id" => $this->_getConfig("appId"),
                    "timestamp" => $this->_getTimestamp(),
                    "format" => "json",
                    "version" => "1.0",
                    "alipay_sdk" => $this->_getSdkVersion(),
                    "charset" => "UTF-8",
                    "sign_type" => $this->_getConfig("signType"),
                    "app_cert_sn" => $this->_getMerchantCertSN(),
                    "alipay_root_cert_sn" => $this->_getAlipayRootCertSN()
                ];
                $bizParams = [];
                $textParams = [];
                $_request->protocol = $this->_getConfig("protocol");
                $_request->method = "POST";
                $_request->pathname = "/gateway.do";
                $_request->headers = [
                    "host" => $this->_getConfig("gatewayHost"),
                    "content-type" => "application/x-www-form-urlencoded;charset=utf-8"
                ];
                $_request->query = array_merge([
                    "sign" => $this->_sign($systemParams, $bizParams, $textParams, $this->_getConfig("merchantPrivateKey"))],
                    $systemParams);
                $_request->body = $this->_toUrlEncodedRequestBody($bizParams, $textParams);
                $_lastRequest = $_request;
                $_response= Tea::send($_request, $_runtime);
                $respMap = $this->_readAsJson($_response, "alipay.open.public.setting.category.query");
                if ($this->_isCertMode()) {
                    if ($this->_verify($respMap, $this->_extractAlipayPublicKey($this->_getAlipayCertSN($respMap)))) {
                        return $this->_toRespModel($respMap);
                    }
                }
                else {
                    if ($this->_verify($respMap, $this->_getConfig("alipayPublicKey"))) {
                        return $this->_toRespModel($respMap);
                    }
                }
                throw new TeaError([
                    "message" => "验签失败，请检查支付宝公钥设置是否正确。"
                ]);
            }
            catch (\Exception $e) {
                if (Tea::isRetryable($e)) {
                    continue;
                }
                throw $e;
            }
        }
        throw new TeaUnableRetryError($_lastRequest);
    }
}
