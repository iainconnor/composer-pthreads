<?php

namespace IainConnor\ComposerPthreads;

/**
 * Class ResponseDataBundle
 * This Class is a wrapper to be used in capturing the output of a Worker in a thread-safe way.
 *
 * @package IainConnor\ComposerPthreads
 */
class ResponseDataBundle extends \Threaded
{
    /** @var mixed */
    protected $data;

    /**
     * @return mixed
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param mixed $data
     */
    public function setData($data)
    {
        $this->data = $data;
    }
}
