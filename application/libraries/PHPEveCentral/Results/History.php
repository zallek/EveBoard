<?php

/**
 *
 * Copyright (c) 2013 Marc André "Manhim" Audet <root@manhim.net>. All rights reserved.
 *
 * Redistribution and use in source and binary forms, with or without modification, are
 * permitted provided that the following conditions are met:
 *
 *   1. Redistributions of source code must retain the above copyright notice, this list of
 *       conditions and the following disclaimer.
 *
 *   2. Redistributions in binary form must reproduce the above copyright notice, this list
 *       of conditions and the following disclaimer in the documentation and/or other materials
 *       provided with the distribution.
 *
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" AND
 * ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED
 * WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE
 * DISCLAIMED. IN NO EVENT SHALL MARC ANDRÉ "MANHIM" AUDET BE LIABLE FOR ANY
 * DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES
 * (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES;
 * LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND
 * ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT
 * (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS
 * SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
 *
 */



namespace PHPEveCentral\Results;



use PHPEveCentral\Result;



/**
 * Class History
 * @package PHPEveCentral\Requests
 */
class History implements Result
{
    private $raw_json = array();
    private $values = array();

    public function __construct($input)
    {
        $data = json_decode($input, true);
        $this->raw_json = $data;

        $values = $data['values'];

        foreach ($values as $v)
        {
            $add = new \stdClass;

            $add->median = (double) $v['median'];
            $add->max = (double) $v['max'];
            $add->avg = (double) $v['avg'];
            $add->stdDev = (double) $v['stdDev'];
            $add->min = (double) $v['min'];
            $add->volume = (double) $v['volume'];
            $add->fivePercent = (double) $v['fivePercent'];
            $add->at = strtotime($v['at']);

            $this->values[] = $add;
        }
    }

    public function getValues()
    {
        return $this->values;
    }

    public function getRawJSON()
    {
        return $this->raw_json;
    }
}
