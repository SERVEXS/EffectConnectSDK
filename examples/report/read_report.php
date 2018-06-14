<?php
    // 1. Require the SDK base file.
    require_once(realpath(__DIR__.'/..').'/base.php');
    /**
     * @var \EffectConnectSDK\Core                       $effectConnectSDK
     * @var \EffectConnectSDK\Core\CallType\ReportCall   $reportCallType
     *
     * 2. Get the Process call type.
     */
    try
    {
        $reportCallType = $effectConnectSDK->ReportCall();
    } catch (Exception $exception)
    {
        echo sprintf('Could not create call type. `%s`', $exception->getMessage());
        die();
    }
    /**
     * 3. Create an EffectConnectSDK\Core\Model\ReportReadRequest object and populate it with the process ID you want to retrieve
     */

    try
    {
        $reportReadRequest = (new \EffectConnectSDK\Core\Model\ReportReadRequest())
            ->setID('Vqs2PqP985p4r1rG')
        ;
    } catch (Exception $exception)
    {
        echo sprintf('Could not create object. `%s`', $exception->getMessage());
        die();
    }
    /**
     * 4. Make the call
     */
    $apiCall = $reportCallType->read($reportReadRequest);
    $apiCall->call();
    echo $apiCall->getCurlResponse();