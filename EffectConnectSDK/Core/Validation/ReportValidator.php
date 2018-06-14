<?php

    namespace EffectConnectSDK\Core\Validation;

    use EffectConnectSDK\Core\Abstracts\Validator;
    use EffectConnectSDK\Core\Exception\InvalidPayloadException;
    use EffectConnectSDK\Core\Interfaces\CallTypeInterface;
    use EffectConnectSDK\Core\Interfaces\CallValidatorInterface;
    use EffectConnectSDK\Core\Model\ReportReadRequest;

    /**
     * Class ReportValidator
     *
     * @author  Stefan Van den Heuvel
     * @company Koek & Peer
     * @product EffectConnect
     * @package EffectConnectSDK
     *
     */
    final class ReportValidator extends Validator implements CallValidatorInterface
    {
        protected $validActions = [
            CallTypeInterface::ACTION_READ,
        ];

        /**
         * @param $argument
         *
         * @return bool
         * @throws InvalidPayloadException
         */
        public function validateCall($argument)
        {
            $valid = false;
            switch ($this->action) {
                case CallTypeInterface::ACTION_READ:
                    if ($argument instanceof ReportReadRequest) {
                        $valid = true;
                    }
                    break;
            }
            if (!$valid)
            {
                throw new InvalidPayloadException($this->action);
            }

            return true;
        }
    }